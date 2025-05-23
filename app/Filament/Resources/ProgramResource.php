<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProgramsImport;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Education Management';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('university_id')
                    ->relationship('university', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('program_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('degree_id')
                    ->relationship('degree', 'name')
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('language')
                    ->label('Language of Instruction')
                    ->options([
                        'English' => 'English',
                        'Chinese' => 'Chinese',
                    ])
                    ->required(),
                Forms\Components\Select::make('duration')
                    ->label('Duration of Program')
                    ->options([
                        '1 Semester' => '1 Semester',
                        '2 years' => '2 years',
                        '3 years' => '3 years',
                        '4 years' => '4 years',
                        '5 years' => '5 years',
                    ])
                    ->required(),
                Forms\Components\Select::make('intake')
                    ->options([
                        'Spring' => 'Spring',
                        'Autumn' => 'Autumn',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('tuition_fee')
                    ->required()
                    ->prefix('¥'),
                Forms\Components\TextInput::make('registration_fee')
                    ->prefix('¥')
                    ->default(null),
                Forms\Components\TextInput::make('single_room_cost')
                    ->prefix('¥')
                    ->default(null),
                Forms\Components\TextInput::make('double_room_cost')
                    ->prefix('¥')
                    ->default(null),
                Forms\Components\TextInput::make('triple_room_cost')
                    ->prefix('¥')
                    ->default(null),
                Forms\Components\TextInput::make('four_room_cost')
                    ->prefix('¥')
                    ->default(null),
                Forms\Components\DatePicker::make('application_deadline'),
                Forms\Components\Select::make('scholarship_id')
                    ->relationship('scholarship', 'name')
                    ->preload()
                    ->default(null),
                Forms\Components\Select::make('requirements')
                    ->options([
                        'high_school_diploma' => 'High School Diploma',
                        'bachelor_degree' => 'Bachelor\'s Degree',
                        'master_degree' => 'Master\'s Degree',
                        'language_proficiency' => 'Language Proficiency',
                        'recommendation_letters' => 'Recommendation Letters',
                        'work_experience' => 'Work Experience',
                        'portfolio' => 'Portfolio',
                        'interview' => 'Interview',
                        'entrance_exam' => 'Entrance Exam',
                    ])
                    ->multiple()
                    ->searchable()
                    ->required()
                    ->label('Applicant Requirements'),
                Forms\Components\Select::make('application_documents')
                    ->options([
                        'application_form' => 'Application Form',
                        'digital_photo' => 'Digital Photo',
                        'notarized_diploma_transcript' => 'Scan of the notarized translation of highest diploma and transcript',
                        'passport_visa' => 'Photocopy of passport and Chinese visa pages',
                        'language_proficiency' => 'Language Proficiency Certificate',
                        'personal_resume' => 'Personal Resume',
                        'study_plan' => 'Study plan (written in the teaching language, 800+ words for Master\'s, 1000+ words for Doctoral programs)',
                        'recommendation_letters' => 'Two Recommendation Letters from professors/associate professors (Chinese or English)',
                    ])
                    ->multiple()
                    ->searchable()
                    ->required()
                    ->label('Application Documents'),              
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255)
                    ->default('active'),
                Forms\Components\Toggle::make('is_recommended')
                    ->label('Recommend on Homepage')
                    ->helperText('Display this program in the recommended section on the homepage')
                    ->default(false),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('university.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('program_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('degree.name')
                    ->searchable(),//
                Tables\Columns\TextColumn::make('language')
                    ->searchable(),
                Tables\Columns\TextColumn::make('duration')
                    ->searchable(),
                Tables\Columns\TextColumn::make('intake')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tuition_fee')
                    ->searchable(),
                //Tables\Columns\TextColumn::make('registration_fee')
                    //->searchable(),
               // Tables\Columns\TextColumn::make('single_room_cost')
                 //   ->searchable(),
               // Tables\Columns\TextColumn::make('double_room_cost')
                 //   ->searchable(),
               // Tables\Columns\TextColumn::make('triple_room_cost')
               //     ->searchable(),
              //  Tables\Columns\TextColumn::make('four_room_cost')
                  //  ->searchable(),
               // Tables\Columns\TextColumn::make('application_deadline')
                  //  ->date()
                  //  ->sortable(),
                //Tables\Columns\TextColumn::make('scholarship')
                 //   ->searchable(),
                //Tables\Columns\TextColumn::make('requirements')
                //    ->searchable(),
               // Tables\Columns\TextColumn::make('application_documents')
                //    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('is_recommended')
                    ->label('Recommended')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\Filter::make('is_recommended')
                    ->label('Recommended Programs')
                    ->query(fn ($query) => $query->where('is_recommended', true)),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}


