<?php

namespace App\View\Composers;

use App\Models\Kontak;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class FooterComposer
{
    public function compose(View $view): void
    {
        // Cache 60 menit agar tidak query ke DB setiap request.
        // Cache otomatis terhapus jika data kontak diupdate
        // (lihat KontakObserver atau hapus manual lewat cache:clear).
        $kontakFooter = Cache::remember('kontak_footer', 3600, function () {
            return Kontak::all()->keyBy('name');
        });

        $view->with('kontakFooter', $kontakFooter);
    }
}
