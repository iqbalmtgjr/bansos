<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PendudukController;

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
    return view('form_pengajuan_bansos');
});

Route::get('/dashboard', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// kel_user
Route::get('/kelola_user', [UserController::class, 'index'])->name('kel-user');
Route::post('/user/input', [UserController::class, 'store'])->name('input-user');
Route::get('/user/getdata/{id}', [UserController::class, 'getdata']);
Route::post('/user/update', [UserController::class, 'update'])->name('update-user');
Route::get('/user/hapus/{id}', [UserController::class, 'destroy'])->name('hapus-user');

// kel_penduduk
Route::get('/kelola_penduduk', [PendudukController::class, 'index'])->name('kel-penduduk');
Route::post('/penduduk/input', [PendudukController::class, 'store'])->name('input-penduduk');
Route::get('/penduduk/getdata/{id}', [PendudukController::class, 'getdata']);
Route::post('/penduduk/update', [PendudukController::class, 'update'])->name('update-penduduk');
Route::get('/penduduk/hapus/{id}', [PendudukController::class, 'destroy'])->name('hapus-penduduk');
