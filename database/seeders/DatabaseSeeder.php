<?php

namespace Database\Seeders;

use App\Models\Gambar;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            VisiMisiSeeder::class,
            KontakSeeder::class,
            KerjaSamaSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Obyy',
            'email' => 'asborn27@gmail.com',
            'password' => Hash::make('Asborn27')
        ]);

        Gambar::insert([
            ['jenis' => 'Foto Sekolah'],
            ['jenis' => 'Struktur Organisasi']
        ]);

        Setting::set('tahun_ajaran', '2025');
    }
}