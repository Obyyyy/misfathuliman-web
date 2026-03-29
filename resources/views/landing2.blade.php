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
                <div class="text-center mb-8 sm:mb-10">
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">
                        Profil Singkat Sekolah
                    </h2>
                    <p class="mt-2 text-sm sm:text-base text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                        MIS Fathul Iman merupakan lembaga pendidikan dasar Islam yang mengintegrasikan kurikulum
                        nasional dengan penguatan nilai-nilai keislaman, akhlak, dan karakter.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 items-start">
                    <!-- Left Column -->
                    <div class="space-y-4 text-sm sm:text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                        <p>
                            Dengan tenaga pendidik yang berkompeten dan berpengalaman, MIS Fathul Iman berupaya
                            memberikan layanan pendidikan terbaik bagi peserta didik. Proses pembelajaran dikemas secara
                            interaktif, kreatif, dan menyenangkan sehingga siswa aktif dalam setiap kegiatan.
                        </p>
                        <p>
                            Selain penguasaan ilmu pengetahuan umum, siswa juga dibekali dengan kemampuan baca tulis
                            Al-Qur&apos;an, hafalan, dan pembiasaan ibadah harian. Kegiatan ekstrakurikuler yang beragam
                            turut mendukung pengembangan minat dan bakat siswa.
                        </p>
                    </div>

                    <!-- Right Column: Highlight Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div
                            class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-4 sm:p-5 hover:-translate-y-1 hover:shadow-md transition-all duration-200">
                            <h3 id="visi-misi" class="text-sm sm:text-base font-semibold text-gray-900 dark:text-white">
                                Visi &amp; Misi
                            </h3>
                            <p class="mt-2 text-xs sm:text-sm text-gray-600 dark:text-gray-400">
                                Menjadi madrasah unggul dalam prestasi akademik dan non-akademik, berlandaskan iman,
                                takwa, dan akhlakul karimah.
                            </p>
                        </div>

                        <div
                            class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-4 sm:p-5 hover:-translate-y-1 hover:shadow-md transition-all duration-200">
                            <h3 id="program-kerja"
                                class="text-sm sm:text-base font-semibold text-gray-900 dark:text-white">
                                Program Kerja
                            </h3>
                            <p class="mt-2 text-xs sm:text-sm text-gray-600 dark:text-gray-400">
                                Penguatan literasi, numerasi, tahfidz, kegiatan keagamaan rutin, serta pembinaan
                                karakter melalui kegiatan internal dan kemitraan eksternal.
                            </p>
                        </div>

                        <div
                            class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-4 sm:p-5 hover:-translate-y-1 hover:shadow-md transition-all duration-200">
                            <h3 id="prestasi-siswa"
                                class="text-sm sm:text-base font-semibold text-gray-900 dark:text-white">
                                Prestasi Siswa
                            </h3>
                            <p class="mt-2 text-xs sm:text-sm text-gray-600 dark:text-gray-400">
                                Siswa aktif meraih prestasi di bidang sains, keagamaan, dan seni di tingkat kecamatan,
                                kabupaten, hingga provinsi.
                            </p>
                        </div>

                        <div
                            class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-4 sm:p-5 hover:-translate-y-1 hover:shadow-md transition-all duration-200">
                            <h3 id="kerjasama" class="text-sm sm:text-base font-semibold text-gray-900 dark:text-white">
                                Kerjasama &amp; Alumni
                            </h3>
                            <p class="mt-2 text-xs sm:text-sm text-gray-600 dark:text-gray-400">
                                Didukung jaringan alumni dan kemitraan dengan lembaga pendidikan lain untuk meningkatkan
                                kualitas layanan dan pengembangan sekolah.
                            </p>
                        </div>
                    </div>
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
