<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DiscussionResource\Pages;
use App\Filament\Resources\DiscussionResource\RelationManagers;
use App\Models\Discussion;
use App\Models\DiscussionCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;

class DiscussionResource extends Resource
{
    protected static ?string $model = Discussion::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $navigationGroup = 'Community';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::unsolved()->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        $count = static::getNavigationBadge();
        return $count > 10 ? 'warning' : 'gray';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Discussion Details')
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
                                    ->unique(Discussion::class, 'slug', ignoreRecord: true)
                                    ->prefix('discussions/')
                                    ->suffixIcon('heroicon-m-globe-alt'),
                            ]),
                        Forms\Components\RichEditor::make('content')
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
                                    ->options(Discussion::TYPES)
                                    ->default('question'),
                                Forms\Components\Select::make('category_id')
                                    ->label('Category')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                Forms\Components\Select::make('cohort_id')
                                    ->label('Cohort')
                                    ->relationship('cohort', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->placeholder('All Cohorts'),
                            ]),
                        Forms\Components\Select::make('user_id')
                            ->label('Author')
                            ->relationship('author', 'name')
                            ->searchable()
                            ->preload()
                            ->default(auth()->id())
                            ->required(),
                    ]),

                Section::make('Tags & Metadata')
                    ->schema([
                        Forms\Components\TagsInput::make('tags')
                            ->separator(',')
                            ->suggestions([
                                'help',
                                'bug',
                                'feature-request',
                                'tutorial',
                                'discussion',
                                'announcement',
                                'solved',
                                'urgent',
                            ])
                            ->columnSpanFull(),
                        Forms\Components\KeyValue::make('meta')
                            ->label('Additional Data')
                            ->addButtonLabel('Add Field')
                            ->keyLabel('Key')
                            ->valueLabel('Value')
                            ->reorderable(),
                    ])
                    ->collapsible(),

                Section::make('Status & Settings')
                    ->schema([
                        Grid::make(4)
                            ->schema([
                                Forms\Components\Toggle::make('is_pinned')
                                    ->label('Pinned')
                                    ->helperText('Pin to top'),
                                Forms\Components\Toggle::make('is_locked')
                                    ->label('Locked')
                                    ->helperText('No new replies'),
                                Forms\Components\Toggle::make('is_solved')
                                    ->label('Solved')
                                    ->helperText('Mark as solved'),
                                Forms\Components\Toggle::make('is_published')
                                    ->label('Published')
                                    ->default(true),
                            ]),
                        Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('views')
                                    ->disabled()
                                    ->default(0),
                                Forms\Components\TextInput::make('replies_count')
                                    ->disabled()
                                    ->default(0),
                                Forms\Components\TextInput::make('likes_count')
                                    ->disabled()
                                    ->default(0),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('medium')
                    ->description(function (Discussion $record): string {
                        $desc = $record->author->name;
                        if ($record->cohort) {
                            $desc .= ' in ' . $record->cohort->name;
                        }
                        return $desc;
                    })
                    ->wrap(),
                Tables\Columns\BadgeColumn::make('type')
                    ->colors([
                        'primary' => 'question',
                        'success' => 'guide',
                        'warning' => 'feedback',
                        'danger' => 'announcement',
                        'gray' => 'discussion',
                    ]),
                Tables\Columns\TextColumn::make('category.name')
                    ->sortable()
                    ->badge()
                    ->color(fn ($record) => $record->category->color ?? 'gray'),
                Tables\Columns\IconColumn::make('status')
                    ->label('Status')
                    ->getStateUsing(function (Discussion $record): string {
                        if ($record->is_solved) return 'solved';
                        if ($record->is_locked) return 'locked';
                        if ($record->is_pinned) return 'pinned';
                        return 'normal';
                    })
                    ->icon(function ($state): string {
                        return match($state) {
                            'solved' => 'heroicon-o-check-circle',
                            'locked' => 'heroicon-o-lock-closed',
                            'pinned' => 'heroicon-o-bookmark',
                            default => 'heroicon-o-chat-bubble-left',
                        };
                    })
                    ->color(function ($state): string {
                        return match($state) {
                            'solved' => 'success',
                            'locked' => 'danger',
                            'pinned' => 'warning',
                            default => 'gray',
                        };
                    })
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('replies_count')
                    ->label('Replies')
                    ->sortable()
                    ->alignCenter()
                    ->icon('heroicon-m-chat-bubble-left-ellipsis'),
                Tables\Columns\TextColumn::make('likes_count')
                    ->label('Likes')
                    ->sortable()
                    ->alignCenter()
                    ->icon('heroicon-m-heart')
                    ->color(fn ($state) => $state > 0 ? 'danger' : 'gray'),
                Tables\Columns\TextColumn::make('views')
                    ->sortable()
                    ->alignCenter()
                    ->icon('heroicon-m-eye'),
                Tables\Columns\TextColumn::make('last_activity_at')
                    ->label('Last Activity')
                    ->dateTime('M d, H:i')
                    ->sortable()
                    ->description(fn (Discussion $record): string => 
                        $record->last_activity_at ? $record->last_activity_at->diffForHumans() : 'No activity'
                    ),
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
                    ->options(Discussion::TYPES)
                    ->multiple(),
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload(),
                Tables\Filters\SelectFilter::make('cohort_id')
                    ->label('Cohort')
                    ->relationship('cohort', 'name')
                    ->searchable()
                    ->preload(),
                Tables\Filters\TernaryFilter::make('is_solved')
                    ->label('Solved')
                    ->queries(
                        true: fn (Builder $query) => $query->where('is_solved', true),
                        false: fn (Builder $query) => $query->where('is_solved', false),
                        blank: fn (Builder $query) => $query,
                    ),
                Tables\Filters\TernaryFilter::make('is_pinned')
                    ->label('Pinned'),
                Tables\Filters\TernaryFilter::make('is_locked')
                    ->label('Locked'),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published'),
            ])
            ->actions([
                Tables\Actions\Action::make('toggle_pin')
                    ->label(fn (Discussion $record) => $record->is_pinned ? 'Unpin' : 'Pin')
                    ->icon(fn (Discussion $record) => $record->is_pinned ? 'heroicon-m-bookmark-slash' : 'heroicon-m-bookmark')
                    ->color(fn (Discussion $record) => $record->is_pinned ? 'gray' : 'warning')
                    ->action(fn (Discussion $record) => $record->togglePin()),
                Tables\Actions\Action::make('toggle_lock')
                    ->label(fn (Discussion $record) => $record->is_locked ? 'Unlock' : 'Lock')
                    ->icon(fn (Discussion $record) => $record->is_locked ? 'heroicon-m-lock-open' : 'heroicon-m-lock-closed')
                    ->color(fn (Discussion $record) => $record->is_locked ? 'gray' : 'danger')
                    ->action(fn (Discussion $record) => $record->toggleLock()),
                Tables\Actions\Action::make('mark_solved')
                    ->label('Mark as Solved')
                    ->icon('heroicon-m-check-circle')
                    ->color('success')
                    ->visible(fn (Discussion $record) => !$record->is_solved && $record->type === 'question')
                    ->action(fn (Discussion $record) => $record->markAsSolved()),
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
                    Tables\Actions\BulkAction::make('lock')
                        ->label('Lock')
                        ->icon('heroicon-m-lock-closed')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['is_locked' => true]))
                        ->deselectRecordsAfterCompletion(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('last_activity_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\RepliesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDiscussions::route('/'),
            'create' => Pages\CreateDiscussion::route('/create'),
            'view' => Pages\ViewDiscussion::route('/{record}'),
            'edit' => Pages\EditDiscussion::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'slug', 'content', 'tags'];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with(['category', 'cohort', 'author']);
    }
}