<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubcategoryResource\Pages;
use App\Models\Subcategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SubcategoryResource extends Resource
{
    protected static ?string $model = Subcategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-folder-open';
    protected static ?string $navigationLabel = 'Подкатегории';
    protected static ?string $navigationGroup = 'Каталог услуг';
    protected static ?int $navigationSort = 2;

    public static function getModelLabel(): string
    {
        return 'Подкатегория';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Подкатегории';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('category_id')
                ->label('Категория')
                ->relationship('category', 'name')
                ->required()
                ->searchable(),
            Forms\Components\TextInput::make('name')
                ->label('Название')
                ->required()
                ->maxLength(255),
            Forms\Components\Textarea::make('description')
                ->label('Описание')
                ->rows(3),
            Forms\Components\TextInput::make('slug')
                ->label('URL (slug)')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Категория')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Название')
                    ->searchable(),
                Tables\Columns\TextColumn::make('services_count')
                    ->label('Услуг')
                    ->counts('services'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Создана')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name')
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
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubcategories::route('/'),
            'create' => Pages\CreateSubcategory::route('/create'),
            'edit' => Pages\EditSubcategory::route('/{record}/edit'),
        ];
    }
}