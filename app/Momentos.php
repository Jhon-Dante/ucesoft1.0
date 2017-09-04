<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Momentos extends Model
{
    protected $table='momentos';
    protected $fillable=['id','id_datosBasicos','t1','t2','t3','id_periodo'];

    public function datoBasico()
    {
    	return $this->belongsTo('App\DatosBasicos','id_datosBasicos','id');
    }
    public function periodo()
    {
    	return $this->belongsTo('App\Periodos','id_periodo','id');
    }
}
