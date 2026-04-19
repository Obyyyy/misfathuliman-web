<x-layout>
    <main>
        <x-hero-banner :title="$title" :subtitle="$subtitle" :breadcrumbs="$breadcrumbs" />

        <!-- KONTEN UTAMA -->
        <section class="bg-gray-50 dark:bg-gray-950 transition-colors duration-300">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">

                <!-- ======== KEPALA MADRASAH ======== -->
                <div class="mb-14">
                    <div class="flex items-center space-x-3 mb-8">
                        <div class="w-1 h-7 bg-primary-dark dark:bg-green-500 rounded-full"></div>
                        <h2 class="text-lg sm:text-xl font-extrabold text-gray-900 dark:text-white">
                            Kepala Madrasah
                        </h2>
                    </div>

                    <!-- Kartu kepala madrasah — lebih besar dan menonjol -->
                    <div class="flex justify-center">
                        <div
                            class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-md overflow-hidden w-full max-w-xs sm:max-w-sm transition-colors duration-300">
                            <!-- Foto -->
                            <div
                                class="relative bg-[#e5020a] h-72 sm:h-96 flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('storage/' . $kepalaMadrasah->foto) }}" alt="Foto Kepala Madrasah"
                                    class="w-full h-full object-cover object-center"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                <!-- Fallback avatar -->
                                <div
                                    class="hidden w-full h-full items-center justify-center bg-gradient-to-br from-primary to-primary-dark">
                                    <svg class="w-20 h-20 text-white/60" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z" />
                                    </svg>
                                </div>
                                <!-- Badge jabatan -->
                                <div class="absolute bottom-3 left-1/2 -translate-x-1/2">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-primary-dark dark:bg-green-600 text-white shadow-md whitespace-nowrap">
                                        Kepala Madrasah
                                    </span>
                                </div>
                            </div>
                            <!-- Info -->
                            <div class="px-5 py-4 text-center">
                                <p class="font-bold text-base sm:text-lg text-gray-900 dark:text-white">
                                    {{ $kepalaMadrasah->name }}
                                </p>
                                {{-- <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-1">
                                    NIP. 19XX0101 XXXX XX X XXX
                                </p> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ======== Guru Kelas ======== -->
                <div class="mb-14">
                    <div class="flex items-center space-x-3 mb-8">
                        <div class="w-1 h-7 bg-primary-dark dark:bg-green-500 rounded-full"></div>
                        <h2 class="text-lg sm:text-xl font-extrabold text-gray-900 dark:text-white">
                            Guru Kelas
                        </h2>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 sm:gap-5">
                        @foreach ($guruKelas as $guru)
                            <div
                                class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm overflow-hidden hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                                <!-- Foto -->
                                <div
                                    class="relative bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 h-36 sm:h-44 flex items-center justify-center overflow-hidden">
                                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto {{ $guru->name }}"
                                        class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-300"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                    <!-- Fallback avatar -->
                                    <div
                                        class="hidden w-full h-full items-center justify-center bg-gradient-to-br from-green-400 to-green-800 dark:from-green-600 dark:to-green-800">
                                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-white/60" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z" />
                                        </svg>
                                    </div>
                                </div>
                                <!-- Info -->
                                <div class="px-3 py-3 text-center">
                                    <p
                                        class="font-semibold text-xs sm:text-sm text-gray-900 dark:text-white leading-tight line-clamp-2">
                                        {{ $guru->name }}
                                    </p>
                                    <span
                                        class="inline-block mt-1.5 px-2 py-0.5 rounded-full text-xs bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 font-medium">
                                        {{ $guru->profilGuru->nama_jabatan }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


                <!-- ======== Guru Mapel ======== -->
                <div class="mb-14">
                    <div class="flex items-center space-x-3 mb-8">
                        <div class="w-1 h-7 bg-primary-dark dark:bg-green-500 rounded-full"></div>
                        <h2 class="text-lg sm:text-xl font-extrabold text-gray-900 dark:text-white">
                            Guru Mapel
                        </h2>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 sm:gap-5">
                        @foreach ($guruMapel as $guru)
                            <div
                                class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm overflow-hidden hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                                <!-- Foto -->
                                <div
                                    class="relative bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 h-36 sm:h-44 flex items-center justify-center overflow-hidden">
                                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto {{ $guru->name }}"
                                        class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-300"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                    <!-- Fallback avatar -->
                                    <div
                                        class="hidden w-full h-full items-center justify-center bg-gradient-to-br from-green-400 to-green-800 dark:from-green-600 dark:to-green-800">
                                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-white/60" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z" />
                                        </svg>
                                    </div>
                                </div>
                                <!-- Info -->
                                <div class="px-3 py-3 text-center">
                                    <p
                                        class="font-semibold text-xs sm:text-sm text-gray-900 dark:text-white leading-tight line-clamp-2">
                                        {{ $guru->name }}
                                    </p>
                                    <span
                                        class="inline-block mt-1.5 px-2 py-0.5 rounded-full text-xs bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 font-medium">
                                        {{ $guru->profilGuru->nama_jabatan }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- ======== TATA USAHA & STAF ======== -->
                <div class="mb-14">
                    <div class="flex items-center space-x-3 mb-8">
                        <div class="w-1 h-7 bg-primary-dark dark:bg-green-500 rounded-full"></div>
                        <h2 class="text-lg sm:text-xl font-extrabold text-gray-900 dark:text-white">
                            Tata Usaha &amp; Staf
                        </h2>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 sm:gap-5">
                        @foreach ($stafSekolah as $staf)
                            <div
                                class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm overflow-hidden hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                                <!-- Foto -->
                                <div
                                    class="relative bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 h-36 sm:h-44 flex items-center justify-center overflow-hidden">
                                    <img src="{{ asset('storage/' . $staf->foto) }}" alt="Foto {{ $staf->name }}"
                                        class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-300"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                    <!-- Fallback avatar -->
                                    <div
                                        class="hidden w-full h-full items-center justify-center bg-gradient-to-br from-green-400 to-green-800 dark:from-green-600 dark:to-green-800">
                                        <svg class="w-12 h-12 sm:w-14 sm:h-14 text-white/60" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z" />
                                        </svg>
                                    </div>
                                </div>
                                <!-- Info -->
                                <div class="px-3 py-3 text-center">
                                    <p
                                        class="font-semibold text-xs sm:text-sm text-gray-900 dark:text-white leading-tight line-clamp-2">
                                        {{ $staf->name }}
                                    </p>
                                    <span
                                        class="inline-block mt-1.5 px-2 py-0.5 rounded-full text-xs bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 font-medium">
                                        {{ $staf->profilGuru->nama_jabatan }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>
    </main>
</x-layout>
