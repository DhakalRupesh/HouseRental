<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    protected $table = "rooms";

    protected $fillable = [
        'kitchen', 'bedRoom', 'livingRoom', 'tBathroom', 'totRooms',
    ];
}
