<?php

namespace App\Imports;

use App\Models\University;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UniversitiesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new University([
            'name' => $row['name'],
            'city_id' => $row['city_id'],
            'type' => $row['type'],
            'qs_rank' => $row['qs_rank'],
            'description' => $row['description'],
            'photo' => $row['photo'] ?? null,
        ]);
    }
}
