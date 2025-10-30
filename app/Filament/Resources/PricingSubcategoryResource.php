<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PricingSubcategoryResource\Pages;
use App\Models\PricingSubcategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PricingSubcategoryResource extends Resource
{
    protected static ?string $model = PricingSubcategory::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-folder-open';
    
    protected static ?string $navigationLabel = 'Подкатегории цен';
    
    protected static ?string $navigationGroup = 'Прайс-лист';
    
    protected static ?int $navigationSort = 2;

    public static function getModelLabel(): string
    {
        return 'Подкатегория цен';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Подкатегории цен';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('pricing_category_id')
                ->label('Категория')
                ->relationship('pricingCategory', 'name')
                ->required()
                ->searchable(),
            Forms\Components\TextInput::make('name')
                ->label('Название')
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
                Tables\Columns\TextColumn::make('pricingCategory.name')
                    ->label('Категория')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Название')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Порядок')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активно')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('pricing_category')
                    ->relationship('pricingCategory', 'name')
                    ->label('Категория'),
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
            'index' => Pages\ListPricingSubcategories::route('/'),
            'create' => Pages\CreatePricingSubcategory::route('/create'),
            'edit' => Pages\EditPricingSubcategory::route('/{record}/edit'),
        ];
    }
}