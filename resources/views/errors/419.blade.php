<!DOCTYPE html>
<html lang="id" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>419 — Sesi Berakhir | MIS Fathul Iman</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="antialiased bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100 transition-colors duration-300 min-h-screen flex flex-col">

    <x-navbar />

    <main class="flex-1 flex items-center justify-center px-4 py-20">
        <div class="text-center max-w-lg mx-auto">
            <div class="text-7xl mb-6">⏰</div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 dark:text-white mb-3">
                Sesi Anda Telah Berakhir
            </h1>
            <p class="text-gray-500 dark:text-gray-400 text-sm sm:text-base leading-relaxed mb-8">
                Halaman ini sudah kedaluwarsa karena sesi Anda berakhir.
                Silakan refresh halaman dan coba lagi.
            </p>
            <div class="flex flex-wrap gap-3 justify-center">
                <button onclick="location.reload()"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-green-600 hover:bg-green-700 text-white font-semibold text-sm transition-colors duration-200 shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Refresh Halaman
                </button>
                <a href="{{ url('/') }}"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 font-semibold text-sm transition-colors duration-200">
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </main>

    <x-footer />
    <x-error-scripts />
</body>

</html>
