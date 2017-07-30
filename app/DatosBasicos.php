<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosBasicos extends Model
{
	protected $table='datos_basicos';
	protected $fillable=['id','nacionalidad','cedula','nombres','apellidos','lugar_nac','estado','fecha_nac','edad','sexo','peso','talla','salud','direccion'];

	public function padres()
	{
		return $this->hasMany('App\Padres','id_datosBasicos','id');
	}

}
