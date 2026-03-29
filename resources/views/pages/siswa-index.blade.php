<x-layout>
    <main>
        <x-hero-banner :title="$title" :subtitle="$subtitle" :breadcrumbs="$breadcrumbs" />

        <section class="bg-gray-50 dark:bg-gray-950 transition-colors duration-300">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">

                <!-- Pengantar -->
                <div class="max-w-3xl mx-auto text-center mb-12">
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400 leading-relaxed">
                        Berikut adalah daftar kelas yang aktif di MIS Fathul Iman. Pilih kelas untuk melihat
                        daftar seluruh siswa aktif pada kelas tersebut.
                    </p>
                </div>

                <!-- Grid kartu kelas -->
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-5">
                    @foreach ($kelas as $k)
                        <a href="{{ route('siswa.kelas', $k['slug']) }}"
                            class="group flex flex-col items-center justify-center bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-md hover:-translate-y-1 hover:border-primary dark:hover:border-green-500 transition-all duration-200 p-6 sm:p-8 cursor-pointer">

                            <!-- Ikon kelas -->
                            <div
                                class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-green-100 dark:bg-green-900/40 flex items-center justify-center mb-4 group-hover:bg-primary group-hover:text-white dark:group-hover:bg-green-600 transition-colors duration-200">
                                <svg class="w-7 h-7 text-primary-dark dark:text-green-400 group-hover:text-white transition-colors duration-200"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>

                            <!-- Nama kelas -->
                            <p
                                class="font-extrabold text-base sm:text-lg text-gray-900 dark:text-white text-center leading-tight">
                                {{ $k['nama'] }}
                            </p>

                            <!-- Jumlah siswa -->
                            <p class="mt-1.5 text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                                {{ $k['jumlah_siswa'] }} siswa
                            </p>

                            <!-- Wali kelas -->
                            <p class="mt-1 text-xs text-gray-400 dark:text-gray-500 text-center truncate w-full">
                                Wali: {{ $k['wali_kelas'] }}
                            </p>

                            <!-- Panah -->
                            <div
                                class="mt-4 flex items-center text-xs font-semibold text-primary-dark dark:text-green-400 group-hover:text-primary dark:group-hover:text-green-300 transition-colors duration-200">
                                <span>Lihat Siswa</span>
                                <svg class="w-3.5 h-3.5 ml-1 group-hover:translate-x-1 transition-transform duration-200"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </a>
                    @endforeach
                </div>

            </div>
        </section>
    </main>
</x-layout>
