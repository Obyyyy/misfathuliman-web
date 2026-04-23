{{-- resources/views/filament/forms/components/lokasi-button-pulang.blade.php --}}
<div style="display: flex; align-items: flex-end; padding-bottom: 0.25rem;">
    <button type="button" onclick="ambilLokasiPulang()"
        style="
            padding: 0.5rem 1rem;
            background: rgb(217 119 6);
            color: white;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
        ">
        📍 Ambil Lokasi Pulang
    </button>
</div>

<script>
    function ambilLokasiPulang() {
        if (!navigator.geolocation) {
            alert('Browser tidak mendukung GPS.');
            return;
        }

        navigator.geolocation.getCurrentPosition(
            function(pos) {
                const lat = pos.coords.latitude;
                const lng = pos.coords.longitude;

                const latField = document.querySelector('[wire\\:model*="lat_pulang"]');
                const lngField = document.querySelector('[wire\\:model*="lng_pulang"]');

                if (latField) {
                    latField.value = lat;
                    latField.dispatchEvent(new Event('input'));
                }
                if (lngField) {
                    lngField.value = lng;
                    lngField.dispatchEvent(new Event('input'));
                }

                alert('Lokasi pulang berhasil diambil:\n' + lat.toFixed(6) + ', ' + lng.toFixed(6));
            },
            function(err) {
                if (err.code === err.PERMISSION_DENIED) {
                    alert('Akses lokasi ditolak. Silakan izinkan akses lokasi di browser.');
                } else if (err.code === err.POSITION_UNAVAILABLE) {
                    alert('Lokasi tidak tersedia. Pastikan GPS aktif.');
                }
            }, {
                enableHighAccuracy: true,
                timeout: 15000,
                maximumAge: 0
            }
        );
    }
</script>
