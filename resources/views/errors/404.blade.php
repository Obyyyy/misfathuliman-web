<!DOCTYPE html>
<html lang="id" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 — Halaman Tidak Ditemukan | MIS Fathul Iman</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes twinkle {

            0%,
            100% {
                opacity: 0.2;
                transform: scale(1);
            }

            50% {
                opacity: 1;
                transform: scale(1.4);
            }
        }

        .star {
            position: absolute;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            animation: twinkle var(--dur, 2s) ease-in-out infinite;
            animation-delay: var(--delay, 0s);
        }
    </style>
</head>

<body
    class="antialiased bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100 transition-colors duration-300 min-h-screen flex flex-col">

    <script>
        (function() {
            const saved = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (saved === 'dark' || (!saved && prefersDark)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    <x-navbar />

    <main class="flex-1 flex items-center justify-center px-4 py-20 relative overflow-hidden">

        {{-- Background bintang --}}
        <div class="absolute inset-0 pointer-events-none" id="errorStars"></div>

        <div class="text-center max-w-lg mx-auto relative z-10">

            {{-- Angka 404 --}}
            <div class="mb-6">
                <p
                    class="text-[120px] sm:text-[160px] font-extrabold leading-none
                    text-transparent bg-clip-text
                    bg-gradient-to-br from-green-500 to-emerald-700
                    dark:from-green-400 dark:to-emerald-500
                    select-none">
                    404
                </p>
            </div>

            {{-- Pesan --}}
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 dark:text-white mb-3">
                    Halaman Tidak Ditemukan
                </h1>
                <p class="text-gray-500 dark:text-gray-400 text-sm sm:text-base leading-relaxed mb-8">
                    Maaf, halaman yang Anda cari tidak tersedia atau mungkin telah dipindahkan.
                    Silakan kembali ke beranda.
                </p>
            </div>

            {{-- Tombol --}}
            <div class="flex flex-wrap gap-3 justify-center">
                <a href="{{ url('/') }}"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl
                        bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600
                        text-white font-semibold text-sm transition-colors duration-200 shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Kembali ke Beranda
                </a>
                {{-- <button onclick="history.back()"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl
                        border border-gray-300 dark:border-gray-600
                        bg-white dark:bg-gray-800
                        text-gray-700 dark:text-gray-300
                        hover:bg-gray-50 dark:hover:bg-gray-700
                        font-semibold text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Halaman Sebelumnya
                </button> --}}
            </div>

        </div>
    </main>

    <x-footer />

    <x-error-scripts />

    <script>
        // Bintang latar
        const container = document.getElementById('errorStars');
        for (let i = 0; i < 30; i++) {
            const s = document.createElement('div');
            s.className = 'star';
            const size = Math.random() * 3 + 1;
            s.style.cssText = `
            width:${size}px; height:${size}px;
            top:${Math.random()*100}%; left:${Math.random()*100}%;
            --dur:${Math.random()*2+1.5}s; --delay:${Math.random()*2}s;
        `;
            container.appendChild(s);
        }
    </script>
</body>

</html>
