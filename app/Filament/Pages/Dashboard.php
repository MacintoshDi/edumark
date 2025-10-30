<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationLabel = 'Консоль';
    
    public function getHeading(): string
    {
        return 'Консоль';
    }
}