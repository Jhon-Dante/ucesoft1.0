<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportesNuevos extends Model
{
    protected $table='reportes_nuevos';
    protected $fillable=['id','momento','item','id_datosBasicos','id_periodo'];

    public function datosbasicos()
    {
    	return $this->belongsTo('App\DatosBasicos','id_datosBasicos','id');
    }
    public function periodo()
    {
    	return $this->belongsTo('App\Periodos','id_periodo','id');
    }
    
}
