<?php

namespace App\Filament\Resources\ProgramResource\Pages;

use App\Filament\Resources\ProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Notifications\Notification;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProgramsImport;

class ListPrograms extends ListRecords
{
    protected static string $resource = ProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make('Import Programs')
                ->label('Upload CSV/Excel')
                ->form([
                    Forms\Components\FileUpload::make('file')
                        ->label('Upload File')
                        ->acceptedFileTypes(['text/csv', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', '.csv', '.xls', '.xlsx'])
                        ->required(),
                    Forms\Components\Textarea::make('instructions')
                        ->label('Instructions')
                        ->default("CSV file should have the following columns:\n- name (required)\n- university_name (required)\n- program_id\n- degree (required)\n- language\n- duration\n- intake\n- tuition_fee\n- registration_fee\n- single_room_cost\n- double_room_cost\n- triple_room_cost\n- four_room_cost\n- application_deadline (YYYY-MM-DD format)\n- scholarship\n- requirements (comma-separated)\n- application_documents (comma-separated)\n- status\n- is_recommended (yes/no)")
                        ->disabled()
                        ->rows(10),
                    Forms\Components\View::make('filament.forms.components.download-template')
                        ->label('Download Template')
                        ->viewData([
                            'url' => asset('templates/program_import_template.csv'),
                            'label' => 'Download CSV Template'
                        ]),
                ])
                ->action(function (array $data): void {
                    Excel::import(new ProgramsImport, $data['file']);
                    Notification::make()
                        ->title('Programs imported successfully!')
                        ->success()
                        ->send();
                })
                ->modalHeading('Import Programs')
                ->modalButton('Import Now')
                ->color('primary'),
        ];
    }
}


