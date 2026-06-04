<x-layout>
    {{-- ============================================================
         SEO META TAGS
         Gunakan @section jika layout kamu pakai @yield('seo')
         atau pakai @push('head') jika layout pakai @stack('head')
    ============================================================ --}}
    @push('head')
        {{-- Primary Meta --}}
        <title>{{ $seoTitle }}</title>
        <meta name="description" content="{{ $seoDescription }}">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="{{ $seoCanonical }}">

        {{-- Open Graph (Facebook, WhatsApp, Telegram) --}}
        <meta property="og:type" content="article">
        <meta property="og:title" content="{{ $seoTitle }}">
        <meta property="og:description" content="{{ $seoDescription }}">
        <meta property="og:url" content="{{ $seoCanonical }}">
        <meta property="og:image" content="{{ $seoImage }}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:site_name" content="MIS Fathul Iman">
        <meta property="og:locale" content="id_ID">
        <meta property="article:published_time" content="{{ $post->tanggal->toIso8601String() }}">
        <meta property="article:modified_time" content="{{ $post->updated_at->toIso8601String() }}">
        <meta property="article:section" content="{{ $post->kategoriBerita?->judul ?? 'Berita' }}">

        {{-- Twitter Card --}}
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $seoTitle }}">
        <meta name="twitter:description" content="{{ $seoDescription }}">
        <meta name="twitter:image" content="{{ $seoImage }}">

        {{-- JSON-LD: NewsArticle --}}
        <script type="application/ld+json">{!! json_encode($jsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>

        {{-- JSON-LD: BreadcrumbList --}}
        <script type="application/ld+json">{!! json_encode($jsonLdBreadcrumb, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
    @endpush

    <main>
        <x-hero-banner :title="$title" :subtitle="$subtitle" :breadcrumbs="$breadcrumbs" />

        <section class="bg-gray-50 dark:bg-gray-950 transition-colors duration-300">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-10 items-start">

                    <!-- ======== KOLOM KIRI: Isi Postingan ======== -->
                    <article class="lg:col-span-2" itemscope itemtype="https://schema.org/NewsArticle">

                        {{-- Microdata tersembunyi untuk mesin pencari --}}
                        <meta itemprop="headline" content="{{ $post->judul }}">
                        <meta itemprop="description" content="{{ $seoDescription }}">
                        <meta itemprop="datePublished" content="{{ $post->tanggal->toIso8601String() }}">
                        <meta itemprop="dateModified" content="{{ $post->updated_at->toIso8601String() }}">
                        <meta itemprop="image" content="{{ $seoImage }}">

                        <div
                            class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm overflow-hidden transition-colors duration-300">

                            <div class="p-6 sm:p-8">
                                <!-- Judul — pakai h1 eksplisit untuk SEO -->
                                <h1 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-gray-900 dark:text-white leading-snug"
                                    itemprop="name">
                                    {{ $post->judul }}
                                </h1>

                                <!-- Meta info -->
                                <div
                                    class="flex flex-wrap items-center gap-x-5 gap-y-2 mt-4 pb-5 border-b border-gray-100 dark:border-gray-700 text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                                    <!-- Penulis -->
                                    <span class="flex items-center gap-1.5" itemprop="author" itemscope
                                        itemtype="https://schema.org/Person">
                                        <div
                                            class="w-6 h-6 rounded-full bg-green-100 dark:bg-green-900/50 flex items-center justify-center flex-shrink-0">
                                            <svg class="w-3.5 h-3.5 text-primary-dark dark:text-green-400"
                                                fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path
                                                    d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z" />
                                            </svg>
                                        </div>
                                        <span class="font-medium text-gray-700 dark:text-gray-300"
                                            itemprop="name">{{ $post->user->name ?? 'Admin Madrasah' }}</span>
                                    </span>
                                    <!-- Tanggal -->
                                    <time datetime="{{ $post->tanggal->toIso8601String() }}" itemprop="datePublished"
                                        class="flex items-center gap-1.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ $post->tanggal->translatedFormat('d F Y') }}
                                    </time>
                                    <!-- Views -->
                                    <span class="flex items-center gap-1.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        {{ number_format($post->views) }} kali dilihat
                                    </span>
                                </div>

                                <!-- Isi konten -->
                                <div itemprop="articleBody"
                                    class="mt-6 prose prose-sm sm:prose-base max-w-none
                                    prose-headings:font-extrabold prose-headings:text-gray-900
                                    prose-p:text-gray-700 prose-p:leading-relaxed
                                    prose-a:text-primary-dark prose-a:no-underline hover:prose-a:underline
                                    prose-strong:text-gray-900
                                    prose-img:rounded-xl prose-img:w-full prose-img:shadow-md prose-img:my-6
                                    prose-ul:text-gray-700 prose-ol:text-gray-700
                                    dark:prose-headings:text-white
                                    dark:prose-p:text-gray-300
                                    dark:prose-strong:text-white
                                    dark:prose-ul:text-gray-300
                                    dark:prose-ol:text-gray-300
                                    dark:prose-a:text-green-400">

                                    {{-- Thumbnail di awal konten --}}
                                    @if ($post->thumbnail)
                                        <img src="{{ asset('storage/' . $post->thumbnail) }}"
                                            alt="{{ $post->judul }}" width="800" height="450" loading="lazy"
                                            fetchpriority="high" itemprop="image"
                                            class="w-[60%] mx-auto rounded-xl shadow-md mb-6 object-cover">
                                    @endif

                                    {!! $post->konten !!}
                                </div>

                                <!-- Share -->
                                <div
                                    class="mt-8 pt-6 border-t border-gray-100 dark:border-gray-700 flex flex-wrap items-center gap-3">
                                    <span
                                        class="text-xs font-semibold uppercase tracking-widest text-gray-400 dark:text-gray-500">Bagikan:</span>
                                    <!-- WhatsApp -->
                                    <a href="https://wa.me/?text={{ urlencode($post->judul . ' ' . url()->current()) }}"
                                        target="_blank" rel="noopener noreferrer" aria-label="Bagikan ke WhatsApp"
                                        class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-green-50 dark:bg-green-900/30 text-green-700 dark:text-green-400 hover:bg-green-100 dark:hover:bg-green-900/50 transition-colors duration-150 cursor-pointer">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"
                                            aria-hidden="true">
                                            <path
                                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                        </svg>
                                        WhatsApp
                                    </a>
                                    <!-- Copy link -->
                                    <button
                                        onclick="navigator.clipboard.writeText(window.location.href); this.textContent='✓ Tersalin!'; setTimeout(()=>this.textContent='Salin Link',2000)"
                                        aria-label="Salin tautan artikel"
                                        class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-150 cursor-pointer">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                        </svg>
                                        Salin Link
                                    </button>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- ======== KOLOM KANAN: Sidebar ======== -->
                    <aside aria-label="Sidebar berita" class="space-y-6">
                        <x-berita-sidebar :postinganTerbaru="$postinganTerbaru" :kategoriList="$kategoriList" />
                    </aside>

                </div>
            </div>
        </section>
    </main>
</x-layout>
