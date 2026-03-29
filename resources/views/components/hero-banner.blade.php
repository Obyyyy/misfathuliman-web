@props([
    'title' => 'Halaman',
    'subtitle' => '',
    'breadcrumbs' => [],
])

<section class="relative bg-primary dark:bg-gray-900 overflow-hidden transition-colors duration-300">
    <div class="absolute inset-0 opacity-10 dark:opacity-5"
        style="background-image: radial-gradient(circle at 20% 50%, white 1px, transparent 1px), radial-gradient(circle at 80% 20%, white 1px, transparent 1px); background-size: 40px 40px;">
    </div>
    <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">

        {{-- Breadcrumb --}}
        @if (!empty($breadcrumbs))
            <nav class="flex items-center space-x-2 text-xs sm:text-sm text-green-100 dark:text-gray-400 mb-4"
                aria-label="Breadcrumb">
                @foreach ($breadcrumbs as $crumb)
                    @if (!$loop->last)
                        <a href="{{ $crumb['url'] }}"
                            class="hover:text-white dark:hover:text-gray-200 transition-colors duration-150">
                            {{ $crumb['label'] }}
                        </a>
                        <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    @else
                        <span class="text-white dark:text-gray-200 font-medium">{{ $crumb['label'] }}</span>
                    @endif
                @endforeach
            </nav>
        @endif

        {{-- Judul --}}
        <div class="flex items-center space-x-4">
            <div class="hidden sm:block w-1 h-16 bg-green-300 dark:bg-green-500 rounded-full"></div>
            <div>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white leading-tight">
                    {{ $title }}
                </h1>
                @if ($subtitle)
                    <p class="mt-1 text-green-100 dark:text-gray-400 text-sm sm:text-base">
                        {{ $subtitle }}
                    </p>
                @endif
            </div>
        </div>

    </div>
</section>
