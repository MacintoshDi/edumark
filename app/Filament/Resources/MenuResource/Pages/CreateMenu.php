<?php
namespace App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource;
use App\Repositories\MenuRepository;
use Filament\Resources\Pages\CreateRecord;
class CreateMenu extends CreateRecord
{
    protected static string $resource = MenuResource::class;
    protected function afterCreate(): void
    {
        app(MenuRepository::class)->flush($this->record->slug, $this->record->location);
    }
}