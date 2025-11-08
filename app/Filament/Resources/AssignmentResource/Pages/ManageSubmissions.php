<?php

namespace App\Filament\Resources\AssignmentResource\Pages;

use App\Filament\Resources\AssignmentResource;
use App\Models\AssignmentSubmission;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Forms\Form;

class ManageSubmissions extends ManageRelatedRecords
{
    protected static string $resource = AssignmentResource::class;

    protected static string $relationship = 'submissions';

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';

    public static function getNavigationLabel(): string
    {
        return 'Submissions';
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name')
                    ->label('Student')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('submitted_at')
                    ->dateTime('M d, Y H:i')
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'submitted',
                        'success' => 'graded',
                        'danger' => 'returned',
                    ]),
                Tables\Columns\TextColumn::make('score')
                    ->numeric()
                    ->suffix(' / ' . $this->record->max_points)
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('grade_letter')
                    ->label('Grade')
                    ->alignCenter(),
                Tables\Columns\IconColumn::make('is_late')
                    ->label('Late')
                    ->boolean()
                    ->trueIcon('heroicon-o-clock')
                    ->falseIcon('heroicon-o-check-circle')
                    ->trueColor('danger')
                    ->falseColor('success'),
                Tables\Columns\TextColumn::make('graded_at')
                    ->dateTime()
                    ->placeholder('Not graded'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(AssignmentSubmission::STATUSES),
                Tables\Filters\TernaryFilter::make('is_late')
                    ->label('Late Submission'),
            ])
            ->actions([
                Tables\Actions\Action::make('grade')
                    ->label('Grade')
                    ->icon('heroicon-m-academic-cap')
                    ->form([
                        Forms\Components\TextInput::make('score')
                            ->numeric()
                            ->required()
                            ->minValue(0)
                            ->maxValue($this->record->max_points)
                            ->suffix(' / ' . $this->record->max_points),
                        Forms\Components\Textarea::make('feedback')
                            ->rows(4),
                    ])
                    ->action(function ($record, array $data) {
                        $record->grade(
                            $data['score'],
                            $data['feedback'] ?? null,
                            auth()->id()
                        );
                    })
                    ->visible(fn ($record) => !$record->score),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('submitted_at', 'desc');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('score')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue($this->record->max_points),
                Forms\Components\Textarea::make('feedback')
                    ->rows(4),
                Forms\Components\Select::make('status')
                    ->options(AssignmentSubmission::STATUSES),
            ]);
    }
}