<x-layout>
    <main id="beranda">
        <!-- HERO SECTION -->
        <section class="bg-white dark:bg-gray-900 transition-colors duration-300">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
                    <!-- Text Content -->
                    <div class="space-y-6">
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 dark:bg-green-900/50 text-primary-dark dark:text-green-300 shadow-sm">
                            Madrasah Berbasis Imtaq &amp; Iptek
                        </span>

                        <h1
                            class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 dark:text-white leading-tight">
                            Selamat Datang di
                            <span class="block text-primary-dark dark:text-green-400">
                                MIS Fathul Iman
                            </span>
                        </h1>

                        <p class="text-gray-600 dark:text-gray-300 text-sm sm:text-base leading-relaxed max-w-xl">
                            MIS Fathul Iman berkomitmen mencetak generasi Qur&apos;ani yang cerdas, berakhlak mulia,
                            dan siap menghadapi tantangan zaman melalui pendidikan yang islami, inovatif,
                            dan berwawasan global.
                        </p>

                        <div class="flex flex-wrap items-center gap-4">
                            <a href="#profil-sekolah"
                                class="inline-flex items-center px-6 py-3 rounded-full bg-primary-dark dark:bg-green-600 text-white text-sm font-semibold shadow-md hover:bg-primary-darker dark:hover:bg-green-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary/70 focus-visible:ring-offset-2 transition-all duration-200">
                                Selengkapnya
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>

                            {{-- <a href="#kontak"
                                class="inline-flex items-center px-5 py-3 rounded-full border border-primary dark:border-green-500 text-primary-dark dark:text-green-400 text-sm font-semibold hover:bg-green-50 dark:hover:bg-green-900/30 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary/70 focus-visible:ring-offset-2 transition-all duration-200">
                                Hubungi Kami
                            </a> --}}
                        </div>

                        <div class="grid grid-cols-3 gap-4 pt-4 max-w-md text-center text-xs sm:text-sm">
                            <div
                                class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 px-3 py-3 transition-colors duration-300">
                                <p class="font-bold text-primary-dark dark:text-green-400">200+</p>
                                <p class="text-gray-500 dark:text-gray-400 mt-1">Siswa Aktif</p>
                            </div>
                            <div
                                class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 px-3 py-3 transition-colors duration-300">
                                <p class="font-bold text-primary-dark dark:text-green-400">25+</p>
                                <p class="text-gray-500 dark:text-gray-400 mt-1">Guru &amp; Staff</p>
                            </div>
                            <div
                                class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 px-3 py-3 transition-colors duration-300">
                                <p class="font-bold text-primary-dark dark:text-green-400">50+</p>
                                <p class="text-gray-500 dark:text-gray-400 mt-1">Prestasi Siswa</p>
                            </div>
                        </div>
                    </div>

                    <!-- Illustration / Image Placeholder -->
                    <div class="relative">
                        <div
                            class="absolute -inset-3 bg-gradient-to-tr from-green-100 dark:from-green-900/30 via-white dark:via-gray-900 to-green-50 dark:to-gray-800 rounded-3xl -z-10 opacity-80 transition-colors duration-300">
                        </div>
                        <div
                            class="relative bg-white dark:bg-gray-800 rounded-3xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden transition-colors duration-300">
                            <div
                                class="aspect-[4/3] sm:aspect-[16/10] bg-gradient-to-br from-primary via-primary-dark to-green-900 flex items-center justify-center">
                                <div
                                    class="w-32 h-32 sm:w-40 sm:h-40 rounded-full bg-white/10 border-2 border-white/60 flex items-center justify-center backdrop-blur">
                                    <span
                                        class="text-white text-center font-semibold text-sm sm:text-base leading-snug px-3">
                                        Ilustrasi<br>Lingkungan Sekolah
                                    </span>
                                </div>
                            </div>
                            <div class="p-4 sm:p-5">
                                <h3 class="text-sm sm:text-base font-semibold text-gray-900 dark:text-white">
                                    Lingkungan Belajar Nyaman &amp; Religius
                                </h3>
                                <p class="mt-1 text-xs sm:text-sm text-gray-500 dark:text-gray-400 leading-relaxed">
                                    Ruang kelas yang bersih, lingkungan hijau, dan kegiatan keagamaan rutin
                                    menjadi bagian dari proses pembelajaran harian di MIS Fathul Iman.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SHORT PROFILE SECTION -->
        <section id="profil-sekolah"
            class="bg-gray-50 dark:bg-gray-950 border-t border-gray-100 dark:border-gray-800 transition-colors duration-300">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">

                    <!-- Teks profil -->
                    <div class="space-y-5">
                        <div>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 dark:bg-green-900/50 text-primary-dark dark:text-green-400 mb-3">
                                Tentang Kami
                            </span>
                            <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 dark:text-white leading-snug">
                                Mengenal MIS Fathul Iman
                            </h2>
                        </div>

                        <div class="space-y-4 text-sm sm:text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                            <p>
                                Madrasah Ibtidaiyah Swasta (MIS) Fathul Iman adalah lembaga pendidikan Islam tingkat
                                dasar yang berlokasi di Kota Palangka Raya, Kalimantan Tengah. Berdiri sejak tahun 2013,
                                madrasah ini telah menjadi salah satu lembaga pendidikan Islam terpercaya yang konsisten
                                mencetak generasi berilmu dan berakhlak mulia.
                            </p>
                            <p>
                                Dengan memadukan kurikulum nasional dan kurikulum berbasis keislaman, MIS Fathul Iman
                                hadir untuk membentuk peserta didik yang tidak hanya cakap secara akademis, tetapi
                                juga kuat fondasi agamanya — generasi Qur'ani yang siap menghadapi tantangan zaman.
                            </p>
                        </div>

                        <!-- Statistik ringkas -->
                        <div class="grid grid-cols-3 gap-3 pt-2">
                            @foreach ([['angka' => '550+', 'label' => 'Siswa Aktif'], ['angka' => '25+', 'label' => 'Guru & Staff'], ['angka' => '10+', 'label' => 'Tahun Berdiri']] as $stat)
                                <div
                                    class="bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 px-3 py-3 text-center transition-colors duration-300">
                                    <p
                                        class="font-extrabold text-base sm:text-lg text-primary-dark dark:text-green-400">
                                        {{ $stat['angka'] }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">{{ $stat['label'] }}</p>
                                </div>
                            @endforeach
                        </div>

                        <a href="{{ route('profile') }}"
                            class="inline-flex items-center px-5 py-2.5 rounded-full bg-primary-dark dark:bg-green-600 text-white text-sm font-semibold shadow-md hover:bg-primary-darker dark:hover:bg-green-700 transition-all duration-200 cursor-pointer">
                            Selengkapnya
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>

                    <!-- Foto / ilustrasi sekolah -->
                    <div class="relative">
                        <div
                            class="absolute -inset-3 bg-gradient-to-br from-green-100 dark:from-green-900/20 to-green-50 dark:to-gray-800 rounded-3xl -z-10 opacity-70 transition-colors duration-300">
                        </div>
                        <div
                            class="relative rounded-2xl overflow-hidden shadow-lg border border-gray-100 dark:border-gray-700 bg-gradient-to-br from-primary via-primary-dark to-green-900 aspect-[4/3] flex items-center justify-center">
                            <img src="{{ asset('images/foto-sekolah.jpg') }}" alt="Gedung MIS Fathul Iman"
                                class="w-full h-full object-cover" onerror="this.style.display='none'">
                            <!-- Fallback jika foto belum ada -->
                            <div class="absolute inset-0 flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- BERITA TERBARU -->
        <section
            class="bg-white dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800 transition-colors duration-300">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">

                <!-- Header section -->
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-3 mb-8 sm:mb-10">
                    <div>
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 dark:bg-green-900/50 text-primary-dark dark:text-green-400 mb-2">
                            Terkini
                        </span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 dark:text-white">
                            Berita &amp; Informasi
                        </h2>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Ikuti kabar terbaru seputar kegiatan dan prestasi madrasah
                        </p>
                    </div>
                    <a href="{{ route('berita.index') }}"
                        class="inline-flex items-center text-sm font-semibold text-primary-dark dark:text-green-400 hover:text-primary-darker dark:hover:text-green-300 transition-colors duration-150 cursor-pointer flex-shrink-0">
                        Lihat Semua
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <!-- Grid berita -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
                    @foreach ($beritaTerbaru as $berita)
                        <article
                            class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-md hover:-translate-y-1 overflow-hidden transition-all duration-200">
                            <!-- Thumbnail -->
                            <a href="{{ route('berita.show', $berita['slug']) }}" class="block cursor-pointer">
                                <div
                                    class="relative h-44 bg-gradient-to-br from-primary/20 via-primary-dark/20 to-green-900/30 dark:from-gray-700 dark:to-gray-600 overflow-hidden">
                                    @if ($berita['thumbnail'])
                                        <img src="{{ asset('images/berita/' . $berita['thumbnail']) }}"
                                            alt="{{ $berita['judul'] }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                            onerror="this.style.display='none'">
                                    @endif
                                    <!-- Overlay gradient bawah -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                                    <!-- Badge kategori -->
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold
                                            {{ $berita['kategori_slug'] === 'program-kerja' ? 'bg-blue-500 text-white' : 'bg-yellow-400 text-yellow-900' }}">
                                            {{ $berita['kategori'] }}
                                        </span>
                                    </div>
                                </div>
                            </a>

                            <div class="p-4 sm:p-5">
                                <!-- Meta -->
                                <div class="flex items-center gap-3 text-xs text-gray-400 dark:text-gray-500 mb-2.5">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ \Carbon\Carbon::parse($berita['tanggal'])->translatedFormat('d M Y') }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        {{ number_format($berita['views']) }}
                                    </span>
                                </div>

                                <!-- Judul -->
                                <a href="{{ route('berita.show', $berita['slug']) }}" class="cursor-pointer">
                                    <h3
                                        class="font-bold text-sm sm:text-base text-gray-900 dark:text-white leading-snug line-clamp-2 group-hover:text-primary-dark dark:group-hover:text-green-400 transition-colors duration-150">
                                        {{ $berita['judul'] }}
                                    </h3>
                                </a>

                                <!-- Ringkasan -->
                                <p
                                    class="mt-2 text-xs sm:text-sm text-gray-500 dark:text-gray-400 leading-relaxed line-clamp-2">
                                    {{ $berita['ringkasan'] }}
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- Placeholder Sections for Other Menu Targets -->
        <section id="sejarah" class="hidden"></section>
        <section id="guru-tata-usaha" class="hidden"></section>
        <section id="siswa" class="hidden"></section>
        <section id="struktur-organisasi" class="hidden"></section>
        <section id="alumni" class="hidden"></section>
    </main>
</x-layout>
