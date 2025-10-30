<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PricingServiceResource\Pages;
use App\Models\PricingService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PricingServiceResource extends Resource
{
    protected static ?string $model = PricingService::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    
    protected static ?string $navigationLabel = 'Услуги с ценами';
    
    protected static ?string $navigationGroup = 'Прайс-лист';
    
    protected static ?int $navigationSort = 3;

    public static function getModelLabel(): string
    {
        return 'Услуга с ценой';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Услуги с ценами';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('pricing_subcategory_id')
                ->label('Подкатегория')
                ->relationship('pricingSubcategory', 'name')
                ->required()
                ->searchable()
                ->preload(),
            Forms\Components\TextInput::make('name')
                ->label('Название услуги')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('slug')
                ->label('URL (slug)')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),
            Forms\Components\Textarea::make('description')
                ->label('Описание')
                ->rows(3),
            Forms\Components\Select::make('unit')
                ->label('Единица измерения')
                ->options([
                    'м²' => 'м² (квадратный метр)',
                    'м' => 'м (метр)',
                    'шт' => 'шт (штука)',
                    'час' => 'час',
                    'л' => 'л (литр)',
                    'кг' => 'кг (килограмм)',
                ])
                ->default('м²')
                ->required(),
            Forms\Components\Grid::make(3)
                ->schema([
                    Forms\Components\TextInput::make('price_without_material')
                        ->label('Цена БЕЗ материала (₴)')
                        ->numeric()
                        ->prefix('₴')
                        ->minValue(0),
                    Forms\Components\TextInput::make('price_with_material')
                        ->label('Цена С материалом (₴)')
                        ->numeric()
                        ->prefix('₴')
                        ->minValue(0),
                    Forms\Components\TextInput::make('price_premium')
                        ->label('Премиум цена (₴)')
                        ->numeric()
                        ->prefix('₴')
                        ->minValue(0)
                        ->helperText('Необязательно'),
                ]),
            Forms\Components\TextInput::make('min_quantity')
                ->label('Минимальный заказ')
                ->numeric()
                ->default(1)
                ->minValue(1),
            Forms\Components\TextInput::make('order')
                ->label('Порядок')
                ->numeric()
                ->default(0),
            Forms\Components\Toggle::make('is_active')
                ->label('Активно')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pricingSubcategory.pricingCategory.name')
                    ->label('Категория')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('pricingSubcategory.name')
                    ->label('Подкатегория')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Услуга')
                    ->searchable(),
                Tables\Columns\TextColumn::make('unit')
                    ->label('Ед.')
                    ->badge(),
                Tables\Columns\TextColumn::make('price_without_material')
                    ->label('Без материала')
                    ->money('UAH')
                    ->sortable(),
                Tables\Columns\TextColumn::make('price_with_material')
                    ->label('С материалом')
                    ->money('UAH')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активно')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('pricing_subcategory')
                    ->relationship('pricingSubcategory', 'name')
                    ->label('Подкатегория')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order', 'asc')
            ->reorderable('order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPricingServices::route('/'),
            'create' => Pages\CreatePricingService::route('/create'),
            'edit' => Pages\EditPricingService::route('/{record}/edit'),
        ];
    }
}