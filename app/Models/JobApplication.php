<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplication extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'career_id',
        'name',
        'email',
        'phone',
        'cover_letter',
        'cv',
        'status',
    ];

    public function career()
    {
        return $this->belongsTo(Career::class, 'career_id');
    }
}






