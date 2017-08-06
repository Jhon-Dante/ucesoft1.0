<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignaturasInscritos extends Model
{
    protected $table='asignaturas_inscritos';
    protected $filllable=['id','id_inscrito','id_asignatura','pend_rep'];

    public function inscrito()
    {
    	return $this->belongsTo('App\Inscritos','id_inscrito');
    }
    public function asignatura()
    {
    	return $this->belongsTo('App\asignaturas','id_asignatura');
    }
}

