<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente_has_asignatura extends Model
{
    protected $table = "docente_has_asignatura";
    protected $fillable = ['id','id_personal','id_asignatura','id_seccion','id_periodo'];


    public function Personal(){
    	return $this->belongnsTo('App\Personal','id');
    }
    public function asignaturas(){
    	return $this->belongnsTo('App\asignaturas','id');
    }
    public function Periodos(){
    	return $this->belongnsTo('App\Periodos','id');
    }
    public function Seccion(){
    	return $this->belongnsTo('App\Seccion','id');
    }

}
