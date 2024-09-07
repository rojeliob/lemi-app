<?php

namespace App\Http\Controllers;

use App\Models\FinancialInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    /**
     * Handle the incoming request to save data.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        info($request);
        // Validate the incoming request data
        $validated = $request->validate([
            // 'selectedValue' => 'required|string',
            // 'multiSelectValues' => 'required|array',
            'employeeCount' => 'required|integer|min:0',
        ]);
        $user = Auth::user();

        // Ensure the user has an associated company
        if (! $user->company) {
            return response()->json([
                'message' => 'User does not have an associated company.',
            ], 400);
        }
        // info($validated['number_of_employees']);
        // Extract the company ID from the authenticated user's company
        $companyId = $user->company->id;

        FinancialInformation::updateOrCreate(
            ['company_id' => $companyId], // Find by company_id
            [
                // 'company_activity' => $validated['company_activity'],
                // 'business_description' => $validated['business_description'],
                'number_of_employees' => $validated['employeeCount'] ? $validated['employeeCount'] : '',
            ]
        );

        // For demonstration purposes, just return the validated data
        return response()->json([
            'message' => 'Data saved successfully',
            'data' => $validated,
        ], 200);
    }
}
