<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodos extends Model
{
    protected $table='periodos';
    protected $fillable=['id','periodo'];

    public function preinscripciones()
	{
		return $this->hasMany('App\Preinscripcion','id_periodo','id');
	}
	public function inscritos()
	{
		return $this->hasMany('App\Inscritos','id_periodo','id');
	}
	public function asignaturas_inscripcion()
	{
		return $this->hasMany('App\Asignaturas_inscripcion','id_periodo','id');
	}
}
