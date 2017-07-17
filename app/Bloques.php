<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bloques extends Model
{
    protected $table='bloques';
    protected $fillable = ['id','bloque','dia'];
}
