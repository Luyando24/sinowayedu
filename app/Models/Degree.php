<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $fillable = [
        'name',
    ];
    public function programs()
    {
        return $this->hasMany(Program::class);
    }
    public function universities()
    {
        return $this->hasMany(University::class);
    }
    public function degree()
{
    return $this->belongsTo(Degree::class);
}
    public function university()
    {
        return $this->belongsTo(University::class);
    }
    public function scholarships()
    {
        return $this->hasMany(Scholarship::class);
    }
}
