<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\Gambar;
use App\Models\KategoriBerita;
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

        User::factory()->create([
            'name' => 'Muhammad Qalby, S.Kom',
            'email' => 'asborn27@gmail.com',
            'username' => 'Obyy27',
            'password' => Hash::make('Asborn27'),
            // 'roles' => 'super_admin'
        ]);

        Gambar::insert([
            ['jenis' => 'Foto Sekolah'],
            ['jenis' => 'Struktur Organisasi'],
            ['jenis' => 'Logo Sekolah']
        ]);

        KategoriBerita::insert([
            [
                'judul' => 'Program Kerja',
                'slug' => 'program-kerja',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Prestasi',
                'slug' => 'prestasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Setting::set('tahun_ajaran', '2025');

        $this->call([
            VisiMisiSeeder::class,
            KontakSeeder::class,
            KerjaSamaSeeder::class,
            BeritaSeeder::class,
            RoleSeeder::class,
            AssignRoleSeeder::class,
        ]);
    }
}