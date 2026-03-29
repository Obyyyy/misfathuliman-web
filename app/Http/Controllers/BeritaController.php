<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    // =============================================
    // Data contoh — ganti dengan Model/DB nantinya
    // =============================================
    private function semuaPostingan(): array
    {
        return [
            [
                'slug'          => 'program-tahfidz-quran-2025',
                'judul'         => 'Program Tahfidz Al-Qur\'an Semester Genap 2025 Resmi Dimulai',
                'ringkasan'     => 'MIS Fathul Iman kembali menggelar program tahfidz intensif untuk seluruh siswa kelas 3 hingga kelas 6 pada semester genap tahun ajaran 2024/2025.',
                'konten'        => '
                    <p>MIS Fathul Iman dengan bangga mengumumkan dimulainya Program Tahfidz Al-Qur\'an Semester Genap Tahun Ajaran 2024/2025. Program ini merupakan bagian dari komitmen madrasah dalam mencetak generasi Qur\'ani yang hafal dan memahami isi Al-Qur\'an sejak dini.</p>

                    <img src="/images/berita/tahfidz-1.jfif" alt="Siswa sedang menghafal Al-Qur\'an bersama guru">
                    <p class="text-center text-xs text-gray-400 -mt-3 mb-4 italic">Kegiatan hafalan Al-Qur\'an pagi hari sebelum jam pelajaran dimulai.</p>

                    <h1>Pelaksanaan Program</h1>
                    <p>Program tahfidz dilaksanakan setiap hari Senin hingga Kamis pukul 06.30–07.00 WIB sebelum jam pelajaran utama dimulai. Setiap siswa ditargetkan menghafal minimal satu juz per semester, dimulai dari Juz 30 untuk kelas rendah dan dilanjutkan ke juz-juz berikutnya untuk kelas tinggi.</p>

                    <h2>Target Hafalan</h2>
                    <ul>
                        <li>Kelas 1–2: Surat-surat pendek pilihan (Juz 30)</li>
                        <li>Kelas 3–4: Juz 29 dan Juz 30</li>
                        <li>Kelas 5–6: Juz 28, 29, dan 30</li>
                    </ul>

                    <img src="/images/berita/tahfidz-2.jfif" alt="Suasana kelas tahfidz MIS Fathul Iman">
                    <p class="text-center text-xs text-gray-400 -mt-3 mb-4 italic">Suasana kelas tahfidz yang kondusif dan penuh semangat.</p>

                    <p>Program ini dibimbing langsung oleh guru-guru tahfidz bersertifikat yang berpengalaman. Orang tua juga dilibatkan melalui program muraja\'ah di rumah setiap malam agar hafalan siswa semakin kuat dan terjaga.</p>
                    <p>Semoga program ini menjadi investasi terbaik bagi generasi penerus bangsa dan agama. Aamiin.</p>
                ',
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
                'konten'        => '
                    <p>Sebuah prestasi membanggakan ditorehkan oleh Ahmad Fauzi, siswa kelas 5A MIS Fathul Iman, dalam ajang Olimpiade Sains Tingkat Kota Palangka Raya yang diselenggarakan pada 10 Januari 2025 lalu.</p>
                    <h2>Perjalanan Menuju Podium</h2>
                    <p>Ahmad Fauzi berhasil menyisihkan 47 peserta dari berbagai sekolah dasar dan madrasah ibtidaiyah se-Kota Palangka Raya. Ia tampil gemilang di babak penyisihan, semifinal, hingga grand final dengan skor sempurna di beberapa kategori soal.</p>
                    <p>Persiapan Ahmad tidak datang dalam semalam. Ia telah berlatih intensif selama tiga bulan di bawah bimbingan guru matematika madrasah, dengan jadwal latihan soal setiap hari Senin, Rabu, dan Jumat setelah jam sekolah.</p>
                    <h2>Ucapan Selamat</h2>
                    <p>Kepala Madrasah menyampaikan rasa syukur dan bangga yang luar biasa atas pencapaian ini. "Ini bukan hanya kemenangan Ahmad, tapi kemenangan seluruh keluarga besar MIS Fathul Iman. Semoga menjadi inspirasi bagi seluruh siswa," ujar beliau.</p>
                    <p>Ahmad akan mewakili Kota Palangka Raya di tingkat provinsi Kalimantan Tengah yang akan diselenggarakan bulan Maret 2025. Doakan yang terbaik!</p>
                ',
                'penulis'       => 'Admin Madrasah',
                'tanggal'       => '2025-01-12',
                'kategori'      => 'Prestasi Siswa',
                'kategori_slug' => 'prestasi-siswa',
                'thumbnail'     => 'thumbnail-2.jfif',
                'views'         => 891,
            ],
            [
                'slug'          => 'program-pesantren-kilat-ramadan',
                'judul'         => 'Pesantren Kilat Ramadan 1446H: Mempererat Ukhuwah dan Memperdalam Iman',
                'ringkasan'     => 'Seluruh siswa MIS Fathul Iman mengikuti Pesantren Kilat Ramadan selama 3 hari dengan berbagai kegiatan keislaman yang menyenangkan dan berkesan.',
                'konten'        => '
                    <p>MIS Fathul Iman kembali menyelenggarakan Pesantren Kilat Ramadan 1446H yang berlangsung selama tiga hari, dari tanggal 17 hingga 19 Maret 2025. Kegiatan ini diikuti oleh seluruh siswa kelas 1 hingga kelas 6 dengan antusias.</p>
                    <h2>Rangkaian Kegiatan</h2>
                    <p>Selama tiga hari, para siswa mengikuti berbagai kegiatan yang dirancang untuk mempererat ukhuwah Islamiyah sekaligus memperdalam pemahaman agama, di antaranya:</p>
                    <ul>
                        <li>Tadarus Al-Qur\'an bersama setiap pagi</li>
                        <li>Ceramah dan tausiyah dari ustadz dan ustadzah tamu</li>
                        <li>Lomba adzan, iqomah, dan hafalan surat</li>
                        <li>Buka puasa bersama dan shalat tarawih berjamaah</li>
                        <li>Kegiatan sosial membagikan takjil kepada masyarakat sekitar</li>
                    </ul>
                    <p>Kegiatan ini mendapat sambutan hangat dari para orang tua siswa yang turut hadir mendampingi pada acara buka puasa bersama di hari terakhir. Semoga berkah Ramadan senantiasa hadir di tengah keluarga besar MIS Fathul Iman.</p>
                ',
                'penulis'       => 'Humas Madrasah',
                'tanggal'       => '2025-03-20',
                'kategori'      => 'Program Kerja',
                'kategori_slug' => 'program-kerja',
                'thumbnail'     => 'thumbnail-1.jfif',
                'views'         => 256,
            ],
            [
                'slug'          => 'juara-kaligrafi-tingkat-provinsi',
                'judul'         => 'Luar Biasa! Siswi MIS Fathul Iman Juara 2 Kaligrafi Tingkat Provinsi Kalteng',
                'ringkasan'     => 'Nur Haliza, siswi kelas 6B, mengharumkan nama MIS Fathul Iman dengan meraih Juara 2 Lomba Kaligrafi Islam tingkat Provinsi Kalimantan Tengah.',
                'konten'        => '
                    <p>Prestasi gemilang kembali diraih oleh siswa MIS Fathul Iman. Kali ini, Nur Haliza dari kelas 6B berhasil meraih Juara 2 dalam Lomba Kaligrafi Islam Tingkat Provinsi Kalimantan Tengah yang digelar di Palangka Raya, Sabtu 8 Februari 2025.</p>
                    <p>Nur Haliza menampilkan karya kaligrafi dengan gaya Naskhi yang indah dan detail, menggambarkan kalimat "Bismillahirrahmanirrahim" dengan ornamen islami yang kaya. Dewan juri memberikan nilai tinggi untuk ketepatan kaidah khat, keindahan ornamen, dan kerapian hasil karya.</p>
                    <h2>Latihan Penuh Dedikasi</h2>
                    <p>Persiapan Nur Haliza dimulai sejak enam bulan sebelum perlombaan di bawah bimbingan guru kesenian madrasah. Setiap sore ia berlatih selama dua jam tanpa libur, mengasah kemampuan dan memperhalus setiap goresan kalam.</p>
                    <p>Madrasah berharap prestasi ini menginspirasi siswa lain untuk terus mengembangkan bakat dan kecintaan pada seni Islam. Alhamdulillah.</p>
                ',
                'penulis'       => 'Admin Madrasah',
                'tanggal'       => '2025-02-10',
                'kategori'      => 'Prestasi Siswa',
                'kategori_slug' => 'prestasi-siswa',
                'thumbnail'     => 'thumbnail-2.jfif',
                'views'         => 674,
            ],
        ];
    }

    private function kategoriList(): array
    {
        $semua = collect($this->semuaPostingan());
        return [
            [
                'slug'   => 'program-kerja',
                'nama'   => 'Program Kerja',
                'jumlah' => $semua->where('kategori_slug', 'program-kerja')->count(),
            ],
            [
                'slug'   => 'prestasi-siswa',
                'nama'   => 'Prestasi Siswa',
                'jumlah' => $semua->where('kategori_slug', 'prestasi-siswa')->count(),
            ],
        ];
    }

    // =============================================
    // HALAMAN DAFTAR BERITA
    // =============================================
    public function index(Request $request)
    {
        $kategoriAktif = $request->query('kategori');

        $semua = collect($this->semuaPostingan())
            ->when($kategoriAktif, fn($q) => $q->where('kategori_slug', $kategoriAktif))
            ->sortByDesc('tanggal')
            ->values();

        $title      = 'Berita & Informasi';
        $subtitle   = 'Ikuti berita terkini seputar kegiatan dan prestasi MIS Fathul Iman';
        $breadcrumbs = [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Berita',  'url' => ''],
        ];

        return view('pages.berita.berita-index', [
            'title'            => $title,
            'subtitle'         => $subtitle,
            'breadcrumbs'      => $breadcrumbs,
            'postingan'        => $semua,
            'postinganTerbaru' => collect($this->semuaPostingan())->sortByDesc('tanggal')->take(5)->values()->toArray(),
            'kategoriList'     => $this->kategoriList(),
            'kategoriAktif'    => $kategoriAktif,
        ]);
    }

    // =============================================
    // HALAMAN DETAIL BERITA
    // =============================================
    public function show(string $slug)
    {
        $semua = collect($this->semuaPostingan());
        $post  = $semua->firstWhere('slug', $slug);

        abort_if(!$post, 404);

        // Prev & Next
        $sorted = $semua->sortByDesc('tanggal')->values();
        $idx    = $sorted->search(fn($p) => $p['slug'] === $slug);
        $prev   = $idx < $sorted->count() - 1 ? $sorted[$idx + 1] : null;
        $next   = $idx > 0 ? $sorted[$idx - 1] : null;

        $title      = $post['judul'];
        $subtitle   = $post['kategori'] . ' · ' . \Carbon\Carbon::parse($post['tanggal'])->translatedFormat('d F Y');
        $breadcrumbs = [
            ['label' => 'Beranda', 'url' => '/'],
            ['label' => 'Berita',  'url' => route('berita.index')],
            ['label' => $post['kategori'], 'url' => route('berita.index', ['kategori' => $post['kategori_slug']])],
            ['label' => \Illuminate\Support\Str::limit($post['judul'], 40), 'url' => ''],
        ];

        return view('pages.berita.berita-show', [
            'title'            => $title,
            'subtitle'         => $subtitle,
            'breadcrumbs'      => $breadcrumbs,
            'post'             => $post,
            'prev'             => $prev,
            'next'             => $next,
            'postinganTerbaru' => collect($this->semuaPostingan())->sortByDesc('tanggal')->take(5)->values()->toArray(),
            'kategoriList'     => $this->kategoriList(),
        ]);
    }
}