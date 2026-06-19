<?php

use App\Models\User;
use App\Notifications\PengingatAbsen;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// =========================================================================
// REGISTER COMMANDS
// =========================================================================

// 1. Perintah untuk Absen Masuk
Artisan::command('kirim:pengingat-masuk', function () {
    User::all()->each(fn($u) => $u->notify(new PengingatAbsen('masuk')));
})->purpose('Mengirim notifikasi absen masuk ke semua user');

// 2. Perintah untuk Absen Pulang
Artisan::command('kirim:pengingat-pulang', function () {
    User::all()->each(fn($u) => $u->notify(new PengingatAbsen('pulang')));
})->purpose('Mengirim notifikasi absen pulang ke semua user');

// 3 Tes
Artisan::command('kirim:test-notif', function () {
    User::all()->each(fn($u) => $u->notify(new PengingatAbsen('masuk')));
})->purpose('Mengirim notifikasi absen masuk ke semua user');

// =========================================================================
// SCHEDULES (JADWAL ASLI)
// =========================================================================

// Jalankan pengingat masuk setiap hari kerja (Senin-Jumat) jam 06:25 WIB/WITA
// Schedule::command('kirim:pengingat-masuk')->weekdays()->dailyAt('06:25')->name('pengingat-absen-masuk');
// Schedule::command('kirim:pengingat-masuk')->weekdays()->dailyAt('23:10')->name('pengingat-absen-masuk');

// Jalankan pengingat pulang setiap hari kerja (Senin-Jumat) jam 11:20 WIB/WITA
// Schedule::command('kirim:pengingat-pulang')->weekdays()->dailyAt('11:20')->name('pengingat-absen-pulang');

Schedule::command('kirim:test-notif')->everyMinute();