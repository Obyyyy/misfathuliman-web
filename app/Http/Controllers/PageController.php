<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\KerjaSama;
use App\Models\Setting;
use App\Models\Siswa;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                'thumbnail'     => 'thumbnail-1.jfif',
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
                'thumbnail'     => 'thumbnail-2.jfif',
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
                'thumbnail'     => 'thumbnail-1.jfif',
                'views'         => 674,
            ],
        ]);

        $tahun = Setting::get('tahun_ajaran', '2025');
        $jumlahSiswa = Siswa::where('kelas_id', 'like',$tahun.'%')->count();
        $jumlahKelas = Kelas::where('kelas_id', 'like',$tahun.'%')->count();
        $jumlahGuru = Guru::where('guru_aktif', 1)->count();

        $statistik = [
            ['angka' => $jumlahGuru,  'label' => 'Guru & Staf'],
            ['angka' => $jumlahSiswa, 'label' => 'Siswa'],
            ['angka' => $jumlahKelas,  'label' => 'Rombel'],
        ];

        $kepala = [
            'nama'     => 'Marjuki, M.Pd',
            // 'nip'      => 'NIP. 19XX0101 XXXX XX X XXX',
            'sambutan' => 'Assalamu\'alaikum Warahmatullahi Wabarakatuh. Puji syukur kehadirat Allah SWT yang telah memberikan rahmat dan hidayah-Nya. Selamat datang di website resmi MIS Fathul Iman Palangka Raya. Madrasah kami berkomitmen memberikan pendidikan terbaik yang memadukan ilmu pengetahuan dan nilai keislaman demi mencetak generasi Qur\'ani yang cerdas dan berakhlak mulia.',
        ];

        $heroSlides = [
            [
                'foto'          => 'slide-1.jpg',
                'judul'         => 'Program Tahfidz Al-Qur\'an Semester Genap 2025 Resmi Dimulai',
                'ringkasan'     => 'MIS Fathul Iman kembali menggelar program tahfidz intensif untuk seluruh siswa kelas 3 hingga kelas 6.',
                'kategori'      => 'Program Kerja',
                'kategori_slug' => 'program-kerja',
                'link'          => route('berita.show', 'program-tahfidz-quran-2025'),
            ],
            [
                'foto'          => 'slide-2.jpg',
                'judul'         => 'Siswa MIS Fathul Iman Raih Juara 1 Olimpiade Sains Kota Palangka Raya',
                'ringkasan'     => 'Ahmad Fauzi, siswa kelas 5A, berhasil meraih medali emas dalam Olimpiade Sains tingkat kota.',
                'kategori'      => 'Prestasi Siswa',
                'kategori_slug' => 'prestasi-siswa',
                'link'          => route('berita.show', 'juara-olimpiade-sains-2025'),
            ],
            [
                'foto'          => 'slide-3.jpg',
                'judul'         => 'Pesantren Kilat Ramadan 1446H: Mempererat Ukhuwah dan Memperdalam Iman',
                'ringkasan'     => 'Seluruh siswa MIS Fathul Iman mengikuti Pesantren Kilat Ramadan selama 3 hari penuh kegiatan Islami.',
                'kategori'      => 'Program Kerja',
                'kategori_slug' => 'program-kerja',
                'link'          => route('berita.show', 'program-pesantren-kilat-ramadan'),
            ],
        ];

        $beritaTerbaru = $semuaBerita->sortByDesc('tanggal')->take(3)->values()->toArray();
        $gambarSekolah = Gambar::where('jenis', 'Foto Sekolah')->first();
        return view('landing', compact('heroSlides', 'kepala', 'statistik', 'beritaTerbaru', 'gambarSekolah'));
        // return view('landing', compact('beritaTerbaru'));
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
        return view('pages.visi-misi', compact('title', 'subtitle', 'breadcrumbs', 'visi', 'misi'));
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

        $mitras = KerjaSama::all();
        return view('pages.kerjasama', compact('title', 'subtitle', 'breadcrumbs', 'mitras'));
    }

    public function sambutan()  {
        $kepala = [
            // 'nip'   => 'NIP. 19XX0101 XXXX XX X XXX',
            'nama'  => 'Marjuki, M.Pd',
        ];
        return view('pages.sambutan', compact('kepala'));
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