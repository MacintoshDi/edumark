<?php
namespace App\Filament\Resources;
use App\Filament\Resources\DiscussionCategoryResource\Pages;
use App\Models\DiscussionCategory;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
class DiscussionCategoryResource extends Resource
{
    protected static ?string $model = DiscussionCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';
    protected static ?string $navigationGroup = 'Сообщество';
    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()->schema([
                TextInput::make('name')->required(),
                TextInput::make('slug')->required()->unique(ignoreRecord: true),
                RichEditor::make('description'),
                Toggle::make('is_active')->default(true),
            ]),
        ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('slug')->searchable(),
                IconColumn::make('is_active')->boolean(),
            ])
            ->filters([
                Filter::make('active')->query(fn (Builder $query) => $query->where('is_active', true)),
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
            'index' => Pages\ListDiscussionCategories::route('/'),
            'create' => Pages\CreateDiscussionCategory::route('/create'),
            'edit' => Pages\EditDiscussionCategory::route('/{record}/edit'),
        ];
    }
}