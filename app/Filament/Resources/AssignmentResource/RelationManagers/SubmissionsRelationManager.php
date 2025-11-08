<?php

namespace App\Filament\Resources\AssignmentResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\AssignmentSubmission;

class SubmissionsRelationManager extends RelationManager
{
    protected static string $relationship = 'submissions';

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $title = 'Student Submissions';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Student')
                    ->relationship('student', 'name')
                    ->required()
                    ->disabled(fn ($context) => $context !== 'create'),
                Forms\Components\Textarea::make('content')
                    ->label('Submission Content')
                    ->rows(4),
                Forms\Components\FileUpload::make('attachments')
                    ->multiple()
                    ->directory('assignments/submissions'),
                Forms\Components\TextInput::make('score')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(fn () => $this->ownerRecord->max_points),
                Forms\Components\Textarea::make('feedback')
                    ->rows(3),
                Forms\Components\Select::make('status')
                    ->options(AssignmentSubmission::STATUSES)
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('student.name')
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
                        'info' => 'resubmitted',
                    ]),
                Tables\Columns\TextColumn::make('score')
                    ->numeric()
                    ->suffix(fn () => ' / ' . $this->ownerRecord->max_points)
                    ->alignCenter()
                    ->color(fn ($record) => match(true) {
                        !$record->score => 'gray',
                        $record->passed === true => 'success',
                        $record->passed === false => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('grade_letter')
                    ->label('Grade')
                    ->alignCenter()
                    ->badge(),
                Tables\Columns\IconColumn::make('is_late')
                    ->label('Late')
                    ->boolean()
                    ->trueIcon('heroicon-o-clock')
                    ->falseIcon('heroicon-o-check-circle')
                    ->trueColor('danger')
                    ->falseColor('success'),
                Tables\Columns\TextColumn::make('attempt_number')
                    ->label('Attempt')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('graded_at')
                    ->dateTime()
                    ->placeholder('Not graded')
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(AssignmentSubmission::STATUSES),
                Tables\Filters\Filter::make('ungraded')
                    ->query(fn ($query) => $query->ungraded()),
                Tables\Filters\Filter::make('late')
                    ->query(fn ($query) => $query->late()),
            ])
            ->headerActions([
                // No create action - students submit through frontend
            ])
            ->actions([
                Tables\Actions\Action::make('grade')
                    ->label('Grade')
                    ->icon('heroicon-m-academic-cap')
                    ->color('success')
                    ->form([
                        Forms\Components\TextInput::make('score')
                            ->numeric()
                            ->required()
                            ->minValue(0)
                            ->maxValue($this->ownerRecord->max_points)
                            ->suffix(' / ' . $this->ownerRecord->max_points),
                        Forms\Components\Textarea::make('feedback')
                            ->label('Feedback')
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
                Tables\Actions\Action::make('return_for_revision')
                    ->label('Return')
                    ->icon('heroicon-m-arrow-uturn-left')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->form([
                        Forms\Components\Textarea::make('feedback')
                            ->label('Reason for Return')
                            ->required()
                            ->rows(3),
                    ])
                    ->action(function ($record, array $data) {
                        $record->returnForRevision($data['feedback'], auth()->id());
                    })
                    ->visible(fn ($record) => $record->status === 'submitted'),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // No bulk delete for submissions
                ]),
            ])
            ->defaultSort('submitted_at', 'desc');
    }
}