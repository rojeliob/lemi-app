<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;  // Add this line to include the Company model
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;

class CustomRegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle the first step of the registration request.
     */
    public function storeStep1(Request $request)
    {
        // Validate step 1 fields
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|digits_between:10,15',
        ]);

        // Store the data in the session or temporary storage
        $request->session()->put('registration_data', $request->only(['name', 'last_name', 'email', 'phone']));

        // Return response to proceed to step 2
        return response()->json(['message' => 'Step 1 completed. Proceed to step 2.']);
    }

    /**
     * Handle the second step of the registration request.
     */
    public function storeStep2(Request $request)
    {
        // Validate step 2 fields
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'cif' => 'required|string|max:50',
            'antiquity' => 'required|integer|min:0',
            'annual_billing' => 'required|numeric|min:0',
            'password' => 'required|string|min:8',
        ]);

        // Retrieve the registration data from the session
        $registrationData = $request->session()->get('registration_data');

        // Create the company first
        $company = Company::create([
            'company_name' => $request->company_name,
            'cif' => $request->cif,
            'antiquity' => $request->antiquity,
            'annual_billing' => $request->annual_billing,
        ]);

        // Create the user and associate the company
        $user = User::create([
            'name' => $registrationData['name'],
            'last_name' => $registrationData['last_name'],
            'email' => $registrationData['email'],
            'phone' => $registrationData['phone'],
            'password' => Hash::make($request->password),
            'company_id' => $company->id,  // Associate the user with the company
        ]);

        // Clean up the session
        $request->session()->forget('registration_data');

        // Fire the Registered event
        event(new Registered($user));

        // Log the user in
        Auth::login($user);

        // Redirect to the dashboard
        return redirect()->route('dashboard');
    }
}
