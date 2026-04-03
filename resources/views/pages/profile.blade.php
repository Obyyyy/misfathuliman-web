<x-layout>
    <main>
        <!-- HERO BANNER -->
        <x-hero-banner :title="$title" :subtitle="$subtitle" :breadcrumbs="$breadcrumbs"></x-hero-banner>

        <!-- KONTEN UTAMA -->
        <section class="bg-gray-50 dark:bg-gray-950 transition-colors duration-300">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-14 items-start">

                    <!-- KOLOM KIRI: Info ringkas sekolah -->
                    <!-- Di mobile muncul di bawah teks (order-last), di desktop sticky di kiri -->
                    <div class="order-last lg:order-first space-y-4">

                        <!-- Kartu identitas sekolah -->
                        <div
                            class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 overflow-hidden shadow-sm">
                            <!-- Header kartu -->
                            <div class="bg-gradient-to-br from-primary to-primary-dark px-5 py-4">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center flex-shrink-0">
                                        <img src="{{ asset('images/logo.png') }}" alt="Logo MIS Fathul Iman"
                                            class="w-9 h-9 rounded-lg object-cover"
                                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                        <span class="hidden text-white font-bold text-xs text-center leading-tight">MIS
                                            FI</span>
                                    </div>
                                    <div>
                                        <p class="text-white font-bold text-sm leading-tight">MIS Fathul Iman</p>
                                        <p class="text-green-100 text-xs">Palangka Raya</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Detail identitas — gunakan tabel agar tidak tumpang tindih -->
                            <div class="divide-y divide-gray-100 dark:divide-gray-700">
                                @foreach ([['Status', 'Swasta Terakreditasi B'], ['Jenjang', 'Madrasah Ibtidaiyah (SD)'], ['Berdiri', '2013'], ['NPSN', '69854296'], ['Kota', 'Palangka Raya, Kalteng'], ['Siswa', '550+ siswa aktif'], ['Guru & Staff', '25+ orang']] as [$label, $value])
                                    <div class="flex items-start justify-between gap-3 px-5 py-3 text-xs sm:text-sm">
                                        <span
                                            class="text-gray-500 dark:text-gray-400 flex-shrink-0 min-w-0">{{ $label }}</span>
                                        <span
                                            class="font-medium text-gray-800 dark:text-gray-200 text-right break-words min-w-0">{{ $value }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- KOLOM KANAN: Paragraf perkenalan -->
                    <div class="order-first lg:order-last lg:col-span-2 space-y-8">

                        <!-- Pembuka -->
                        <div>
                            <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900 dark:text-white mb-4">
                                Mengenal MIS Fathul Iman
                            </h2>
                            <div
                                class="space-y-4 text-sm sm:text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                                <p>
                                    Madrasah Ibtidaiyah Swasta (MIS) Fathul Iman adalah lembaga pendidikan Islam
                                    tingkat dasar yang berlokasi di Jl. RTA Milono Km. 2,5 No. 44, Kelurahan Langkai,
                                    Kecamatan Pahandut, Kota Palangka Raya, Kalimantan Tengah. Sejak berdiri pada
                                    tahun 1985, madrasah ini telah menjadi salah satu lembaga pendidikan Islam
                                    terpercaya di kota Palangka Raya yang konsisten mencetak generasi berilmu
                                    dan berakhlak mulia.
                                </p>
                                <p>
                                    Sebagai madrasah swasta di bawah naungan Kementerian Agama Republik Indonesia,
                                    MIS Fathul Iman menyelenggarakan pendidikan setara Sekolah Dasar (SD) dengan
                                    mengintegrasikan kurikulum nasional dan kurikulum berbasis keislaman. Hal ini
                                    menjadikan para lulusannya tidak hanya cakap secara akademis, tetapi juga
                                    kuat fondasi agamanya.
                                </p>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="h-px bg-gray-200 dark:bg-gray-800"></div>

                        <!-- Keunggulan -->
                        <div>
                            <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900 dark:text-white mb-4">
                                Keunggulan Madrasah
                            </h2>
                            <div
                                class="space-y-4 text-sm sm:text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                                <p>
                                    MIS Fathul Iman hadir dengan pendekatan pendidikan yang holistik — memadukan
                                    ilmu pengetahuan umum dengan ilmu agama secara seimbang. Program unggulan
                                    madrasah meliputi tahfidz Al-Qur'an, baca tulis Al-Qur'an (BTQ), shalat
                                    berjamaah, dan pembiasaan doa harian yang menjadi rutinitas wajib seluruh
                                    civitas madrasah.
                                </p>
                                <p>
                                    Di bidang akademik, siswa difasilitasi dengan proses pembelajaran yang
                                    interaktif dan menyenangkan. Para tenaga pendidik yang berkompeten dan
                                    berpengalaman senantiasa berupaya menghadirkan suasana belajar yang kondusif,
                                    kreatif, dan berpusat pada siswa sehingga setiap anak dapat berkembang
                                    sesuai potensi terbaiknya.
                                </p>
                                <p>
                                    Selain akademik dan keagamaan, madrasah juga memberikan wadah pengembangan
                                    diri melalui berbagai kegiatan ekstrakurikuler seperti pramuka, seni kaligrafi,
                                    olahraga, dan kegiatan sosial kemasyarakatan. Berbagai prestasi di tingkat
                                    kecamatan, kota, hingga provinsi telah berhasil diraih oleh para siswa
                                    sebagai buah dari pembinaan yang konsisten dan terprogram.
                                </p>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="h-px bg-gray-200 dark:bg-gray-800"></div>

                        <!-- Lingkungan dan fasilitas -->
                        <div>
                            <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900 dark:text-white mb-4">
                                Lingkungan &amp; Fasilitas
                            </h2>
                            <div
                                class="space-y-4 text-sm sm:text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                                <p>
                                    MIS Fathul Iman didukung oleh lingkungan belajar yang bersih, hijau, dan nyaman.
                                    Ruang kelas yang representatif, mushalla untuk kegiatan ibadah, perpustakaan,
                                    serta area bermain yang aman menjadi bagian dari fasilitas yang terus
                                    dibenahi demi kenyamanan peserta didik.
                                </p>
                                <p>
                                    Komitmen madrasah terhadap kualitas tidak berhenti pada fasilitas fisik semata.
                                    Hubungan harmonis antara guru, siswa, dan orang tua dibangun melalui komunikasi
                                    yang terbuka dan program parenting berkala, sehingga proses pendidikan dapat
                                    berjalan secara sinergis antara madrasah dan keluarga.
                                </p>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="h-px bg-gray-200 dark:bg-gray-800"></div>

                        <!-- Penutup dengan kutipan -->
                        <div>
                            <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900 dark:text-white mb-4">
                                Komitmen Kami
                            </h2>
                            <div
                                class="space-y-4 text-sm sm:text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                                <p>
                                    Dengan pengalaman lebih dari empat dekade, MIS Fathul Iman terus bertransformasi
                                    mengikuti perkembangan zaman tanpa meninggalkan nilai-nilai Islam yang menjadi
                                    ruhnya. Madrasah ini bukan sekadar tempat belajar, melainkan rumah kedua bagi
                                    setiap siswa untuk tumbuh, berkembang, dan menemukan jati dirinya sebagai
                                    generasi Muslim yang tangguh.
                                </p>
                            </div>

                            <blockquote class="mt-6 pl-5 border-l-4 border-primary-dark dark:border-green-500">
                                <p class="text-sm sm:text-base italic text-gray-600 dark:text-gray-400 leading-relaxed">
                                    "Kami hadir bukan hanya untuk mendidik pikiran, tetapi juga untuk
                                    membentuk hati dan jiwa — karena generasi terbaik adalah mereka yang
                                    berilmu sekaligus berakhlak."
                                </p>
                                <cite class="mt-2 block text-xs text-gray-400 dark:text-gray-500 not-italic">
                                    — Kepala Madrasah MIS Fathul Iman
                                </cite>
                            </blockquote>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layout>
