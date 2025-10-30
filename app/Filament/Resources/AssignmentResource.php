<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssignmentResource\Pages;
use App\Models\Assignment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AssignmentResource extends Resource
{
    protected static ?string $model = Assignment::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Задания';
    protected static ?string $navigationGroup = 'Обучение';
    protected static ?int $navigationSort = 11;

    public static function getModelLabel(): string
    {
        return 'Задание';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Задания';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('cohort_id')->label('Курс')->relationship('cohort', 'name')->required(),
            Forms\Components\TextInput::make('title')->label('Название')->required(),
            Forms\Components\RichEditor::make('description')->label('Описание'),
            Forms\Components\DateTimePicker::make('due_date')->label('Срок сдачи'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Название')->searchable(),
                Tables\Columns\TextColumn::make('cohort.name')->label('Курс'),
                Tables\Columns\TextColumn::make('due_date')->label('Срок')->dateTime(),
            ])
            ->filters([])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssignments::route('/'),
            'create' => Pages\CreateAssignment::route('/create'),
            'edit' => Pages\EditAssignment::route('/{record}/edit'),
        ];
    }
}
