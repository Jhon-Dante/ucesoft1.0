<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    protected $table='calificaciones';
    protected $fillable=['id','nro_reportes','juicios','sugerencias','id_datosBasicos','id_periodo'];

    public function datosbasicos()
    {
    	return $this->belongsTo('App\DatosBasicos','id_datosBasicos','id');
    }
    public function periodo()
    {
    	return $this->belongsTo('App\Periodos','id_periodo','id');
    }
}
