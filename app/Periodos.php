<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodos extends Model
{
    protected $table='periodos';
    protected $fillable=['id','periodo'];

    public function preinscripciones()
	{
		return $this->hasMany('App\Preinscripcion','id_periodo','id');
	}
	public function inscritos()
	{
		return $this->hasMany('App\Inscritos','id_periodo','id');
	}
	public function asignaturas_inscripcion()
	{
		return $this->hasMany('App\Asignaturas_inscripcion','id_periodo','id');
	}
	public function mensualidad()
	{
		return $this->hasMany('App\Mensualidad','id_periodo','id');
	}
	public function momento()
	{
		return $this->hasMany('App\Momentos','id_periodo','id');
	}
	public function calificacion()
	{
		return $this->hasMany('App\Calificaciones','id_periodo','id');
	}
	public function boletin()
	{
		return $this->hasMany('App\Boletin','id_periodo','id');
	}
	public function boletinFinal()
	{
		return $this->hasMany('App\BoletinFinal','id_periodo','id');
	}
	public function total()
	{
		return $this->hasMany('App\Totales','id_periodo','id');
	}
	public function asignaturaPendiente()
	{
		return $this->hasMany('App\AsignaturasPendientes','id_periodo','id');
	}
	public function asignaturaPendienteFinal()
	{
		return $this->hasMany('App\AsignaturasPendientesFinal','id_periodo','id');
	}
	public function reporteNuevo()
	{
		return $this->hasMany('App\ReportesNuevos','id_periodo','id');
	}
	public function reportefinal()
	{
		return $this->hasMany('App\ReporteFinal','id_periodo','id');
	}
	public function horario()
	{
		return $this->hasMany('App\Horarios','id_periodo','id');
	}
}
