<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensualidades extends Model
{
    protected $table='mensualidades';
    protected $fillable=['id','id_mes','estado','id_datosBasicos','id_periodo'];

    public function mes()
    {
        return $this->belongsTo('App\Meses','id_mes','id');
    }
    public function datoBasico()
    {
    	return $this->belongsTo('App\DatosBasicos','id_datosBasicos','id');
    }
    public function periodo()
    {
    	return $this->belongsTo('App\Periodos','id_periodo','id');
    }
}
