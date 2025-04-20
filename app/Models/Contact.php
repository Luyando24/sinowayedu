<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'company_name',
        'email',
        'phone',
        'whatsapp_number',
        'address',
        'wechat_id',
        'social_media_links',
        'description',
    ];
}
