<?php

namespace App\Filament\Resources\JobApplicationResource\Pages;

use App\Filament\Resources\JobApplicationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\ViewEntry;
use Filament\Support\Enums\FontWeight;
use Filament\Infolists\Components\TextEntry\TextEntrySize;
use Filament\Notifications\Notification;
use Filament\Forms;

class ViewJobApplication extends ViewRecord
{
    protected static string $resource = JobApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('updateStatus')
                ->label('Update Status')
                ->color('warning')
                ->icon('heroicon-o-pencil-square')
                ->form([
                    Forms\Components\Select::make('status')
                        ->label('Status')
                        ->options([
                            'pending' => 'Pending',
                            'reviewing' => 'Reviewing',
                            'accepted' => 'Accepted',
                            'rejected' => 'Rejected',
                        ])
                        ->default(fn () => $this->record->status)
                        ->required(),
                ])
                ->action(function (array $data): void {
                    $this->record->update([
                        'status' => $data['status'],
                    ]);
                    
                    Notification::make()
                        ->title('Status updated successfully')
                        ->success()
                        ->send();
                }),
            Actions\DeleteAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Job Application Details')
                    ->schema([
                        TextEntry::make('career.title')
                            ->label('Job Position')
                            ->size(TextEntrySize::Large)
                            ->weight(FontWeight::Bold),
                        TextEntry::make('name')
                            ->label('Applicant Name')
                            ->size(TextEntrySize::Large)
                            ->weight(FontWeight::Bold),
                        TextEntry::make('email')
                            ->label('Email Address')
                            ->size(TextEntrySize::Large)
                            ->weight(FontWeight::Bold),
                        TextEntry::make('phone')
                            ->label('Phone Number')
                            ->size(TextEntrySize::Large)
                            ->weight(FontWeight::Bold),
                        TextEntry::make('status')
                            ->label('Status')
                            ->size(TextEntrySize::Large)
                            ->weight(FontWeight::Bold)
                            ->badge()
                            ->formatStateUsing(fn (string $state): string => ucfirst($state))
                            ->color(fn (string $state): string => match ($state) {
                                'pending' => 'gray',
                                'reviewing' => 'warning',
                                'accepted' => 'success',
                                'rejected' => 'danger',
                                default => 'gray',
                            }),
                        TextEntry::make('cover_letter')
                            ->label('Cover Letter')
                            ->size(TextEntrySize::Large)
                            ->weight(FontWeight::Bold)
                            ->columnSpanFull()
                            ->markdown(),
                        ViewEntry::make('cv')
                            ->label('Resume/CV')
                            ->extraAttributes([
                                'class' => 'text-lg font-bold',
                            ])
                            ->columnSpanFull()
                            ->view('filament.infolists.components.document-viewer'),
                        TextEntry::make('created_at')
                            ->label('Applied On')
                            ->size(TextEntrySize::Large)
                            ->weight(FontWeight::Bold)
                            ->dateTime(),
                    ])
                    ->columns(2),
            ]);
    }
}

