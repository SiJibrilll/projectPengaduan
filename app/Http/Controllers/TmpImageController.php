<?php

namespace App\Http\Controllers;

use App\Models\TmpImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TmpImageController extends Controller
{
    function create(Request $request): string
    {
        
        if (!$request->hasFile('image')) {
            return 'ERROR';
        }

        $image = $request->file('image')[0];
        $filename = $image->getClientOriginalName();
        $folder = uniqid('image-', true);
        $image->storeAs('images/tmp/' . $folder, $filename);

        
        $tmp = TmpImage::create([
            'folder' => $folder,
            'gambar' => $filename
        ]);

        return $tmp->id;
    }

    function delete() {
        $tmpImage = TmpImage::where('folder', request()->getContent())->first();
        if ($tmpImage) {
            Storage::deleteDirectory('images/tmp/'. $tmpImage->folder);
            $tmpImage->delete();
        }

        return response()->noContent();
    }

    function load(Request $request) {
        
    }
}
