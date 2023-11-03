<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    function create(Aduan $aduan) {
        return view('admin.createTanggapan', ['aduan' => $aduan]);
    }

    function store(Request $request) {
        $validatedData = $request->validate([
            'tanggapan' => 'required',
            'status' => 'required|in:0,1,2,3,4',
            'aduan_id' => 'required'
        ]);

        $validatedData['status'] = ['diajukan', 'diterima', 'diproses', 'selesai', 'ditolak'][$validatedData['status']];

        $validatedData['user_id'] = Auth()->user()->id;
        Tanggapan::create($validatedData);

        return redirect('/aduan/show/' . $validatedData['aduan_id']);
    }

    function edit(Tanggapan $tanggapan) {
        return view('admin.editTanggapan', ['tanggapan' => $tanggapan]);
    }

    function update(Tanggapan $tanggapan, Request $request) {
        $validatedData = $request->validate([
            'tanggapan' => 'required',
            'status' => 'required|in:0,1,2,3,4',
            'aduan_id' => 'required'
        ]);

        $validatedData['status'] = ['diajukan', 'diterima', 'diproses', 'selesai', 'ditolak'][$validatedData['status']];

        $validatedData['user_id'] = Auth()->user()->id;
        $tanggapan->update($validatedData);

        return redirect('/aduan/show/' . $validatedData['aduan_id']);
    }
}
