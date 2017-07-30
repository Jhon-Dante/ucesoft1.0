<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Padres extends Model
{
    protected $table='padres';
    protected $fillable=['nombres','apellidos','nacionalidad','cedula','vive_con','id_parentesco','id_datosBasicos'];

    public function datosbasicos()
    {
    	return $this->belongsTo('App\DatosBasicos','id_datosBasicos');
    }

    public function perentescos()
    {
    	return $this->belongsTo('App\Parentesco','id_parentesco');
    }
}
