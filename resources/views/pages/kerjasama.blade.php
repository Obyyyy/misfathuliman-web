<x-layout>
    <main>
        <x-hero-banner :title="$title" :subtitle="$subtitle" :breadcrumbs="$breadcrumbs" />

        <!-- KONTEN UTAMA -->
        <section class="bg-gray-50 dark:bg-gray-950 transition-colors duration-300">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">

                <!-- Pengantar -->
                <div class="max-w-3xl mx-auto text-center mb-12 sm:mb-16">
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400 leading-relaxed">
                        MIS Fathul Iman menjalin kerjasama dengan berbagai instansi dan lembaga dalam rangka
                        meningkatkan kualitas pendidikan, mengembangkan program sekolah, dan memperluas
                        kesempatan bagi peserta didik untuk tumbuh dan berprestasi.
                    </p>
                </div>

                <!-- ======== INSTANSI PEMERINTAH ======== -->
                <div class="mb-14">
                    <div class="flex items-center space-x-3 mb-8">
                        <div class="w-1 h-7 bg-primary-dark dark:bg-green-500 rounded-full"></div>
                        <h2 class="text-lg sm:text-xl font-extrabold text-gray-900 dark:text-white">
                            Instansi Pemerintah
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">
                        @foreach ([
        [
            'nama' => 'Kementerian Agama Kota Palangka Raya',
            'jenis' => 'Instansi Pemerintah',
            'deskripsi' => 'Pembinaan, pengawasan, dan pengembangan kurikulum madrasah sesuai standar nasional pendidikan Islam.',
            'logo' => null,
            'warna' => 'green',
        ],
        [
            'nama' => 'Dinas Pendidikan Kota Palangka Raya',
            'jenis' => 'Instansi Pemerintah',
            'deskripsi' => 'Koordinasi program pendidikan daerah, bantuan operasional sekolah, dan sertifikasi tenaga pendidik.',
            'logo' => null,
            'warna' => 'green',
        ],
        [
            'nama' => 'Puskesmas Pahandut',
            'jenis' => 'Fasilitas Kesehatan',
            'deskripsi' => 'Pelayanan kesehatan siswa, imunisasi rutin, dan program UKS untuk menjaga kesehatan peserta didik.',
            'logo' => null,
            'warna' => 'green',
        ],
    ] as $mitra)
                            <x-mitra-card :mitra="$mitra" />
                        @endforeach
                    </div>
                </div>

                <!-- ======== LEMBAGA PENDIDIKAN ======== -->
                <div class="mb-14">
                    <div class="flex items-center space-x-3 mb-8">
                        <div class="w-1 h-7 bg-primary-dark dark:bg-green-500 rounded-full"></div>
                        <h2 class="text-lg sm:text-xl font-extrabold text-gray-900 dark:text-white">
                            Lembaga Pendidikan
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">
                        @foreach ([
        [
            'nama' => 'MTs Fathul Iman Palangka Raya',
            'jenis' => 'Madrasah Tsanawiyah',
            'deskripsi' => 'Kerjasama penyaluran lulusan dan kesinambungan program keagamaan antar jenjang pendidikan Islam.',
            'logo' => null,
            'warna' => 'blue',
        ],
        [
            'nama' => 'Pondok Pesantren Al-Hidayah',
            'jenis' => 'Pesantren',
            'deskripsi' => 'Program tahfidz bersama dan penguatan pendidikan karakter Islami bagi peserta didik.',
            'logo' => null,
            'warna' => 'blue',
        ],
        [
            'nama' => 'Universitas Palangka Raya',
            'jenis' => 'Perguruan Tinggi',
            'deskripsi' => 'Program magang mahasiswa kependidikan dan penelitian pengembangan mutu pembelajaran madrasah.',
            'logo' => null,
            'warna' => 'blue',
        ],
    ] as $mitra)
                            <x-mitra-card :mitra="$mitra" />
                        @endforeach
                    </div>
                </div>

                <!-- ======== MITRA LAINNYA ======== -->
                <div>
                    <div class="flex items-center space-x-3 mb-8">
                        <div class="w-1 h-7 bg-primary-dark dark:bg-green-500 rounded-full"></div>
                        <h2 class="text-lg sm:text-xl font-extrabold text-gray-900 dark:text-white">
                            Mitra Lainnya
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">
                        @foreach ([
        [
            'nama' => 'Komite Sekolah MIS Fathul Iman',
            'jenis' => 'Komite Sekolah',
            'deskripsi' => 'Dukungan orang tua dan masyarakat dalam perencanaan, pelaksanaan, dan pengawasan program madrasah.',
            'logo' => null,
            'warna' => 'orange',
        ],
        [
            'nama' => 'Ikatan Alumni MIS Fathul Iman',
            'jenis' => 'Organisasi Alumni',
            'deskripsi' => 'Kontribusi alumni dalam pengembangan madrasah melalui beasiswa, mentoring, dan program sosial.',
            'logo' => null,
            'warna' => 'orange',
        ],
        [
            'nama' => 'Lembaga Amil Zakat Daerah',
            'jenis' => 'Lembaga Sosial',
            'deskripsi' => 'Penyaluran bantuan beasiswa dan perlengkapan belajar bagi siswa kurang mampu di madrasah.',
            'logo' => null,
            'warna' => 'orange',
        ],
    ] as $mitra)
                            <x-mitra-card :mitra="$mitra" />
                        @endforeach
                    </div>
                </div>

            </div>
        </section>
    </main>
</x-layout>
