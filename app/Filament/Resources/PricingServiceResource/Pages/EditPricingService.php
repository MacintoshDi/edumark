<?php

namespace App\Filament\Resources\PricingServiceResource\Pages;

use App\Filament\Resources\PricingServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPricingService extends EditRecord
{
    protected static string $resource = PricingServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
