@props(['mitra'])

@php
    $warna = $mitra['warna'] ?? 'green';
    $iconBg = match ($warna) {
        'blue' => 'bg-blue-100 dark:bg-blue-900/40 text-blue-600 dark:text-blue-400',
        'orange' => 'bg-orange-100 dark:bg-orange-900/40 text-orange-600 dark:text-orange-400',
        default => 'bg-green-100 dark:bg-green-900/40 text-primary-dark dark:text-green-400',
    };
    $badgeBg = match ($warna) {
        'blue' => 'bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400',
        'orange' => 'bg-orange-50 dark:bg-orange-900/30 text-orange-600 dark:text-orange-400',
        default => 'bg-green-50 dark:bg-green-900/30 text-primary-dark dark:text-green-400',
    };
    $borderAccent = match ($warna) {
        'blue' => 'border-t-blue-400 dark:border-t-blue-500',
        'orange' => 'border-t-orange-400 dark:border-t-orange-500',
        default => 'border-t-primary dark:border-t-green-500',
    };
@endphp

<div
    class="group flex flex-col bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 border-t-4 {{ $borderAccent }} shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200 overflow-hidden">

    <div class="p-5 sm:p-6 flex-1 flex flex-col">
        <!-- Ikon & Nama -->
        <div class="flex items-start space-x-4">
            <!-- Ikon -->
            <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0 {{ $iconBg }}">
                @if ($mitra['ikon_gambar'])
                    <img src="{{ asset('storage/' . $mitra['ikon_gambar']) }}" alt="Logo {{ $mitra['nama'] }}"
                        class="w-7 h-7 object-contain">
                @else
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                @endif
            </div>

            <!-- Nama & Badge -->
            <div class="flex-1 min-w-0">
                <p class="font-bold text-sm sm:text-base text-gray-900 dark:text-white leading-snug">
                    {{ $mitra['nama'] }}
                </p>
                <span class="inline-block mt-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium {{ $badgeBg }}">
                    {{ $mitra['label'] }}
                </span>
            </div>
        </div>

        <!-- Deskripsi -->
        <p class="mt-4 text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed flex-1">
            {{ $mitra['deskripsi'] }}
        </p>
    </div>
</div>
