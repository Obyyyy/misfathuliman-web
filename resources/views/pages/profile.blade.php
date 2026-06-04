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
                                            loading="lazy" class="w-9 h-9 rounded-lg object-cover"
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
                                @foreach ([['Status', 'Swasta Terakreditasi B'], ['Jenjang', 'Madrasah Ibtidaiyah (SD)'], ['Berdiri', '2013'], ['NPSN', '69854296'], ['Kota', 'Palangka Raya, Kalteng'], ['Siswa', $jumlahSiswa . ' Siswa'], ['Guru & Staff', $jumlahGuru . ' Orang']] as [$label, $value])
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
                                    MIS Fathul Iman Kota Palangka Raya merupakan lembaga pendidikan dasar berbasis Islam
                                    yang berada di bawah naungan Yayasan Fathul Iman. Didirikan pada tahun 2013,
                                    madrasah ini hadir sebagai jawaban atas kebutuhan masyarakat akan pendidikan yang
                                    mampu mengintegrasikan ilmu pengetahuan umum dengan nilai-nilai keislaman secara
                                    seimbang. Berlokasi di Jl. RTA. Milono Km. 2,5, Komplek Masjid Fathul Iman, madrasah
                                    ini berada di lingkungan yang strategis dan kondusif untuk kegiatan belajar
                                    mengajar.
                                </p>
                                <p>
                                    Sejak awal berdirinya, MIS Fathul Iman berfokus pada pembentukan generasi yang tidak
                                    hanya cerdas secara akademik, tetapi juga memiliki keimanan yang kuat, akhlakul
                                    karimah, serta keterampilan yang mendukung kehidupan di masa depan. Proses
                                    pembelajaran dirancang secara aktif, kreatif, dan inovatif, serta dipadukan dengan
                                    pembiasaan nilai-nilai religius seperti kegiatan ibadah berjamaah, pembelajaran
                                    Al-Qur’an, dan penguatan karakter dalam kehidupan sehari-hari.
                                </p>
                                <p>
                                    Selain itu, madrasah juga berupaya mengikuti perkembangan zaman dengan memanfaatkan
                                    teknologi dalam proses pembelajaran, sehingga peserta didik memiliki bekal yang
                                    seimbang antara ilmu pengetahuan, keterampilan, dan nilai-nilai spiritual.
                                </p>
                            </div>
                        </div>

                        <!-- Divider -->
                        {{-- <div class="h-px bg-gray-200 dark:bg-gray-800"></div> --}}

                        <!-- Keunggulan -->
                        {{-- <div>
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
                        </div> --}}

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
                                    MIS Fathul Iman berkomitmen untuk memberikan layanan pendidikan yang berkualitas,
                                    adil, dan inklusif bagi seluruh peserta didik tanpa membedakan latar belakang
                                    sosial, ekonomi, maupun budaya. Dengan dukungan tenaga pendidik yang profesional dan
                                    berdedikasi, madrasah terus berupaya menciptakan lingkungan belajar yang religius,
                                    sehat, dan harmonis.
                                </p>
                                <p>
                                    Komitmen ini diwujudkan melalui pengembangan potensi peserta didik secara
                                    menyeluruh, baik dalam bidang akademik maupun non-akademik, serta pembinaan karakter
                                    yang menanamkan nilai disiplin, tanggung jawab, kemandirian, dan cinta tanah air.
                                    MIS Fathul Iman juga terus berupaya meningkatkan mutu pendidikan melalui inovasi
                                    pembelajaran dan pemanfaatan teknologi, sehingga mampu mencetak lulusan yang siap
                                    melanjutkan pendidikan ke jenjang yang lebih tinggi serta memberikan kontribusi
                                    positif bagi masyarakat, bangsa, dan agama.
                                </p>
                            </div>

                            {{-- <blockquote class="mt-6 pl-5 border-l-4 border-primary-dark dark:border-green-500">
                                <p class="text-sm sm:text-base italic text-gray-600 dark:text-gray-400 leading-relaxed">
                                    "Kami hadir bukan hanya untuk mendidik pikiran, tetapi juga untuk
                                    membentuk hati dan jiwa — karena generasi terbaik adalah mereka yang
                                    berilmu sekaligus berakhlak."
                                </p>
                                <cite class="mt-2 block text-xs text-gray-400 dark:text-gray-500 not-italic">
                                    — Kepala Madrasah MIS Fathul Iman
                                </cite>
                            </blockquote> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layout>
