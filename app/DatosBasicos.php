<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosBasicos extends Model
{
	protected $table='datos_basicos';
	protected $fillable=['id','nacionalidad','cedula','nombres','apellidos','lugar_nac','estado','fecha_nac','edad','sexo','peso','talla','salud','direccion','id_padre','padre_vive','id_madre','madre_vive'];

	public function padre()
	{
		return $this->belongsTo('App\Representantes','id_padre','id');
	}

	public function madre(){
		return $this->belongsTo('App\Representantes','id_madre','id');
	}
}
