<?php

namespace App\Filament\Resources\PricingSubcategoryResource\Pages;

use App\Filament\Resources\PricingSubcategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPricingSubcategory extends EditRecord
{
    protected static string $resource = PricingSubcategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
