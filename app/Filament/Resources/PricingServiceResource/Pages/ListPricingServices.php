<?php

namespace App\Filament\Resources\PricingServiceResource\Pages;

use App\Filament\Resources\PricingServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPricingServices extends ListRecords
{
    protected static string $resource = PricingServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
