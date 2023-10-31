<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    function pelapor()
    {
        return view('admin.indexUsers', [
            'role' => 'pelapor'
        ]);
    }

    // -- masuk kehalaman display petugas
    function petugas()
    {
        return view('admin.indexUsers', [
            'role' => 'petugas',
        ]);
    }

    // -- tampilkan data user
    function show(User $user)
    {

        $currentUser = Auth()->user();

        // admin bisa melihat data semua orang, sementara pelapor hanya bisa melihat data nya sendiri
        if ($currentUser->hasRole('admin') || $currentUser->id == $user->id) {
            return view($currentUser->hasRole('pelapor') ? 'pelapor.user' : 'admin.user', [
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
    function create()
    {
        return view('admin.createPetugas');
    }

    // -- simpan data petugas
    function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'nik' => 'required|unique:users',
            'telepon' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);

        try { // lets try creating a user
            $user = DB::transaction(function () use ($validated) {
                $user = User::create($validated);

                $user->assignRole('petugas'); // give user a petugas role

                return $user;
            });

            return redirect('/users/show/' . $user->id);
        } catch (\Throwable $e) {
            dd('error!! ' . $e);
        }
    }

    function edit(User $user)
    {
        $currentUser = Auth()->user();

        // -- admin bisa mengubah data semua user
        if ($currentUser->hasRole('admin')) {
            return view('admin.editUser', ['user' => $user]);
        }

        //-- pelapor bisa mengubah datanya sendiri, sementara petugas bisa mengubah data pelapor
        if ($user->hasRole('pelapor') && ($user->id == $currentUser->id || $currentUser->hasRole('petugas'))) {
            return view($currentUser->hasRole('petugas') ? 'admin.editUser' : 'pelapor.editUser', [
                'user' => $user
            ]);
        }

        // -- jika tidak ada syarat yang terpenuhi, kembali ke beranda
        return redirect('/beranda');
    }


    function update(User $user, Request $request)
    {   
        $validated = $request->validate([
            'username' => 'required|max:255',
            'email' => $user->hasRole('petugas')? ['required', 'email', Rule::unique('users')->ignore($user->id)]: 'prohibited', // hanya user petugas yang emailnya bisa diganti
            'nik' => $user->hasRole('pelapor')? ['required', Rule::unique('users')->ignore($user->id)] : 'prohibited', // hanya user pelapor yang nik nya bisa diganti
            'telepon' => ['required', Rule::unique('users')->ignore($user->id)],
            'password' => $user->hasRole('pelapor')? 'prohibited' : 'nullable|min:8', // pelapor akan memiliki fitur reset password sendiri
        ]);
        
        $currentUser = Auth()->user();

        // -- admin bisa mengubah data semua user
        if ($currentUser->hasRole('admin')) {

            $user->update($validated);
            return redirect('/users/show/'. $user->id);
        }

        //-- pelapor bisa mengubah datanya sendiri, sementara petugas bisa mengubah data pelapor
        if ($user->hasRole('pelapor') && ($user->id == $currentUser->id || $currentUser->hasRole('petugas'))) {

            $user->update($validated);
            
            return redirect('/users/show/'. $user->id);
        }

        // jika tidak ada persyaratan yang terpenuhi, maka lempar balik ke halaman detail user
        return redirect('/users/show/'. $user->id);
    }


    // -- show edit password form
    function editPassword() {
        return view('pelapor.editPassword');
    }

    //-- create password
    function createPassword(Request $request) {
        $request->validate([
            'new_password' => 'required|min:8|confirmed'
        ]);

        // Check if the user doesn't already have a password
        if (Auth::user()->password == null) {
            // The user doesn't have a password, so let's create one
            Auth::user()->fill([
                'password' => Hash::make($request->new_password)
            ])->save();

            return redirect('/users/show/' . Auth::user()->id);
        } else {
            // The user already has a password
            return back()->withErrors(['new_password' => 'You already have a password']);
        }
    }


    // -- update user password
    function updatePassword(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed'
        ]);

         // Check if the old password is correct
        if (Hash::check($request->old_password, Auth::user()->password)) {
            // The old password is correct, change the password
            Auth::user()->fill([
                'password' => Hash::make($request->new_password)
            ])->save();

            return redirect('/users/show/'. Auth::user()->id);
        } else {
            // The old password is incorrect
            return back()->withErrors(['old_password' => 'Your old password is incorrect']);
        }
    }
}
