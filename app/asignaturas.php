<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignaturas extends Model
{
    protected $table='asignaturas'; //nombre de la tabla
    protected $fillable=['id','asignatura','codigo','id_curso','color']; //Los campos que pueden ser vistos

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
    public function n_bloques()
    {
        return $this->hasMany('App\NBloques','id_asignatura','id');
    }

    //Relación uno a muchos
    public function asignacion_pe()
    {
        return $this->belongsToMany('App\Personal', 'personal_has_asignatura', 'id_asignatura','id_personal')->withPivot('id_seccion','id_periodo');
    }
    public function asignacion_s()
    {
        return $this->belongsToMany('App\Seccion', 'personal_has_asignatura', 'id_asignatura','id_seccion')->withPivot('id_personal','id_periodo');
    }
    public function asignacion_p()
    {
        return $this->belongsToMany('App\Periodos', 'personal_has_asignatura', 'id_asignatura','id_periodo')->withPivot('id_personal','id_seccion');
    }


}
