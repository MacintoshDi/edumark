<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DiscussionResource\Pages;
use App\Models\Discussion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DiscussionResource extends Resource
{
    protected static ?string $model = Discussion::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationLabel = 'Обсуждения';
    protected static ?string $navigationGroup = 'Сообщество';
    protected static ?int $navigationSort = 4;

    public static function getModelLabel(): string
    {
        return 'Обсуждение';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Обсуждения';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('user_id')->label('Автор')->relationship('user', 'name')->required(),
            Forms\Components\TextInput::make('title')->label('Заголовок')->required(),
            Forms\Components\RichEditor::make('content')->label('Содержание')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Заголовок')->searchable(),
                Tables\Columns\TextColumn::make('user.name')->label('Автор'),
                Tables\Columns\TextColumn::make('created_at')->label('Дата')->dateTime(),
            ])
            ->filters([])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDiscussions::route('/'),
            'create' => Pages\CreateDiscussion::route('/create'),
            'edit' => Pages\EditDiscussion::route('/{record}/edit'),
        ];
    }
}
