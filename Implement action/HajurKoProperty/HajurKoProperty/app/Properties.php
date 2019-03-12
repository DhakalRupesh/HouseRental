<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    protected $table = "properties";

    protected $fillable = [
        'propFor', 'propDistrict', 'propLocation', 'propSize', 'suitableFor', 'waterP', 'electricP', 'totPrice', 'description',
    ];
    
}
