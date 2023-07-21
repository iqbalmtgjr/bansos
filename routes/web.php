<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::get('/kelola_user', [UserController::class, 'index'])->name('kel-user');
Route::post('/user/input', [UserController::class, 'store'])->name('input-user');
Route::get('/user/getdata/{id}', [UserController::class, 'getdata']);
Route::post('/user/update', [UserController::class, 'update'])->name('update-user');
Route::get('/user/hapus/{id}', [UserController::class, 'destroy'])->name('hapus-user');
