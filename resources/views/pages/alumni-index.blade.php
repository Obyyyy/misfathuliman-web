<x-layout>
    <main>
        <x-hero-banner :title="$title" :subtitle="$subtitle" :breadcrumbs="$breadcrumbs" />

        <section class="bg-gray-50 dark:bg-gray-950 transition-colors duration-300">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">

                <!-- Pengantar -->
                <div class="max-w-3xl mx-auto text-center mb-12">
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400 leading-relaxed">
                        Berikut adalah data alumni MIS Fathul Iman berdasarkan tahun kelulusan.
                        Pilih tahun untuk melihat daftar seluruh alumni pada angkatan tersebut.
                    </p>
                </div>

                <!-- Statistik ringkas -->
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-10 max-w-2xl mx-auto">
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm p-5 text-center">
                        <p class="text-2xl sm:text-3xl font-extrabold text-primary-dark dark:text-green-400">
                            {{ count($angkatan) }}
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 uppercase tracking-wider font-semibold">
                            Angkatan</p>
                    </div>
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm p-5 text-center">
                        <p class="text-2xl sm:text-3xl font-extrabold text-primary-dark dark:text-green-400">
                            {{ collect($angkatan)->sum('jumlah') }}
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 uppercase tracking-wider font-semibold">
                            Total Alumni</p>
                    </div>
                    <div
                        class="col-span-2 sm:col-span-1 bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm p-5 text-center">
                        <p class="text-2xl sm:text-3xl font-extrabold text-primary-dark dark:text-green-400">
                            {{ collect($angkatan)->min('tahun') }}
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 uppercase tracking-wider font-semibold">
                            Angkatan Pertama</p>
                    </div>
                </div>

                <!-- Grid kartu angkatan -->
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-5">
                    @foreach ($angkatan as $a)
                        <a href="{{ route('alumni.tahun', $a['tahun']) }}"
                            class="group flex flex-col items-center justify-center bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-md hover:-translate-y-1 hover:border-primary dark:hover:border-green-500 transition-all duration-200 p-6 sm:p-8 cursor-pointer">

                            <!-- Ikon angkatan -->
                            <div
                                class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-amber-50 dark:bg-amber-900/20 flex items-center justify-center mb-4 group-hover:bg-primary dark:group-hover:bg-green-600 transition-colors duration-200">
                                <svg class="w-7 h-7 text-amber-500 dark:text-amber-400 group-hover:text-white transition-colors duration-200"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                </svg>
                            </div>

                            <!-- Tahun angkatan -->
                            <p class="font-extrabold text-xl sm:text-2xl text-gray-900 dark:text-white">
                                {{ $a['tahun'] }}
                            </p>
                            <p
                                class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500 mt-0.5">
                                Angkatan
                            </p>

                            <!-- Jumlah alumni -->
                            <p class="mt-2 text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                                {{ $a['jumlah'] }} alumni
                            </p>

                            <!-- Panah -->
                            <div
                                class="mt-4 flex items-center text-xs font-semibold text-primary-dark dark:text-green-400 group-hover:text-primary dark:group-hover:text-green-300 transition-colors duration-200">
                                <span>Lihat Alumni</span>
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
