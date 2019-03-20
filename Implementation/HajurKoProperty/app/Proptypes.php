<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proptypes extends Model
{
    protected $table = "proptypes";

    protected $fillable = [
        'propertyType', 
    ];

    // establishig relationship 
    public function properties()
    {
        return $this->hasMany('App\Properties');
    }
}
