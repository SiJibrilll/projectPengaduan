<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    function beranda()
    {
        $aduans = Auth()->user()->aduan();
        return view('pelapor.beranda', ['aduans' => $aduans]);
    }
}
