<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
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
        'stripe_identity' => 'array',
        'email_verified_at' => 'datetime',
    ];

    /**
     * Check if the users identity
     * has been verified by Stripe.
     *
     * @return boolean
     */
    public function getIsVerifiedAttribute()
    {
        if (isset($this->bypass_identity) && $this->bypass_identity) {
            return true;
        }

        if (
            isset($this->stripe_identity['data']['object']['status']) &&
            $this->stripe_identity['data']['object']['status'] === 'verified'
        ) {
            return true;
        }

        return false;
    }
}
