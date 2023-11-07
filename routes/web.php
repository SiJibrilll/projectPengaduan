<?php

use App\Http\Controllers\AduanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GambarAduanController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LengkapiDataController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\TmpImageController;
use App\Http\Controllers\userController;
use App\Models\Aduan;
use App\Models\TmpImage;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

// ================================== AUTHENTICATION ==================================
// -- redirect to SSO login or register
Route::get('/auth/google/redirect', [GoogleController::class, 'redirect']);

// -- callback after SSO login or register
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

// -- login page
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

// -- authenticate
Route::post('/authenticate', [AuthController::class, 'authenticate']);

// -- logout
Route::post('/logout', [AuthController::class, 'logout']);



//================================= CRUD ==============================================

// -- fitur lengkapi data
Route::group(['middleware' => ['auth']], function () {
    
    // -- lengkapi data
    Route::get('/lengkapi-data', [LengkapiDataController::class, 'create']);
    
    // -- simpan lengkapi data
    Route::post('/lengkapi-data/store', [LengkapiDataController::class, 'store']);
});

// -- fitur general (semua role bisa akses)
Route::group(['middleware' => ['auth', 'role:pelapor|admin|petugas']], function () {
    // -- masuk ke beranda
    Route::get('/beranda', [userController::class, 'beranda'])->middleware('dataLengkap');

    // -- lihat detail aduan
    Route::get('/aduan/show/{aduan}', [AduanController::class, 'show']);

    // -- hapus aduan
    Route::delete('/aduan/delete/{aduan}', [AduanController::class, 'delete']);

    // -- lihat detail pengguna
    Route::get('/users/show/{user}', [userController::class, 'show']);

    // -- ubah data pengguna
    Route::get('/users/edit/{user}', [userController::class, 'edit']);

    // -- simpan perubahan data
    Route::post('/users/update/{user}', [userController::class, 'update']);
});

// -- fitur pelapor
Route::group(['middleware' => ['role:pelapor', 'auth', 'dataLengkap']], function () {

    // -- kirim form buat aduan
    Route::get('/aduan/create', [AduanController::class, 'create']);
    
    // -- simpan tmp image
    Route::post('/tmp-image/create', [TmpImageController::class, 'create']);
    
    // -- hapus tmp image
    Route::delete('/tmp-image/delete', [TmpImageController::class, 'delete']);
    
    // -- simpan aduan
    Route::post('/aduan/store', [AduanController::class, 'store']);

    // -- tampilkan form edit aduan
    Route::get('/aduan/edit/{aduan}', [AduanController::class, 'edit']);

    Route::get('/gambar-aduan/edit', [GambarAduanController::class, 'edit']);

    // simpan perubahan
    Route::post('/aduan/update/{aduan}', [AduanController::class, 'update']);

    // -- ubah password
    Route::get('/users/edit-password', [userController::class, 'editPassword']);

    // -- buat password
    Route::post('/users/create-password', [userController::class, 'createPassword']);

    // -- simpan perubahan password
    Route::post('/users/update-password', [userController::class, 'updatePassword']);
});

// -- fitur admin dan petugas
Route::group(['middleware' => ['role:admin|petugas', 'auth']], function () {

    // -- route ke menu kelola aduan
    Route::get('/aduan', [AduanController::class, 'index']);

    // -- route ke menu create tanggapan
    Route::get('/tanggapan/create/{aduan}', [TanggapanController::class, 'create']);

    // -- simpan tanggapan
    Route::post('/tanggapan/store', [TanggapanController::class, 'store']);

    // -- show menu edit tanggapan
    Route::get('/tanggapan/edit/{tanggapan}', [TanggapanController::class, 'edit']);

    // -- simpan perubahan tanggapan
    Route::post('/tanggapan/update/{tanggapan}', [TanggapanController::class, 'update']);

    // -- halaman kelola user pelapor
    Route::get('/users/pelapor', [userController::class, 'pelapor']);

    // -- halaman create laporan
    Route::get('/aduan/create-laporan', [AduanController::class, 'createLaporan']);

    // -- generate laporan
    Route::post('/aduan/generate-laporan', [AduanController::class, 'generateLaporan']);

    // -- blokir akun
    Route::post('/users/blokir/{user}', [userController::class, 'blokir']);

    // -- hapus akun
    Route::delete('/users/delete/{user}', [userController::class, 'delete']);
});


// -- fitur khusus admin
Route::group(['middleware' => ['role:admin', 'auth']], function () {
    // -- halaman kelola user petugas
    Route::get('/users/petugas', [userController::class, 'petugas']);

    // -- masuk ke halaman create petugas
    Route::get('/users/create', [userController::class, 'create']);
    
    // -- simpan data petugas baru
    Route::post('/users/store', [userController::class, 'store']);
});
