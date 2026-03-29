<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        // Ambil 3 berita terbaru dari BeritaController
        // Jika sudah pakai database, ganti dengan: Berita::latest()->take(3)->get()
        $beritaController = new BeritaController();
        $semuaBerita = collect([
            [
                'slug'          => 'program-tahfidz-quran-2025',
                'judul'         => 'Program Tahfidz Al-Qur\'an Semester Genap 2025 Resmi Dimulai',
                'ringkasan'     => 'MIS Fathul Iman kembali menggelar program tahfidz intensif untuk seluruh siswa kelas 3 hingga kelas 6 pada semester genap tahun ajaran 2024/2025.',
                'penulis'       => 'Admin Madrasah',
                'tanggal'       => '2025-01-15',
                'kategori'      => 'Program Kerja',
                'kategori_slug' => 'program-kerja',
                'thumbnail'     => null,
                'views'         => 342,
            ],
            [
                'slug'          => 'juara-olimpiade-sains-2025',
                'judul'         => 'Siswa MIS Fathul Iman Raih Juara 1 Olimpiade Sains Kota Palangka Raya',
                'ringkasan'     => 'Kebanggaan untuk MIS Fathul Iman! Ahmad Fauzi, siswa kelas 5A, berhasil meraih medali emas dalam Olimpiade Sains tingkat kota Palangka Raya cabang Matematika.',
                'penulis'       => 'Admin Madrasah',
                'tanggal'       => '2025-01-12',
                'kategori'      => 'Prestasi Siswa',
                'kategori_slug' => 'prestasi-siswa',
                'thumbnail'     => null,
                'views'         => 891,
            ],
            [
                'slug'          => 'juara-kaligrafi-tingkat-provinsi',
                'judul'         => 'Luar Biasa! Siswi MIS Fathul Iman Juara 2 Kaligrafi Tingkat Provinsi Kalteng',
                'ringkasan'     => 'Nur Haliza, siswi kelas 6B, mengharumkan nama MIS Fathul Iman dengan meraih Juara 2 Lomba Kaligrafi Islam tingkat Provinsi Kalimantan Tengah.',
                'penulis'       => 'Admin Madrasah',
                'tanggal'       => '2025-02-10',
                'kategori'      => 'Prestasi Siswa',
                'kategori_slug' => 'prestasi-siswa',
                'thumbnail'     => null,
                'views'         => 674,
            ],
        ]);

        $beritaTerbaru = $semuaBerita->sortByDesc('tanggal')->take(3)->values()->toArray();

        return view('landing', compact('beritaTerbaru'));
    }

    public function profile() {
        $title = "Profil Sekolah";
        $subtitle = "Mengenal lebih dekat MIS Fathul Iman Palangka Raya";
        $breadcrumbs = [
            ['label' => 'Beranda','url' => '/'],
            ['label' => 'Profil', 'url' => ''],
            ['label' => 'Profil Sekolah', 'url' => ''],
        ];
        return view('pages.profile', compact('title', 'subtitle', 'breadcrumbs'));
    }

    public function sejarah() {
        $title = "Sejarah Singkat MIS Fathul Iman";
        $subtitle = "Perjalanan panjang MIS Fathul Iman dalam mencerdaskan generasi bangsa";
        $breadcrumbs = [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Profil', 'url' => ''],
            ['label' => 'Sejarah Madrasah', 'url' => ''],
        ];
        return view('pages.sejarah', compact('title', 'subtitle', 'breadcrumbs'));
    }

    public function visimisi() {
        $title = "Visi & Misi";
        $subtitle = "Landasan arah dan tujuan MIS Fathul Iman dalam mendidik generasi Islami";
        $breadcrumbs = [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Profil', 'url' => ''],
            ['label' => 'Visi & Misi', 'url' => ''],
        ];
        return view('pages.visi-misi', compact('title', 'subtitle', 'breadcrumbs'));
    }

    public function stafPengajar() {
        $title = "Guru & Tata Usaha";
        $subtitle = "";
        $breadcrumbs = [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Profil', 'url' => ''],
            ['label' => 'Guru & Tata Usaha', 'url' => ''],
        ];
        return view('pages.staf-guru', compact('title', 'subtitle', 'breadcrumbs'));
    }

    public function kerjasama() {
        $title = "Kerja Sama";
        $subtitle = "";
        $breadcrumbs = [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Profil', 'url' => ''],
            ['label' => 'Mitra Kerja Sama', 'url' => ''],
        ];
        return view('pages.kerjasama', compact('title', 'subtitle', 'breadcrumbs'));
    }

    public function kontak() {
        $title = "Kontak";
        $subtitle = "";
        $breadcrumbs = [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Profil', 'url' => ''],
            ['label' => 'Mitra Kerja Sama', 'url' => ''],
        ];
        return view('pages.kontak', compact('title', 'subtitle', 'breadcrumbs'));
    }

    // Data kelas — bisa dipindah ke database/model nantinya
    private function dataKelas(): array
    {
        return [
            ['slug' => 'kelas-1a', 'nama' => 'Kelas 1A', 'wali_kelas' => 'Nama Wali Kelas 1A', 'jumlah_siswa' => 28],
            ['slug' => 'kelas-1b', 'nama' => 'Kelas 1B', 'wali_kelas' => 'Nama Wali Kelas 1B', 'jumlah_siswa' => 27],
            ['slug' => 'kelas-2a', 'nama' => 'Kelas 2A', 'wali_kelas' => 'Nama Wali Kelas 2A', 'jumlah_siswa' => 30],
            ['slug' => 'kelas-2b', 'nama' => 'Kelas 2B', 'wali_kelas' => 'Nama Wali Kelas 2B', 'jumlah_siswa' => 29],
            ['slug' => 'kelas-3a', 'nama' => 'Kelas 3A', 'wali_kelas' => 'Nama Wali Kelas 3A', 'jumlah_siswa' => 28],
            ['slug' => 'kelas-3b', 'nama' => 'Kelas 3B', 'wali_kelas' => 'Nama Wali Kelas 3B', 'jumlah_siswa' => 26],
            ['slug' => 'kelas-4a', 'nama' => 'Kelas 4A', 'wali_kelas' => 'Nama Wali Kelas 4A', 'jumlah_siswa' => 30],
            ['slug' => 'kelas-4b', 'nama' => 'Kelas 4B', 'wali_kelas' => 'Nama Wali Kelas 4B', 'jumlah_siswa' => 28],
            ['slug' => 'kelas-5a', 'nama' => 'Kelas 5A', 'wali_kelas' => 'Nama Wali Kelas 5A', 'jumlah_siswa' => 27],
            ['slug' => 'kelas-5b', 'nama' => 'Kelas 5B', 'wali_kelas' => 'Nama Wali Kelas 5B', 'jumlah_siswa' => 25],
            ['slug' => 'kelas-6a', 'nama' => 'Kelas 6A', 'wali_kelas' => 'Nama Wali Kelas 6A', 'jumlah_siswa' => 28],
            ['slug' => 'kelas-6b', 'nama' => 'Kelas 6B', 'wali_kelas' => 'Nama Wali Kelas 6B', 'jumlah_siswa' => 26],
        ];
    }

    // Halaman daftar semua kelas
    public function indexSiswa()
    {
        $title      = 'Data Siswa';
        $subtitle   = 'Daftar siswa aktif MIS Fathul Iman per kelas';
        $breadcrumbs = [
            ['label' => 'Beranda',     'url' => '/'],
            ['label' => 'Data Siswa',  'url' => ''],
        ];

        $kelas = $this->dataKelas();

        return view('pages.siswa-index', compact('title', 'subtitle', 'breadcrumbs', 'kelas'));
    }

    // Halaman detail siswa per kelas
    public function SiswaPerKelas(string $slug)
    {
        // Cari data kelas berdasarkan slug
        $kelasSaat = collect($this->dataKelas())->firstWhere('slug', $slug);

        // Kalau slug tidak ditemukan, lempar 404
        abort_if(!$kelasSaat, 404);

        $title      = $kelasSaat['nama'];
        $subtitle   = 'Daftar siswa aktif ' . $kelasSaat['nama'] . ' MIS Fathul Iman';
        $breadcrumbs = [
            ['label' => 'Beranda',        'url' => '/'],
            ['label' => 'Data Siswa',     'url' => route('siswa.index')],
            ['label' => $kelasSaat['nama'], 'url' => ''],
        ];

        // Contoh data siswa — ganti dengan query Eloquent jika sudah ada model
        $siswa = [
            ['nama' => 'Ahmad Fauzi',      'nis' => '2024001', 'jenis_kelamin' => 'L', 'tahun_masuk' => '2024'],
            ['nama' => 'Siti Rahmawati',   'nis' => '2024002', 'jenis_kelamin' => 'P', 'tahun_masuk' => '2024'],
            ['nama' => 'Muhammad Rizki',   'nis' => '2024003', 'jenis_kelamin' => 'L', 'tahun_masuk' => '2024'],
            ['nama' => 'Nur Haliza',       'nis' => '2024004', 'jenis_kelamin' => 'P', 'tahun_masuk' => '2024'],
            ['nama' => 'Abdurrahman',      'nis' => '2024005', 'jenis_kelamin' => 'L', 'tahun_masuk' => '2024'],
        ];

        return view('pages.siswa-kelas', compact('title', 'subtitle', 'breadcrumbs', 'kelasSaat', 'siswa'));
    }
}
