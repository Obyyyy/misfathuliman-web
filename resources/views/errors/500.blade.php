<!DOCTYPE html>
<html lang="id" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 — Terjadi Kesalahan | MIS Fathul Iman</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="antialiased bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100 transition-colors duration-300 min-h-screen flex flex-col">

    <x-navbar />

    <main class="flex-1 flex items-center justify-center px-4 py-20">
        <div class="text-center max-w-lg mx-auto">
            <p
                class="text-[120px] sm:text-[160px] font-extrabold leading-none text-transparent bg-clip-text bg-gradient-to-br from-red-500 to-rose-700 dark:from-red-400 dark:to-rose-500 select-none mb-6">
                500
            </p>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 dark:text-white mb-3">
                Terjadi Kesalahan Server
            </h1>
            <p class="text-gray-500 dark:text-gray-400 text-sm sm:text-base leading-relaxed mb-8">
                Maaf, terjadi kesalahan pada server kami. Tim teknis sedang menangani masalah ini.
                Silakan coba beberapa saat lagi.
            </p>
            <div class="flex flex-wrap gap-3 justify-center">
                <a href="{{ url('/') }}"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-green-600 hover:bg-green-700 text-white font-semibold text-sm transition-colors duration-200 shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Kembali ke Beranda
                </a>
                <button onclick="location.reload()"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 font-semibold text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Coba Lagi
                </button>
            </div>
        </div>
    </main>

    <x-footer />
    <x-error-scripts />
</body>

</html>
