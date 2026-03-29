<!-- NAVBAR -->
<header class="bg-primary dark:bg-gray-900 shadow-md sticky top-0 z-30 transition-colors duration-300">
    <nav class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Left: Logo + Name -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/miftahuliman-logo.png') }}" alt="Logo MIS Fathul Iman"
                    class="w-10 h-10 md:w-12 md:h-12 rounded-full object-cover shadow-sm ">
                <div class="flex flex-col">
                    <span class="text-white font-bold text-lg md:text-2xl leading-tight">
                        <a href="/">MIS FATHUL IMAN</a>
                    </span>
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6 text-sm font-medium">
                <a href="/"
                    class="text-white hover:text-green-200 dark:hover:text-green-300 transition-colors duration-200">
                    Beranda
                </a>

                <!-- Dropdown Berita -->
                <div class="relative">
                    <button id="btnBeritaDesktop" type="button"
                        class="inline-flex items-center text-white hover:text-green-200 dark:hover:text-green-300 transition-colors duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/80 rounded-md px-2 py-1 cursor-pointer">
                        <span>Berita</span>
                        <svg class="w-4 h-4 ml-1 transition-transform duration-200" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="menuBeritaDesktop"
                        class="hidden absolute right-0 mt-2 w-64 rounded-lg shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black/5 dark:ring-white/10 overflow-hidden transition-colors duration-300">
                        <div class="py-2 text-sm text-gray-700 dark:text-gray-200">
                            <a href="{{ route('berita.index') }}"
                                class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-150">Indeks
                                Berita</a>
                            <a href="{{ route('berita.index', ['kategori' => 'program-kerja']) }}"
                                class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-150">Program
                                Kerja</a>
                            <a href="{{ route('berita.index', ['kategori' => 'prestasi-siswa']) }}"
                                class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-150">Prestasi
                                Siswa</a>
                        </div>
                    </div>
                </div>

                <!-- Dropdown Profil -->
                <div class="relative">
                    <button id="btnProfilDesktop" type="button"
                        class="inline-flex items-center text-white hover:text-green-200 dark:hover:text-green-300 transition-colors duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/80 rounded-md px-2 py-1 cursor-pointer">
                        <span>Profil</span>
                        <svg class="w-4 h-4 ml-1 transition-transform duration-200" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="menuProfilDesktop"
                        class="hidden absolute right-0 mt-2 w-64 rounded-lg shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black/5 dark:ring-white/10 overflow-hidden transition-colors duration-300">
                        <div class="py-2 text-sm text-gray-700 dark:text-gray-200">
                            <a href="{{ route('profile') }}"
                                class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-150">Profile
                                Sekolah</a>
                            <a href="{{ route('visimisi') }}"
                                class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-150">Visi
                                &amp; Misi</a>
                            <a href="{{ route('sejarah') }}"
                                class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-150">Sejarah
                                Singkat Madrasah</a>
                            <a href="{{ route('pengajar') }}"
                                class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-150">Guru
                                dan Tata Usaha</a>
                            <a href="{{ route('siswa.index') }}"
                                class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-150">Siswa</a>
                            <a href="#struktur-organisasi"
                                class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-150">Struktur
                                Organisasi</a>
                            <a href="{{ route('kerjasama') }}"
                                class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-150">Kerjasama</a>
                        </div>
                    </div>
                </div>

                <a href="{{ route('kontak') }}"
                    class="text-white hover:text-green-200 dark:hover:text-green-300 transition-colors duration-200">
                    Kontak
                </a>

                <!-- Dark Mode Toggle (Desktop) -->
                <button id="btnDarkToggleDesktop" type="button" aria-label="Toggle dark mode"
                    class="relative inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 dark:bg-white/5 dark:hover:bg-white/15 text-white transition-all duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/80">
                    <!-- Sun icon (shown in dark mode) -->
                    <svg id="iconSunDesktop" class="hidden w-5 h-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707M17.657 17.657l-.707-.707M6.343 6.343l-.707-.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <!-- Moon icon (shown in light mode) -->
                    <svg id="iconMoonDesktop" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>
            </div>

            <!-- Mobile: Dark Toggle + Hamburger -->
            <div class="md:hidden flex items-center space-x-1">
                <!-- Dark Mode Toggle (Mobile) -->
                <button id="btnDarkToggleMobile" type="button" aria-label="Toggle dark mode"
                    class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-primary-dark dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-white/80 transition-colors duration-200">
                    <svg id="iconSunMobile" class="hidden h-5 w-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707M17.657 17.657l-.707-.707M6.343 6.343l-.707-.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <svg id="iconMoonMobile" class="h-5 w-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                <!-- Hamburger -->
                <button id="btnMobileMenu" type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-primary-dark dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-white/80 transition-colors duration-200"
                    aria-expanded="false">
                    <span class="sr-only">Buka menu utama</span>
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path id="iconHamburger" class="inline-flex" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden border-t border-green-500/60 dark:border-gray-700">
            <div class="py-3 space-y-1 text-sm font-medium text-white">
                <a href="/"
                    class="block px-2 py-2 rounded hover:bg-primary-dark dark:hover:bg-gray-700 transition-colors duration-150">
                    Beranda
                </a>

                <!-- Mobile Dropdown Berita -->
                <div class="border-t border-green-500/50 dark:border-gray-700 pt-2 mt-2">
                    <button id="btnBeritaMobile" type="button"
                        class="w-full flex items-center justify-between px-2 py-2 rounded hover:bg-primary-dark dark:hover:bg-gray-700 transition-colors duration-150 focus:outline-none">
                        <span>Berita</span>
                        <svg class="w-4 h-4 ml-1 transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path id="iconBeritaMobile" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div id="menuBeritaMobile"
                        class="hidden mt-1 pl-3 text-sm text-green-50 dark:text-green-200 space-y-1">
                        <a href="{{ route('berita.index') }}"
                            class="block px-2 py-1 rounded hover:bg-primary-dark/60 dark:hover:bg-gray-700 transition-colors duration-150">Indeks
                            Berita</a>
                        <a href="{{ route('berita.index', ['kategori' => 'program-kerja']) }}"
                            class="block px-2 py-1 rounded hover:bg-primary-dark/60 dark:hover:bg-gray-700 transition-colors duration-150">Program
                            Kerja</a>
                        <a href="{{ route('berita.index', ['kategori' => 'prestasi-siswa']) }}"
                            class="block px-2 py-1 rounded hover:bg-primary-dark/60 dark:hover:bg-gray-700 transition-colors duration-150">Prestasi
                            Siswa</a>
                    </div>
                </div>

                <!-- Mobile Dropdown Profil -->
                <div class="border-t border-green-500/50 dark:border-gray-700 pt-2 mt-2">
                    <button id="btnProfilMobile" type="button"
                        class="w-full flex items-center justify-between px-2 py-2 rounded hover:bg-primary-dark dark:hover:bg-gray-700 transition-colors duration-150 focus:outline-none">
                        <span>Profil</span>
                        <svg class="w-4 h-4 ml-1 transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path id="iconProfilMobile" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div id="menuProfilMobile"
                        class="hidden mt-1 pl-3 text-sm text-green-50 dark:text-green-200 space-y-1">
                        <a href="{{ route('profile') }}"
                            class="block px-2 py-1 rounded hover:bg-primary-dark/60 dark:hover:bg-gray-700 transition-colors duration-150">Profile
                            Sekolah</a>
                        <a href="{{ route('visimisi') }}"
                            class="block px-2 py-1 rounded hover:bg-primary-dark/60 dark:hover:bg-gray-700 transition-colors duration-150">Visi
                            &amp; Misi</a>
                        <a href="{{ route('sejarah') }}"
                            class="block px-2 py-1 rounded hover:bg-primary-dark/60 dark:hover:bg-gray-700 transition-colors duration-150">Sejarah
                            Singkat Madrasah</a>
                        <a href="{{ route('pengajar') }}"
                            class="block px-2 py-1 rounded hover:bg-primary-dark/60 dark:hover:bg-gray-700 transition-colors duration-150">Guru
                            dan Tata Usaha</a>
                        <a href="{{ route('siswa.index') }}"
                            class="block px-2 py-1 rounded hover:bg-primary-dark/60 dark:hover:bg-gray-700 transition-colors duration-150">Siswa</a>
                        <a href="#struktur-organisasi"
                            class="block px-2 py-1 rounded hover:bg-primary-dark/60 dark:hover:bg-gray-700 transition-colors duration-150">Struktur
                            Organisasi</a>
                        <a href="{{ route('kerjasama') }}"
                            class="block px-2 py-1 rounded hover:bg-primary-dark/60 dark:hover:bg-gray-700 transition-colors duration-150">Kerjasama</a>
                    </div>
                </div>

                <a href="{{ route('kontak') }}"
                    class="block px-2 py-2 rounded hover:bg-primary-dark dark:hover:bg-gray-700 transition-colors duration-150">
                    Kontak
                </a>
            </div>
        </div>
    </nav>
</header>
