<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;

class GambarAduanController extends Controller
{
    function edit(Aduan $aduan) {
        $files = $aduan->gambar();

        $formattedFiles = [];
        foreach ($files as $file) {
            $formattedFiles[] = [
                'source' => [
                    'data' => [
                        'id' => $file['id'],
                        'name' => $file['gambar'],
                        'size' => $file['size'],
                    ],
                    'file' => $file['name'], // The path to the file
                ],
            ];
        }

        return response()->json(['files' => $formattedFiles]);
    }
}
