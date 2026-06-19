<?php

namespace App\Providers\Filament;

use App\Filament\Pages\AbsensiPage;
use App\Filament\Pages\Auth\Login;
use App\Filament\Pages\EditProfilByGuru;
use App\Filament\Widgets\AdminRekapAbsensiWidget;
use App\Filament\Widgets\AdminStatsWidget;
use App\Filament\Widgets\GuruWelcomeWidget;
use App\Filament\Widgets\TanggalFilterWidget;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use BezhanSalleh\FilamentShield\Middleware\SyncShieldTenant;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(Login::class)
            ->brandName('MIS Fathul Iman')
            ->globalSearch(false)
            ->colors([
                'primary' => Color::Emerald,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                \App\Filament\Pages\Dashboard::class,
                // Dashboard::class,
                EditProfilByGuru::class,
                AbsensiPage::class,
            ])
            ->navigationGroups([
                'Guru & Staf',
                'Postingan Berita',
                'Profil Sekolah',
                NavigationGroup::make()
                    ->label('Settings')
                    // ->icon(Heroicon::OutlinedCog6Tooth)
                    ->collapsible(false),
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AdminStatsWidget::class,
                AdminRekapAbsensiWidget::class,
                TanggalFilterWidget::class,
                GuruWelcomeWidget::class,
                // AccountWidget::class,
                // FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->sidebarCollapsibleOnDesktop()
            ->plugins([
                FilamentShieldPlugin::make()
                    ->gridColumns([
                        'default' => 1,
                        'sm'      => 2,
                        'lg'      => 3,
                    ])
                    ->sectionColumnSpan(1)
                    ->checkboxListColumns([
                        'default' => 1,
                        'sm'      => 2,
                    ])
                    ->resourceCheckboxListColumns([
                        'default' => 1,
                        'sm'      => 2,
                    ]),
            ])
            ->authMiddleware([
                Authenticate::class,
                SyncShieldTenant::class,
            ])->authGuard('web')
            ->loginRouteSlug('masuk')
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn () => '<meta name="vapid-public-key" content="' . config('webpush.vapid.public_key') . '">'
            )
            ->renderHook(
                PanelsRenderHook::BODY_END,
                fn () => view('filament.webpush-script')
            );
    }
}