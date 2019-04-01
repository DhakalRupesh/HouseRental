<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = "images";

    protected $fillable = [
        'img1',  
    ];

    public function properties()
    {
        return $this->belongsTo('App\Properties');
    }

    public function getImagePath()
    {
        if(filter_var($this->img1,FILTER_VALIDATE_URL)){
            return $this->img1;
        }else{
            return asset('uploads/files/'.$this->img1);
        }
    }
}
