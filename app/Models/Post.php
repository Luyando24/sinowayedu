<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'content', 'featured_image',
        'is_published', 'meta_title', 'meta_description',
        'meta_keywords', 'enable_schema_markup',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'enable_schema_markup' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }
}
