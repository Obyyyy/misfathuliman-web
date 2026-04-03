<x-layout>
    <main>
        <x-hero-banner :title="$title" :subtitle="$subtitle" :breadcrumbs="$breadcrumbs" />

        <section class="bg-gray-50 dark:bg-gray-950 transition-colors duration-300">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">

                <div
                    class="bg-white dark:bg-gray-900 rounded-3xl border border-gray-100 dark:border-gray-800 shadow-sm overflow-hidden">

                    <!-- Header kartu -->
                    <div
                        class="px-6 sm:px-8 py-5 border-b border-gray-100 dark:border-gray-800 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-9 h-9 rounded-xl bg-green-100 dark:bg-green-900/40 flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary-dark dark:text-green-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-sm text-gray-900 dark:text-white">Bagan Struktur Organisasi</p>
                                <p class="text-xs text-gray-400 dark:text-gray-500">MIS Fathul Iman Palangka Raya</p>
                            </div>
                        </div>

                        <!-- Tombol buka gambar fullscreen -->
                        <a href="{{ asset('storage/' . $gambar->gambar) }}" target="_blank"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-medium border border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-150">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            Buka Penuh
                        </a>
                    </div>

                    <!-- Area gambar -->
                    <div class="p-4 sm:p-6 lg:p-8">
                        <div id="imgWrapper"
                            class="relative w-full rounded-2xl overflow-hidden bg-gray-50 dark:bg-gray-800 border border-gray-100 dark:border-gray-700 flex items-center justify-center min-h-64">

                            <!-- Gambar struktur -->
                            <img src="{{ asset('storage/' . $gambar->gambar) }}"
                                alt="Bagan Struktur Organisasi MIS Fathul Iman" id="imgStruktur"
                                class="w-full h-auto object-contain cursor-zoom-in"
                                onerror="this.style.display='none'; document.getElementById('imgFallback').style.display='flex'">

                            <!-- Fallback jika gambar belum ada -->
                            <div id="imgFallback"
                                class="hidden flex-col items-center justify-center py-20 px-6 text-center w-full">
                                <div
                                    class="w-20 h-20 rounded-2xl bg-gray-100 dark:bg-gray-700 flex items-center justify-center mb-4">
                                    <svg class="w-10 h-10 text-gray-300 dark:text-gray-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <p class="font-semibold text-sm text-gray-500 dark:text-gray-400">Gambar belum tersedia
                                </p>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </main>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Load gambar via data-src
                const img = document.getElementById('imgStruktur');
                if (img) {
                    img.src = img.getAttribute('src');
                }

                // Klik gambar → buka di tab baru (zoom penuh)
                img?.addEventListener('click', function() {
                    if (this.style.display !== 'none') {
                        window.open(this.getAttribute('src'), '_blank');
                    }
                });
            });
        </script>
    @endpush
</x-layout>
