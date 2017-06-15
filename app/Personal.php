<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table='personal';
    protected $fillable=['id','nacionalidad','cedula','nombre','apellido','cargo','direccion'];
}
