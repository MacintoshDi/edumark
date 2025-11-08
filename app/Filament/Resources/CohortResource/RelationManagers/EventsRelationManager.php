<?php

namespace App\Filament\Resources\CohortResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Event;

class EventsRelationManager extends RelationManager
{
    protected static string $relationship = 'events';

    protected static ?string $recordTitleAttribute = 'title';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('short_description')
                    ->rows(2),
                Forms\Components\Select::make('type')
                    ->options(Event::TYPES)
                    ->required(),
                Forms\Components\DateTimePicker::make('start_date')
                    ->required(),
                Forms\Components\DateTimePicker::make('end_date'),
                Forms\Components\TextInput::make('location')
                    ->placeholder('Online or Physical Location'),
                Forms\Components\TextInput::make('meeting_url')
                    ->url(),
                Forms\Components\TextInput::make('max_attendees')
                    ->numeric(),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->prefix('$')
                    ->default(0),
                Forms\Components\Toggle::make('registration_required')
                    ->default(true),
                Forms\Components\Toggle::make('is_published')
                    ->default(true),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('type'),
                Tables\Columns\BadgeColumn::make('status'),
                Tables\Columns\TextColumn::make('start_date')
                    ->dateTime('M d, Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->placeholder('Online'),
                Tables\Columns\TextColumn::make('registered_count')
                    ->label('Registered')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('price')
                    ->money('USD')
                    ->alignEnd(),
                Tables\Columns\ToggleColumn::make('is_published'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options(Event::TYPES),
                Tables\Filters\SelectFilter::make('status')
                    ->options(Event::STATUSES),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('start_date', 'asc');
    }
}