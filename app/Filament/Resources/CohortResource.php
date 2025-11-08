<?php
namespace App\Filament\Resources;
use App\Filament\Resources\CohortResource\Pages;
use App\Models\Cohort;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MultiSelect;
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
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
class CohortResource extends Resource
{
    protected static ?string $model = Cohort::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Учебные программы';
    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Основная информация')
                ->schema([
                    TextInput::make('name')->required(),
                    TextInput::make('slug')->required()->unique(ignoreRecord: true),
                    RichEditor::make('description'),
                    DatePicker::make('start_date'),
                    ColorPicker::make('color'),
                    TextInput::make('icon'),
                    Toggle::make('is_active')->default(true),
                ]),
            Section::make('Связи')
                ->schema([
                    MultiSelect::make('students')
                        ->relationship('students', 'last_name')
                        ->placeholder('Выберите студентов'),
                    MultiSelect::make('teachers')
                        ->relationship('teachers', 'last_name')
                        ->placeholder('Выберите преподавателей'),
                ]),
        ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('slug')->searchable(),
                TextColumn::make('start_date')->date(),
                IconColumn::make('is_active')->boolean(),
                TextColumn::make('students_count')->counts('students')->label('Студенты'),
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
            'index' => Pages\ListCohorts::route('/'),
            'create' => Pages\CreateCohort::route('/create'),
            'edit' => Pages\EditCohort::route('/{record}/edit'),
        ];
    }
}