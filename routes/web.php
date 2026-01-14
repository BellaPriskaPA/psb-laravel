<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\AdminController;

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

// --- GRUP AWAL / GUEST ---
Route::get('/', [SantriController::class, 'indexAwal'])->name('awal.index');
Route::post('/register-santri', [SantriController::class, 'register'])->name('santri.register');
Route::get('/sukses', function () { return view('user_santri.sukses'); })->name('santri.sukses');
Route::post('/login-santri', [SantriController::class, 'login'])->name('santri.login');

// --- GRUP USER SANTRI (LOGGED IN) ---
Route::prefix('santri')->group(function () {
    Route::get('/dashboard', function () { return view('user_santri.dashboard_santri'); })->name('santri.dashboard');
    Route::get('/formulir', function () { return view('user_santri.formulir_pendaftaran'); })->name('santri.formulir');
    Route::get('/upload', function () { return view('user_santri.upload_berkas'); })->name('santri.upload');
    Route::get('/kartu', [SantriController::class, 'kartuPendaftaran'])->name('santri.kartu');
    Route::get('/pernyataan', function () { return view('user_santri.surat_pernyataan'); })->name('santri.pernyataan');
    Route::get('/pembayaran', function () { return view('user_santri.pembayaran'); })->name('santri.pembayaran');
    Route::get('/pengumuman', function () { return view('user_santri.pengumuman'); })->name('santri.pengumuman');
    Route::get('/profil', function () { return view('user_santri.profil_saya'); })->name('santri.profil');
    Route::post('/logout', function () { 
        // Logic logout di sini
        return redirect()->route('awal.index'); 
    })->name('santri.logout');
});

// --- GRUP ADMIN PAGES ---
Route::prefix('admin')->group(function () {
    Route::get('/cetak-dokumen', [AdminController::class, 'cetakDokumen'])->name('admin.cetak-dokumen');
    Route::get('/data-santri-diterima', [AdminController::class, 'dataSantriDiterima'])->name('admin.data-santri-diterima');
    Route::get('/data-santri-ditolak', [AdminController::class, 'dataSantriDitolak'])->name('admin.data-santri-ditolak');
    Route::get('/daftar-ulang', [AdminController::class, 'siswaDatarUlang'])->name('admin.daftar-ulang');
    Route::get('/daftar-berkas', [AdminController::class, 'daftarBerkasPsb'])->name('admin.daftar-berkas');
});

