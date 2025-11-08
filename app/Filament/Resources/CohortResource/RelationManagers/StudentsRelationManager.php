<?php

namespace App\Filament\Resources\CohortResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\User;

class StudentsRelationManager extends RelationManager
{
    protected static string $relationship = 'students';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $title = 'Enrolled Students';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Student')
                    ->options(User::students()->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\DateTimePicker::make('enrolled_at')
                    ->label('Enrolled At')
                    ->default(now())
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'completed' => 'Completed',
                        'dropped' => 'Dropped',
                    ])
                    ->default('active')
                    ->required(),
                Forms\Components\TextInput::make('progress')
                    ->numeric()
                    ->default(0)
                    ->minValue(0)
                    ->maxValue(100)
                    ->suffix('%'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->circular()
                    ->defaultImageUrl(fn ($record) => $record->avatar_url),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('medium')
                    ->description(fn ($record) => $record->email),
                Tables\Columns\BadgeColumn::make('pivot.status')
                    ->label('Status')
                    ->colors([
                        'success' => 'active',
                        'warning' => 'completed',
                        'danger' => 'dropped',
                    ]),
                Tables\Columns\TextColumn::make('pivot.progress')
                    ->label('Progress')
                    ->suffix('%')
                    ->sortable()
                    ->alignCenter()
                    ->color(fn ($state) => match(true) {
                        $state >= 80 => 'success',
                        $state >= 50 => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('pivot.enrolled_at')
                    ->label('Enrolled')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pivot.completed_at')
                    ->label('Completed')
                    ->date()
                    ->placeholder('In Progress')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'completed' => 'Completed',
                        'dropped' => 'Dropped',
                    ])
                    ->attribute('pivot.status'),
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->preloadRecordSelect()
                    ->form(fn (Tables\Actions\AttachAction $action): array => [
                        $action->getRecordSelect()
                            ->label('Student')
                            ->options(User::students()->whereDoesntHave('enrolledCohorts', function ($query) {
                                $query->where('cohort_id', $this->ownerRecord->id);
                            })->pluck('name', 'id'))
                            ->searchable()
                            ->preload(),
                        Forms\Components\DateTimePicker::make('enrolled_at')
                            ->label('Enrolled At')
                            ->default(now())
                            ->required(),
                        Forms\Components\Select::make('status')
                            ->options([
                                'active' => 'Active',
                                'completed' => 'Completed',
                                'dropped' => 'Dropped',
                            ])
                            ->default('active')
                            ->required(),
                        Forms\Components\TextInput::make('progress')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->maxValue(100)
                            ->suffix('%'),
                    ])
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['enrolled_at'] = $data['enrolled_at'] ?? now();
                        $data['status'] = $data['status'] ?? 'active';
                        $data['progress'] = $data['progress'] ?? 0;
                        return $data;
                    }),
                Tables\Actions\Action::make('bulk_enroll')
                    ->label('Bulk Enroll')
                    ->icon('heroicon-o-user-group')
                    ->modalHeading('Bulk Enroll Students')
                    ->form([
                        Forms\Components\Select::make('student_ids')
                            ->label('Select Students')
                            ->multiple()
                            ->options(User::students()->whereDoesntHave('enrolledCohorts', function ($query) {
                                $query->where('cohort_id', $this->ownerRecord->id);
                            })->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->required(),
                    ])
                    ->action(function (array $data): void {
                        foreach ($data['student_ids'] as $studentId) {
                            $this->ownerRecord->students()->attach($studentId, [
                                'enrolled_at' => now(),
                                'status' => 'active',
                                'progress' => 0,
                            ]);
                        }
                    }),
            ])
            ->actions([
                Tables\Actions\Action::make('view_profile')
                    ->label('Profile')
                    ->icon('heroicon-m-user')
                    ->url(fn ($record) => url("/admin/users/{$record->id}/edit"))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make()
                    ->form(function ($record) {
                        return [
                            Forms\Components\Select::make('status')
                                ->options([
                                    'active' => 'Active',
                                    'completed' => 'Completed',
                                    'dropped' => 'Dropped',
                                ])
                                ->default($record->pivot->status)
                                ->required(),
                            Forms\Components\TextInput::make('progress')
                                ->numeric()
                                ->default($record->pivot->progress)
                                ->minValue(0)
                                ->maxValue(100)
                                ->suffix('%'),
                            Forms\Components\DateTimePicker::make('completed_at')
                                ->label('Completed At'),
                        ];
                    }),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('mark_completed')
                        ->label('Mark as Completed')
                        ->icon('heroicon-m-check-circle')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $record->pivot->update([
                                    'status' => 'completed',
                                    'completed_at' => now(),
                                    'progress' => 100,
                                ]);
                            }
                        })
                        ->deselectRecordsAfterCompletion(),
                    Tables\Actions\DetachBulkAction::make(),
                ]),
            ])
            ->defaultSort('pivot.enrolled_at', 'desc');
    }
}