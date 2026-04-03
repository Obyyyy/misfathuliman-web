<x-layout>
    <main id="beranda">

        <!-- =============================================
             HERO SLIDER
        ============================================= -->
        <section class="relative w-full overflow-hidden bg-gray-900" style="height: clamp(280px, 55vw, 580px);">

            <!-- Slides -->
            <div id="heroSlider" class="relative w-full h-full">
                @foreach ($heroSlides as $i => $slide)
                    <div
                        class="hero-slide absolute inset-0 transition-opacity duration-700 ease-in-out
                                {{ $i === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}">

                        <!-- Foto latar -->
                        <img src="" data-src="{{ asset('images/hero/' . $slide['foto']) }}"
                            alt="{{ $slide['judul'] }}" class="w-full h-full object-cover"
                            onerror="this.style.display='none'; this.closest('.hero-slide').style.background='linear-gradient(135deg,#1a4731,#2d7a4f)'">

                        <!-- Overlay gelap bawah -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                        <!-- Konten -->
                        <div class="absolute bottom-0 left-0 right-0 px-5 sm:px-8 lg:px-12 pb-10 sm:pb-14">
                            @if ($slide['kategori'])
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold mb-3
                                    {{ $slide['kategori_slug'] === 'program-kerja' ? 'bg-blue-500 text-white' : 'bg-yellow-400 text-yellow-900' }}">
                                    {{ $slide['kategori'] }}
                                </span>
                            @endif
                            <h2
                                class="text-xl sm:text-3xl lg:text-4xl font-extrabold text-white leading-snug max-w-3xl drop-shadow-lg line-clamp-2">
                                {{ $slide['judul'] }}
                            </h2>
                            <p
                                class="hidden sm:block mt-2 text-sm sm:text-base text-white/80 max-w-xl line-clamp-2 leading-relaxed">
                                {{ $slide['ringkasan'] }}
                            </p>
                            @if ($slide['link'])
                                <a href="{{ $slide['link'] }}"
                                    class="inline-flex items-center mt-4 px-5 py-2.5 rounded-full bg-primary-dark hover:bg-primary-darker text-white text-sm font-semibold shadow-lg transition-all duration-200 cursor-pointer">
                                    Baca Selengkapnya
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 12h14M12 5l7 7-7 7" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Prev button -->
            <button id="heroPrev" type="button" aria-label="Slide sebelumnya"
                class="absolute left-3 sm:left-5 top-1/2 -translate-y-1/2 z-20
                       w-9 h-9 sm:w-11 sm:h-11 rounded-full
                       bg-black/30 hover:bg-black/60 backdrop-blur-sm
                       text-white flex items-center justify-center
                       border border-white/20 hover:border-white/50
                       transition-all duration-200 cursor-pointer">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- Next button -->
            <button id="heroNext" type="button" aria-label="Slide berikutnya"
                class="absolute right-3 sm:right-5 top-1/2 -translate-y-1/2 z-20
                       w-9 h-9 sm:w-11 sm:h-11 rounded-full
                       bg-black/30 hover:bg-black/60 backdrop-blur-sm
                       text-white flex items-center justify-center
                       border border-white/20 hover:border-white/50
                       transition-all duration-200 cursor-pointer">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <!-- Dot indicators -->
            <div id="heroDots" class="absolute bottom-3 right-4 sm:right-6 z-20 flex items-center gap-1.5">
                @foreach ($heroSlides as $i => $slide)
                    <button type="button" data-dot="{{ $i }}" aria-label="Slide {{ $i + 1 }}"
                        class="hero-dot rounded-full transition-all duration-300 cursor-pointer
                               {{ $i === 0 ? 'w-6 h-2 bg-white' : 'w-2 h-2 bg-white/40 hover:bg-white/70' }}">
                    </button>
                @endforeach
            </div>
        </section>

        <!-- =============================================
             SAMBUTAN KEPALA MADRASAH + STATISTIK
        ============================================= -->
        <section
            class="bg-white dark:bg-gray-900 border-b border-gray-100 dark:border-gray-800 shadow-sm transition-colors duration-300">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">
                <div
                    class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-0 divide-y lg:divide-y-0 lg:divide-x divide-gray-100 dark:divide-gray-800">

                    <!-- Sambutan -->
                    <div class="flex items-start gap-5 lg:pr-10 pb-8 lg:pb-0">
                        <!-- Avatar kepala madrasah -->
                        <div class="flex-shrink-0 relative">
                            <img src="{{ asset('images/kepmad.png') }}" alt="Foto Kepala Madrasah"
                                class="w-20 h-20 sm:w-24 sm:h-24 rounded-full object-cover object-center border-4 border-green-100 dark:border-green-900/50 shadow-md"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div
                                class="hidden w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-gradient-to-br from-primary to-primary-dark
                                        items-center justify-center border-4 border-green-100 dark:border-green-900/50 shadow-md">
                                <svg class="w-10 h-10 text-white/70" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Teks -->
                        <div class="flex-1 min-w-0">
                            <p
                                class="text-xs font-semibold uppercase tracking-widest text-primary-dark dark:text-green-400 mb-1">
                                Sambutan Kepala Madrasah
                            </p>
                            <p class="font-extrabold text-sm sm:text-base text-gray-900 dark:text-white leading-tight">
                                {{ $kepala['nama'] }}
                            </p>
                            @if (!empty($kepala['nip']))
                                <p class="text-xs text-gray-400 dark:text-gray-500 mb-2">{{ $kepala['nip'] }}</p>
                            @endif
                            <p
                                class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed line-clamp-3 mt-1">
                                {{ $kepala['sambutan'] }}
                            </p>
                            <a href="{{ route('sambutan') }}"
                                class="inline-flex items-center mt-3 px-4 py-2 rounded-full bg-primary-dark dark:bg-green-600 text-white text-xs font-semibold hover:bg-primary-darker dark:hover:bg-green-700 transition-all duration-200 cursor-pointer shadow-sm">
                                Selengkapnya
                                <svg class="w-3.5 h-3.5 ml-1.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12h14M12 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Statistik -->
                    <div class="flex flex-col justify-center lg:pl-10 pt-8 lg:pt-0">
                        <p
                            class="text-xs font-semibold uppercase tracking-widest text-primary-dark dark:text-green-400 mb-6">
                            Statistik Data Madrasah
                        </p>
                        <div class="grid grid-cols-3 divide-x divide-gray-100 dark:divide-gray-800">
                            @foreach ($statistik as $stat)
                                <div class="text-center px-4 first:pl-0 last:pr-0">
                                    <p
                                        class="text-3xl sm:text-4xl font-extrabold text-gray-900 dark:text-white leading-none">
                                        {{ $stat['angka'] }}
                                    </p>
                                    <p
                                        class="mt-2 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        {{ $stat['label'] }}
                                    </p>
                                </div>
                            @endforeach
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
                        <a href="{{ route('profile') }}"
                            class="inline-flex items-center px-5 py-2.5 rounded-full bg-primary-dark dark:bg-green-600 text-white text-sm font-semibold shadow-md hover:bg-primary-darker dark:hover:bg-green-700 transition-all duration-200 cursor-pointer">
                            Selengkapnya
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                    <div class="relative">
                        <div
                            class="absolute -inset-3 bg-gradient-to-br from-green-100 dark:from-green-900/20 to-green-50 dark:to-gray-800 rounded-3xl -z-10 opacity-70">
                        </div>
                        <div
                            class="relative rounded-2xl overflow-hidden shadow-lg border border-gray-100 dark:border-gray-700 bg-gradient-to-br from-primary via-primary-dark to-green-900 aspect-[4/3] flex items-center justify-center">
                            <img src="{{ asset('storage/' . $gambarSekolah->gambar) }}" alt="Gedung MIS Fathul Iman"
                                class="w-full h-full object-cover" onerror="this.style.display='none'">
                            {{-- <div class="absolute inset-0 flex items-center justify-center">
                                <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- BERITA TERBARU -->
        <section
            class="bg-white dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800 transition-colors duration-300">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
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
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
                    @foreach ($beritaTerbaru as $berita)
                        <article
                            class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-md hover:-translate-y-1 overflow-hidden transition-all duration-200">
                            <a href="{{ route('berita.show', $berita['slug']) }}" class="block cursor-pointer">
                                <div
                                    class="relative h-44 bg-gradient-to-br from-primary/20 to-green-900/30 dark:from-gray-700 dark:to-gray-600 overflow-hidden">
                                    @if ($berita['thumbnail'])
                                        <img src=""
                                            data-src="{{ asset('images/berita/' . $berita['thumbnail']) }}"
                                            alt="{{ $berita['judul'] }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                            onerror="this.style.display='none'">
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
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
                                <a href="{{ route('berita.show', $berita['slug']) }}" class="cursor-pointer">
                                    <h3
                                        class="font-bold text-sm sm:text-base text-gray-900 dark:text-white leading-snug line-clamp-2 group-hover:text-primary-dark dark:group-hover:text-green-400 transition-colors duration-150">
                                        {{ $berita['judul'] }}
                                    </h3>
                                </a>
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

        <section id="sejarah" class="hidden"></section>
        <section id="guru-tata-usaha" class="hidden"></section>
        <section id="siswa" class="hidden"></section>
        <section id="struktur-organisasi" class="hidden"></section>
        <section id="alumni" class="hidden"></section>
    </main>

    @push('scripts')
        <script>
            (function() {
                document.addEventListener('DOMContentLoaded', function() {

                    // ── Load gambar dari data-src ────────────────────────────
                    // Gambar di-set via JS setelah DOM siap, bukan lewat atribut
                    // src langsung, sehingga browser tidak menahan window.load
                    // hanya karena gambar tidak ditemukan (404).
                    document.querySelectorAll('img[data-src]').forEach(function(img) {
                        img.src = img.getAttribute('data-src');
                    });

                    // ── Hero Slider ──────────────────────────────────────────
                    const slides = document.querySelectorAll('.hero-slide');
                    const dots = document.querySelectorAll('.hero-dot');

                    // Jika tidak ada slide, jangan jalankan script slider agar tidak error
                    if (!slides.length || !dots.length) return;

                    let current = 0;
                    let timer;

                    function goTo(idx) {
                        // Cek apakah index valid untuk menghindari error 'undefined'
                        if (!slides[current] || !slides[idx]) return;

                        // Slide lama
                        slides[current].classList.replace('opacity-100', 'opacity-0');
                        slides[current].classList.replace('z-10', 'z-0');

                        if (dots[current]) {
                            dots[current].classList.remove('w-6', 'h-2', 'bg-white');
                            dots[current].classList.add('w-2', 'h-2', 'bg-white/40');
                        }

                        current = (idx + slides.length) % slides.length;

                        // Slide baru
                        slides[current].classList.replace('opacity-0', 'opacity-100');
                        slides[current].classList.replace('z-0', 'z-10');

                        if (dots[current]) {
                            dots[current].classList.remove('w-2', 'h-2', 'bg-white/40');
                            dots[current].classList.add('w-6', 'h-2', 'bg-white');
                        }
                    }

                    function startTimer() {
                        clearInterval(timer);
                        timer = setInterval(() => goTo(current + 1), 5000);
                    }

                    // Gunakan Optional Chaining (?.) untuk keamanan ekstra
                    document.getElementById('heroPrev')?.addEventListener('click', () => {
                        goTo(current - 1);
                        startTimer();
                    });

                    document.getElementById('heroNext')?.addEventListener('click', () => {
                        goTo(current + 1);
                        startTimer();
                    });

                    dots.forEach((dot, index) => {
                        dot.addEventListener('click', () => {
                            goTo(index);
                            startTimer();
                        });
                    });

                    startTimer();
                });
            })();
        </script>
    @endpush
</x-layout>
