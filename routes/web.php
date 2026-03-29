<?php

use App\Http\Controllers\KontakController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index']);

Route::get('/profile', [PageController::class, 'profile'])->name("profile");

Route::get('/sejarah', [PageController::class, 'sejarah'])->name("sejarah");

Route::get('/visimisi', [PageController::class, 'visimisi'])->name("visimisi");

Route::get('/pengajar', [PageController::class, 'stafPengajar'])->name("pengajar");

Route::get('/kerjasama', [PageController::class, 'kerjasama'])->name("kerjasama");

// Daftar semua kelas
Route::get('/siswa', [PageController::class, 'indexSiswa'])->name('siswa.index');

// Detail siswa per kelas — contoh URL: /siswa/kelas-6a
Route::get('/siswa/{slug}', [PageController::class, 'siswaPerKelas'])->name('siswa.kelas');

Route::get('/berita',        [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak/kirim', [KontakController::class, 'kirim'])->name('kontak.kirim');