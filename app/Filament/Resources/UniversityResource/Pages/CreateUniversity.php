<?php

namespace App\Filament\Resources\UniversityResource\Pages;

use App\Filament\Resources\UniversityResource;
use Filament\Notifications\Notification;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use app\Imports\UniversitiesImport;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;

class CreateUniversity extends CreateRecord
{
    protected static string $resource = UniversityResource::class;

    public function getHeaderActions(): array
{
    return [
        Action::make('Import Universities')
            ->label('Upload CSV/Excel')
            ->form([
                Forms\Components\FileUpload::make('file')
                    ->label('Upload File')
                    ->acceptedFileTypes(['text/csv', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', '.csv', '.xls', '.xlsx'])
                    ->required(),
            ])
            ->action(function (array $data): void {
                Excel::import(new UniversitiesImport, $data['file']);
                Notification::make()
                    ->title('Universities imported successfully!')
                    ->success()
                    ->send();
            })
            ->modalHeading('Import Universities')
            ->modalButton('Import Now')
            ->color('primary'),
    ];
}
}












