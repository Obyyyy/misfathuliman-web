<x-layout>
    <main>
        <!-- HERO BANNER -->
        <x-hero-banner :title="$title" :subtitle="$subtitle" :breadcrumbs="$breadcrumbs"></x-hero-banner>

        <!-- KONTEN UTAMA -->
        <section class="bg-gray-50 dark:bg-gray-950 transition-colors duration-300">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20 space-y-16">

                <!-- ======== VISI ======== -->
                <div>
                    <!-- Judul Visi -->
                    <div class="flex items-center space-x-3 mb-6">
                        <div
                            class="w-10 h-10 rounded-xl bg-primary dark:bg-green-700 flex items-center justify-center shadow-md flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-widest text-primary dark:text-green-400">
                                Pernyataan</p>
                            <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900 dark:text-white">Visi</h2>
                        </div>
                    </div>

                    <!-- Kotak visi utama -->
                    <div
                        class="relative rounded-2xl overflow-hidden bg-gradient-to-br from-primary via-primary-dark to-green-900 p-px shadow-xl">
                        <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 sm:p-8 lg:p-10">
                            <!-- Kutipan besar -->
                            <svg class="w-8 h-8 text-primary/20 dark:text-green-700/40 mb-3" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                            </svg>
                            <p
                                class="text-base sm:text-lg lg:text-xl font-semibold text-gray-800 dark:text-gray-100 leading-relaxed">
                                Terwujudnya peserta didik yang unggul dalam prestasi, berakhlakul karimah,
                                beriman, dan bertakwa kepada Allah SWT, serta mampu menghadapi tantangan
                                global dengan berlandaskan nilai-nilai Islam.
                            </p>
                        </div>
                    </div>

                    <!-- Penjelasan visi -->
                    <div class="mt-6 space-y-4 text-sm sm:text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                        <p>
                            Visi ini merupakan cita-cita luhur yang ingin diwujudkan oleh MIS Fathul Iman dalam setiap
                            proses pendidikan yang diselenggarakan. Kata <span
                                class="font-semibold text-primary-dark dark:text-green-400">"unggul dalam
                                prestasi"</span> mencerminkan
                            komitmen madrasah untuk terus mendorong siswa berprestasi secara akademik maupun
                            non-akademik, bersaing secara sehat di berbagai jenjang kompetisi.
                        </p>
                        <p>
                            Sementara <span class="font-semibold text-primary-dark dark:text-green-400">"berakhlakul
                                karimah, beriman, dan bertakwa"</span> menjadi fondasi utama yang
                            membedakan lulusan madrasah dengan lembaga pendidikan lainnya. Karakter Islami yang kuat
                            diyakini sebagai bekal terpenting bagi generasi penerus dalam menjalani kehidupan
                            bermasyarakat, berbangsa, dan bernegara.
                        </p>
                    </div>
                </div>

                <!-- Divider -->
                <div class="flex items-center space-x-4">
                    <div class="flex-1 h-px bg-gray-200 dark:bg-gray-800"></div>
                    <div class="flex space-x-1.5">
                        <div class="w-2 h-2 rounded-full bg-primary-dark dark:bg-green-600"></div>
                        <div class="w-2 h-2 rounded-full bg-primary dark:bg-green-500"></div>
                        <div class="w-2 h-2 rounded-full bg-green-300 dark:bg-green-700"></div>
                    </div>
                    <div class="flex-1 h-px bg-gray-200 dark:bg-gray-800"></div>
                </div>

                <!-- ======== MISI ======== -->
                <div>
                    <!-- Judul Misi -->
                    <div class="flex items-center space-x-3 mb-6">
                        <div
                            class="w-10 h-10 rounded-xl bg-primary dark:bg-green-700 flex items-center justify-center shadow-md flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-widest text-primary dark:text-green-400">
                                Langkah Nyata</p>
                            <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900 dark:text-white">Misi</h2>
                        </div>
                    </div>

                    <!-- Pengantar misi -->
                    <p class="text-sm sm:text-base text-gray-700 dark:text-gray-300 leading-relaxed mb-8">
                        Untuk mewujudkan visi di atas, MIS Fathul Iman mengemban misi-misi berikut sebagai
                        pedoman operasional dalam setiap kegiatan pendidikan dan pembinaan peserta didik:
                    </p>

                    <!-- Kartu-kartu misi -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">

                        <!-- Misi 1 -->
                        <div
                            class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 p-5 sm:p-6 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                            <div class="flex items-start space-x-4">
                                <div
                                    class="w-9 h-9 rounded-lg bg-green-100 dark:bg-green-900/50 flex items-center justify-center flex-shrink-0 group-hover:bg-primary group-hover:text-white transition-colors duration-200">
                                    <span
                                        class="text-sm font-extrabold text-primary-dark dark:text-green-400 group-hover:text-white transition-colors duration-200">01</span>
                                </div>
                                <div>
                                    <h3 class="text-sm sm:text-base font-bold text-gray-900 dark:text-white mb-1.5">
                                        Pendidikan Agama yang Kuat
                                    </h3>
                                    <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                                        Menyelenggarakan pembelajaran agama Islam secara menyeluruh, meliputi akidah,
                                        ibadah, akhlak, Al-Qur'an, dan hadits, sehingga terbentuk pribadi Muslim
                                        yang taat dan bertanggung jawab.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Misi 2 -->
                        <div
                            class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 p-5 sm:p-6 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                            <div class="flex items-start space-x-4">
                                <div
                                    class="w-9 h-9 rounded-lg bg-green-100 dark:bg-green-900/50 flex items-center justify-center flex-shrink-0 group-hover:bg-primary group-hover:text-white transition-colors duration-200">
                                    <span
                                        class="text-sm font-extrabold text-primary-dark dark:text-green-400 group-hover:text-white transition-colors duration-200">02</span>
                                </div>
                                <div>
                                    <h3 class="text-sm sm:text-base font-bold text-gray-900 dark:text-white mb-1.5">
                                        Pembelajaran Berkualitas &amp; Inovatif
                                    </h3>
                                    <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                                        Melaksanakan proses belajar mengajar yang aktif, kreatif, efektif, dan
                                        menyenangkan dengan memanfaatkan teknologi dan metode pembelajaran
                                        mutakhir sesuai perkembangan zaman.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Misi 3 -->
                        <div
                            class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 p-5 sm:p-6 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                            <div class="flex items-start space-x-4">
                                <div
                                    class="w-9 h-9 rounded-lg bg-green-100 dark:bg-green-900/50 flex items-center justify-center flex-shrink-0 group-hover:bg-primary group-hover:text-white transition-colors duration-200">
                                    <span
                                        class="text-sm font-extrabold text-primary-dark dark:text-green-400 group-hover:text-white transition-colors duration-200">03</span>
                                </div>
                                <div>
                                    <h3 class="text-sm sm:text-base font-bold text-gray-900 dark:text-white mb-1.5">
                                        Pembinaan Akhlak &amp; Karakter
                                    </h3>
                                    <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                                        Membina dan mengembangkan karakter peserta didik melalui pembiasaan
                                        ibadah harian, kedisiplinan, sopan santun, dan nilai-nilai kejujuran
                                        dalam kehidupan sehari-hari di lingkungan madrasah maupun rumah.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Misi 4 -->
                        <div
                            class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 p-5 sm:p-6 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                            <div class="flex items-start space-x-4">
                                <div
                                    class="w-9 h-9 rounded-lg bg-green-100 dark:bg-green-900/50 flex items-center justify-center flex-shrink-0 group-hover:bg-primary group-hover:text-white transition-colors duration-200">
                                    <span
                                        class="text-sm font-extrabold text-primary-dark dark:text-green-400 group-hover:text-white transition-colors duration-200">04</span>
                                </div>
                                <div>
                                    <h3 class="text-sm sm:text-base font-bold text-gray-900 dark:text-white mb-1.5">
                                        Pengembangan Minat &amp; Bakat
                                    </h3>
                                    <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                                        Memfasilitasi pengembangan potensi peserta didik melalui kegiatan
                                        ekstrakurikuler, olimpiade, seni, olahraga, dan berbagai kompetisi
                                        yang mendorong tumbuhnya rasa percaya diri dan jiwa kompetitif.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Misi 5 -->
                        <div
                            class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 p-5 sm:p-6 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                            <div class="flex items-start space-x-4">
                                <div
                                    class="w-9 h-9 rounded-lg bg-green-100 dark:bg-green-900/50 flex items-center justify-center flex-shrink-0 group-hover:bg-primary group-hover:text-white transition-colors duration-200">
                                    <span
                                        class="text-sm font-extrabold text-primary-dark dark:text-green-400 group-hover:text-white transition-colors duration-200">05</span>
                                </div>
                                <div>
                                    <h3 class="text-sm sm:text-base font-bold text-gray-900 dark:text-white mb-1.5">
                                        Peningkatan Kompetensi Pendidik
                                    </h3>
                                    <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                                        Meningkatkan profesionalisme dan kompetensi tenaga pendidik melalui
                                        pelatihan, workshop, studi banding, dan program pengembangan diri
                                        secara berkelanjutan demi terwujudnya pembelajaran yang bermutu.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Misi 6 -->
                        <div
                            class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 p-5 sm:p-6 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                            <div class="flex items-start space-x-4">
                                <div
                                    class="w-9 h-9 rounded-lg bg-green-100 dark:bg-green-900/50 flex items-center justify-center flex-shrink-0 group-hover:bg-primary group-hover:text-white transition-colors duration-200">
                                    <span
                                        class="text-sm font-extrabold text-primary-dark dark:text-green-400 group-hover:text-white transition-colors duration-200">06</span>
                                </div>
                                <div>
                                    <h3 class="text-sm sm:text-base font-bold text-gray-900 dark:text-white mb-1.5">
                                        Kemitraan dengan Orang Tua &amp; Masyarakat
                                    </h3>
                                    <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                                        Membangun sinergi yang harmonis antara madrasah, orang tua, dan
                                        masyarakat sekitar dalam menciptakan ekosistem pendidikan yang kondusif,
                                        saling mendukung, dan bertanggung jawab bersama.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- ======== TUJUAN ======== -->
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div
                            class="w-10 h-10 rounded-xl bg-primary dark:bg-green-700 flex items-center justify-center shadow-md flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-widest text-primary dark:text-green-400">
                                Sasaran Akhir</p>
                            <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900 dark:text-white">Tujuan</h2>
                        </div>
                    </div>

                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 p-6 sm:p-8 shadow-sm space-y-4 text-sm sm:text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                        <p>
                            Mengacu pada visi dan misi yang telah ditetapkan, MIS Fathul Iman bertujuan untuk
                            menghasilkan lulusan yang memiliki keseimbangan antara kecerdasan intelektual
                            (<span class="font-semibold text-primary-dark dark:text-green-400">IQ</span>),
                            kecerdasan emosional (<span
                                class="font-semibold text-primary-dark dark:text-green-400">EQ</span>),
                            dan kecerdasan spiritual (<span
                                class="font-semibold text-primary-dark dark:text-green-400">SQ</span>)
                            — yang dikenal sebagai insan kamil dalam pandangan Islam.
                        </p>
                        <p>
                            Setiap lulusan diharapkan tidak hanya mampu bersaing di jenjang pendidikan selanjutnya,
                            tetapi juga menjadi individu yang berintegritas, berjiwa sosial tinggi, dan senantiasa
                            menjunjung nilai-nilai Islam dalam setiap aspek kehidupannya.
                        </p>
                        <p>
                            Dengan demikian, MIS Fathul Iman berkeyakinan bahwa pendidikan sejati bukan sekadar
                            transfer ilmu pengetahuan, melainkan pembentukan karakter dan jiwa yang utuh — menjadikan
                            setiap siswa sebagai generasi Qur'ani yang siap memberi manfaat bagi agama, bangsa,
                            dan peradaban.
                        </p>
                    </div>
                </div>

            </div>
        </section>
    </main>
</x-layout>
