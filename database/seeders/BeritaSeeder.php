<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\SlideShow;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'slug'          => 'program-tahfidz-quran-2025',
                'judul'         => 'Program Tahfidz Al-Qur\'an Semester Genap 2025 Resmi Dimulai',
                'konten'        => '<p>MIS Fathul Iman dengan bangga mengumumkan dimulainya Program Tahfidz Al-Qur\'an Semester Genap Tahun Ajaran 2024/2025.</p><h2>Pelaksanaan Program</h2><p>Program tahfidz dilaksanakan setiap hari Senin hingga Kamis pukul 06.30–07.00 WIB sebelum jam pelajaran utama dimulai.</p><h2>Target Hafalan</h2><ul><li>Kelas 1–2: Surat-surat pendek pilihan (Juz 30)</li><li>Kelas 3–4: Juz 29 dan Juz 30</li><li>Kelas 5–6: Juz 28, 29, dan 30</li></ul>',
                'user_id'       => 1,
                'tanggal'       => '2025-01-15',
                'kategori_id'      => 1,
                'thumbnail'     => 'thumbnail-1.jfif',
                'views'         => 342,
            ],
            [
                'slug'          => 'juara-olimpiade-sains-2025',
                'judul'         => 'Siswa MIS Fathul Iman Raih Juara 1 Olimpiade Sains Kota Palangka Raya',
                'konten'        => '<p>Sebuah prestasi membanggakan ditorehkan oleh Ahmad Fauzi, siswa kelas 5A MIS Fathul Iman.</p><h2>Perjalanan Menuju Podium</h2><p>Ahmad Fauzi berhasil menyisihkan 47 peserta dari berbagai sekolah dasar dan madrasah ibtidaiyah se-Kota Palangka Raya.</p>',
                'user_id'       => 1,
                'tanggal'       => '2025-01-12',
                'kategori_id'      => 1,
                'thumbnail'     => 'thumbnail-2.jfif',
                'views'         => 891,
            ],
            [
                'slug'          => 'program-pesantren-kilat-ramadan',
                'judul'         => 'Pesantren Kilat Ramadan 1446H: Mempererat Ukhuwah dan Memperdalam Iman',
                'konten'        => '<p>MIS Fathul Iman kembali menyelenggarakan Pesantren Kilat Ramadan 1446H yang berlangsung selama tiga hari.</p><h2>Rangkaian Kegiatan</h2><ul><li>Tadarus Al-Qur\'an bersama setiap pagi</li><li>Ceramah dan tausiyah dari ustadz dan ustadzah tamu</li><li>Lomba adzan, iqomah, dan hafalan surat</li></ul>',
                'user_id'       => 1,
                'tanggal'       => '2025-03-20',
                'kategori_id'      => 2,
                'thumbnail'     => 'thumbnail-1.jfif',
                'views'         => 256,
            ],
            [
                'slug'          => 'juara-kaligrafi-tingkat-provinsi',
                'judul'         => 'Luar Biasa! Siswi MIS Fathul Iman Juara 2 Kaligrafi Tingkat Provinsi Kalteng',
                'konten'        => '<p>Prestasi gemilang kembali diraih oleh siswa MIS Fathul Iman. Nur Haliza dari kelas 6B berhasil meraih Juara 2 dalam Lomba Kaligrafi Islam Tingkat Provinsi Kalimantan Tengah.</p><h2>Latihan Penuh Dedikasi</h2><p>Persiapan Nur Haliza dimulai sejak enam bulan sebelum perlombaan.</p>',
                'user_id'       => 1,
                'tanggal'       => '2025-02-10',
                'kategori_id'      => 1,
                'thumbnail'     => 'thumbnail-2.jfif',
                'views'         => 674,
            ],
        ];

        foreach ($data as $item) {
            Berita::create($item);
        }

        // Tambah 10 data dummy pakai factory
        Berita::factory(10)->create();

        SlideShow::insert([
            [
                'berita_id' => 1,
                'urutan' => 1
            ],
            [
                'berita_id' => 2,
                'urutan' => 2
            ],
            [
                'berita_id' => 3,
                'urutan' => 3
            ],
            [
                'berita_id' => 4,
                'urutan' => 4
            ],
        ]);
    }
}
