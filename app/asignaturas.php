<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignaturas extends Model
{
    protected $table='asignaturas'; //nombre de la tabla
    protected $fillable=['id','asignatura','codigo','id_curso']; //Los campos que pueden ser vistos

    public function cursos()
    {
    	return $this->belongsTo('App\Cursos','id_curso');
    }
    public function asignaturaspreinscripcion()
    {
    	return $this->hasMany('App\AsignaturasPreinscripcion','id_asignatura','id');
    }
    public function asignaturasinscritos()
    {
    	return $this->hasMany('App\AsignaturasInscritos','id_asignatura','id');
    }
    public function inscripcion()
    {
        return $this->hasMany('App\Inscripcion','id_asignatura','id');
    }
    public function asignatura_inscripcion()
    {
        return $this->hasMany('App\Asignaturas_inscripcion','id_asignatura','id');
    }
    public function boletin()
    {
        return $this->hasMany('App\Boletin','id_asignatura','id');
    }
    public function boletinFinal()
    {
        return $this->hasMany('App\BoletinFinal','id_asignatura','id');
    }
    public function asignaturaPentiente()
    {
        return $this->hasMany('App\AsignaturasPendientes','id_asignatura','id');
    }
    public function asignaturaPentienteFinal()
    {
        return $this->hasMany('App\AsignaturasPendientesFinal','id_asignatura','id');
    }
    public function horario()
    {
        return $this->hasMany('App\Horarios','id_asignatura','id');
    }

}
