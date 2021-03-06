<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table='inscripcion';
    protected $fillable=['id','id_datosBasicos','repite','pendiente','id_periodo','id_seccion'];

    public function datosbasicos()
    {
    	return $this->belongsTo('App\DatosBasicos','id_datosBasicos','id');
    }

    public function periodo()
    {
    	return $this->belongsTo('App\Periodos','id_periodo','id');
    }

    public function asignaturaspreinscripcion()
    {
        return $this->hasMany('App\AsignaturasPreinscripcion','id_preinscripcion','id');
    }
    public function seccion()
    {
        return $this->belongsTo('App\Seccion','id_seccion','id');
    }
   	public function asignatura_inscripcion()
   	{
   		return $this->hasMany('App\Asignaturas_inscripcion','id_inscripcion','id');
   	}

    public function mensualidades()
    {
        return $this->hasMany('App\Mensualidades','id_inscripcion','id');
    }
}