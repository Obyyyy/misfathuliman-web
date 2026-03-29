<!DOCTYPE html>
<html lang="id" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MIS Fathul Iman - Website</title>
    @vite('resources/css/app.css')
    <style>
        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }

        /* @keyframes tidak bisa diganti Tailwind */
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

        @keyframes orbitSpin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes starPulse {

            0%,
            100% {
                transform: scale(1) rotate(0deg);
                filter: drop-shadow(0 0 8px rgba(255, 220, 100, 0.6));
            }

            50% {
                transform: scale(1.15) rotate(22.5deg);
                filter: drop-shadow(0 0 16px rgba(255, 220, 100, 1));
            }
        }

        @keyframes progressFill {
            0% {
                width: 0%;
            }

            60% {
                width: 80%;
            }

            100% {
                width: 100%;
            }
        }

        @keyframes shimmer {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        @keyframes floatUp {
            0% {
                transform: translateY(0) scale(1);
                opacity: 0.8;
            }

            100% {
                transform: translateY(-80px) scale(0);
                opacity: 0;
            }
        }

        @keyframes fadeSlideUp {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounceUp {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-4px);
            }
        }

        /* Fade-out loader — toggle class dari JS */
        #pageLoader.fade-out {
            opacity: 0;
            visibility: hidden;
        }

        /* Bintang & partikel — posisi dari JS via inline style CSS var */
        .star {
            position: absolute;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            animation: twinkle var(--dur, 2s) ease-in-out infinite;
            animation-delay: var(--delay, 0s);
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: rgba(253, 230, 138, 0.7);
            animation: floatUp var(--dur, 3s) ease-in infinite;
            animation-delay: var(--delay, 0s);
            left: var(--x, 50%);
            bottom: 10%;
        }

        /* Cincin orbit — ::before tidak bisa pakai Tailwind */
        .orbit-ring::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 50%;
            border: 2px dashed rgba(255, 255, 255, 0.15);
        }

        /* Bulan sabit — posisi absolut dengan top negatif & translate */
        .moon-crescent {
            position: absolute;
            top: -14px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 26px;
            line-height: 1;
            filter: drop-shadow(0 0 6px rgba(255, 220, 100, 0.8));
        }

        /* Bintang segi delapan — clip-path tidak bisa Tailwind */
        .star-octagram {
            animation: starPulse 2s ease-in-out infinite;
        }

        .star-octagram::before,
        .star-octagram::after {
            content: '';
            position: absolute;
            inset: 0;
            background: #fde68a;
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
        }

        .star-octagram::after {
            transform: rotate(45deg);
        }

        /* Teks Bismillah — clamp() & text-shadow tidak bisa Tailwind */
        .bismillah-text {
            font-size: clamp(20px, 5vw, 28px);
            text-shadow: 0 2px 12px rgba(0, 0, 0, 0.3);
            animation: fadeSlideUp 0.8s ease 0.3s both;
        }

        /* Progress bar — gradient animasi & background-size tidak bisa Tailwind */
        .loader-progress {
            background: linear-gradient(90deg, #86efac, #fde68a, #86efac);
            background-size: 200% 100%;
            animation: progressFill 1.8s ease forwards, shimmer 1.5s linear infinite;
        }

        /* Subtitle loader */
        .loader-subtitle {
            animation: fadeSlideUp 0.8s ease 0.5s both;
        }

        /* Back to top — state invisible (dikontrol JS via .visible) */
        #btnBackToTop {
            opacity: 0;
            transform: translateY(16px) scale(0.9);
            pointer-events: none;
            transition: opacity 0.3s ease, transform 0.3s ease, background-color 0.2s ease, box-shadow 0.2s ease;
        }

        #btnBackToTop.visible {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: auto;
        }

        #btnBackToTop:hover #arrowIcon {
            animation: bounceUp 0.6s ease infinite;
        }

        #btnBackToTop:active {
            transform: scale(0.92);
        }
    </style>
</head>

<body class="antialiased bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100 transition-colors duration-300">

    <!-- =============================================
         PAGE LOADER
    ============================================= -->
    <div id="pageLoader" aria-hidden="true"
        class="fixed inset-0 z-[9999] flex flex-col items-center justify-center
               transition-[opacity,visibility] duration-500"
        style="background: linear-gradient(135deg, #1a4731 0%, #2d7a4f 50%, #1a4731 100%);">

        <!-- Bintang latar -->
        <div class="absolute inset-0 overflow-hidden" id="loaderStars"></div>

        <!-- Partikel cahaya -->
        <div id="loaderParticles"></div>

        <!-- Animasi utama -->
        <div class="orbit-ring relative w-40 h-40">
            <!-- Bulan sabit berputar -->
            <div class="moon-orbit absolute inset-0" style="animation: orbitSpin 3s linear infinite;">
                <span class="moon-crescent">☽</span>
            </div>
            <!-- Bintang segi delapan di tengah -->
            <div class="star-center absolute inset-0 flex items-center justify-center">
                <div class="star-octagram relative w-13 h-13" style="width:52px;height:52px;"></div>
            </div>
        </div>

        <!-- Teks Bismillah -->
        <div class="bismillah-text mt-7 text-center tracking-wide font-serif text-amber-200">
            بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم
        </div>

        <!-- Subtitle -->
        <div class="loader-subtitle mt-2 text-center tracking-widest uppercase text-white/60 text-xs">
            MIS Fathul Iman &nbsp;·&nbsp; Palangka Raya
        </div>

        <!-- Progress bar -->
        <div class="loader-progress absolute bottom-0 left-0 h-[3px] w-0 rounded-r-sm"></div>
    </div>
    <x-navbar></x-navbar>

    {{-- Isi Tiap File --}}
    {{ $slot }}

    <x-footer></x-footer>

    <!-- =============================================
        TOMBOL BACK TO TOP
        ============================================= -->
    <button id="btnBackToTop" type="button" aria-label="Kembali ke atas" title="Kembali ke atas"
        class="fixed bottom-5 right-5 sm:bottom-7 sm:right-7 z-50
            w-11 h-11 sm:w-12 sm:h-12
            flex items-center justify-center
            rounded-full
            bg-primary dark:bg-green-600
            text-white
            shadow-lg shadow-primary-dark/40 dark:shadow-green-900/50
            hover:bg-primary-darker dark:hover:bg-green-500
            hover:shadow-xl hover:shadow-primary-dark/50
            focus:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2
            dark:focus-visible:ring-offset-gray-950">
        <svg id="arrowIcon" class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7" />
        </svg>
    </button>

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script>
        // =============================================
        // PAGE LOADER
        // =============================================
        (function() {
            const loader = document.getElementById('pageLoader');

            // Buat bintang latar acak
            const starsContainer = document.getElementById('loaderStars');
            for (let i = 0; i < 40; i++) {
                const s = document.createElement('div');
                s.className = 'star';
                const size = Math.random() * 3 + 1;
                s.style.cssText = `
                    width: ${size}px; height: ${size}px;
                    top: ${Math.random() * 100}%;
                    left: ${Math.random() * 100}%;
                    --dur: ${Math.random() * 2 + 1.5}s;
                    --delay: ${Math.random() * 2}s;
                `;
                starsContainer.appendChild(s);
            }

            // Buat partikel cahaya melayang
            const particlesContainer = document.getElementById('loaderParticles');
            for (let i = 0; i < 10; i++) {
                const p = document.createElement('div');
                p.className = 'particle';
                p.style.cssText = `
                    --x: ${Math.random() * 80 + 10}%;
                    --dur: ${Math.random() * 2 + 2}s;
                    --delay: ${Math.random() * 3}s;
                `;
                particlesContainer.appendChild(p);
            }

            // Sembunyikan loader setelah halaman siap
            function hideLoader() {
                setTimeout(function() {
                    loader.classList.add('fade-out');
                    setTimeout(function() {
                        loader.style.display = 'none';
                    }, 500);
                }, 1800);
            }

            if (document.readyState === 'complete') {
                hideLoader();
            } else {
                window.addEventListener('load', hideLoader);
            }
        })();

        // =============================================
        // DARK MODE — jalankan SEBELUM render agar tidak flash
        // =============================================
        (function() {
            const saved = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (saved === 'dark' || (!saved && prefersDark)) {
                document.documentElement.classList.add('dark');
            }
        })();

        // Dynamic year
        document.getElementById('yearSpan').textContent = new Date().getFullYear();

        // =============================================
        // TOGGLE DARK MODE
        // =============================================
        function updateDarkIcons(isDark) {
            document.getElementById('iconSunDesktop').classList.toggle('hidden', !isDark);
            document.getElementById('iconMoonDesktop').classList.toggle('hidden', isDark);
            document.getElementById('iconSunMobile').classList.toggle('hidden', !isDark);
            document.getElementById('iconMoonMobile').classList.toggle('hidden', isDark);
        }

        function toggleDark() {
            const isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            updateDarkIcons(isDark);
        }

        updateDarkIcons(document.documentElement.classList.contains('dark'));

        document.getElementById('btnDarkToggleDesktop').addEventListener('click', toggleDark);
        document.getElementById('btnDarkToggleMobile').addEventListener('click', toggleDark);

        // =============================================
        // BACK TO TOP
        // =============================================
        const btnBackToTop = document.getElementById('btnBackToTop');

        // Tampilkan tombol setelah scroll 300px
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                btnBackToTop.classList.add('visible');
            } else {
                btnBackToTop.classList.remove('visible');
            }
        }, {
            passive: true
        });

        // Scroll halus ke atas saat diklik
        btnBackToTop.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // =============================================
        // MOBILE MENU
        // =============================================
        const btnMobileMenu = document.getElementById('btnMobileMenu');
        const mobileMenu = document.getElementById('mobileMenu');

        if (btnMobileMenu && mobileMenu) {
            btnMobileMenu.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // =============================================
        // DROPDOWN — DESKTOP & MOBILE (MUTUAL CLOSE)
        // =============================================

        // Daftar semua dropdown desktop: { btn, menu }
        const desktopDropdowns = [{
                btn: document.getElementById('btnBeritaDesktop'),
                menu: document.getElementById('menuBeritaDesktop'),
            },
            {
                btn: document.getElementById('btnProfilDesktop'),
                menu: document.getElementById('menuProfilDesktop'),
            },
        ];

        // Tutup semua dropdown desktop kecuali yang dikecualikan
        function closeAllDesktop(except = null) {
            desktopDropdowns.forEach(function(d) {
                if (d.menu && d.menu !== except) {
                    d.menu.classList.add('hidden');
                }
            });
        }

        // Pasang listener ke setiap dropdown desktop
        desktopDropdowns.forEach(function(d) {
            if (!d.btn || !d.menu) return;

            d.btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const willOpen = d.menu.classList.contains('hidden');
                closeAllDesktop(); // tutup semua dulu
                if (willOpen) d.menu.classList.remove('hidden');
            });
        });

        // Klik di luar → tutup semua dropdown desktop
        document.addEventListener('click', function(e) {
            const clickedInsideAny = desktopDropdowns.some(function(d) {
                return (d.btn && d.btn.contains(e.target)) ||
                    (d.menu && d.menu.contains(e.target));
            });
            if (!clickedInsideAny) closeAllDesktop();
        });

        // Daftar semua dropdown mobile: { btn, menu, icon }
        const mobileDropdowns = [{
                btn: document.getElementById('btnBeritaMobile'),
                menu: document.getElementById('menuBeritaMobile'),
                icon: document.getElementById('iconBeritaMobile'),
            },
            {
                btn: document.getElementById('btnProfilMobile'),
                menu: document.getElementById('menuProfilMobile'),
                icon: document.getElementById('iconProfilMobile'),
            },
        ];

        // Tutup semua dropdown mobile kecuali yang dikecualikan
        function closeAllMobile(except = null) {
            mobileDropdowns.forEach(function(d) {
                if (d.menu && d.menu !== except) {
                    d.menu.classList.add('hidden');
                    if (d.icon) d.icon.parentElement.style.transform = 'rotate(0deg)';
                }
            });
        }

        // Pasang listener ke setiap dropdown mobile
        mobileDropdowns.forEach(function(d) {
            if (!d.btn || !d.menu) return;

            d.btn.addEventListener('click', function() {
                const willOpen = d.menu.classList.contains('hidden');
                closeAllMobile(); // tutup semua dulu
                if (willOpen) {
                    d.menu.classList.remove('hidden');
                    if (d.icon) d.icon.parentElement.style.transform = 'rotate(180deg)';
                }
            });
        });
    </script>
</body>

</html>
