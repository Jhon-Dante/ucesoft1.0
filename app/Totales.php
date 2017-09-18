<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Totales extends Model
{
    protected $table='totales';
    protected $fillable=['id','promedio_lapso','lapso','id_datosBasicos','id_periodo'];

    public function datosbasicos()
    {
    	return $this->belongsTo('App\DatosBasicos','id_datosBasicos','id');
    }
    public function periodo()
    {
    	return $this->belongsTo('App\Periodos','id_periodo','id');
    }

}
