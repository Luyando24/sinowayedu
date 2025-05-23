<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
        'province_id',
        'image',
        'description',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'province_id', 'country_id');
    }
    public function universities()
    {
        return $this->hasMany(University::class);
    }
}
