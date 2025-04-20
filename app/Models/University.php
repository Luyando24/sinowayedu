<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = [
        'name',
        'description',
        'city_id',
        'scholarship_id',
        'type',
        'photo',
        'qs_rank',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class);
    }

    public function scholarships()
    {
        return $this->hasMany(Scholarship::class);
    }

    // Add this relationship
    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}
