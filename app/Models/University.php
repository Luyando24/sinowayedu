<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'city_id',
        'address',
        'website',
        'email',
        'phone',
        'photo',
        'is_recommended',
        'qs_rank',
        // other fields...
    ];

    // Relationships
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}



