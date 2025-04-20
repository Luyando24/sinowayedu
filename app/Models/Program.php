<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'university_id',
        'name',
        'program_id', // Consider renaming if it's meant to be something else — might be confusing
        'degree_id',
        'scholarship_id',
        'degree', // Optional: consider removing if it's redundant with degree_id relationship
        'language',
        'duration',
        'intake',
        'tuition_fee',
        'registration_fee',
        'single_room_cost',
        'double_room_cost',
        'triple_room_cost',
        'four_room_cost',
        'application_deadline',
        'scholarship', // Optional: clarify this vs scholarship_id — could cause confusion
        'description',
        'requirements',
        'application_documents',
        'status',
    ];

    protected $casts = [
        'application_documents' => 'array',
        'requirements' => 'array',
    ];

    // Relationships
    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }

    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class);
    }

    // If a program can have multiple scholarships (optional)
    public function scholarships()
    {
        return $this->hasMany(Scholarship::class);
    }
}
