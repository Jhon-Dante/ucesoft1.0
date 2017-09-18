<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    protected $table='horarios';
    protected $fillable=['id','id_bloque','id_aula','id_asignatura','id_seccion','id_periodo'];

    public function bloque()
    {
    	return $this->belongsTo('App\Bloques','id_bloque','id');
    }
    public function aula()
    {
    	return $this->belongsTo('App\Aula','id_aula','id');
    }
    public function asignatura()
    {
    	return $this->belongsTo('App\Asignaturas','id_asignatura','id');
    }
    public function seccion()
    {
        return $this->belongsTo('App\Seccion', 'id_seccion', 'id');
    }
    public function periodo()
    {
    	return $this->belongsTo('App\Periodos','id_periodo','id');
    }
}
