<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Filament\Resources\ProgramResource\RelationManagers;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Form;
use App\Models\University;
use App\Models\Scholarship;
use App\Models\Degree;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'University Information';
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
                        'non_chinese_nationality' => 'Non-Chinese nationality',
                        'healthy' => 'Physically and mentally healthy, without any crime record',
                        'hsk5' => 'HSK5 or above for Chinese-taught programs',
                        'english_proficiency' => 'IELTS 6.0 / TOEFL 85 / Duolingo 105 or above for English-taught programs',
                        'bachelor_age' => 'Bachelor’s applicants: High school graduates aged 18-26 with a minimum academic score of 75%',
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
        'study_plan' => 'Study plan (written in the teaching language, 800+ words for Master’s, 1000+ words for Doctoral programs)',
        'recommendation_letters' => 'Two Recommendation Letters from professors/associate professors (Chinese or English)',
        'physical_exam' => 'Foreigner Physical Examination Form (within 6 months, covering all required items)',
        'non_criminal_record' => 'Certificate of Non-Criminal Records (valid within 6 months before application)',
        'bank_saving' => 'Certificate of Bank Saving or Income Certificate of Financial Guarantor',
        'other_attachments' => 'Other attachments (e.g., Certificate of award)',
        'bank_deposit' => 'Bank deposit certificate covering at least one academic year’s tuition fees',
        'proof_of_enrollment' => 'Proof of enrollment or transfer certificate (if currently a student)',
        'work_experience' => 'Proof of employment (for applicants with work experience)',
                    ])
                    ->multiple()
                    ->searchable()
                    ->required()
                    ->label('Application Documents'),              
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255)
                    ->default('active'),
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
            ])
            ->filters([
                //
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
