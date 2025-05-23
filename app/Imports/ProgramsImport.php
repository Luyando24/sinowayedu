<?php

namespace App\Imports;

use App\Models\Program;
use App\Models\University;
use App\Models\Degree;
use App\Models\Scholarship;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Carbon;

class ProgramsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Find or create related models
        $university = University::where('name', $row['university_name'])->first();
        $degree = Degree::where('name', $row['degree'])->first();
        
        // Parse requirements and application documents if they exist
        $requirements = isset($row['requirements']) ? 
            json_encode(array_map('trim', explode(',', $row['requirements']))) : 
            json_encode([]);
        
        $applicationDocuments = isset($row['application_documents']) ? 
            json_encode(array_map('trim', explode(',', $row['application_documents']))) : 
            json_encode([]);
        
        // Parse application deadline
        $applicationDeadline = null;
        if (isset($row['application_deadline']) && !empty($row['application_deadline'])) {
            try {
                $applicationDeadline = Carbon::parse($row['application_deadline'])->format('Y-m-d');
            } catch (\Exception $e) {
                // If parsing fails, leave as null
            }
        }
    
        // Only proceed if we found a university and degree
        if ($university && $degree) {
            return new Program([
                'university_id' => $university->id,
                'name' => $row['name'],
                'program_id' => $row['program_id'] ?? 'PROG-' . uniqid(),
                'degree_id' => $degree->id,
                'language' => $row['language'] ?? 'English',
                'duration' => $row['duration'] ?? '4 years',
                'intake' => $row['intake'] ?? 'Autumn',
                'tuition_fee' => $row['tuition_fee'] ?? 0,
                'registration_fee' => $row['registration_fee'] ?? null,
                'single_room_cost' => $row['single_room_cost'] ?? null,
                'double_room_cost' => $row['double_room_cost'] ?? null,
                'triple_room_cost' => $row['triple_room_cost'] ?? null,
                'four_room_cost' => $row['four_room_cost'] ?? null,
                'application_deadline' => $applicationDeadline,
                'scholarship' => $row['scholarship'] ?? null,
                'requirements' => $requirements,
                'application_documents' => $applicationDocuments,
                'status' => $row['status'] ?? 'active',
                'is_recommended' => isset($row['is_recommended']) && 
                    (strtolower($row['is_recommended']) === 'yes' || 
                     strtolower($row['is_recommended']) === 'true' || 
                     $row['is_recommended'] === '1'),
            ]);
        }
        
        return null;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'university_name' => 'required',
            'degree' => 'required',
        ];
    }
}