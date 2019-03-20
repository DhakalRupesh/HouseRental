<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = "images";

    protected $fillable = [
        'imgName',  
    ];

    public function properties()
    {
        return $this->belongsTo('App\Properties');
    }
}
