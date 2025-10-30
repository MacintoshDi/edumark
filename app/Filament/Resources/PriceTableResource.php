<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PriceTableResource\Pages;
use App\Filament\Resources\PriceTableResource\RelationManagers;
use App\Models\PriceTable;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PriceTableResource extends Resource
{
    protected static ?string $model = PriceTable::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-table-cells';
    
    protected static ?string $navigationLabel = 'Таблицы цен';
    
    protected static ?string $navigationGroup = 'Таблицы прайсов';
    
    protected static ?int $navigationSort = 1;

    public static function getModelLabel(): string
    {
        return 'Таблица цен';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Таблицы цен';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->label('Название таблицы')
                ->required()
                ->maxLength(255)
                ->helperText('Например: "Прайс-лист малярные работы Киев"'),
            Forms\Components\TextInput::make('slug')
                ->label('URL (slug)')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),
            Forms\Components\Select::make('category_id')
                ->label('Категория')
                ->relationship('category', 'name')
                ->required()
                ->searchable()
                ->reactive()
                ->afterStateUpdated(fn (callable $set) => $set('subcategory_id', null)),
            Forms\Components\Select::make('subcategory_id')
                ->label('Подкатегория (необязательно)')
                ->relationship('subcategory', 'name', fn ($query, callable $get) => 
                    $query->where('category_id', $get('category_id'))
                )
                ->searchable()
                ->helperText('Оставьте пустым если таблица для всей категории'),
            Forms\Components\Textarea::make('description')
                ->label('Описание')
                ->rows(3),
            Forms\Components\TextInput::make('order')
                ->label('Порядок отображения')
                ->numeric()
                ->default(0),
            Forms\Components\Toggle::make('is_active')
                ->label('Активна')
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
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Категория')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('subcategory.name')
                    ->label('Подкатегория')
                    ->sortable()
                    ->searchable()
                    ->default('—'),
                Tables\Columns\TextColumn::make('rows_count')
                    ->label('Строк')
                    ->counts('rows'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активна')
                    ->boolean(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Порядок')
                    ->sortable(),
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
            ])
            ->defaultSort('order', 'asc')
            ->reorderable('order');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\RowsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPriceTables::route('/'),
            'create' => Pages\CreatePriceTable::route('/create'),
            'edit' => Pages\EditPriceTable::route('/{record}/edit'),
        ];
    }
}