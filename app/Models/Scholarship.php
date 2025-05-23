<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $fillable = [
        'name',
        'coverage',
        'type',
        'notice',
        'introduction',
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
    public function university()
    {
        return $this->belongsTo(University::class);
    }
    public function universities()
    {
        return $this->hasMany(University::class);
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    public function scholarships()
    {
        return $this->hasMany(Scholarship::class);
    }
    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class);
    }
}
