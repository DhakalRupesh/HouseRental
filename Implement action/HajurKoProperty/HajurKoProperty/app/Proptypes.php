<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proptypes extends Model
{
    protected $table = "proptypes";

    protected $fillable = [
        'propertyType', 
    ];
}
