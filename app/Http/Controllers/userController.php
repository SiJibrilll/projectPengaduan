<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    function beranda()
    {
        $user = Auth()->user();

        if ($user->hasRole('admin') || $user->hasRole('petugas')) {
            return view('admin.beranda');
        }


        $aduans = $user->aduan()->get();
        return view('pelapor.beranda', ['aduans' => $aduans]);
    }
}
