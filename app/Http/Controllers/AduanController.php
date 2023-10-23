<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AduanController extends Controller
{
    function create() {
        return view('pelapor.aduan');
    }
}
