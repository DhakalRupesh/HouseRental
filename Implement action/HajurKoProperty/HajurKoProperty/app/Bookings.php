<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    protected $table = "bookings";

    protected $fillable = [
        'bookedDate', 'bookedTime',  
    ];
}
