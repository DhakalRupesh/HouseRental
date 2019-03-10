<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proptype extends Model
{
    protected $table = "proptype";

    protected $fillable = ['propertyType'];
}
