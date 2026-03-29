<x-layout>
    <main>
        <!-- HERO BANNER -->
        <x-hero-banner :title="$title" :subtitle="$subtitle" :breadcrumbs="$breadcrumbs"></x-hero-banner>

        <!-- KONTEN UTAMA -->
        <section class="bg-gray-50 dark:bg-gray-950 transition-colors duration-300">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-start">

                    <!-- KOLOM KIRI: Foto Sekolah -->
                    <div class="lg:sticky lg:top-24">
                        <div class="relative group">
                            <!-- Shadow dekoratif -->
                            <div
                                class="absolute -inset-1 bg-gradient-to-br from-primary via-primary-dark to-green-900 rounded-2xl opacity-20 dark:opacity-30 blur-sm group-hover:opacity-30 transition-opacity duration-300">
                            </div>

                            <!-- Frame foto -->
                            <div
                                class="relative rounded-2xl overflow-hidden shadow-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
                                <img src="{{ asset('images/foto-sekolah.jpg') }}" alt="Foto Gedung MIS Fathul Iman"
                                    class="w-full h-64 sm:h-80 lg:h-96 object-cover transition-transform duration-500 group-hover:scale-105">

                                <!-- Caption foto -->
                                <div
                                    class="px-4 py-3 bg-white dark:bg-gray-800 border-t border-gray-100 dark:border-gray-700">
                                    <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 text-center">
                                        📍 Gedung MIS Fathul Iman, Palangka Raya, Kalimantan Tengah
                                    </p>
                                </div>
                            </div>

                            <!-- Badge tahun berdiri -->
                            <div
                                class="absolute -bottom-4 -right-2 sm:-right-4 bg-primary-dark dark:bg-green-600 text-white rounded-xl px-4 py-2 shadow-lg">
                                <p class="text-xs font-medium text-green-100">Berdiri Sejak</p>
                                <p class="text-xl sm:text-2xl font-extrabold leading-tight">2013</p>
                            </div>
                        </div>

                        <!-- Statistik ringkas di bawah foto -->
                        {{-- <div class="mt-10 grid grid-cols-3 gap-3 text-center">
                            <div
                                class="bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 p-3 shadow-sm">
                                <p class="text-lg sm:text-xl font-extrabold text-primary-dark dark:text-green-400">40+
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Tahun Berdiri</p>
                            </div>
                            <div
                                class="bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 p-3 shadow-sm">
                                <p class="text-lg sm:text-xl font-extrabold text-primary-dark dark:text-green-400">200+
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Siswa Aktif</p>
                            </div>
                            <div
                                class="bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 p-3 shadow-sm">
                                <p class="text-lg sm:text-xl font-extrabold text-primary-dark dark:text-green-400">1000+
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Alumni</p>
                            </div>
                        </div> --}}
                    </div>

                    <!-- KOLOM KANAN: Teks Sejarah -->
                    <div class="space-y-6">
                        <!-- Penanda section -->
                        <div class="flex items-center space-x-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-green-100 dark:bg-green-900/50 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-primary-dark dark:text-green-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <h2 class="text-lg sm:text-xl font-bold text-gray-900 dark:text-white">
                                Awal Mula Pendirian
                            </h2>
                        </div>

                        <div class="space-y-4 text-sm sm:text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                            <p>
                                Madrasah Ibtidaiyah Swasta (MIS) Fathul Iman didirikan pada tahun 1985 atas prakarsa
                                sejumlah tokoh masyarakat dan ulama setempat yang memiliki kepedulian mendalam terhadap
                                pendidikan Islam di Kota Palangka Raya, Kalimantan Tengah. Dengan semangat dan tekad
                                yang
                                kuat, mereka bersepakat untuk membangun sebuah lembaga pendidikan Islam yang tidak hanya
                                mengajarkan ilmu agama, tetapi juga ilmu pengetahuan umum secara terpadu.
                            </p>
                            <p>
                                Pada masa awal berdirinya, MIS Fathul Iman hanya memiliki beberapa ruang kelas sederhana
                                dengan jumlah murid yang masih sangat terbatas. Namun berkat dukungan masyarakat sekitar
                                serta kegigihan para pendiri dan tenaga pengajar, madrasah ini terus berkembang dari
                                tahun
                                ke tahun, baik dari segi fasilitas maupun kualitas pendidikannya.
                            </p>
                        </div>

                        <!-- Divider bergaya -->
                        <div class="flex items-center space-x-3 py-2">
                            <div class="flex-1 h-px bg-gray-200 dark:bg-gray-700"></div>
                            <div class="w-2 h-2 rounded-full bg-primary-dark dark:bg-green-500"></div>
                            <div class="flex-1 h-px bg-gray-200 dark:bg-gray-700"></div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-green-100 dark:bg-green-900/50 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-primary-dark dark:text-green-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h2 class="text-lg sm:text-xl font-bold text-gray-900 dark:text-white">
                                Perkembangan dan Pertumbuhan
                            </h2>
                        </div>

                        <div class="space-y-4 text-sm sm:text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                            <p>
                                Memasuki era 1990-an, MIS Fathul Iman mulai menunjukkan perkembangan yang signifikan.
                                Penambahan ruang kelas baru, laboratorium sederhana, dan perpustakaan menjadi tonggak
                                penting dalam peningkatan mutu pendidikan. Di era ini pula, madrasah mulai aktif
                                mengikuti berbagai perlombaan akademik dan keagamaan di tingkat kecamatan maupun
                                kabupaten, dan berhasil meraih sejumlah penghargaan membanggakan.
                            </p>
                            <p>
                                Pada dekade 2000-an, madrasah terus berbenah seiring dengan tuntutan zaman. Kurikulum
                                diperbarui dengan mengintegrasikan teknologi informasi ke dalam proses pembelajaran,
                                sekaligus memperkuat program hafalan Al-Qur'an dan pembiasaan akhlak mulia. Jumlah
                                peserta didik pun terus meningkat, mencerminkan kepercayaan masyarakat yang semakin
                                besar terhadap kualitas pendidikan di MIS Fathul Iman.
                            </p>
                        </div>

                        <div class="flex items-center space-x-3 py-2">
                            <div class="flex-1 h-px bg-gray-200 dark:bg-gray-700"></div>
                            <div class="w-2 h-2 rounded-full bg-primary-dark dark:bg-green-500"></div>
                            <div class="flex-1 h-px bg-gray-200 dark:bg-gray-700"></div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-green-100 dark:bg-green-900/50 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-primary-dark dark:text-green-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                </svg>
                            </div>
                            <h2 class="text-lg sm:text-xl font-bold text-gray-900 dark:text-white">
                                MIS Fathul Iman Hari Ini
                            </h2>
                        </div>

                        <div class="space-y-4 text-sm sm:text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                            <p>
                                Kini, MIS Fathul Iman telah berdiri selama lebih dari empat dekade dan telah meluluskan
                                ribuan alumni yang tersebar di berbagai penjuru nusantara. Dengan tenaga pendidik yang
                                berpengalaman dan berdedikasi tinggi, madrasah terus berkomitmen untuk menjadi lembaga
                                pendidikan Islam yang unggul, modern, dan berakhlakul karimah.
                            </p>
                            <p>
                                Berbagai prestasi di bidang akademik, keagamaan, maupun seni dan olahraga terus
                                diraih oleh para siswa, mengharumkan nama madrasah di tingkat regional bahkan nasional.
                                MIS Fathul Iman terus melangkah maju, menjawab tantangan zaman sambil tetap berpegang
                                teguh pada nilai-nilai Islam yang menjadi pondasi berdirinya madrasah ini.
                            </p>
                        </div>

                        <!-- Kutipan inspiratif -->
                        <blockquote class="relative mt-4 pl-5 border-l-4 border-primary-dark dark:border-green-500">
                            <p class="text-sm sm:text-base italic text-gray-600 dark:text-gray-400 leading-relaxed">
                                "Mendidik satu anak adalah menanam benih untuk masa depan. Mendidik satu generasi
                                adalah membangun peradaban."
                            </p>
                            <cite class="mt-2 block text-xs text-gray-400 dark:text-gray-500 not-italic">
                                — Para Pendiri MIS Fathul Iman
                            </cite>
                        </blockquote>
                    </div>

                </div>
            </div>
        </section>
    </main>
</x-layout>
