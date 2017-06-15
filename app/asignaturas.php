<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asignaturas extends Model
{
    protected $table='asignaturas'; //nombre de la tabla
    protected $filllable=['id','asignatura','codigo','id_curso']; //Los campos que pueden ser vistos

    public function cursos(){

    	return $this->belongsTo('App\Cursos','id_curso');
    }

}
