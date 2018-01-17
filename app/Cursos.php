<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $table='cursos';
    protected $fillable=['id','curso'];

    public function asignaturas(){

    	return $this->hasMany('App\asignaturas','id_curso','id');
    }

    public function seccion()
    {
        return $this->hasMany('App\Seccion', 'id_curso', 'id');
    }

    public function preinscripcion()
    {
    	return $this->hasMany('App\Preinscripcion', 'id_curso', 'id');
    }
}
