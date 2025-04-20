<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_description',
        'hero_image',
        'hero_link',
    ];

}
