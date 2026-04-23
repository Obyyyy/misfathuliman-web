{{-- resources/views/filament/forms/components/lokasi-button-masuk.blade.php --}}
<div style="display: flex; align-items: flex-end; padding-bottom: 0.25rem;">
    <button type="button" onclick="ambilLokasi('masuk')"
        style="
            padding: 0.5rem 1rem;
            background: rgb(22 163 74);
            color: white;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
        ">
        📍 Ambil Lokasi Masuk
    </button>
</div>

<script>
    function ambilLokasi(tipe) {
        if (!navigator.geolocation) {
            alert('Browser tidak mendukung GPS.');
            return;
        }

        navigator.geolocation.getCurrentPosition(
            function(pos) {
                const lat = pos.coords.latitude;
                const lng = pos.coords.longitude;

                const latField = document.querySelector('[wire\\:model*="lat_' + tipe + '"]');
                const lngField = document.querySelector('[wire\\:model*="lng_' + tipe + '"]');

                if (latField) {
                    latField.value = lat;
                    latField.dispatchEvent(new Event('input'));
                }
                if (lngField) {
                    lngField.value = lng;
                    lngField.dispatchEvent(new Event('input'));
                }

                alert('Lokasi ' + tipe + ' berhasil diambil:\n' + lat.toFixed(6) + ', ' + lng.toFixed(6));
            },
            function(err) {
                // Hanya tampilkan error jika bukan karena timeout atau permission pending
                if (err.code === err.PERMISSION_DENIED) {
                    alert('Akses lokasi ditolak. Silakan izinkan akses lokasi di browser.');
                } else if (err.code === err.POSITION_UNAVAILABLE) {
                    alert('Lokasi tidak tersedia. Pastikan GPS aktif.');
                }
                // err.TIMEOUT tidak ditampilkan agar tidak mengganggu
            }, {
                enableHighAccuracy: true,
                timeout: 15000, // tunggu 15 detik
                maximumAge: 0
            }
        );
    }
</script>
