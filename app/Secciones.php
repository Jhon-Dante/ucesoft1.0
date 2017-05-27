<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secciones extends Model
{
    protected $table='secciones';
    protected $fillable=['id','seccion','id_curso'];

    
}
