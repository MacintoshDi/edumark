<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;
    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $navigationLabel = 'Услуги';
    protected static ?string $navigationGroup = 'Каталог услуг';
    protected static ?int $navigationSort = 3;

    public static function getModelLabel(): string
    {
        return 'Услуга';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Услуги';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('subcategory_id')
                ->label('Подкатегория')
                ->relationship('subcategory', 'name')
                ->required()
                ->searchable()
                ->preload(),
            Forms\Components\TextInput::make('name')
                ->label('Название услуги')
                ->required()
                ->maxLength(255),
            Forms\Components\RichEditor::make('description')
                ->label('Описание')
                ->columnSpanFull(),
            Forms\Components\TextInput::make('price')
                ->label('Цена')
                ->numeric()
                ->prefix('₴')
                ->maxLength(255),
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
                Tables\Columns\TextColumn::make('subcategory.category.name')
                    ->label('Категория')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('subcategory.name')
                    ->label('Подкатегория')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Услуга')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Цена')
                    ->money('UAH')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Создана')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('subcategory')
                    ->relationship('subcategory', 'name')
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
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}