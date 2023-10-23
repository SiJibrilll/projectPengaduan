<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    function redirect() {
        return Socialite::driver('google')->redirect(); // redirect user to SSO page
    }

    function callback() {
        $googleUser =  Socialite::driver('google')->stateless()->user(); // get account data
        
        try{ // lets try creating a user
            DB::transaction(function() use($googleUser) {
                $user = User::updateOrCreate([
                    'google_id' => $googleUser->id, // user with this google id exist? then simply return
                ], [
                    'username' => $googleUser->name, // else? create a new user
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                ]);
        
                $user->assignRole('pelapor'); // give user a pelapor role
        
                Auth::login($user, true); // login the user
            });

            return redirect('/beranda');
        }
        catch (\Throwable $e){
            dd('error!! ' . $e);
        }
    }
}
