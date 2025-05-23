<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CareerResource\Pages;
use App\Filament\Resources\CareerResource\RelationManagers;
use App\Models\Career;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CareerResource extends Resource
{
    protected static ?string $model = Career::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Careers';
    protected static ?string $navigationLabel = 'Careers';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Job Title')
                            ->placeholder('e.g Software Engineer')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('company')
                            ->label('Company Name')
                            ->placeholder('e.g. SinoWay Education')
                            ->maxLength(255),
                        Forms\Components\Select::make('type')
                            ->options([
                                'Full-Time' => 'Full-Time',
                                'Part-Time' => 'Part-Time',
                                'Contract' => 'Contract',
                                'Internship' => 'Internship',
                                'Freelance' => 'Freelance',
                            ])
                            ->label('Job Type')
                            ->required()
                            ->default('Full-Time'),
                        Forms\Components\Select::make('category')
                            ->options([
                                'Education' => 'Education',
                                'IT' => 'IT & Technology',
                                'Business' => 'Business & Finance',
                                'Engineering' => 'Engineering',
                                'Healthcare' => 'Healthcare',
                                'Marketing' => 'Marketing',
                                'Sales' => 'Sales',
                                'HR' => 'HR',
                                'Finance' => 'Finance',
                            ])
                            ->label('Job Category')
                            ->required(),
                        Forms\Components\TextInput::make('salary_range')
                            ->label('Salary Range')
                            ->placeholder('e.g. 7000 - 15000 RMB')
                            ->maxLength(255),
                    ])->columns(2),
                
                Forms\Components\Section::make('Job Details')
                    ->schema([
                        Forms\Components\Textarea::make('summary')
                            ->label('Job Summary')
                            ->placeholder('e.g. We are looking for a talented software engineer to join our team.')
                            ->rows(3),
                        Forms\Components\RichEditor::make('description')
                            ->label('Full Job Description')
                            ->placeholder('Type the full job description here...')
                            ->required()
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('careers/descriptions'),
                    ])->columns(1),
                
                Forms\Components\Section::make('Location & Deadline')
                    ->schema([
                        Forms\Components\TextInput::make('city')
                            ->label('City')
                            ->placeholder('e.g. Beijing')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('application_deadline')
                            ->label('Application Deadline')
                            ->required(),
                        Forms\Components\FileUpload::make('job_details_attachment')
                            ->label('Job Details PDF')
                            ->helperText('Upload a PDF with detailed job description or terms of reference')
                            ->disk('public')
                            ->directory('careers/attachments')
                            ->acceptedFileTypes(['application/pdf']),
                    ])->columns(2),
                
                Forms\Components\Section::make('Status')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active Job Listing')
                            ->helperText('Toggle to show/hide this job on the website')
                            ->default(true)
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Job Title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('company')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('city')
                    ->label('Location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Full-Time' => 'success',
                        'Part-Time' => 'warning',
                        'Contract' => 'info',
                        'Internship' => 'danger',
                        'Freelance' => 'gray',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('category')
                    ->searchable(),
                Tables\Columns\TextColumn::make('salary_range')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('application_deadline')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'Full-Time' => 'Full-Time',
                        'Part-Time' => 'Part-Time',
                        'Contract' => 'Contract',
                        'Internship' => 'Internship',
                        'Freelance' => 'Freelance',
                    ]),
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'Education' => 'Education',
                        'IT' => 'IT & Technology',
                        'Business' => 'Business & Finance',
                        'Engineering' => 'Engineering',
                        'Healthcare' => 'Healthcare',
                        'Marketing' => 'Marketing',
                        'Sales' => 'Sales',
                        'HR' => 'HR',
                        'Finance' => 'Finance',
                    ]),
                Tables\Filters\Filter::make('is_active')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true))
                    ->label('Active Jobs Only')
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('activateJobs')
                        ->label('Activate Jobs')
                        ->icon('heroicon-o-check-circle')
                        ->action(fn (Collection $records) => $records->each->update(['is_active' => true])),
                    Tables\Actions\BulkAction::make('deactivateJobs')
                        ->label('Deactivate Jobs')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->action(fn (Collection $records) => $records->each->update(['is_active' => false])),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ApplicationsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCareers::route('/'),
            'create' => Pages\CreateCareer::route('/create'),
            'edit' => Pages\EditCareer::route('/{record}/edit'),
        ];
    }
}
