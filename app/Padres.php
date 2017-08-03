<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Padres extends Model
{
    protected $table='padres';
    protected $fillable=['nombres','apellidos','nacionalidad','cedula','vive_con','id_parentesco','id_datosBasicos'];

    public function datosbasicos()
    {
    	return $this->belongsToMany('App\DatosBasicos','datos_basicos_has_padres','id_padre','id_datosBasicos');
    }

    public function perentescos()
    {
    	return $this->belongsTo('App\Parentesco','id_parentesco');
    }
}
