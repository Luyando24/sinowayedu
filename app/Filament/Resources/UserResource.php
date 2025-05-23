<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Filament\Tables\Actions\Action;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('User Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $context): bool => $context === 'create')
                            ->maxLength(255),
                        Forms\Components\DateTimePicker::make('email_verified_at'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Company Information')
                    ->schema([
                        Forms\Components\TextInput::make('partner_company')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('country')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('city')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(255),
                    ])->columns(2),
                
                Forms\Components\Section::make('Subscription')
                    ->schema([
                        Forms\Components\Select::make('subscription_status')
                            ->options([
                                'inactive' => 'Inactive',
                                'active' => 'Active',
                                'cancelled' => 'Cancelled',
                            ])
                            ->default('inactive')
                            ->required(),
                        Forms\Components\DateTimePicker::make('subscription_ends_at')
                            ->label('Subscription End Date')
                            ->nullable(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('partner_company')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subscription_status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'inactive' => 'danger',
                        'cancelled' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('subscription_ends_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('subscription_status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('updateSubscription')
                    ->label('Update Subscription')
                    ->icon('heroicon-o-credit-card')
                    ->color('success')
                    ->form([
                        Forms\Components\Select::make('subscription_status')
                            ->options([
                                'active' => 'Active',
                                'inactive' => 'Inactive',
                                'cancelled' => 'Cancelled',
                            ])
                            ->required()
                            ->default(fn ($record) => $record->subscription_status),
                        Forms\Components\DateTimePicker::make('subscription_ends_at')
                            ->label('Subscription End Date')
                            ->default(fn ($record) => $record->subscription_ends_at)
                            ->nullable(),
                    ])
                    ->action(function (User $record, array $data): void {
                        $record->update([
                            'subscription_status' => $data['subscription_status'],
                            'subscription_ends_at' => $data['subscription_ends_at'],
                        ]);
                    })
                    ->successNotificationTitle('Subscription updated successfully'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('activateSubscriptions')
                        ->label('Activate Subscriptions')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(function (Collection $records): void {
                            $records->each(function ($record): void {
                                $record->update([
                                    'subscription_status' => 'active',
                                    'subscription_ends_at' => now()->addYear(),
                                ]);
                            });
                        }),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
