<?php

namespace App\Providers;

use App\Models\Gambar;
use App\View\Composers\FooterComposer;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.footer', FooterComposer::class);
        View::composer('components.navbar', function ($view) {
            $logo = Gambar::where('jenis', 'Logo Sekolah')->first();
            $view->with('logoSekolah', $logo);
        });

        // Paksa https untuk testing deploy ngrok
        // URL::forceScheme('https');

        // Batasi login maksimal 5x per menit per IP
        // RateLimiter::for('login', function (Request $request) {
        //     return Limit::perMinute(5)->by($request->ip());
        // });
    }
}