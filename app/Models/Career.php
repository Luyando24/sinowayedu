<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Career extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'description',
        'city',
        'company',
        'type',
        'application_deadline',
        'job_details_attachment',
        'is_active',
        'category',
        'salary_range',
    ];
     
    protected $dates = ['application_deadline'];

    // Auto-generate slug on create
    public static function boot()
    {
        parent::boot();

        static::creating(function ($job) {
            $job->slug = Str::slug($job->title . '-' . uniqid());
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function applications()
    {
        return $this->hasMany(JobApplication::class, 'career_id');
    }
}

