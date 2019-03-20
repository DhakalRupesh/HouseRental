<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    protected $table = "rooms";

    protected $fillable = [
        'kitchen', 'bedRoom', 'livingRoom', 'tBathroom', 'totRooms',
    ];

    // establishing relationship
    public function properties()
    {
        return $this->belongsTo('App\Properties');
    }
}
