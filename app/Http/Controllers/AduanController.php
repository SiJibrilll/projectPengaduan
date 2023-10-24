<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\GambarAduan;
use App\Models\TmpImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AduanController extends Controller
{   
    // -- show create form
    function create() {
        return view('pelapor.createAduan');
    }

    // -- store aduan
    function store(Request $request) {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        $aduan = Aduan::create([
            'user_id' => Auth()->user()->id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => 'diajukan'
        ]);

        foreach ($request->image as $image) {
            $tmp = TmpImage::where('folder', $image)->first();
            Storage::copy('images/tmp/'. $image .'/' . $tmp->gambar, 'images/gambarAduan/' . $image .'/' . $tmp->gambar);
            GambarAduan::create([
                'gambar' => $image,
                'aduan_id' => $aduan->id
            ]);
        }

        return redirect('/beranda');
    }

    // -- show aduan data
    function show(Aduan $aduan) {
        return view('pelapor.aduan', ['aduan' => $aduan]);
    }

    // -- show edit form
    function edit() {
        return view('pelapor.editAduan');
    }
}
