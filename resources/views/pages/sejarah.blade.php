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
                                <img src="{{ asset('storage/' . $gambarSekolah->gambar) }}"
                                    alt="Foto Gedung MIS Fathul Iman"
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
                                Madrasah Ibtidaiyah Swasta (MIS) Fathul Iman Kota Palangka Raya didirikan pada tahun
                                2013 di bawah naungan Yayasan Fathul Iman. Pendirian madrasah ini dilatarbelakangi oleh
                                kepedulian yayasan, dewan guru, wali murid, serta masyarakat terhadap pentingnya
                                pendidikan yang mampu mengintegrasikan ilmu pengetahuan umum dengan nilai-nilai
                                keislaman. Pada saat itu, masyarakat dihadapkan pada pilihan pendidikan yang cenderung
                                terpisah antara aspek religi dan sains, sehingga diperlukan sebuah lembaga yang mampu
                                menjembatani keduanya secara seimbang.
                            </p>
                            <p>
                                Berdiri di lingkungan Komplek Masjid Fathul Iman, madrasah ini hadir sebagai alternatif
                                pendidikan yang tidak hanya menekankan pada kecerdasan intelektual, tetapi juga
                                pembentukan karakter, keimanan, dan akhlakul karimah. Dengan semangat kebersamaan dan
                                tekad yang kuat, MIS Fathul Iman mulai menjalankan kegiatan pendidikan meskipun dengan
                                fasilitas yang masih terbatas.
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
                                Sejak awal berdirinya, MIS Fathul Iman terus mengalami perkembangan yang positif.
                                Dukungan dari masyarakat serta komitmen tenaga pendidik menjadi faktor utama dalam
                                meningkatkan kualitas pembelajaran. Secara bertahap, sarana dan prasarana madrasah mulai
                                ditingkatkan untuk menunjang proses pendidikan yang lebih baik.
                            </p>
                            <p>
                                Dalam perjalanannya, MIS Fathul Iman juga terus berupaya menyesuaikan diri dengan
                                perkembangan zaman, baik dari segi kurikulum maupun metode pembelajaran. Integrasi
                                antara pendidikan agama dan ilmu pengetahuan umum semakin diperkuat, disertai dengan
                                pembiasaan nilai-nilai religius dan pengembangan karakter peserta didik. Hal ini
                                menjadikan madrasah semakin dipercaya oleh masyarakat sebagai lembaga pendidikan yang
                                mampu mencetak generasi yang seimbang antara ilmu dan iman.
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
                                Saat ini, MIS Fathul Iman Kota Palangka Raya telah berkembang menjadi salah satu lembaga
                                pendidikan swasta yang terus berkomitmen dalam meningkatkan mutu pendidikan. Berlokasi
                                di Jl. RTA. Milono Km. 2,5, Kelurahan Langkai, Kecamatan Pahandut, madrasah ini berada
                                di kawasan strategis yang mudah dijangkau oleh masyarakat.
                            </p>
                            <p>
                                Secara legal, Yayasan Fathul Iman telah disahkan melalui akta notaris oleh Gusti Surya
                                Hadi Saputra, SH., M.Kn dengan Nomor 03 tanggal 22 Februari 2018, serta memperoleh
                                pengesahan badan hukum dengan Nomor AHU-00340.AH.02.01 Tahun 2016 tanggal 03 Juni 2016.
                                Dalam upaya menjaga dan meningkatkan kualitas pendidikan, MIS Fathul Iman juga telah
                                memperoleh akreditasi B dengan nilai 87 pada tanggal 02 Desember 2018, yang berlaku
                                hingga 31 Desember 2023.
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
