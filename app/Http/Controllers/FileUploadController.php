<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the file inputs
        $validated = $request->validate([
            'sociedades_y_auditorias' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'balance_resultados_provisional' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'liquidaciones_iva' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'liquidaciones_irpf' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'modelo_390' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'modelo_347' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'pool_bancario' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'certificados_corriente' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'declaracion_bienes' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'certificacion_negativa' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'escrituras_constitucion' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'acta_titularidad' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $paths = [];

        foreach ($validated as $key => $file) {
            if ($request->hasFile($key)) {
                $paths[$key] = $request->file($key)->store('uploads', 'public');
            }
        }

        return response()->json(['file_paths' => $paths], 201);
    }
}
