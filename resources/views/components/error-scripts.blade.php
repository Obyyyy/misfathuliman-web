<script>
    // Dark mode
    (function() {
        const saved = localStorage.getItem('theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        if (saved === 'dark' || (!saved && prefersDark)) {
            document.documentElement.classList.add('dark');
        }
    })();
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // =============================================
        // DARK MODE TOGGLE
        // =============================================
        function updateDarkIcons(isDark) {
            const ids = ['iconSunDesktop', 'iconMoonDesktop', 'iconSunMobile', 'iconMoonMobile'];
            const sunIds = ['iconSunDesktop', 'iconSunMobile'];
            const moonIds = ['iconMoonDesktop', 'iconMoonMobile'];
            sunIds.forEach(id => {
                const el = document.getElementById(id);
                if (el) el.classList.toggle('hidden', !isDark);
            });
            moonIds.forEach(id => {
                const el = document.getElementById(id);
                if (el) el.classList.toggle('hidden', isDark);
            });
        }

        function toggleDark() {
            const isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            updateDarkIcons(isDark);
        }

        updateDarkIcons(document.documentElement.classList.contains('dark'));

        const btnDarkDesktop = document.getElementById('btnDarkToggleDesktop');
        const btnDarkMobile = document.getElementById('btnDarkToggleMobile');
        if (btnDarkDesktop) btnDarkDesktop.addEventListener('click', toggleDark);
        if (btnDarkMobile) btnDarkMobile.addEventListener('click', toggleDark);

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
        // DROPDOWN DESKTOP
        // =============================================
        const desktopDropdowns = [{
                btn: document.getElementById('btnBeritaDesktop'),
                menu: document.getElementById('menuBeritaDesktop')
            },
            {
                btn: document.getElementById('btnProfilDesktop'),
                menu: document.getElementById('menuProfilDesktop')
            },
        ];

        function closeAllDesktop(except = null) {
            desktopDropdowns.forEach(function(d) {
                if (d.menu && d.menu !== except) d.menu.classList.add('hidden');
            });
        }

        desktopDropdowns.forEach(function(d) {
            if (!d.btn || !d.menu) return;
            d.btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const willOpen = d.menu.classList.contains('hidden');
                closeAllDesktop();
                if (willOpen) d.menu.classList.remove('hidden');
            });
        });

        document.addEventListener('click', function(e) {
            const inside = desktopDropdowns.some(function(d) {
                return (d.btn && d.btn.contains(e.target)) || (d.menu && d.menu.contains(e
                    .target));
            });
            if (!inside) closeAllDesktop();
        });

        // =============================================
        // DROPDOWN MOBILE
        // =============================================
        const mobileDropdowns = [{
                btn: document.getElementById('btnBeritaMobile'),
                menu: document.getElementById('menuBeritaMobile'),
                icon: document.getElementById('iconBeritaMobile')
            },
            {
                btn: document.getElementById('btnProfilMobile'),
                menu: document.getElementById('menuProfilMobile'),
                icon: document.getElementById('iconProfilMobile')
            },
        ];

        function closeAllMobile(except = null) {
            mobileDropdowns.forEach(function(d) {
                if (d.menu && d.menu !== except) {
                    d.menu.classList.add('hidden');
                    if (d.icon) d.icon.parentElement.style.transform = 'rotate(0deg)';
                }
            });
        }

        mobileDropdowns.forEach(function(d) {
            if (!d.btn || !d.menu) return;
            d.btn.addEventListener('click', function() {
                const willOpen = d.menu.classList.contains('hidden');
                closeAllMobile();
                if (willOpen) {
                    d.menu.classList.remove('hidden');
                    if (d.icon) d.icon.parentElement.style.transform = 'rotate(180deg)';
                }
            });
        });

    });
</script>
