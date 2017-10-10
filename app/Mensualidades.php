<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensualidades extends Model
{
    protected $table='mensualidades';
    protected $fillable=['id','estado','id_datosBasicos','id_periodo'];

   
    public function datoBasico()
    {
    	return $this->belongsTo('App\DatosBasicos','id_datosBasicos','id');
    }
    public function periodo()
    {
    	return $this->belongsTo('App\Periodos','id_periodo','id');
    }

    public function pagos()
    {
        return $this->belongsToMany('App\Pagos','mensualidades_pagos','id_mensualidad','id_pago');
    }
    public function mes()
    {
        return $this->belongsTo('App\Meses','id_mes','id');
    }
}
