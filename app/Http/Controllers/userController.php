<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    // -- masuk ke halaman beranda
    function beranda()
    {
        $user = Auth()->user();

        if ($user->hasRole('admin') || $user->hasRole('petugas')) {
            return view('admin.beranda');
        }


        $aduans = $user->aduan()->get();
        return view('pelapor.beranda', ['aduans' => $aduans]);
    }

    // -- masuk ke halaman display pelapor
    function pelapor() {
        return view('admin.indexUsers', [
            'role' => 'pelapor'
        ]);
    }

    // -- masuk kehalaman display petugas
    function petugas() {
        return view('admin.indexUsers', [
            'role' => 'petugas',
        ]);
    }

    // -- tampilkan data user
    function show(User $user) {
        
        $currentUser = Auth()->user();

        // admin bisa melihat data semua orang, sementara pelapor hanya bisa melihat data nya sendiri
        if ($currentUser->hasRole('admin') || $currentUser->id == $user->id) {
            return view($currentUser->hasRole('pelapor')? 'pelapor.user' : 'admin.user', [
                'user' => $user
            ]);
        }

        // petugas bisa melihat data user pelapor
        if ($currentUser->hasRole('petugas') && $user->hasRole('pelapor')) {
            return view('admin.user', [
                'user' => $user
            ]);
        }

        // -- jika tidak ada syarat yang terpenuhi, kembali ke beranda
        return redirect('/beranda');
    }


    // -- masuk ke halaman create petugas
    function create() {
        return view('admin.createPetugas');
    }

    // -- simpan data petugas
    function store(Request $request) {
        $validated = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'telepon' => 'required|numeric',
            'password' => 'required|min:8',
        ]);

        try{ // lets try creating a user
            $user = DB::transaction(function() use($validated) {
                $user = User::create($validated);
        
                $user->assignRole('petugas'); // give user a petugas role
                
                return $user;
            });

            return redirect('/users/show/' . $user->id);
        }
        catch (\Throwable $e){
            dd('error!! ' . $e);
        }
    }
}
