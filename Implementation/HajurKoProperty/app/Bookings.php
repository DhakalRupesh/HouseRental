<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    protected $table = "bookings";

    protected $fillable = [
        'bookedDate', 'bookedTime',  
    ];

    // many to many relationship
    public function properties()
    {
        return $this->belongsToMany('App\Properties');
    }

    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
