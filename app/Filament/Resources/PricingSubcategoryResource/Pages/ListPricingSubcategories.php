<?php

namespace App\Filament\Resources\PricingSubcategoryResource\Pages;

use App\Filament\Resources\PricingSubcategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPricingSubcategories extends ListRecords
{
    protected static string $resource = PricingSubcategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
