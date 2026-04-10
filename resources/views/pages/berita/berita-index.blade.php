<x-layout>
    <main>
        <x-hero-banner :title="$title" :subtitle="$subtitle" :breadcrumbs="$breadcrumbs" />

        <section class="bg-gray-50 dark:bg-gray-950 transition-colors duration-300">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">

                <!-- Filter kategori -->
                <div class="flex flex-wrap items-center gap-2 mb-10">
                    <a href="{{ route('berita.index') }}"
                        class="px-4 py-1.5 rounded-full text-xs sm:text-sm font-semibold transition-all duration-150 cursor-pointer
                            {{ !$kategoriAktif
                                ? 'bg-primary-dark dark:bg-green-600 text-white shadow-sm'
                                : 'bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-400 border border-gray-200 dark:border-gray-700 hover:border-primary-dark dark:hover:border-green-500 hover:text-primary-dark dark:hover:text-green-400' }}">
                        Semua
                    </a>
                    @foreach ($kategoriList as $kat)
                        <a href="{{ route('berita.index', ['kategori' => $kat->slug]) }}"
                            class="px-4 py-1.5 rounded-full text-xs sm:text-sm font-semibold transition-all duration-150 cursor-pointer
                                {{ $kategoriAktif === $kat->slug
                                    ? 'bg-primary-dark dark:bg-green-600 text-white shadow-sm'
                                    : 'bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-400 border border-gray-200 dark:border-gray-700 hover:border-primary-dark dark:hover:border-green-500 hover:text-primary-dark dark:hover:text-green-400' }}">
                            {{ $kat->judul }}
                        </a>
                    @endforeach
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-10 items-start">

                    <!-- ======== KOLOM KIRI: Daftar Postingan ======== -->
                    <div class="lg:col-span-2">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-6">

                            @forelse ($semuaBerita as $post)
                                <article
                                    class="group flex flex-col bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-md overflow-hidden transition-all duration-200">
                                    <a href="{{ route('berita.show', $post->slug) }}" class="block cursor-pointer">
                                        <!-- Thumbnail -->
                                        <div
                                            class="relative h-44 bg-gradient-to-br from-primary/20 to-primary-dark/30 dark:from-gray-700 dark:to-gray-600 overflow-hidden">
                                            @if ($post->thumbnail)
                                                <img src="{{ 'storage/' . $post->thumbnail }}" alt="{{ $post->judul }}"
                                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                                    onerror="this.style.display='none'">
                                            @endif
                                            <!-- Badge kategori -->
                                            @if ($post->kategoriBerita)
                                                <div class="absolute top-3 left-3">
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-yellow-400 text-yellow-900">
                                                        {{ $post->kategoriBerita->judul }}
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    </a>

                                    <div class="flex flex-col flex-1 p-4 sm:p-5">
                                        <!-- Meta info -->
                                        <div
                                            class="flex flex-wrap items-center gap-x-3 gap-y-1 text-xs text-gray-400 dark:text-gray-500 mb-2.5">
                                            <span class="flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                {{ $post->tanggal->translatedFormat('d M Y') }}
                                            </span>
                                            {{-- <span class="flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                {{ number_format($post->views) }}
                                            </span> --}}
                                        </div>

                                        <!-- Judul -->
                                        <a href="{{ route('berita.show', $post->slug) }}" class="cursor-pointer">
                                            <h2
                                                class="font-extrabold text-sm sm:text-base text-gray-900 dark:text-white leading-snug group-hover:text-primary-dark dark:group-hover:text-green-400 transition-colors duration-150 line-clamp-2">
                                                {{ $post->judul }}
                                            </h2>
                                        </a>

                                        <!-- Baca selengkapnya -->
                                        <a href="{{ route('berita.show', $post->slug) }}"
                                            class="inline-flex items-center mt-4 text-xs font-semibold text-primary-dark dark:text-green-400 hover:text-primary-darker dark:hover:text-green-300 transition-colors duration-150 cursor-pointer">
                                            Baca Selengkapnya
                                            <svg class="w-3 h-3 ml-1 group-hover:translate-x-1 transition-transform duration-150"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </div>
                                </article>
                            @empty
                                <div class="col-span-2 text-center py-16 text-gray-400 dark:text-gray-500">
                                    <svg class="w-12 h-12 mx-auto mb-3 opacity-40" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                    </svg>
                                    <p class="text-sm">Belum ada postingan pada kategori ini.</p>
                                </div>
                            @endforelse

                        </div>

                        <!-- Pagination -->
                        <div class="mt-8">
                            {{ $semuaBerita->links() }}
                        </div>
                    </div>

                    <!-- ======== KOLOM KANAN: Sidebar ======== -->
                    <div class="space-y-6">
                        <x-berita-sidebar :postinganTerbaru="$postinganTerbaru" :kategoriList="$kategoriList" />
                    </div>

                </div>
            </div>
        </section>
    </main>

    {{-- @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('img[data-src]').forEach(function(img) {
                    img.src = img.getAttribute('data-src');
                });
            });
        </script>
    @endpush --}}
</x-layout>
