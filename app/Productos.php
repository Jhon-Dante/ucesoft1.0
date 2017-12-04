<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table='productos';
    protected $fillable=['id','nombre','precio','codigo','fecha_expedicion','fecha_caducacion'];
}
