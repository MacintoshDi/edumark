<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'События';
    protected static ?string $navigationGroup = 'Сообщество';
    protected static ?int $navigationSort = 3;

    public static function getModelLabel(): string
    {
        return 'Событие';
    }

    public static function getPluralModelLabel(): string
    {
        return 'События';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')->label('Название')->required(),
            Forms\Components\Textarea::make('description')->label('Описание')->rows(3),
            Forms\Components\DateTimePicker::make('start_time')->label('Начало')->required(),
            Forms\Components\DateTimePicker::make('end_time')->label('Конец'),
            Forms\Components\TextInput::make('location')->label('Место проведения'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Название')->searchable(),
                Tables\Columns\TextColumn::make('start_time')->label('Начало')->dateTime(),
                Tables\Columns\TextColumn::make('location')->label('Место'),
            ])
            ->filters([])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
