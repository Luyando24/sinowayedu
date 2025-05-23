<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'usertype',
        'partner_company',
        'country',
        'city',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    /**
     * Check if the user can access university details
     * 
     * @return bool
     */
    public function canAccessUniversityDetails()
    {
        // Only partner users can access university details
        return $this->usertype === 'partner';
    }

    /**
     * Check if the user is subscribed
     * 
     * @return bool
     */
    public function subscribed()
    {
        // Check if the user has an active subscription
        // This is a simplified version - you might need to adjust based on your subscription logic
        return $this->subscription_status === 'active';
    }
}






