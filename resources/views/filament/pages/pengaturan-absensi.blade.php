<x-filament-panels::page>
    {{ $this->form }}

    <div class="mt-6 flex justify-end">
        <x-filament::button type="submit" icon="heroicon-o-check" wire:click="simpan">
            Simpan Pengaturan
        </x-filament::button>
    </div>
</x-filament-panels::page>
