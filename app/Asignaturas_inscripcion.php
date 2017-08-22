<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignaturas_inscripcion extends Model
{
    protected $table='asignaturas_inscripcion';
    protected $fillable=['id','id_asignatura','id_inscripcion','pen_rep'];
}
public function asignaturas()
{
	return $this->belongsTo('App\asignaturas','id_asignatura','id');
}
public function inscripcion()
{
	return $this->belongsTo('App\Inscripcion','id_inscripcion','id');
}