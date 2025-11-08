<?php
namespace App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource;
use App\Repositories\MenuRepository;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
class EditMenu extends EditRecord
{
    protected static string $resource = MenuResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->before(fn () => app(MenuRepository::class)->flush($this->record->slug, $this->record->location))
                ->after(fn () => app(MenuRepository::class)->flush($this->record->slug, $this->record->location)),
        ];
    }
    protected function afterSave(): void
    {
        app(MenuRepository::class)->flush($this->record->slug, $this->record->location);
    }
}