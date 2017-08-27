<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensualidades extends Model
{
    protected $table='mensualidades';
    protected $fillable=['id','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre','id_datosBasicos','id_periodo'];

    public function datoBasico()
    {
    	return $this->belongsTo('App\DatosBasicos','id_datosBasicos','id');
    }
    public function periodo()
    {
    	return $this->belongsTo('App\Periodos','id_periodo','id');
    }
}
