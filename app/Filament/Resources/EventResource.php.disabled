<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Community';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::upcoming()->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'success';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Event Details')
                    ->tabs([
                        Tabs\Tab::make('General Information')
                            ->schema([
                                Section::make('Basic Details')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                Forms\Components\TextInput::make('title')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->live(onBlur: true)
                                                    ->afterStateUpdated(function (string $state, Forms\Set $set) {
                                                        $set('slug', Str::slug($state));
                                                    }),
                                                Forms\Components\TextInput::make('slug')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->unique(Event::class, 'slug', ignoreRecord: true)
                                                    ->prefix('events/')
                                                    ->suffixIcon('heroicon-m-globe-alt'),
                                            ]),
                                        Forms\Components\Textarea::make('short_description')
                                            ->rows(2)
                                            ->maxLength(500)
                                            ->columnSpanFull(),
                                        Forms\Components\RichEditor::make('description')
                                            ->required()
                                            ->toolbarButtons([
                                                'attachFiles',
                                                'blockquote',
                                                'bold',
                                                'bulletList',
                                                'codeBlock',
                                                'h2',
                                                'h3',
                                                'italic',
                                                'link',
                                                'orderedList',
                                                'redo',
                                                'strike',
                                                'table',
                                                'undo',
                                            ])
                                            ->columnSpanFull(),
                                        Grid::make(3)
                                            ->schema([
                                                Forms\Components\Select::make('type')
                                                    ->required()
                                                    ->options(Event::TYPES)
                                                    ->default('webinar'),
                                                Forms\Components\Select::make('cohort_id')
                                                    ->label('Related Cohort')
                                                    ->relationship('cohort', 'name')
                                                    ->searchable()
                                                    ->preload()
                                                    ->placeholder('No specific cohort'),
                                                Forms\Components\Select::make('host_id')
                                                    ->label('Host')
                                                    ->relationship('host', 'name')
                                                    ->searchable()
                                                    ->preload()
                                                    ->default(auth()->id()),
                                            ]),
                                    ]),
                            ]),
                        
                        Tabs\Tab::make('Schedule & Location')
                            ->schema([
                                Section::make('Date & Time')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                Forms\Components\DateTimePicker::make('start_date')
                                                    ->label('Start Date & Time')
                                                    ->required()
                                                    ->native(false)
                                                    ->seconds(false),
                                                Forms\Components\DateTimePicker::make('end_date')
                                                    ->label('End Date & Time')
                                                    ->native(false)
                                                    ->seconds(false)
                                                    ->after('start_date'),
                                            ]),
                                        Forms\Components\Select::make('timezone')
                                            ->options(timezone_identifiers_list())
                                            ->searchable()
                                            ->default('UTC')
                                            ->required(),
                                        Grid::make(2)
                                            ->schema([
                                                Forms\Components\Toggle::make('is_recurring')
                                                    ->label('Recurring Event')
                                                    ->reactive(),
                                                Forms\Components\KeyValue::make('recurrence_rule')
                                                    ->label('Recurrence Settings')
                                                    ->visible(fn (Forms\Get $get) => $get('is_recurring')),
                                            ]),
                                    ]),
                                Section::make('Location')
                                    ->schema([
                                        Forms\Components\Radio::make('location_type')
                                            ->label('Event Type')
                                            ->options([
                                                'online' => 'Online Event',
                                                'physical' => 'Physical Location',
                                                'hybrid' => 'Hybrid (Both)',
                                            ])
                                            ->default('online')
                                            ->reactive(),
                                        Forms\Components\TextInput::make('meeting_url')
                                            ->label('Meeting URL')
                                            ->url()
                                            ->placeholder('https://zoom.us/j/...')
                                            ->visible(fn (Forms\Get $get) => in_array($get('location_type'), ['online', 'hybrid'])),
                                        Grid::make(2)
                                            ->schema([
                                                Forms\Components\TextInput::make('location')
                                                    ->label('Location Name')
                                                    ->placeholder('City, Country')
                                                    ->visible(fn (Forms\Get $get) => in_array($get('location_type'), ['physical', 'hybrid'])),
                                                Forms\Components\TextInput::make('venue')
                                                    ->label('Venue')
                                                    ->placeholder('Conference Center, Room 101')
                                                    ->visible(fn (Forms\Get $get) => in_array($get('location_type'), ['physical', 'hybrid'])),
                                            ]),
                                        Forms\Components\Textarea::make('address')
                                            ->rows(2)
                                            ->placeholder('Full street address')
                                            ->visible(fn (Forms\Get $get) => in_array($get('location_type'), ['physical', 'hybrid'])),
                                    ]),
                            ]),
                        
                        Tabs\Tab::make('Registration & Pricing')
                            ->schema([
                                Section::make('Registration')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                Forms\Components\Toggle::make('registration_required')
                                                    ->label('Require Registration')
                                                    ->default(true)
                                                    ->reactive(),
                                                Forms\Components\DateTimePicker::make('registration_deadline')
                                                    ->label('Registration Deadline')
                                                    ->native(false)
                                                    ->seconds(false)
                                                    ->before('start_date')
                                                    ->visible(fn (Forms\Get $get) => $get('registration_required')),
                                            ]),
                                        Grid::make(2)
                                            ->schema([
                                                Forms\Components\TextInput::make('max_attendees')
                                                    ->label('Maximum Attendees')
                                                    ->numeric()
                                                    ->minValue(1)
                                                    ->placeholder('Unlimited')
                                                    ->visible(fn (Forms\Get $get) => $get('registration_required')),
                                                Forms\Components\TextInput::make('registered_count')
                                                    ->label('Currently Registered')
                                                    ->disabled()
                                                    ->default(0)
                                                    ->visible(fn (Forms\Get $get) => $get('registration_required')),
                                            ]),
                                    ]),
                                Section::make('Pricing')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                Forms\Components\TextInput::make('price')
                                                    ->numeric()
                                                    ->prefix('$')
                                                    ->default(0)
                                                    ->minValue(0)
                                                    ->step(0.01),
                                                Forms\Components\Select::make('currency')
                                                    ->options([
                                                        'USD' => 'USD - US Dollar',
                                                        'EUR' => 'EUR - Euro',
                                                        'GBP' => 'GBP - British Pound',
                                                    ])
                                                    ->default('USD'),
                                            ]),
                                    ]),
                            ]),
                        
                        Tabs\Tab::make('Content')
                            ->schema([
                                Section::make('Speakers')
                                    ->schema([
                                        Forms\Components\Repeater::make('speakers')
                                            ->schema([
                                                Forms\Components\TextInput::make('name')
                                                    ->required(),
                                                Forms\Components\TextInput::make('title')
                                                    ->placeholder('Job Title'),
                                                Forms\Components\TextInput::make('company')
                                                    ->placeholder('Company Name'),
                                                Forms\Components\Textarea::make('bio')
                                                    ->rows(2),
                                                Forms\Components\FileUpload::make('photo')
                                                    ->image()
                                                    ->directory('events/speakers'),
                                            ])
                                            ->columns(2)
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null),
                                    ]),
                                Section::make('Agenda')
                                    ->schema([
                                        Forms\Components\Repeater::make('agenda')
                                            ->schema([
                                                Forms\Components\TimePicker::make('time')
                                                    ->required(),
                                                Forms\Components\TextInput::make('title')
                                                    ->required(),
                                                Forms\Components\Textarea::make('description')
                                                    ->rows(2),
                                                Forms\Components\TextInput::make('speaker')
                                                    ->placeholder('Speaker name'),
                                            ])
                                            ->columns(2)
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => 
                                                ($state['time'] ?? '') . ' - ' . ($state['title'] ?? '')
                                            ),
                                    ]),
                                Section::make('Requirements')
                                    ->schema([
                                        Forms\Components\Repeater::make('requirements')
                                            ->simple(
                                                Forms\Components\TextInput::make('requirement')
                                                    ->placeholder('e.g., Laptop with Chrome browser')
                                            ),
                                    ])
                                    ->collapsible(),
                            ]),
                        
                        Tabs\Tab::make('Media & Settings')
                            ->schema([
                                Section::make('Images')
                                    ->schema([
                                        Forms\Components\FileUpload::make('image')
                                            ->label('Event Image')
                                            ->image()
                                            ->directory('events/images')
                                            ->imageResizeMode('cover')
                                            ->imageCropAspectRatio('16:9')
                                            ->imageResizeTargetWidth('1920')
                                            ->imageResizeTargetHeight('1080'),
                                        Forms\Components\FileUpload::make('cover_image')
                                            ->label('Cover Image')
                                            ->image()
                                            ->directory('events/covers')
                                            ->imageResizeMode('cover')
                                            ->imageCropAspectRatio('21:9')
                                            ->imageResizeTargetWidth('2100')
                                            ->imageResizeTargetHeight('900'),
                                    ]),
                                Section::make('Settings')
                                    ->schema([
                                        Grid::make(3)
                                            ->schema([
                                                Forms\Components\Toggle::make('is_featured')
                                                    ->label('Featured Event'),
                                                Forms\Components\Toggle::make('is_published')
                                                    ->label('Published')
                                                    ->default(true),
                                                Forms\Components\Toggle::make('send_reminders')
                                                    ->label('Send Reminders')
                                                    ->default(true),
                                            ]),
                                        Forms\Components\Select::make('status')
                                            ->options(Event::STATUSES)
                                            ->default('upcoming')
                                            ->required(),
                                        Forms\Components\TagsInput::make('tags')
                                            ->separator(','),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->square()
                    ->size(60)
                    ->defaultImageUrl(url('/images/event-placeholder.png')),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('medium')
                    ->description(fn (Event $record): string => 
                        $record->location ?? 'Online Event'
                    ),
                Tables\Columns\BadgeColumn::make('type')
                    ->colors([
                        'primary' => 'webinar',
                        'success' => 'workshop',
                        'warning' => 'meetup',
                        'danger' => 'conference',
                        'info' => 'course',
                    ]),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'upcoming',
                        'warning' => 'ongoing',
                        'gray' => 'completed',
                        'danger' => 'cancelled',
                    ]),
                Tables\Columns\TextColumn::make('start_date')
                    ->dateTime('M d, Y H:i')
                    ->sortable()
                    ->description(fn (Event $record): ?string => 
                        $record->end_date ? 'to ' . $record->end_date->format('M d, Y H:i') : null
                    ),
                Tables\Columns\TextColumn::make('registered_count')
                    ->label('Registered')
                    ->sortable()
                    ->alignCenter()
                    ->description(fn (Event $record): ?string => 
                        $record->max_attendees ? "of {$record->max_attendees}" : null
                    )
                    ->color(fn (Event $record) => 
                        $record->is_full ? 'danger' : 'success'
                    ),
                Tables\Columns\TextColumn::make('price')
                    ->money('USD')
                    ->sortable()
                    ->alignEnd()
                    ->description(fn (Event $record): string => 
                        $record->price == 0 ? 'Free' : $record->currency
                    ),
                Tables\Columns\IconColumn::make('location_type')
                    ->label('Type')
                    ->getStateUsing(function (Event $record): string {
                        if ($record->meeting_url && $record->venue) return 'hybrid';
                        if ($record->meeting_url) return 'online';
                        return 'physical';
                    })
                    ->icon(function ($state): string {
                        return match($state) {
                            'online' => 'heroicon-o-computer-desktop',
                            'physical' => 'heroicon-o-map-pin',
                            'hybrid' => 'heroicon-o-globe-alt',
                            default => 'heroicon-o-question-mark-circle',
                        };
                    })
                    ->color(function ($state): string {
                        return match($state) {
                            'online' => 'success',
                            'physical' => 'warning',
                            'hybrid' => 'primary',
                            default => 'gray',
                        };
                    })
                    ->alignCenter(),
                Tables\Columns\ToggleColumn::make('is_featured')
                    ->label('Featured')
                    ->onColor('success')
                    ->offColor('gray'),
                Tables\Columns\ToggleColumn::make('is_published')
                    ->label('Published')
                    ->onColor('success')
                    ->offColor('danger'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options(Event::TYPES)
                    ->multiple(),
                Tables\Filters\SelectFilter::make('status')
                    ->options(Event::STATUSES),
                Tables\Filters\SelectFilter::make('cohort_id')
                    ->label('Cohort')
                    ->relationship('cohort', 'name')
                    ->searchable()
                    ->preload(),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured'),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published'),
                Tables\Filters\Filter::make('free')
                    ->query(fn (Builder $query): Builder => $query->free()),
                Tables\Filters\Filter::make('upcoming')
                    ->query(fn (Builder $query): Builder => $query->upcoming()),
            ])
            ->actions([
                Tables\Actions\Action::make('view_registrations')
                    ->label('Registrations')
                    ->icon('heroicon-m-user-group')
                    ->url(fn (Event $record): string => 
                        EventResource::getUrl('registrations', ['record' => $record])
                    ),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('publish')
                        ->label('Publish')
                        ->icon('heroicon-m-eye')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['is_published' => true]))
                        ->deselectRecordsAfterCompletion(),
                    Tables\Actions\BulkAction::make('cancel')
                        ->label('Cancel Events')
                        ->icon('heroicon-m-x-circle')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['status' => 'cancelled']))
                        ->deselectRecordsAfterCompletion(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('start_date', 'asc');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\RegistrationsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'view' => Pages\ViewEvent::route('/{record}'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
            'registrations' => Pages\ManageRegistrations::route('/{record}/registrations'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'slug', 'description', 'location', 'venue'];
    }
}