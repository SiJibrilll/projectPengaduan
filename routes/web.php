<?php

use App\Http\Controllers\GoogleController;
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


// -- redirect to SSO login or register
Route::get('/auth/google/redirect', [GoogleController::class, 'redirect']);

// -- callback after SSO login or register
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);