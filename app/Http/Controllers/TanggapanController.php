<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    function create() {
        return view('admin.createTanggapan');
    }

    function store() {
        
    }
}
