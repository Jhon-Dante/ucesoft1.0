<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boletin extends Model
{
    protected $table='boletin';
    protected $fillable=['id','id_asignatura','lapso','inasistencias','calificacion','id_datosBasicos','id_periodo','sugerencias'];

    public function datosbasicos()
    {
    	return $this->belongsTo('App\DatosBasicos','id_datosBasicos','id');
    }
    public function asignatura()
    {
    	return $this->belongsTo('App\Asignaturas','id_asignatura','id');
    }
    public function periodo()
    {
    	return $this->belongsTo('App\Periodos','id_periodo','id');
    }
}
