<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $table='cursos';
    protected $fillable=['id','curso'];

    public function secciones(){

    	return $this->hasMany('App\Secciones','id_curso','id');
    }
}
