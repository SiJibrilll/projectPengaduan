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
    function index() {
        return view('admin.kelolaAduan');
    }
    // -- show create form
    function create() {
        return view('pelapor.createAduan');
    }

    // -- store aduan
    function store(Request $request) {
        // validasi data
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        // buat record aduan
        $aduan = Aduan::create([
            'user_id' => Auth()->user()->id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => 'diajukan'
        ]);

        // simpan tiap gambar yang disertakan
        foreach (($request->image ?? array()) as $image) {
            $tmp = TmpImage::find($image);
            Storage::copy('images/tmp/'. $tmp->folder .'/' . $tmp->gambar, 'images/gambarAduan/' . $tmp->folder .'/' . $tmp->gambar);
            GambarAduan::create([
                'gambar' => $tmp->folder . '/' . $tmp->gambar,
                'aduan_id' => $aduan->id
            ]);
            // -- hapus tmp image
            Storage::deleteDirectory('images/tmp/'. $tmp->folder);
            $tmp->delete();
        }

        return redirect('/beranda');
    }

    // -- show aduan data
    function show(Aduan $aduan) {
        
        // jika user admin atau petugas, maka kirim ke halaman aduan khusus mereka
        if (Auth()->user()->hasRole('admin') || Auth()->user()->hasRole('petugas')) {
            return view('admin.aduan', ['aduan' => $aduan]  );
        }
        
        // jika pelapor biasa, kirim ke aduan pelapor
        return view('pelapor.aduan', ['aduan' => $aduan, 'html' => 'pelapor']);
    }


    // -- show edit form
    function edit(Aduan $aduan) {
        // jika aduan ini sudah diangkat dari status diajukan
        if (!'diajukan' == $aduan->status) {
            return redirect('/aduan/show/'. $aduan->id); // maka tidak bisa lagi di edit, kembali ke halaman detail aduan
        }

        // jika masih, maka bisa di edit
        return view('pelapor.editAduan', ['aduan' => $aduan]);
    }


    // save aduan changes
    function update(Aduan $aduan, Request $request) {
        // validasi data
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        // update aduan
        Aduan::find($aduan->id)->update($request->all());

        // hapus semua gambar lama
        foreach ($aduan->gambar as $gambar) {
            Storage::deleteDirectory('images/gambarAduan/'. dirname($gambar->gambar));
            $gambar->delete();
        }

        // simpan tiap gambar yang disertakan
        foreach (($request->image ?? array()) as $image) {
            $tmp = TmpImage::find($image);
            Storage::copy('images/tmp/'. $tmp->folder .'/' . $tmp->gambar, 'images/gambarAduan/' . $tmp->folder .'/' . $tmp->gambar);
            GambarAduan::create([
                'gambar' => $tmp->folder . '/' . $tmp->gambar,
                'aduan_id' => $aduan->id
            ]);
            // -- hapus tmp image
            Storage::deleteDirectory('images/tmp/'. $tmp->folder);
            $tmp->delete();
        }

        return redirect('/beranda');
    }
}
