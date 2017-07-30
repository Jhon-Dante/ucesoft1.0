<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosBasicos extends Model
{
	protected $table='datos_basicos';
	protected $fillable=['id','nombre','apellido','nacionalidad','cedula','direccion','nacimiento'];

	public function padres()
	{
		return $this->hasMany('App\Padres','id_datosBasicos','id');
	}

}
