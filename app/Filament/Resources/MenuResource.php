<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers\ItemsRelationManager;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-bars-3';
    
    protected static ?string $navigationLabel = 'Меню';
    
    protected static ?string $navigationGroup = 'Контент';
    
    protected static ?int $navigationSort = 1;

    public static function getModelLabel(): string
    {
        return 'Меню';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Меню';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Основная информация')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Название меню')
                        ->required()
                        ->maxLength(255)
                        ->helperText('Например: Главное меню')
                        ->columnSpanFull(),
                    
                    Forms\Components\TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255)
                        ->helperText('Например: main, footer-menu')
                        ->rule('alpha_dash')
                        ->lowercase()
                        ->columnSpanFull(),
                ])
                ->columns(1),
            
            Forms\Components\Section::make('Настройки отображения')
                ->schema([
                    Forms\Components\Select::make('location')
                        ->label('Расположение')
                        ->options([
                            'header' => 'Шапка сайта (Header)',
                            'footer' => 'Подвал сайта (Footer)',
                            'sidebar' => 'Боковая панель (Sidebar)',
                            'other' => 'Другое',
                        ])
                        ->default('header')
                        ->required()
                        ->columnSpan(1),
                    
                    Forms\Components\CheckboxList::make('devices')
                        ->label('Устройства')
                        ->options([
                            'desktop' => 'Desktop (Десктоп)',
                            'tablet' => 'Tablet (Планшет)',
                            'mobile' => 'Mobile (Мобильный)',
                        ])
                        ->default(['desktop', 'tablet', 'mobile'])
                        ->helperText('Выберите устройства, на которых будет отображаться меню')
                        ->columns(3)
                        ->columnSpan(1),
                    
                    Forms\Components\Toggle::make('is_active')
                        ->label('Активно')
                        ->default(true)
                        ->helperText('Только активные меню отображаются на сайте')
                        ->columnSpanFull(),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Название')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Slug скопирован!')
                    ->fontFamily('mono')
                    ->size('sm'),
                
                Tables\Columns\BadgeColumn::make('location')
                    ->label('Расположение')
                    ->colors([
                        'primary' => 'header',
                        'success' => 'footer',
                        'warning' => 'sidebar',
                        'secondary' => 'other',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'header' => 'Header',
                        'footer' => 'Footer',
                        'sidebar' => 'Sidebar',
                        'other' => 'Other',
                        default => $state,
                    }),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активно')
                    ->boolean()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('items_count')
                    ->label('Пунктов')
                    ->counts('items')
                    ->sortable()
                    ->alignCenter()
                    ->badge()
                    ->color('success'),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Создано')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('location')
                    ->label('Расположение')
                    ->options([
                        'header' => 'Header',
                        'footer' => 'Footer',
                        'sidebar' => 'Sidebar',
                        'other' => 'Other',
                    ]),
                
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Активность')
                    ->placeholder('Все меню')
                    ->trueLabel('Только активные')
                    ->falseLabel('Только неактивные'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            ItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }

    /**
     * Проверка доступа к ресурсу
     * Доступ только для ролей admin и editor
     */
    public static function canViewAny(): bool
    {
        $user = auth()->user();
        
        if (!$user) {
            return false;
        }

        // Проверяем роли через spatie/permission
        return $user->hasAnyRole(['admin', 'editor']);
    }

    public static function canCreate(): bool
    {
        return static::canViewAny();
    }

    public static function canEdit($record): bool
    {
        return static::canViewAny();
    }

    public static function canDelete($record): bool
    {
        return static::canViewAny();
    }

    public static function canDeleteAny(): bool
    {
        return static::canViewAny();
    }
}