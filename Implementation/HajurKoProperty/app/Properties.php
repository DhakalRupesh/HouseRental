<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    protected $table = "properties";

    protected $fillable = [
        'propFor', 'propDistrict', 'propLocation', 'propSize', 'suitableFor', 'waterP', 'electricP', 'totPrice', 'description',
    ];
    
    // establishing model relationship
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function proptypes()
    {
        return $this->belongsTo('App\Proptypes');
    }

    public function facilities()
    {
        return $this->hasMany('App\Facilities');
    }
    
    public function rooms()
    {
        return $this->hasMany('App\Rooms');
    }

    public function images()
    {
        return $this->hasMany('App\Images');
    }

    // many to many book relation
    public function bookings()
    {
        return $this->hasMany('App\Bookings');
    }
}
