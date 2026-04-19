@props(['postinganTerbaru', 'kategoriList'])

<!-- Kategori -->
<div
    class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm overflow-hidden transition-colors duration-300">
    <div class="px-5 py-4 border-b border-gray-100 dark:border-gray-700">
        <h3 class="font-extrabold text-sm text-gray-900 dark:text-white">Kategori</h3>
    </div>
    <div class="divide-y divide-gray-100 dark:divide-gray-700">
        @foreach ($kategoriList as $index => $kat)
            <a href="{{ route('berita.index', ['kategori' => $kat->slug]) }}"
                class="flex items-center justify-between px-5 py-3 text-sm text-gray-700 dark:text-gray-300 hover:bg-green-50 dark:hover:bg-gray-700 hover:text-primary-dark dark:hover:text-green-400 transition-colors duration-150 cursor-pointer group">
                <span class="flex items-center gap-2">
                    <span
                        class="w-2 h-2 rounded-full
                        {{ match ($index % 3) {
                            0 => 'bg-blue-400',
                            1 => 'bg-yellow-400',
                            2 => 'bg-green-400',
                        } }}">
                    </span>
                    {{ $kat->judul }}
                </span>
                <span
                    class="text-xs font-semibold px-2 py-0.5 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 group-hover:bg-primary-dark group-hover:text-white dark:group-hover:bg-green-600 transition-colors duration-150">
                    {{ $kat->berita->count() }}
                </span>
            </a>
        @endforeach
    </div>
</div>

<!-- Postingan terbaru -->
<div
    class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm overflow-hidden transition-colors duration-300">
    <div class="px-5 py-4 border-b border-gray-100 dark:border-gray-700">
        <h3 class="font-extrabold text-sm text-gray-900 dark:text-white">Berita Terbaru</h3>
    </div>
    <div class="divide-y divide-gray-100 dark:divide-gray-700">
        @foreach ($postinganTerbaru as $p)
            <a href="{{ route('berita.show', $p['slug']) }}"
                class="flex items-start gap-3 px-4 py-3.5 hover:bg-green-50 dark:hover:bg-gray-700 transition-colors duration-150 cursor-pointer group">
                <!-- Thumbnail kecil -->
                <div
                    class="w-16 h-14 rounded-lg overflow-hidden bg-gradient-to-br from-primary/20 to-primary-dark/30 dark:from-gray-700 dark:to-gray-600 flex-shrink-0">
                    @if ($p->thumbnail)
                        <img src="{{ asset('storage/' . $p->thumbnail) }}" alt="{{ $p->judul }}"
                            class="w-full h-full object-cover" onerror="this.style.display='none'">
                    @endif
                </div>
                <!-- Info -->
                <div class="flex-1 min-w-0">
                    <p
                        class="text-xs sm:text-sm font-semibold text-gray-800 dark:text-gray-200 group-hover:text-primary-dark dark:group-hover:text-green-400 line-clamp-2 leading-snug transition-colors duration-150">
                        {{ $p->judul }}
                    </p>
                    <p class="mt-1 text-xs text-gray-400 dark:text-gray-500 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ \Carbon\Carbon::parse($p->tanggal)->translatedFormat('d M Y') }}
                    </p>
                </div>
            </a>
        @endforeach
    </div>
</div>

<!-- Postingan terpopuler -->
{{-- <div
    class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm overflow-hidden transition-colors duration-300">
    <div class="px-5 py-4 border-b border-gray-100 dark:border-gray-700">
        <h3 class="font-extrabold text-sm text-gray-900 dark:text-white">Paling Banyak Dibaca</h3>
    </div>
    <div class="divide-y divide-gray-100 dark:divide-gray-700">
        @foreach (collect($postinganTerbaru)->sortByDesc('views')->take(5) as $i => $p)
            <a href="{{ route('berita.show', $p['slug']) }}"
                class="flex items-center gap-3 px-4 py-3.5 hover:bg-green-50 dark:hover:bg-gray-700 transition-colors duration-150 cursor-pointer group">
                <!-- Nomor urut -->
                <span
                    class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0 text-xs font-extrabold
                    {{ $i === 0 ? 'bg-yellow-400 text-yellow-900' : 'bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400' }}">
                    {{ $i + 1 }}
                </span>
                <div class="flex-1 min-w-0">
                    <p
                        class="text-xs sm:text-sm font-semibold text-gray-800 dark:text-gray-200 group-hover:text-primary-dark dark:group-hover:text-green-400 line-clamp-2 leading-snug transition-colors duration-150">
                        {{ $p['judul'] }}
                    </p>
                    <p class="mt-0.5 text-xs text-gray-400 dark:text-gray-500 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        {{ number_format($p['views']) }} dilihat
                    </p>
                </div>
            </a>
        @endforeach
    </div>
</div> --}}
