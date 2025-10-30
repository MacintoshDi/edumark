<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CohortResource\Pages;
use App\Models\Cohort;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CohortResource extends Resource
{
    protected static ?string $model = Cohort::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Курсы';
    protected static ?string $navigationGroup = 'Обучение';
    protected static ?int $navigationSort = 10;

    public static function getModelLabel(): string
    {
        return 'Курс';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Курсы';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->label('Название')->required(),
            Forms\Components\Textarea::make('description')->label('Описание')->rows(3),
            Forms\Components\DatePicker::make('start_date')->label('Дата начала'),
            Forms\Components\DatePicker::make('end_date')->label('Дата окончания'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Название')->searchable(),
                Tables\Columns\TextColumn::make('description')->label('Описание')->limit(50),
                Tables\Columns\TextColumn::make('start_date')->label('Начало')->date(),
                Tables\Columns\TextColumn::make('end_date')->label('Конец')->date(),
            ])
            ->filters([])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCohorts::route('/'),
            'create' => Pages\CreateCohort::route('/create'),
            'edit' => Pages\EditCohort::route('/{record}/edit'),
        ];
    }
}
