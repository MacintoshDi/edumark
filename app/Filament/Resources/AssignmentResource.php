<?php
namespace App\Filament\Resources;
use App\Filament\Resources\AssignmentResource\Pages;
use App\Models\Assignment;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
class AssignmentResource extends Resource
{
    protected static ?string $model = Assignment::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationGroup = 'Контент';
    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Задание')
                ->schema([
                    Select::make('cohort_id')->relationship('cohort', 'name')->required(),
                    TextInput::make('title')->required(),
                    RichEditor::make('description'),
                    DateTimePicker::make('due_date'),
                    TextInput::make('max_score')->numeric(),
                    Toggle::make('is_published'),
                ]),
            Section::make('Оценивание')
                ->schema([
                    RichEditor::make('feedback_template'),
                ]),
        ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('cohort.name')->label('Когорта')->sortable(),
                TextColumn::make('due_date')->dateTime(),
                IconColumn::make('is_published')->boolean(),
            ])
            ->filters([
                SelectFilter::make('cohort')->relationship('cohort', 'name'),
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
            'index' => Pages\ListAssignments::route('/'),
            'create' => Pages\CreateAssignment::route('/create'),
            'edit' => Pages\EditAssignment::route('/{record}/edit'),
        ];
    }
}