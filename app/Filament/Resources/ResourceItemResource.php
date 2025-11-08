<?php
namespace App\Filament\Resources;
use App\Filament\Resources\ResourceItemResource\Pages;
use App\Models\ResourceItem;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
class ResourceItemResource extends Resource
{
    protected static ?string $model = ResourceItem::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Контент';
    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Основная информация')
                ->schema([
                    Select::make('cohort_id')->relationship('cohort', 'name')->required(),
                    TextInput::make('title')->required(),
                    Select::make('type')->options([
                        'course' => 'Курс',
                        'slides' => 'Слайды',
                        'template' => 'Шаблон',
                        'quiz' => 'Квиз',
                    ])->required(),
                    RichEditor::make('description'),
                    FileUpload::make('file_path'),
                    TextInput::make('url')->url(),
                    Toggle::make('is_published'),
                ]),
        ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                BadgeColumn::make('type')->enum([
                    'course' => 'Курс',
                    'slides' => 'Слайды',
                    'template' => 'Шаблон',
                    'quiz' => 'Квиз',
                ]),
                TextColumn::make('cohort.name')->label('Когорта')->sortable(),
                IconColumn::make('is_published')->boolean(),
            ])
            ->filters([
                SelectFilter::make('cohort')->relationship('cohort', 'name'),
                SelectFilter::make('type')->options([
                    'course' => 'Курс',
                    'slides' => 'Слайды',
                    'template' => 'Шаблон',
                    'quiz' => 'Квиз',
                ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResourceItems::route('/'),
            'create' => Pages\CreateResourceItem::route('/create'),
            'edit' => Pages\EditResourceItem::route('/{record}/edit'),
        ];
    }
}