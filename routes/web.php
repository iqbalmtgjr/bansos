<?php

use App\Http\Controllers\JenisbansosController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PengajuanController;

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


Route::get('/dashboard', function () {
    return view('welcome');
});

//pengajuan
Route::get('/', [PengajuanController::class, 'pengajuan'])->name('pengajuan');
Route::post('/', [PengajuanController::class, 'pengajuan']);
Route::get('/form_pengajuan/{id}', [PengajuanController::class, 'formPengajuan'])->name('form-pengajuan');
Route::post('/pengajuan/input', [PengajuanController::class, 'store']);

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

// kel_jenis_bansos
Route::get('/kelola_jenis_bansos', [JenisbansosController::class, 'index'])->name('kel-jenis-bansos');
Route::post('/jenis_bansos/input', [JenisbansosController::class, 'store'])->name('input-jenis-bansos');
Route::get('/jenis_bansos/getdata/{id}', [JenisbansosController::class, 'getdata']);
Route::post('/jenis_bansos/update', [JenisbansosController::class, 'update'])->name('update-jenis-bansos');
Route::get('/jenis_bansos/hapus/{id}', [JenisbansosController::class, 'destroy'])->name('hapus-jenis-bansos');

// kel_pengajuan
Route::get('/daftar_pengajuan', [PengajuanController::class, 'index'])->name('daftar-pengajuan');
Route::get('/pengajuan/lihat/{id}', [PengajuanController::class, 'view'])->name('lihat-pengajuan');
Route::get('/changeAcc', [PengajuanController::class, 'acc']);
Route::get('/pengajuan/hapus/{id}', [PengajuanController::class, 'destroy'])->name('hapus-pengajuan');
Route::get('/notif/{id}', [PengajuanController::class, 'notifterima']);
Route::get('/notifgagal/{id}', [PengajuanController::class, 'notiftolak']);

// Laporan
Route::get('/laporan', [LaporanController::class, 'index']);
