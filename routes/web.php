<?php

use App\Http\Controllers\AduanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LengkapiDataController;
use App\Http\Controllers\TmpImageController;
use App\Http\Controllers\userController;
use App\Models\TmpImage;
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
    return view('welcome');
});

// ================================== AUTHENTICATION ==================================
// -- redirect to SSO login or register
Route::get('/auth/google/redirect', [GoogleController::class, 'redirect']);

// -- callback after SSO login or register
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

// -- login page
Route::get('/login', [AuthController::class, 'login']);

// -- authenticate
Route::post('/authenticate', [AuthController::class, 'authenticate']);

// -- logout
Route::post('/logout', [AuthController::class, 'logout']);



//================================= CRUD ==============================================

Route::get('/lengkapi-data', [LengkapiDataController::class, 'create']);

Route::post('/lengkapi-data/store', [LengkapiDataController::class, 'store']);

Route::get('/beranda', [userController::class, 'beranda'])->middleware('dataLengkap');

Route::get('/aduan', [AduanController::class, 'create']);

Route::post('/tmp-image/create', [TmpImageController::class, 'create']);

Route::delete('/tmp-image/delete', [TmpImageController::class, 'delete']);