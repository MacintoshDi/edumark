<?php

namespace App\Filament;

use Filament\Panel;
use Filament\Pages;
use Filament\Widgets;
use Filament\Support\Colors\Color;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\Authenticate;

class AdminPanel
{
    public static function make(): Panel
    {
        return Panel::make()
            ->id('admin')                             // ID панели
            ->path('admin')                           // URL: /admin
            ->login()                                 // включаем маршруты авторизации
            ->colors([
                'primary' => Color::Amber,
            ])
            ->pages([
                Pages\Dashboard::class,
            ])
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
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
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
