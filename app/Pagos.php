<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    protected $table='pagos';

    protected $fillable=['id_mes','monto'];

    public function meses()
    {
    	return $this->belongsTo('App\Meses','id_mes','id');
    }

    public function mensualidades()
    {
    	return $this->hasMany('App\Mensualidades','id_pago','id');
    }
}
