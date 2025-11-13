<?php

namespace App\Filament\Resources\MenuResource\Pages;

use App\Filament\Resources\MenuResource;
use App\Repositories\MenuRepository;
use Filament\Resources\Pages\CreateRecord;

class CreateMenu extends CreateRecord
{
    protected static string $resource = MenuResource::class;

    /**
     * Hook after creating the record.
     * Clears menu cache when new menu is created.
     */
    protected function afterCreate(): void
    {
        // ИСПРАВЛЕНО: передаём slug и location, а не весь record
        app(MenuRepository::class)->flush($this->record->slug, $this->record->location);
    }
}