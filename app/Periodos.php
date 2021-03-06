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
	public function n_bloques()
	{
		return $this->hasMany('App\NBloques','id_periodo','id');
	}

	//Relación mucho a muchos
	public function asignacion_pe()
    {
        return $this->belongsToMany('App\Personal', 'personal_has_asignatura', 'id_periodo','id_personal')->withPivot('id_seccion','id_asignatura');
    }
    public function asignacion_s()
    {
        return $this->belongsToMany('App\Seccion', 'personal_has_asignatura', 'id_periodo','id_seccion')->withPivot('id_personal','id_asignatura');
    }
    public function asignacion_a()
    {
        return $this->belongsToMany('App\asignaturas', 'personal_has_asignatura', 'id_periodo','id_asignatura')->withPivot('id_personal','id_seccion');
    }

    //---asignacion guia
    public function guias()
    {
    	return $this->hasMany('App\Guias','id_periodo','id');
    }

    public function personalpsecciones()
    {
        return $this->hasMany('App\PersonalPSecciones','id_periodo','id');
    }

    //---pagos

    public function pagos()
    {
    	return $this->hasMany('App\Pagos','id_periodo','id');
    }
}
