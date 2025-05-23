<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipApplication extends Model
{
    protected $fillable = [
        'name',
        'company_name',
        'email',
        'phone',
        'country',
        'city',
    ];
}
