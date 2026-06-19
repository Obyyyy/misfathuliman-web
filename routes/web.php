<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/sambutan', [PageController::class, 'sambutan'])->name("sambutan");
Route::get('/struktur-organisasi', [PageController::class, 'strukturOrganisasi'])->name("strukturOrganisasi");

Route::get('/profile', [PageController::class, 'profile'])->name("profile");

Route::get('/sejarah', [PageController::class, 'sejarah'])->name("sejarah");

Route::get('/visimisi', [PageController::class, 'visimisi'])->name("visimisi");

Route::get('/pengajar', [PageController::class, 'stafPengajar'])->name("pengajar");

Route::get('/kerjasama', [PageController::class, 'kerjasama'])->name("kerjasama");

// Daftar semua kelas
Route::get('/siswa', [KelasController::class, 'indexSiswa'])->name('siswa.index');
// Detail siswa per kelas — contoh URL: /siswa/kelas-6a
Route::get('/siswa/{slug}', [KelasController::class, 'siswaPerKelas'])->name('siswa.kelas');

Route::get('/berita',        [BeritaController::class, 'indexBerita'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'showBerita'])->name('berita.show');

Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak/kirim', [KontakController::class, 'kirim'])->name('kontak.kirim');

Route::middleware(['web', 'auth:web'])->group(function () {
    Route::post('/webpush/subscribe', function (\Illuminate\Http\Request $request) {
        /** @var \App\Models\User $user */
        $user = \App\Models\User::find(Auth::id());

        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        // Hapus semua subscription lama milik user ini sebelum simpan yang baru
        $user->pushSubscriptions()->delete();

        $user->updatePushSubscription(
            $request->input('endpoint'),
            $request->input('key'),
            $request->input('token'),
            $request->input('encoding')
        );

        return response()->json(['success' => true]);
    });
});

// Route::get('/admin-manifest.json', function () {
//     return response()->json([
//         'name'             => config('app.name'),
//         'short_name'       => 'MIS FI',
//         'start_url'        => '/admin',
//         'scope'            => '/admin',
//         'background_color' => '#1a4731',
//         'theme_color'      => '#2d7a4f',
//         'display'          => 'standalone',
//         'orientation'      => 'any',
//         'icons'            => [
//             ['src' => '/images/icons/launchericon-48x48.png',  'sizes' => '48x48',   'type' => 'image/png', 'purpose' => 'any'],
//             ['src' => '/images/icons/launchericon-72x72.png',  'sizes' => '72x72',   'type' => 'image/png', 'purpose' => 'any'],
//             ['src' => '/images/icons/launchericon-96x96.png',  'sizes' => '96x96',   'type' => 'image/png', 'purpose' => 'any'],
//             ['src' => '/images/icons/launchericon-144x144.png','sizes' => '144x144', 'type' => 'image/png', 'purpose' => 'any'],
//             ['src' => '/images/icons/launchericon-192x192.png','sizes' => '192x192', 'type' => 'image/png', 'purpose' => 'any'],
//             ['src' => '/images/icons/launchericon-512x512.png','sizes' => '512x512', 'type' => 'image/png', 'purpose' => 'any maskable'],
//         ],
//     ])->header('Content-Type', 'application/manifest+json');
// });