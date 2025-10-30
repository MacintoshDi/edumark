<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PricingCategoryResource\Pages;
use App\Models\PricingCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PricingCategoryResource extends Resource
{
    protected static ?string $model = PricingCategory::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationLabel = 'Категории цен';
    
    protected static ?string $navigationGroup = 'Прайс-лист';
    
    protected static ?int $navigationSort = 1;

    public static function getModelLabel(): string
    {
        return 'Категория цен';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Категории цен';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
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
                Tables\Columns\TextColumn::make('name')
                    ->label('Название')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Порядок')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активно')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Создано')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
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
            'index' => Pages\ListPricingCategories::route('/'),
            'create' => Pages\CreatePricingCategory::route('/create'),
            'edit' => Pages\EditPricingCategory::route('/{record}/edit'),
        ];
    }
}