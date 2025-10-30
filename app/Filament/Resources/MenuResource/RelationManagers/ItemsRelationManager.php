<?php

namespace App\Filament\Resources\MenuResource\RelationManagers;

use App\Models\MenuItem;
use App\Repositories\MenuRepository;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';
    
    protected static ?string $title = 'Пункты меню';
    
    protected static ?string $recordTitleAttribute = 'title';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Основная информация')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Название')
                        ->required()
                        ->maxLength(255)
                        ->helperText('Текст, который будет отображаться в меню')
                        ->columnSpanFull(),
                    
                    Forms\Components\Select::make('parent_id')
                        ->label('Родительский пункт')
                        ->relationship('parent', 'title', fn ($query) => 
                            $query->where('menu_id', $this->getOwnerRecord()->id)
                        )
                        ->searchable()
                        ->preload()
                        ->helperText('Оставьте пустым для корневого пункта')
                        ->columnSpan(1),
                    
                    Forms\Components\Select::make('type')
                        ->label('Тип')
                        ->options([
                            'link' => 'Ссылка (Link)',
                            'dropdown' => 'Выпадающее меню (Dropdown)',
                            'mega' => 'Mega меню',
                            'feature-tile' => 'Feature Tile (карточка)',
                            'dynamic-source' => 'Динамический источник',
                            'button' => 'Кнопка (Button)',
                        ])
                        ->default('link')
                        ->required()
                        ->reactive()
                        ->helperText('Тип отображения пункта меню')
                        ->columnSpan(1),
                ])
                ->columns(2),
            
            Forms\Components\Section::make('Ссылка и действие')
                ->schema([
                    Forms\Components\TextInput::make('url')
                        ->label('URL')
                        ->maxLength(255)
                        ->helperText('Например: /cohorts, https://example.com')
                        ->placeholder('/example')
                        ->columnSpan(1),
                    
                    Forms\Components\TextInput::make('icon')
                        ->label('Иконка')
                        ->maxLength(255)
                        ->helperText('Название иконки (например: heroicon-o-home)')
                        ->placeholder('heroicon-o-home')
                        ->columnSpan(1),
                ])
                ->columns(2),
            
            Forms\Components\Section::make('Отображение на устройствах')
                ->schema([
                    Forms\Components\CheckboxList::make('devices')
                        ->label('Устройства')
                        ->options([
                            'desktop' => 'Desktop',
                            'tablet' => 'Tablet',
                            'mobile' => 'Mobile',
                        ])
                        ->helperText('Оставьте пустым, чтобы наследовать от меню')
                        ->columns(3)
                        ->columnSpanFull(),
                ])
                ->collapsible()
                ->collapsed(),
            
            Forms\Components\Section::make('Дополнительные настройки (Meta)')
                ->schema([
                    Forms\Components\KeyValue::make('meta')
                        ->label('Метаданные')
                        ->helperText('Ключи: description, icon, badge, cta_text, target, is_external, source_model, source_limit, source_order')
                        ->keyLabel('Ключ')
                        ->valueLabel('Значение')
                        ->addActionLabel('Добавить поле')
                        ->reorderable()
                        ->columnSpanFull(),
                ])
                ->collapsible()
                ->collapsed(),
            
            Forms\Components\Section::make('Порядок и активность')
                ->schema([
                    Forms\Components\TextInput::make('order')
                        ->label('Порядок сортировки')
                        ->numeric()
                        ->default(0)
                        ->required()
                        ->helperText('Чем меньше число, тем выше в списке')
                        ->columnSpan(1),
                    
                    Forms\Components\Toggle::make('is_active')
                        ->label('Активен')
                        ->default(true)
                        ->helperText('Только активные пункты отображаются на сайте')
                        ->columnSpan(1),
                ])
                ->columns(2),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->label('#')
                    ->sortable()
                    ->alignCenter()
                    ->size('sm')
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('Название')
                    ->searchable()
                    ->sortable()
                    ->description(fn (MenuItem $record): ?string => $record->parent ? "→ Дочерний пункт" : null)
                    ->weight('medium'),
                
                Tables\Columns\BadgeColumn::make('type')
                    ->label('Тип')
                    ->colors([
                        'primary' => 'link',
                        'success' => 'mega',
                        'warning' => 'dropdown',
                        'info' => 'feature-tile',
                        'danger' => 'dynamic-source',
                        'secondary' => 'button',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'link' => 'Link',
                        'dropdown' => 'Dropdown',
                        'mega' => 'Mega',
                        'feature-tile' => 'Feature',
                        'dynamic-source' => 'Dynamic',
                        'button' => 'Button',
                        default => $state,
                    }),
                
                Tables\Columns\TextColumn::make('url')
                    ->label('URL')
                    ->limit(30)
                    ->tooltip(fn (MenuItem $record): ?string => $record->url)
                    ->fontFamily('mono')
                    ->size('sm')
                    ->toggleable(),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активен')
                    ->boolean()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('children_count')
                    ->label('Детей')
                    ->counts('children')
                    ->badge()
                    ->color('success')
                    ->toggleable(),
            ])
            ->reorderable('order')
            ->defaultSort('order', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->label('Тип')
                    ->options([
                        'link' => 'Link',
                        'dropdown' => 'Dropdown',
                        'mega' => 'Mega',
                        'feature-tile' => 'Feature Tile',
                        'dynamic-source' => 'Dynamic Source',
                        'button' => 'Button',
                    ]),
                
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Активность')
                    ->placeholder('Все пункты')
                    ->trueLabel('Только активные')
                    ->falseLabel('Только неактивные'),
                
                Tables\Filters\SelectFilter::make('parent_id')
                    ->label('Уровень')
                    ->options([
                        'root' => 'Корневые пункты',
                        'children' => 'Дочерние пункты',
                    ])
                    ->query(function ($query, array $data) {
                        if ($data['value'] === 'root') {
                            return $query->whereNull('parent_id');
                        }
                        if ($data['value'] === 'children') {
                            return $query->whereNotNull('parent_id');
                        }
                        return $query;
                    }),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Добавить пункт'),
                
                Tables\Actions\Action::make('preview')
                    ->label('Предпросмотр JSON')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->modalHeading('Предпросмотр структуры меню')
                    ->modalWidth('5xl')
                    ->modalContent(function () {
                        $menu = $this->getOwnerRecord();
                        $repository = app(MenuRepository::class);
                        
                        try {
                            // Получаем дерево меню
                            $tree = $repository->getTree($menu->slug, $menu->location, 'desktop');
                            
                            if (!$tree) {
                                return view('filament.components.json-preview', [
                                    'json' => json_encode(['error' => 'Меню не найдено или неактивно'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                                    'message' => 'Не удалось загрузить меню'
                                ]);
                            }
                            
                            return view('filament.components.json-preview', [
                                'json' => json_encode($tree, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                                'message' => null
                            ]);
                        } catch (\Exception $e) {
                            return view('filament.components.json-preview', [
                                'json' => json_encode(['error' => $e->getMessage()], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                                'message' => 'Ошибка при загрузке меню'
                            ]);
                        }
                    })
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Закрыть'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                
                Tables\Actions\Action::make('preview_item')
                    ->label('JSON')
                    ->icon('heroicon-o-code-bracket')
                    ->color('gray')
                    ->modalHeading(fn (MenuItem $record) => "Предпросмотр: {$record->title}")
                    ->modalWidth('3xl')
                    ->modalContent(function (MenuItem $record) {
                        $repository = app(MenuRepository::class);
                        $menu = $this->getOwnerRecord();
                        
                        try {
                            // Получаем дерево меню
                            $tree = $repository->getTree($menu->slug, $menu->location, 'desktop');
                            
                            if (!$tree) {
                                return view('filament.components.json-preview', [
                                    'json' => json_encode(['error' => 'Меню не найдено'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                                    'message' => null
                                ]);
                            }
                            
                            // Ищем текущий пункт в дереве
                            $findItem = function ($items, $id) use (&$findItem) {
                                foreach ($items as $item) {
                                    if ($item['id'] === $id) {
                                        return $item;
                                    }
                                    if (isset($item['children'])) {
                                        $found = $findItem($item['children'], $id);
                                        if ($found) {
                                            return $found;
                                        }
                                    }
                                }
                                return null;
                            };
                            
                            $itemData = $findItem($tree['items'], $record->id);
                            
                            if (!$itemData) {
                                $itemData = ['info' => 'Пункт не найден в дереве (возможно, неактивен)'];
                            }
                            
                            return view('filament.components.json-preview', [
                                'json' => json_encode($itemData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                                'message' => null
                            ]);
                        } catch (\Exception $e) {
                            return view('filament.components.json-preview', [
                                'json' => json_encode(['error' => $e->getMessage()], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                                'message' => null
                            ]);
                        }
                    })
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Закрыть'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    
                    Tables\Actions\BulkAction::make('activate')
                        ->label('Активировать')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(function ($records) {
                            $records->each->update(['is_active' => true]);
                            
                            Notification::make()
                                ->title('Пункты активированы')
                                ->success()
                                ->send();
                        })
                        ->deselectRecordsAfterCompletion(),
                    
                    Tables\Actions\BulkAction::make('deactivate')
                        ->label('Деактивировать')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->action(function ($records) {
                            $records->each->update(['is_active' => false]);
                            
                            Notification::make()
                                ->title('Пункты деактивированы')
                                ->success()
                                ->send();
                        })
                        ->deselectRecordsAfterCompletion(),
                ]),
            ]);
    }

    /**
     * Ограничение доступа: только admin/editor
     */
    protected static function userHasRoleAccess(): bool
    {
        $user = auth()->user();
        return $user && method_exists($user, 'hasAnyRole')
            ? $user->hasAnyRole(['admin', 'editor'])
            : false;
    }

    public static function canViewForRecord($ownerRecord, string $pageClass): bool
    {
        return static::userHasRoleAccess();
    }

    public function canCreate(): bool
    {
        return static::userHasRoleAccess();
    }

    public function canEdit($record): bool
    {
        return static::userHasRoleAccess();
    }

    public function canDelete($record): bool
    {
        return static::userHasRoleAccess();
    }

    public function canDeleteAny(): bool
    {
        return static::userHasRoleAccess();
    }
}