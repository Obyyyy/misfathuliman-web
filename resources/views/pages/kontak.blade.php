<x-layout>
    <main>
        <x-hero-banner :title="$title" :subtitle="$subtitle" :breadcrumbs="$breadcrumbs" />

        <section class="bg-gray-50 dark:bg-gray-950 transition-colors duration-300">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-14 items-start">

                    <!-- ======== KOLOM KIRI: Form Kontak ======== -->
                    <div>
                        <div class="flex items-center space-x-3 mb-6">
                            <div class="w-1 h-7 bg-primary-dark dark:bg-green-500 rounded-full"></div>
                            <h2 class="text-lg sm:text-xl font-extrabold text-gray-900 dark:text-white">
                                Kirim Pesan
                            </h2>
                        </div>

                        <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400 leading-relaxed mb-7">
                            Silakan isi form di bawah untuk mengirim pesan kepada kami. Kami akan membalas
                            secepatnya pada jam operasional madrasah.
                        </p>

                        {{-- Flash success --}}
                        @if (session('success'))
                            <div
                                class="flex items-start space-x-3 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-700 rounded-xl px-4 py-3 mb-6">
                                <svg class="w-5 h-5 text-green-500 dark:text-green-400 flex-shrink-0 mt-0.5"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-sm text-green-700 dark:text-green-300 font-medium">
                                    {{ session('success') }}
                                </p>
                            </div>
                        @endif

                        {{-- Flash error --}}
                        @if (session('error'))
                            <div
                                class="flex items-start space-x-3 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-700 rounded-xl px-4 py-3 mb-6">
                                <svg class="w-5 h-5 text-red-500 dark:text-red-400 flex-shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-sm text-red-700 dark:text-red-300 font-medium">
                                    {{ session('error') }}
                                </p>
                            </div>
                        @endif

                        <form action="{{ route('kontak.kirim') }}" method="POST" class="space-y-5">
                            @csrf

                            <!-- Nama -->
                            <div>
                                <label for="nama"
                                    class="block text-xs sm:text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                                    Nama Lengkap <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                                    placeholder="Masukkan nama lengkap Anda" required
                                    class="w-full px-4 py-2.5 rounded-xl border text-sm
                                        bg-white dark:bg-gray-800
                                        text-gray-900 dark:text-gray-100
                                        placeholder-gray-400 dark:placeholder-gray-500
                                        border-gray-200 dark:border-gray-700
                                        focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary
                                        dark:focus:ring-green-500/40 dark:focus:border-green-500
                                        transition-colors duration-200
                                        @error('nama') border-red-400 dark:border-red-500 @enderror">
                                @error('nama')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email"
                                    class="block text-xs sm:text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                                    Alamat Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    placeholder="contoh@email.com" required
                                    class="w-full px-4 py-2.5 rounded-xl border text-sm
                                        bg-white dark:bg-gray-800
                                        text-gray-900 dark:text-gray-100
                                        placeholder-gray-400 dark:placeholder-gray-500
                                        border-gray-200 dark:border-gray-700
                                        focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary
                                        dark:focus:ring-green-500/40 dark:focus:border-green-500
                                        transition-colors duration-200
                                        @error('email') border-red-400 dark:border-red-500 @enderror">
                                @error('email')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- No HP -->
                            <div>
                                <label for="telepon"
                                    class="block text-xs sm:text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                                    Nomor Telepon
                                    <span class="text-gray-400 dark:text-gray-500 font-normal">(opsional)</span>
                                </label>
                                <input type="tel" id="telepon" name="telepon" value="{{ old('telepon') }}"
                                    placeholder="08xx xxxx xxxx"
                                    class="w-full px-4 py-2.5 rounded-xl border text-sm
                                        bg-white dark:bg-gray-800
                                        text-gray-900 dark:text-gray-100
                                        placeholder-gray-400 dark:placeholder-gray-500
                                        border-gray-200 dark:border-gray-700
                                        focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary
                                        dark:focus:ring-green-500/40 dark:focus:border-green-500
                                        transition-colors duration-200">
                            </div>

                            <!-- Subjek -->
                            <div>
                                <label for="subjek"
                                    class="block text-xs sm:text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                                    Subjek <span class="text-red-500">*</span>
                                </label>
                                <select id="subjek" name="subjek" required
                                    class="w-full px-4 py-2.5 rounded-xl border text-sm
                                        bg-white dark:bg-gray-800
                                        text-gray-900 dark:text-gray-100
                                        border-gray-200 dark:border-gray-700
                                        focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary
                                        dark:focus:ring-green-500/40 dark:focus:border-green-500
                                        transition-colors duration-200
                                        @error('subjek') border-red-400 dark:border-red-500 @enderror">
                                    <option value="" disabled {{ old('subjek') ? '' : 'selected' }}>
                                        -- Pilih subjek pesan --
                                    </option>
                                    @foreach (['Informasi Pendaftaran (PPDB)', 'Informasi Akademik', 'Kerjasama / Kemitraan', 'Pengaduan / Saran', 'Lainnya'] as $opt)
                                        <option value="{{ $opt }}"
                                            {{ old('subjek') === $opt ? 'selected' : '' }}>
                                            {{ $opt }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('subjek')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Pesan -->
                            <div>
                                <label for="pesan"
                                    class="block text-xs sm:text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1.5">
                                    Pesan <span class="text-red-500">*</span>
                                </label>
                                <textarea id="pesan" name="pesan" rows="5" placeholder="Tulis pesan Anda di sini..." required
                                    class="w-full px-4 py-2.5 rounded-xl border text-sm resize-none
                                        bg-white dark:bg-gray-800
                                        text-gray-900 dark:text-gray-100
                                        placeholder-gray-400 dark:placeholder-gray-500
                                        border-gray-200 dark:border-gray-700
                                        focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary
                                        dark:focus:ring-green-500/40 dark:focus:border-green-500
                                        transition-colors duration-200
                                        @error('pesan') border-red-400 dark:border-red-500 @enderror">{{ old('pesan') }}</textarea>
                                @error('pesan')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tombol kirim -->
                            <button type="submit"
                                class="w-full inline-flex items-center justify-center px-6 py-3 rounded-xl
                                    bg-primary-dark dark:bg-green-600 text-white text-sm font-semibold
                                    hover:bg-primary-darker dark:hover:bg-green-700
                                    focus:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2
                                    transition-all duration-200 shadow-md hover:shadow-lg cursor-pointer">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Kirim Pesan
                            </button>
                        </form>
                    </div>

                    <!-- ======== KOLOM KANAN: Info & Maps ======== -->
                    <div class="space-y-6">

                        <!-- Info kontak -->
                        <div>
                            <div class="flex items-center space-x-3 mb-6">
                                <div class="w-1 h-7 bg-primary-dark dark:bg-green-500 rounded-full"></div>
                                <h2 class="text-lg sm:text-xl font-extrabold text-gray-900 dark:text-white">
                                    Informasi Kontak
                                </h2>
                            </div>

                            <div class="space-y-3">
                                <div
                                    class="flex items-start space-x-3 bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 p-4 transition-colors duration-300">
                                    <div
                                        class="w-9 h-9 rounded-lg bg-green-100 dark:bg-green-900/40 flex items-center justify-center flex-shrink-0 text-primary-dark dark:text-green-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 12.414C12.633 11.633 11.367 11.633 10.586 12.414L6.343 16.657M8 10a4 4 0 118 0 4 4 0 01-8 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p
                                            class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">
                                            {{ $contacts->where('name', 'Alamat')->first()->name }}
                                        </p>
                                        <p class="mt-0.5 text-sm text-gray-800 dark:text-gray-200 leading-relaxed">
                                            {{ $contacts->where('name', 'Alamat')->first()->value }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div
                                    class="flex items-start space-x-3 bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 p-4 transition-colors duration-300">
                                    <div
                                        class="w-9 h-9 rounded-lg bg-green-100 dark:bg-green-900/40 flex items-center justify-center flex-shrink-0 text-primary-dark dark:text-green-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p
                                            class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">
                                            {{ $contacts->where('name', 'Email')->first()->name }}
                                        </p>
                                        <p class="mt-0.5 text-sm text-gray-800 dark:text-gray-200 leading-relaxed">
                                            {{ $contacts->where('name', 'Email')->first()->value }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Telepon -->
                                <div
                                    class="flex items-start space-x-3 bg-white dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700 p-4 transition-colors duration-300">
                                    <div
                                        class="w-9 h-9 rounded-lg bg-green-100 dark:bg-green-900/40 flex items-center justify-center flex-shrink-0 text-primary-dark dark:text-green-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498A1 1 0 0121 18.72V22a2 2 0 01-2 2h-1C9.82 24 4 18.18 4 11V10a2 2 0 012-2z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p
                                            class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">
                                            {{ $contacts->where('name', 'Telepon')->first()->name }}
                                        </p>
                                        <p class="mt-0.5 text-sm text-gray-800 dark:text-gray-200 leading-relaxed">
                                            {{ $contacts->where('name', 'Telepon')->first()->value }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Google Maps -->
                        <div>
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-1 h-7 bg-primary-dark dark:bg-green-500 rounded-full"></div>
                                <h2 class="text-lg sm:text-xl font-extrabold text-gray-900 dark:text-white">
                                    Lokasi Madrasah
                                </h2>
                            </div>

                            <div
                                class="rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700 shadow-sm">
                                {{--
                                    Ganti src di bawah dengan embed link Google Maps lokasi sekolah.
                                    Caranya:
                                    1. Buka maps.google.com
                                    2. Cari lokasi sekolah
                                    3. Klik "Bagikan" → "Sematkan peta"
                                    4. Salin URL yang ada di dalam src="..."
                                --}}
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.7935822825357!2d113.9176917101!3d-2.2311686373785413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dfcb37f3f88475d%3A0x930d211781aeaf32!2sFathul%20Iman%20Mosque!5e0!3m2!1sen!2sid!4v1774249419015!5m2!1sen!2sid"
                                    width="100%" height="320" style="border:0;" allowfullscreen=""
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                    title="Lokasi MIS Fathul Iman di Google Maps" class="w-full">
                                </iframe>

                                <!-- Tombol buka di Google Maps -->
                                <a href="https://maps.google.com/?q=MIS+Fathul+Iman+Palangka+Raya" target="_blank"
                                    rel="noopener noreferrer"
                                    class="flex items-center justify-center space-x-2 w-full py-3 bg-white dark:bg-gray-800
                                        text-sm font-semibold text-primary-dark dark:text-green-400
                                        hover:bg-green-50 dark:hover:bg-gray-700
                                        border-t border-gray-100 dark:border-gray-700
                                        transition-colors duration-150 cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                    <span>Buka di Google Maps</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layout>
