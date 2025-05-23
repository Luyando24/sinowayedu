<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'university_id',
        'degree_id',
        'description',
        'language',
        'duration',
        'tuition_fee',
        'scholarship',
        'intake',
        'application_deadline',
        'is_recommended',
        // other fields...
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

