<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    function redirect() {
        return Socialite::driver('google')->redirect();
    }

    function callback() {
        $user =  Socialite::driver('google')->stateless()->user();
        dd($user);
    }
}
