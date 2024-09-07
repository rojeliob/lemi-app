<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the file inputs
        $validated = $request->validate([
            'corporate_taxes' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'balance_sheet_current_year' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'bank_debt_summary' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'cirbe' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'vat_summary' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'modelo_347' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'pool_bancario' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'certificados_corriente' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'declaracion_bienes' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'certificacion_negativa' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'escrituras_constitucion' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'acta_titularidad' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $paths = [];
        info('lala');
        foreach ($validated as $key => $file) {
            // info($key);
            // info($file);
            // $date_time = Carbon::now();
            if ($file instanceof \Illuminate\Http\UploadedFile) {
                // Generate a custom file name using the key and the original file extension
                $fileName = $key.'.'.$file->getClientOriginalExtension();

                // Store the file temporarily and get the path
                $tempPath = $file->store('temp_documents');

                // Define the new path with the custom file name
                $newPath = 'documents/'.Auth::id().'_'.Carbon::now()->format('Ymd_His').'_'.$fileName;

                // Move the file from the temporary path to the desired location with the new name
                Storage::move($tempPath, $newPath);

                // Add the new path to the array
                $paths[$key] = $newPath;
            }
        }

        return response()->json(['file_paths' => $paths], 201);
    }
}
