<?php

namespace App\Http\Controllers;

use App\Models\FinancialInformation;
use Illuminate\Http\Request;

class FinancialInformationController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'corporate_tax_year_1' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
            'corporate_tax_year_2' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
            'audits' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
            'balance_sheet_income_statement' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
            'vat_returns_previous_year' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
            'vat_returns_current_year' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
            'income_tax_returns_previous_year' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
            'income_tax_returns_current_year' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
            'model_390_previous_year' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
            'model_347_previous_year' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
            'bank_pool' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
            'payment_certificates_social_security_taxes' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
            'company_assets_declaration' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
            'negative_certification_registry' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
        ]);

        // Store the file paths
        $data = $request->only('company_id');

        foreach ($request->files as $fieldName => $file) {
            if ($file) {
                $data[$fieldName] = $file->store('financial_documents', 'public');
            }
        }

        // Create a new record in the financial_information table
        $financialInformation = FinancialInformation::create($data);

        return response()->json(['message' => 'Financial information stored successfully!', 'data' => $financialInformation], 201);
    }
}
