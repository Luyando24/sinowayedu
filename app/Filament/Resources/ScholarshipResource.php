<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScholarshipResource\Pages;
use App\Filament\Resources\ScholarshipResource\RelationManagers;
use App\Models\Scholarship;
use Filament\Forms;
use Filament\Forms\Form;
use App\Models\University;
use App\Models\Degree;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ScholarshipResource extends Resource
{
    protected static ?string $model = Scholarship::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-yen';
    protected static ?string $navigationGroup = 'University Information';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Forms\Components\Select::make('name')
                    ->options([
                        'Chinese Government Scholarship' => 'Chinese Government Scholarship',
                        'Local Government Scholarship' => 'Local Government Scholarship',
                        'University Scholarship' => 'University Scholarship',
                        'International Chinese Language Teacher Scholarship' => 'International Chinese Language Teacher Scholarship',
                    ])
                    ->required(),
                Forms\Components\Select::make('coverage')
                    ->options([
                        'Class A+: Free accommodation fee, 1000 RMB per month living allowance' => 'Class A+: Free accommodation fee, 1000 RMB per month living allowance',
                        'Class A: Free tuition fee only' => 'Class A: Free tuition fee only',
                        'Class B: 50% tuition fee reduction' => 'Class B: 50% tuition fee reduction',
                        'Class C: Free accommodation fee only' => 'Class C: Free accommodation fee only',
                    ])
                    ->required(),
                Forms\Components\Select::make('type')
                    ->options([
                        'Full' => 'Full',
                        'Partial' => 'Partial',
                    ])
                    ->label('Type of scholarship')
                    ->required(),
                Forms\Components\RichEditor::make('notice')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('introduction')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Scholarship name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
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
            'index' => Pages\ListScholarships::route('/'),
            'create' => Pages\CreateScholarship::route('/create'),
            'edit' => Pages\EditScholarship::route('/{record}/edit'),
        ];
    }
}
