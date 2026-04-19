<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Gambar;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\KerjaSama;
use App\Models\Pengumuman;
use App\Models\Setting;
use App\Models\Siswa;
use App\Models\SlideShow;
use App\Models\User;
use App\Models\VisiMisi;

class PageController extends Controller
{
    public function index() {
        $tahun = Setting::get('tahun_ajaran', '2025');
        $jumlahSiswa = Siswa::where('kelas_id', 'like',$tahun.'%')->count();
        $jumlahKelas = Kelas::where('kelas_id', 'like',$tahun.'%')->count();
        $jumlahGuru = User::with('roles')->whereHas('roles', fn($q) => $q->where('name', 'guru_staf'))->count();

        $statistik = [
            ['angka' => $jumlahGuru,  'label' => 'Guru & Staf'],
            ['angka' => $jumlahSiswa, 'label' => 'Siswa'],
            ['angka' => $jumlahKelas,  'label' => 'Rombel'],
        ];

        $kepalaMadrasah = User::with('profilGuru')->whereHas('profilGuru', fn($q) => $q->where('nama_jabatan', 'Kepala Madrasah'))->first();

        $heroSlides = SlideShow::with('berita')->orderBy('urutan')->get();

        $beritaTerbaru = Berita::with(['kategoriBerita', 'user'])
                ->latest()
                ->take(3)
                ->get();
        $gambarSekolah = Gambar::where('jenis', 'Foto Sekolah')->first();
        $pengumuman = Pengumuman::first();

        return view('landing', compact('heroSlides', 'statistik', 'beritaTerbaru', 'gambarSekolah', 'pengumuman', 'kepalaMadrasah'));
    }

    public function profile() {
        $title = "Profil Sekolah";
        $subtitle = "Mengenal lebih dekat MIS Fathul Iman Palangka Raya";
        $breadcrumbs = [
            ['label' => 'Beranda','url' => '/'],
            ['label' => 'Profil', 'url' => ''],
            ['label' => 'Profil Sekolah', 'url' => ''],
        ];

        $tahun = Setting::get('tahun_ajaran', '2025');
        $jumlahSiswa = Siswa::where('kelas_id', 'like',$tahun.'%')->count();
        $jumlahGuru = User::with('roles')->whereHas('roles', fn($q) => $q->where('name', 'guru_staf'))->count();

        return view('pages.profile', compact('title', 'subtitle', 'breadcrumbs', 'jumlahSiswa', 'jumlahGuru'));
    }

    public function sejarah() {
        $title = "Sejarah Singkat MIS Fathul Iman";
        $subtitle = "Perjalanan panjang MIS Fathul Iman dalam mencerdaskan generasi bangsa";
        $breadcrumbs = [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Profil', 'url' => ''],
            ['label' => 'Sejarah Madrasah', 'url' => ''],
        ];

        $gambarSekolah = Gambar::where('jenis', 'Foto Sekolah')->first();
        return view('pages.sejarah', compact('title', 'subtitle', 'breadcrumbs', 'gambarSekolah'));
    }

    public function visimisi() {
        $title = "Visi & Misi";
        $subtitle = "Landasan arah dan tujuan MIS Fathul Iman dalam mendidik generasi Islami";
        $breadcrumbs = [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Profil', 'url' => ''],
            ['label' => 'Visi & Misi', 'url' => ''],
        ];

        $visi = VisiMisi::where('jenis', 'Visi')->first();
        $misi = VisiMisi::where('jenis', 'Misi')->get();
        $tujuan = VisiMisi::where('jenis', 'Tujuan')->first();

        return view('pages.visi-misi', compact('title', 'subtitle', 'breadcrumbs', 'visi', 'misi', 'tujuan'));
    }

    public function stafPengajar() {
        $title = "Guru & Tata Usaha";
        $subtitle = "";
        $breadcrumbs = [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Profil', 'url' => ''],
            ['label' => 'Guru & Tata Usaha', 'url' => ''],
        ];
        $guruKelas = User::with('profilGuru')->whereHas('profilGuru', fn($q) => $q->where('jabatan', 'Guru Kelas'))->orderBy('name')->get();
        $guruMapel = User::with('profilGuru')->whereHas('profilGuru', fn($q) => $q->where('jabatan', 'Guru Mata Pelajaran'))->orderBy('name')->get();
        $stafSekolah = User::with('profilGuru')->whereHas('profilGuru', fn($q) => $q->where('jabatan', 'Staf'))->orderBy('name')->get();
        $kepalaMadrasah = User::with('profilGuru')->whereHas('profilGuru', fn($q) => $q->where('jabatan', 'Kepala Madrasah'))->orderBy('name')->first();

        return view('pages.staf-guru', compact('title', 'subtitle', 'breadcrumbs', 'guruKelas', 'guruMapel', 'stafSekolah', 'kepalaMadrasah'));
    }

    public function kerjasama() {
        $title = "Kerja Sama";
        $subtitle = "";
        $breadcrumbs = [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Profil', 'url' => ''],
            ['label' => 'Mitra Kerja Sama', 'url' => ''],
        ];

        $mitras = KerjaSama::all();
        return view('pages.kerjasama', compact('title', 'subtitle', 'breadcrumbs', 'mitras'));
    }

    public function sambutan()  {
        $kepalaMadrasah = User::with('profilGuru')->whereHas('profilGuru', fn($q) => $q->where('nama_jabatan', 'Kepala Madrasah'))->first();

        return view('pages.sambutan', compact('kepalaMadrasah'));
    }

    public function strukturOrganisasi()
    {
        $title      = 'Struktur Organisasi';
        $subtitle   = 'Bagan struktur organisasi MIS Fathul Iman Palangka Raya';
        $breadcrumbs = [
            ['label' => 'Beranda',               'url' => '/'],
            ['label' => 'Profil',                'url' => ''],
            ['label' => 'Struktur Organisasi',   'url' => ''],
        ];

        $gambar = Gambar::where('jenis', 'Struktur Organisasi')->first();
        return view('pages.struktur-organisasi', compact('title', 'subtitle', 'breadcrumbs', 'gambar'));
    }

    private function dataAngkatan(): array
{
    return [
        ['tahun' => '2024', 'jumlah' => 48],
        ['tahun' => '2023', 'jumlah' => 51],
        ['tahun' => '2022', 'jumlah' => 45],
        ['tahun' => '2021', 'jumlah' => 43],
        ['tahun' => '2020', 'jumlah' => 40],
        ['tahun' => '2019', 'jumlah' => 38],
        ['tahun' => '2018', 'jumlah' => 36],
        ['tahun' => '2017', 'jumlah' => 34],
    ];
}

// ---------------------------------------------------------------------
// Halaman daftar alumni per angkatan
// ---------------------------------------------------------------------
public function indexAlumni()
{
    $title      = 'Data Alumni';
    $subtitle   = 'Daftar alumni MIS Fathul Iman berdasarkan tahun kelulusan';
    $breadcrumbs = [
        ['label' => 'Beranda',      'url' => '/'],
        ['label' => 'Data Alumni',  'url' => ''],
    ];

    $angkatan = $this->dataAngkatan();

    return view('pages.alumni-index', compact('title', 'subtitle', 'breadcrumbs', 'angkatan'));
}

// ---------------------------------------------------------------------
// Halaman detail alumni per tahun
// ---------------------------------------------------------------------
public function alumniPerTahun(string $tahun)
{
    // Validasi tahun ada di data angkatan
    $angkatanValid = collect($this->dataAngkatan())->firstWhere('tahun', $tahun);
    abort_if(!$angkatanValid, 404);

    $title      = 'Alumni Angkatan ' . $tahun;
    $subtitle   = 'Daftar alumni MIS Fathul Iman yang lulus tahun ' . $tahun;
    $breadcrumbs = [
        ['label' => 'Beranda',              'url' => '/'],
        ['label' => 'Data Alumni',          'url' => route('alumni.index')],
        ['label' => 'Angkatan ' . $tahun,  'url' => ''],
    ];

    // Contoh data alumni — ganti dengan query Eloquent jika sudah ada model
    // Contoh: Alumni::where('tahun_lulus', $tahun)->orderBy('nama')->get()
    $alumni = [
        ['nama' => 'Ahmad Fauzi',       'nis' => '2018001', 'jenis_kelamin' => 'L', 'tahun_lulus' => $tahun],
        ['nama' => 'Siti Rahmawati',    'nis' => '2018002', 'jenis_kelamin' => 'P', 'tahun_lulus' => $tahun],
        ['nama' => 'Muhammad Rizki',    'nis' => '2018003', 'jenis_kelamin' => 'L', 'tahun_lulus' => $tahun],
        ['nama' => 'Nur Haliza',        'nis' => '2018004', 'jenis_kelamin' => 'P', 'tahun_lulus' => $tahun],
        ['nama' => 'Abdurrahman',       'nis' => '2018005', 'jenis_kelamin' => 'L', 'tahun_lulus' => $tahun],
    ];

    return view('pages.alumni-tahun', compact('title', 'subtitle', 'breadcrumbs', 'tahun', 'alumni'));
}
}