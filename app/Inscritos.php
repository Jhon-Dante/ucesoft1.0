<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscritos extends Model
{
    protected $table = "inscritos";
    protected $fillable = ['id','id_datosBasicos','id_seccion','id_periodo','repite','pendiente'];

    public function datosBasicos()
    {
    	return $this->belongsTo('App\DatosBasicos','id');
    }
    public function seccion()
    {
    	return $this->belongsTo('App\Seccion','id');
    }
    public function periodo()
    {
    	return $this->belongsTo('App\Periodos');
    }
 	public function asignaturaInscrito()
 	{
 		return $this->hasMany('App\AsignaturasInscritos','id_inscrito','id');
 	}
}
