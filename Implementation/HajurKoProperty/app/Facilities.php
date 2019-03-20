<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    protected $table = "facilities";

    protected $fillable = [
        'bikeP', 'carP', 'waterB', 'waterD', 
    ];

    // establishing relationship 
    public function properties()
    {
        return $this->belongsTo('App\Properties');
    }
}
