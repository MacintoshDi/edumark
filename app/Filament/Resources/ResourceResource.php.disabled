<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResourceResource\Pages;
use App\Filament\Resources\ResourceResource\RelationManagers;
use App\Models\Resource;
use App\Models\Cohort;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource as FilamentResource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;

class ResourceResource extends FilamentResource
{
    protected static ?string $model = Resource::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Education';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $label = 'Learning Resource';

    protected static ?string $pluralLabel = 'Learning Resources';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::published()->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Resource Details')
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
                                                    ->unique(Resource::class, 'slug', ignoreRecord: true)
                                                    ->prefix('resources/')
                                                    ->suffixIcon('heroicon-m-globe-alt'),
                                            ]),
                                        Forms\Components\Textarea::make('description')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                        Grid::make(3)
                                            ->schema([
                                                Forms\Components\Select::make('type')
                                                    ->required()
                                                    ->options(Resource::TYPES)
                                                    ->native(false)
                                                    ->reactive()
                                                    ->afterStateUpdated(fn (Forms\Set $set) => $set('file_type', null)),
                                                Forms\Components\Select::make('cohort_id')
                                                    ->label('Cohort')
                                                    ->relationship('cohort', 'name')
                                                    ->searchable()
                                                    ->preload()
                                                    ->placeholder('All Cohorts'),
                                                Forms\Components\Select::make('user_id')
                                                    ->label('Author')
                                                    ->relationship('author', 'name')
                                                    ->searchable()
                                                    ->preload()
                                                    ->default(auth()->id()),
                                            ]),
                                    ]),
                            ]),
                        
                        Tabs\Tab::make('Content')
                            ->schema([
                                Section::make('File Upload')
                                    ->schema([
                                        Forms\Components\FileUpload::make('file_path')
                                            ->label('Resource File')
                                            ->directory('resources/files')
                                            ->acceptedFileTypes([
                                                'application/pdf',
                                                'application/msword',
                                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                                                'application/vnd.ms-excel',
                                                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                                                'application/vnd.ms-powerpoint',
                                                'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                                                'video/mp4',
                                                'video/webm',
                                                'application/zip',
                                            ])
                                            ->maxSize(102400) // 100MB
                                            ->downloadable()
                                            ->openable()
                                            ->reactive()
                                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                                if ($state instanceof TemporaryUploadedFile) {
                                                    $set('file_type', $state->getMimeType());
                                                    $set('file_size', $state->getSize());
                                                }
                                            })
                                            ->visible(fn (Forms\Get $get) => $get('type') !== 'link'),
                                        Forms\Components\TextInput::make('external_url')
                                            ->label('External URL')
                                            ->url()
                                            ->placeholder('https://example.com/resource')
                                            ->visible(fn (Forms\Get $get) => $get('type') === 'link'),
                                        Forms\Components\FileUpload::make('thumbnail')
                                            ->label('Thumbnail Image')
                                            ->image()
                                            ->directory('resources/thumbnails')
                                            ->imageResizeMode('cover')
                                            ->imageCropAspectRatio('16:9')
                                            ->imageResizeTargetWidth('640')
                                            ->imageResizeTargetHeight('360'),
                                        Forms\Components\TextInput::make('duration')
                                            ->label('Duration (minutes)')
                                            ->numeric()
                                            ->minValue(1)
                                            ->visible(fn (Forms\Get $get) => in_array($get('type'), ['video', 'course'])),
                                    ]),
                            ]),
                        
                        Tabs\Tab::make('Metadata')
                            ->schema([
                                Section::make('Organization')
                                    ->schema([
                                        Forms\Components\TagsInput::make('tags')
                                            ->separator(',')
                                            ->suggestions([
                                                'JavaScript',
                                                'PHP',
                                                'Laravel',
                                                'React',
                                                'Vue.js',
                                                'Python',
                                                'Database',
                                                'API',
                                                'Frontend',
                                                'Backend',
                                            ])
                                            ->columnSpanFull(),
                                        Grid::make(3)
                                            ->schema([
                                                Forms\Components\Toggle::make('is_downloadable')
                                                    ->label('Allow Downloads')
                                                    ->default(true)
                                                    ->helperText('Students can download this resource'),
                                                Forms\Components\Toggle::make('is_featured')
                                                    ->label('Featured')
                                                    ->helperText('Show in featured resources'),
                                                Forms\Components\Toggle::make('is_published')
                                                    ->label('Published')
                                                    ->default(true)
                                                    ->helperText('Visible to students'),
                                            ]),
                                        Forms\Components\TextInput::make('sort_order')
                                            ->label('Display Order')
                                            ->numeric()
                                            ->default(0)
                                            ->minValue(0)
                                            ->helperText('Lower numbers appear first'),
                                    ]),
                                Section::make('Statistics')
                                    ->schema([
                                        Grid::make(3)
                                            ->schema([
                                                Forms\Components\TextInput::make('views')
                                                    ->disabled()
                                                    ->default(0),
                                                Forms\Components\TextInput::make('downloads')
                                                    ->disabled()
                                                    ->default(0),
                                                Forms\Components\TextInput::make('file_size')
                                                    ->disabled()
                                                    ->formatStateUsing(function ($state) {
                                                        if (!$state) return 'N/A';
                                                        $units = ['B', 'KB', 'MB', 'GB'];
                                                        $size = $state;
                                                        $unit = 0;
                                                        while ($size >= 1024 && $unit < count($units) - 1) {
                                                            $size /= 1024;
                                                            $unit++;
                                                        }
                                                        return round($size, 2) . ' ' . $units[$unit];
                                                    }),
                                            ]),
                                    ])
                                    ->collapsible(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->defaultImageUrl(fn ($record) => $record->thumbnail_url)
                    ->square()
                    ->size(60),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('medium')
                    ->description(fn (Resource $record): string => Str::limit($record->description, 50)),
                Tables\Columns\BadgeColumn::make('type')
                    ->colors([
                        'primary' => 'course',
                        'success' => 'document',
                        'warning' => 'slide',
                        'danger' => 'video',
                        'gray' => 'link',
                        'info' => 'template',
                    ])
                    ->icons([
                        'heroicon-o-academic-cap' => 'course',
                        'heroicon-o-document-text' => 'document',
                        'heroicon-o-presentation-chart-bar' => 'slide',
                        'heroicon-o-play-circle' => 'video',
                        'heroicon-o-link' => 'link',
                        'heroicon-o-document-duplicate' => 'template',
                    ]),
                Tables\Columns\TextColumn::make('cohort.name')
                    ->label('Cohort')
                    ->sortable()
                    ->placeholder('All Cohorts')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->label('Author')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('file_size')
                    ->label('Size')
                    ->formatStateUsing(fn ($record) => $record->formatted_file_size)
                    ->alignEnd()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('duration')
                    ->label('Duration')
                    ->formatStateUsing(fn ($record) => $record->formatted_duration)
                    ->alignEnd()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('views')
                    ->sortable()
                    ->alignCenter()
                    ->icon('heroicon-m-eye'),
                Tables\Columns\TextColumn::make('downloads')
                    ->sortable()
                    ->alignCenter()
                    ->icon('heroicon-m-arrow-down-tray'),
                Tables\Columns\ToggleColumn::make('is_downloadable')
                    ->label('Downloadable')
                    ->onColor('success')
                    ->offColor('danger')
                    ->toggleable(isToggledHiddenByDefault: true),
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
                    ->options(Resource::TYPES)
                    ->multiple(),
                Tables\Filters\SelectFilter::make('cohort_id')
                    ->label('Cohort')
                    ->relationship('cohort', 'name')
                    ->searchable()
                    ->preload(),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured'),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published'),
                Tables\Filters\TernaryFilter::make('is_downloadable')
                    ->label('Downloadable'),
            ])
            ->actions([
                Tables\Actions\Action::make('download')
                    ->label('Download')
                    ->icon('heroicon-m-arrow-down-tray')
                    ->url(fn (Resource $record) => $record->download_url)
                    ->openUrlInNewTab()
                    ->visible(fn (Resource $record) => $record->file_path && $record->is_downloadable),
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
                    Tables\Actions\BulkAction::make('unpublish')
                        ->label('Unpublish')
                        ->icon('heroicon-m-eye-slash')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['is_published' => false]))
                        ->deselectRecordsAfterCompletion(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResources::route('/'),
            'create' => Pages\CreateResource::route('/create'),
            'view' => Pages\ViewResource::route('/{record}'),
            'edit' => Pages\EditResource::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'slug', 'description', 'tags'];
    }
}