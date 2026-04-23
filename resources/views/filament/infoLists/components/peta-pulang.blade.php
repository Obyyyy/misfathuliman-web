{{-- resources/views/filament/infolists/components/peta-pulang.blade.php --}}
@php $record = $getRecord(); @endphp
<div style="border-radius: 0.75rem; overflow: hidden; height: 250px; margin-top: 0.5rem;">
    <iframe width="100%" height="100%" frameborder="0" referrerpolicy="no-referrer-when-downgrade"
        src="https://maps.google.com/maps?q={{ $record->lat_pulang }},{{ $record->lng_pulang }}&z=17&output=embed"
        allowfullscreen>
    </iframe>
</div>
<div style="margin-top: 0.5rem;">
    <a href="https://maps.google.com/?q={{ $record->lat_pulang }},{{ $record->lng_pulang }}" target="_blank"
        style="font-size: 0.75rem; color: #2563eb; text-decoration: none;">
        🔗 Buka lokasi pulang di Google Maps
    </a>
</div>
