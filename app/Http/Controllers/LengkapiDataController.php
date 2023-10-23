<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LengkapiDataController extends Controller
{
    function create()
    {
        return view('pelapor.lengkapiData');
    }

    function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:users',
            'telepon' => 'required|unique:users'
        ]);

        $user = User::find(Auth()->user()->id);

        $user->nik = $request->nik;
        $user->telepon = $request->telepon;
        $user->save();

        return redirect('/beranda');
    }
}
