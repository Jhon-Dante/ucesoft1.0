<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignaturas extends Model
{
    protected $table='asignaturas'; //nombre de la tabla
    protected $fillable=['id','asignatura','codigo','id_curso']; //Los campos que pueden ser vistos

    public function cursos()
    {
    	return $this->belongsTo('App\Cursos','id_curso');
    }
    public function asignaturaspreinscripcion()
    {
    	return $this->hasMany('App\AsignaturasPreinscripcion','id_asignatura','id');
    }
    public function asignaturasinscritos()
    {
    	return $this->hasMany('App\AsignaturasInscritos','id_asignatura','id');
    }

}
