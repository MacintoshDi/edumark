<?php
namespace App\Filament\Resources;
use App\Filament\Resources\DiscussionTopicResource\Pages;
use App\Models\DiscussionTopic;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
class DiscussionTopicResource extends Resource
{
    protected static ?string $model = DiscussionTopic::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Сообщество';
    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()->schema([
                Select::make('cohort_id')->relationship('cohort', 'name')->required(),
                Select::make('discussion_category_id')->relationship('category', 'name')->required(),
                TextInput::make('title')->required(),
                TextInput::make('slug')->required()->unique(ignoreRecord: true),
                RichEditor::make('content')->required(),
                Toggle::make('is_locked'),
                Toggle::make('is_pinned'),
            ]),
        ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('cohort.name')->label('Когорта')->sortable(),
                TextColumn::make('category.name')->label('Категория')->sortable(),
                IconColumn::make('is_pinned')->boolean(),
                IconColumn::make('is_locked')->boolean(),
            ])
            ->filters([
                SelectFilter::make('cohort')->relationship('cohort', 'name'),
                SelectFilter::make('category')->relationship('category', 'name'),
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
            'index' => Pages\ListDiscussionTopics::route('/'),
            'create' => Pages\CreateDiscussionTopic::route('/create'),
            'edit' => Pages\EditDiscussionTopic::route('/{record}/edit'),
        ];
    }
}