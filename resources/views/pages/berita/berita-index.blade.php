<x-layout>
    @push('head')
        {{-- Primary Meta --}}
        <title>{{ $seoTitle }}</title>
        <meta name="description" content="{{ $seoDescription }}">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="{{ $seoCanonical }}">

        {{-- Open Graph --}}
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $seoTitle }}">
        <meta property="og:description" content="{{ $seoDescription }}">
        <meta property="og:url" content="{{ $seoCanonical }}">
        <meta property="og:image" content="{{ asset('images/og-default.jpg') }}">
        <meta property="og:site_name" content="MIS Fathul Iman">
        <meta property="og:locale" content="id_ID">

        {{-- Twitter Card --}}
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $seoTitle }}">
        <meta name="twitter:description" content="{{ $seoDescription }}">
        <meta name="twitter:image" content="{{ asset('images/og-default.jpg') }}">

        {{-- Pagination SEO: cegah duplicate content antar halaman --}}
        @if ($semuaBerita->currentPage() > 1)
            <meta name="robots" content="noindex, follow">
        @endif
        @if ($semuaBerita->previousPageUrl())
            <link rel="prev" href="{{ $semuaBerita->previousPageUrl() }}">
        @endif
        @if ($semuaBerita->nextPageUrl())
            <link rel="next" href="{{ $semuaBerita->nextPageUrl() }}">
        @endif

        {{-- JSON-LD: ItemList untuk daftar berita --}}
        <script type="application/ld+json">
        {!! json_encode([
            '@context'        => 'https://schema.org',
            '@type'           => 'ItemList',
            'name'            => $seoTitle,
            'url'             => $seoCanonical,
            'numberOfItems'   => $semuaBerita->total(),
            'itemListElement' => $semuaBerita->map(fn($post, $i) => [
                '@type'    => 'ListItem',
                'position' => (($semuaBerita->currentPage() - 1) * $semuaBerita->perPage()) + $i + 1,
                'url'      => route('berita.show', $post->slug),
                'name'     => $post->judul,
            ])->toArray(),
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
        </script>
    @endpush

    <main>
        <x-hero-banner :title="$title" :subtitle="$subtitle" :breadcrumbs="$breadcrumbs" />

        <section class="bg-gray-50 dark:bg-gray-950 transition-colors duration-300">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">

                <!-- Filter kategori -->
                <nav aria-label="Filter kategori berita" class="flex flex-wrap items-center gap-2 mb-10">
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
                </nav>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-10 items-start">

                    <!-- ======== KOLOM KIRI: Daftar Postingan ======== -->
                    <div class="lg:col-span-2">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-6">

                            @forelse ($semuaBerita as $index => $post)
                                <article
                                    class="group flex flex-col bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-md overflow-hidden transition-all duration-200"
                                    itemscope itemtype="https://schema.org/NewsArticle">

                                    <meta itemprop="headline" content="{{ $post->judul }}">
                                    <meta itemprop="datePublished" content="{{ $post->tanggal->toIso8601String() }}">
                                    <meta itemprop="url" content="{{ route('berita.show', $post->slug) }}">

                                    <a href="{{ route('berita.show', $post->slug) }}"
                                        aria-label="Baca berita: {{ $post->judul }}" class="block cursor-pointer">
                                        <!-- Thumbnail -->
                                        <div
                                            class="relative h-44 bg-gradient-to-br from-primary/20 to-primary-dark/30 dark:from-gray-700 dark:to-gray-600 overflow-hidden">
                                            @if ($post->thumbnail)
                                                <img src="{{ asset('storage/' . $post->thumbnail) }}"
                                                    alt="Thumbnail berita {{ $post->judul }}" width="400"
                                                    height="176" {{-- Eager load 2 kartu pertama, lazy load sisanya --}}
                                                    loading="{{ $index < 2 ? 'eager' : 'lazy' }}" itemprop="image"
                                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                                    onerror="this.style.display='none'">
                                            @endif
                                            <!-- Badge kategori -->
                                            @if ($post->kategoriBerita)
                                                <div class="absolute top-3 left-3">
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold {{ match ($post->kategoriBerita->id % 3) {
                                                            0 => 'bg-green-400 text-green-900',
                                                            1 => 'bg-blue-400 text-blue-900',
                                                            2 => 'bg-yellow-400 text-yellow-900',
                                                        } }}">
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
                                            <time datetime="{{ $post->tanggal->toIso8601String() }}"
                                                itemprop="datePublished" class="flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                {{ $post->tanggal->translatedFormat('d M Y') }}
                                            </time>
                                        </div>

                                        <!-- Judul -->
                                        <a href="{{ route('berita.show', $post->slug) }}" class="cursor-pointer">
                                            <h2 class="font-extrabold text-sm sm:text-base text-gray-900 dark:text-white leading-snug group-hover:text-primary-dark dark:group-hover:text-green-400 transition-colors duration-150 line-clamp-2"
                                                itemprop="name">
                                                {{ $post->judul }}
                                            </h2>
                                        </a>

                                        <!-- Baca selengkapnya -->
                                        <a href="{{ route('berita.show', $post->slug) }}"
                                            aria-label="Baca selengkapnya: {{ $post->judul }}"
                                            class="inline-flex items-center mt-4 text-xs font-semibold text-primary-dark dark:text-green-400 hover:text-primary-darker dark:hover:text-green-300 transition-colors duration-150 cursor-pointer">
                                            Baca Selengkapnya
                                            <svg class="w-3 h-3 ml-1 group-hover:translate-x-1 transition-transform duration-150"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </div>
                                </article>
                            @empty
                                <div class="col-span-2 text-center py-16 text-gray-400 dark:text-gray-500">
                                    <svg class="w-12 h-12 mx-auto mb-3 opacity-40" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" aria-hidden="true">
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
                    <aside aria-label="Sidebar berita" class="space-y-6">
                        <x-berita-sidebar :postinganTerbaru="$postinganTerbaru" :kategoriList="$kategoriList" />
                    </aside>

                </div>
            </div>
        </section>
    </main>
</x-layout>
