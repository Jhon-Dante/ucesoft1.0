<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosBasicos extends Model
{
	protected $table='datos_basicos';
	protected $fillable=['id','nacionalidad','cedula','nombres','apellidos','lugar_nac','estado','fecha_nac','edad','sexo','peso','talla','salud','direccion','id_representante'];

	public function representantes()
	{
		return $this->belongsTo('App\Representantes','id_representante');
	}

	public function padres()
	{
		return $this->belongsToMany('App\Padres','datos_basicos_has_padres','id_datosBasicos','id_padre');
	}

}
