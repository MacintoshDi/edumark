<?php

namespace App\Filament\Resources\PriceTableResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class RowsRelationManager extends RelationManager
{
    protected static string $relationship = 'rows';
    
    protected static ?string $title = 'Строки таблицы';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->label('Наименование работ')
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('unit')
                ->label('Единица измерения')
                ->options([
                    'м²' => 'м²',
                    'м' => 'м',
                    'шт' => 'шт',
                    'час' => 'час',
                    'л' => 'л',
                    'кг' => 'кг',
                ])
                ->default('м²')
                ->required(),
            Forms\Components\Grid::make(3)
                ->schema([
                    Forms\Components\TextInput::make('price_without_material')
                        ->label('БЕЗ материала (₴)')
                        ->numeric()
                        ->prefix('₴')
                        ->minValue(0),
                    Forms\Components\TextInput::make('price_with_material')
                        ->label('С материалом (₴)')
                        ->numeric()
                        ->prefix('₴')
                        ->minValue(0),
                    Forms\Components\TextInput::make('price_premium')
                        ->label('Премиум (₴)')
                        ->numeric()
                        ->prefix('₴')
                        ->minValue(0)
                        ->helperText('Необязательно'),
                ]),
            Forms\Components\TextInput::make('order')
                ->label('Порядок')
                ->numeric()
                ->default(0),
            Forms\Components\Toggle::make('is_active')
                ->label('Активна')
                ->default(true),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Наименование работ')
                    ->searchable(),
                Tables\Columns\TextColumn::make('unit')
                    ->label('Ед.')
                    ->badge(),
                Tables\Columns\TextColumn::make('price_without_material')
                    ->label('БЕЗ мат.')
                    ->money('UAH'),
                Tables\Columns\TextColumn::make('price_with_material')
                    ->label('С мат.')
                    ->money('UAH'),
                Tables\Columns\TextColumn::make('price_premium')
                    ->label('Премиум')
                    ->money('UAH'),
                Tables\Columns\TextColumn::make('order')
                    ->label('Порядок')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активна')
                    ->boolean(),
            ])
            ->filters([])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Добавить строку'),
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
            ->reorderable('order')
            ->paginated(false);
    }
}