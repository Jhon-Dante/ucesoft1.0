<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $table='cursos';
    protected $fillable=['id','curso'];

    public function asignaturas(){

    	return $this->hasMany('App\Asignaturas','id_curso','id');
    }

    public function seccion()
    {
        return $this->hasMany('App\Seccion', 'id_curso', 'id');
    }
}
