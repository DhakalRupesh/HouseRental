<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'email', 'district', 'city', 'address', 'mobNo', 'uType', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    // establishing relationship
    public function properties()
    {
        return $this->hasMany('App\Properties');
    }

    // many to many book relation
    public function bookings()
    {
        return $this->hasMany('App\Bookings');
    }
}
