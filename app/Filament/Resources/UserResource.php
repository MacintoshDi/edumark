<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'User Management';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::active()->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('User Details')
                    ->tabs([
                        Tabs\Tab::make('Account Information')
                            ->schema([
                                Section::make('Basic Information')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                Forms\Components\TextInput::make('name')
                                                    ->required()
                                                    ->maxLength(255),
                                                Forms\Components\TextInput::make('email')
                                                    ->email()
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->unique(User::class, 'email', ignoreRecord: true),
                                            ]),
                                        Grid::make(2)
                                            ->schema([
                                                Forms\Components\TextInput::make('password')
                                                    ->password()
                                                    ->maxLength(255)
                                                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                                                    ->dehydrated(fn ($state) => filled($state))
                                                    ->required(fn (string $context): bool => $context === 'create'),
                                                Forms\Components\TextInput::make('password_confirmation')
                                                    ->password()
                                                    ->maxLength(255)
                                                    ->same('password')
                                                    ->visible(fn (Forms\Get $get): bool => filled($get('password')))
                                                    ->required(fn (Forms\Get $get): bool => filled($get('password'))),
                                            ]),
                                        Grid::make(3)
                                            ->schema([
                                                Forms\Components\Select::make('role')
                                                    ->options(User::ROLES)
                                                    ->required()
                                                    ->default('student'),
                                                Forms\Components\Toggle::make('is_active')
                                                    ->label('Active')
                                                    ->default(true),
                                                Forms\Components\DateTimePicker::make('email_verified_at')
                                                    ->label('Email Verified At')
                                                    ->native(false),
                                            ]),
                                        Forms\Components\FileUpload::make('avatar')
                                            ->image()
                                            ->directory('avatars')
                                            ->imageResizeMode('cover')
                                            ->imageCropAspectRatio('1:1')
                                            ->imageResizeTargetWidth('256')
                                            ->imageResizeTargetHeight('256'),
                                    ]),
                            ]),
                        
                        Tabs\Tab::make('Profile Information')
                                ->schema([
                                Section::make('Professional Information')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                Forms\Components\TextInput::make('profile.specialty')
                                                    ->label('Specialty')
                                                    ->maxLength(255),
                                                Forms\Components\TextInput::make('profile.location')
                                                    ->label('Location')
                                                    ->maxLength(255),
                                            ]),
                                        Forms\Components\Textarea::make('profile.bio')
                                            ->label('Biography')
                                            ->rows(4)
                                            ->columnSpanFull(),
                                        Grid::make(3)
                                            ->schema([
                                                Forms\Components\Select::make('profile.experience_level')
                                                    ->label('Experience Level')
                                                    ->options([
                                                        'junior' => 'Junior',
                                                        'middle' => 'Middle',
                                                        'senior' => 'Senior',
                                                        'lead' => 'Lead',
                                                        'principal' => 'Principal',
                                                    ]),
                                                Forms\Components\TextInput::make('profile.years_of_experience')
                                                    ->label('Years of Experience')
                                                    ->numeric()
                                                    ->minValue(0),
                                                Forms\Components\TextInput::make('profile.phone')
                                                    ->label('Phone')
                                                    ->tel(),
                                            ]),
                                    ]),
                                Section::make('Social Links')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                Forms\Components\TextInput::make('profile.linkedin')
                                                    ->label('LinkedIn')
                                                    ->url()
                                                    ->prefix('https://linkedin.com/in/'),
                                                Forms\Components\TextInput::make('profile.github')
                                                    ->label('GitHub')
                                                    ->prefix('https://github.com/'),
                                            ]),
                                        Forms\Components\TextInput::make('profile.website')
                                            ->label('Website')
                                            ->url()
                                            ->columnSpanFull(),
                                    ])
                                    ->collapsible(),
                            ]),
                        
                        Tabs\Tab::make('Skills & Education')
                            ->schema([
                                Section::make('Skills')
                                    ->schema([
                                        Forms\Components\TagsInput::make('profile.skills')
                                            ->label('Skills')
                                            ->separator(',')
                                            ->suggestions([
                                                'JavaScript',
                                                'TypeScript',
                                                'React',
                                                'Vue.js',
                                                'Angular',
                                                'Node.js',
                                                'PHP',
                                                'Laravel',
                                                'Python',
                                                'Django',
                                                'Java',
                                                'Spring',
                                                'C#',
                                                '.NET',
                                                'Go',
                                                'Rust',
                                                'Docker',
                                                'Kubernetes',
                                                'AWS',
                                                'Azure',
                                                'GCP',
                                            ]),
                                        Forms\Components\TagsInput::make('profile.languages')
                                            ->label('Languages')
                                            ->separator(','),
                                    ]),
                                Section::make('Education & Certifications')
                                    ->schema([
                                        Forms\Components\Repeater::make('profile.education')
                                            ->label('Education')
                                            ->schema([
                                                Forms\Components\TextInput::make('degree')
                                                    ->required(),
                                                Forms\Components\TextInput::make('institution')
                                                    ->required(),
                                                Forms\Components\TextInput::make('field')
                                                    ->label('Field of Study'),
                                                Forms\Components\DatePicker::make('graduation_date')
                                                    ->label('Graduation Date'),
                                            ])
                                            ->columns(2)
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => 
                                                ($state['degree'] ?? '') . ' - ' . ($state['institution'] ?? '')
                                            ),
                                        Forms\Components\Repeater::make('profile.certifications')
                                            ->label('Certifications')
                                            ->schema([
                                                Forms\Components\TextInput::make('name')
                                                    ->required(),
                                                Forms\Components\TextInput::make('issuer')
                                                    ->required(),
                                                Forms\Components\DatePicker::make('issue_date')
                                                    ->label('Issue Date'),
                                                Forms\Components\DatePicker::make('expiry_date')
                                                    ->label('Expiry Date'),
                                            ])
                                            ->columns(2)
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null),
                                    ])
                                    ->collapsible(),
                            ]),
                        
                        Tabs\Tab::make('Enrollments')
                            ->schema([
                                Section::make('Cohort Enrollments')
                                    ->schema([
                                        Forms\Components\Placeholder::make('enrolled_cohorts')
                                            ->label('Enrolled Cohorts')
                                            ->content(function ($record) {
                                                if (!$record) return 'No enrollments yet';
                                                $cohorts = $record->enrolledCohorts()->get();
                                                if ($cohorts->isEmpty()) return 'No enrollments yet';
                                                return $cohorts->map(fn ($c) => 
                                                    "• {$c->name} ({$c->pivot->status}, {$c->pivot->progress}%)"
                                                )->implode('<br>');
                                            })
                                            ->extraAttributes(['class' => 'text-sm']),
                                        Forms\Components\Placeholder::make('teaching_cohorts')
                                            ->label('Teaching Cohorts')
                                            ->content(function ($record) {
                                                if (!$record || $record->role !== 'teacher') return 'N/A';
                                                $cohorts = $record->teachingCohorts()->get();
                                                if ($cohorts->isEmpty()) return 'Not teaching any cohorts';
                                                return $cohorts->map(fn ($c) => 
                                                    "• {$c->name} ({$c->pivot->role})"
                                                )->implode('<br>');
                                            })
                                            ->extraAttributes(['class' => 'text-sm'])
                                            ->visible(fn ($record) => $record && $record->role === 'teacher'),
                                    ]),
                            ])
                            ->visible(fn ($record) => $record !== null),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->circular()
                    ->defaultImageUrl(fn ($record) => $record->avatar_url),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->icon('heroicon-m-envelope'),
                Tables\Columns\BadgeColumn::make('role')
                    ->colors([
                        'primary' => 'admin',
                        'success' => 'teacher',
                        'warning' => 'student',
                        'info' => 'moderator',
                    ])
                    ->formatStateUsing(fn ($state) => User::ROLES[$state] ?? $state),
                Tables\Columns\TextColumn::make('profile.specialty')
                    ->label('Specialty')
                    ->placeholder('Not specified')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('profile.location')
                    ->label('Location')
                    ->placeholder('Not specified')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('enrolledCohorts_count')
                    ->label('Cohorts')
                    ->counts('enrolledCohorts')
                    ->alignCenter()
                    ->visible(fn () => request()->has('role') && request('role') === 'student'),
                Tables\Columns\IconColumn::make('email_verified_at')
                    ->label('Verified')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active')
                    ->onColor('success')
                    ->offColor('danger'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->options(User::ROLES)
                    ->multiple(),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active'),
                Tables\Filters\TernaryFilter::make('email_verified_at')
                    ->label('Email Verified')
                    ->nullable(),
                Tables\Filters\Filter::make('has_profile')
                    ->query(fn (Builder $query): Builder => $query->has('profile')),
                Tables\Filters\Filter::make('enrolled_students')
                    ->label('Enrolled Students')
                    ->query(fn (Builder $query): Builder => $query->has('enrolledCohorts')),
            ])
            ->actions([
                Tables\Actions\Action::make('verify_email')
                    ->label('Verify Email')
                    ->icon('heroicon-m-check-badge')
                    ->requiresConfirmation()
                    ->visible(fn (User $record) => !$record->email_verified_at)
                    ->action(fn (User $record) => $record->update(['email_verified_at' => now()])),
                Tables\Actions\Action::make('view_profile')
                    ->label('Profile')
                    ->icon('heroicon-m-user')
                    ->url(fn (User $record) => UserResource::getUrl('profile', ['record' => $record])),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('activate')
                        ->label('Activate')
                        ->icon('heroicon-m-check-circle')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['is_active' => true]))
                        ->deselectRecordsAfterCompletion(),
                    Tables\Actions\BulkAction::make('deactivate')
                        ->label('Deactivate')
                        ->icon('heroicon-m-x-circle')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['is_active' => false]))
                        ->deselectRecordsAfterCompletion(),
                    Tables\Actions\BulkAction::make('verify_emails')
                        ->label('Verify Emails')
                        ->icon('heroicon-m-check-badge')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['email_verified_at' => now()]))
                        ->deselectRecordsAfterCompletion(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\EnrolledCohortsRelationManager::class,
            RelationManagers\TeachingCohortsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'profile' => Pages\ViewProfile::route('/{record}/profile'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email', 'profile.specialty', 'profile.location'];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with(['profile']);
    }
}