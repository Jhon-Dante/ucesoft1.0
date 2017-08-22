<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignaturasPreinscripcion extends Model
{
    protected $table='asignaturas_preinscripcion';
    protected $fillable=['id_asignatura','id_preinscripcion','pend_rep'];

    public function asignaturas()
    {
    	return $this->belongsTo('App\Asignaturas','id_asignatura','id');
    }

    public function preinscripcion()
    {
    	return $this->belongsTo('App\Preinscripcion','id_preinscripcion','id');
    }
}
