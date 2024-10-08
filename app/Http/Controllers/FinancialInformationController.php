<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'digits_between:7,15'],
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
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => ['required'],
        ]);

        // Retrieve the registration data from the session
        $registrationData = $request->session()->get('registration_data');

        // Create the user
        $user = User::create([
            'name' => $registrationData['name'],
            'last_name' => $registrationData['last_name'],
            'email' => $registrationData['email'],
            'phone' => $registrationData['phone'],
            'password' => Hash::make($request->password),
        ]);

        // Clean up the session
        $request->session()->forget('registration_data');

        // Fire the Registered event
        event(new Registered($user));

        // Log the user in
        Auth::login($user);

        // Redirect to the dashboard
        return redirect(route('dashboard', absolute: false));
    }
}
