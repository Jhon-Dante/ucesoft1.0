<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table='secciones';
    protected $fillable=['id','seccion','id_curso'];

    public function curso()
    {
    	return $this->belongsTo('App\Cursos', 'id_curso','id');
    }
    public function inscripcion()
    {
    	return $this->hasMany('App\Inscripcion','id_seccion','id');
    }
    public function asignaturas_inscripcion()
    {
        return $this->hasMany('App\Asignaturas_inscripcion','id_seccion','id');
    }
    public function horario()
    {
        return $this->hasMany('App\Horarios','id_seccion','id');
    }

    //Relacion mucho a muchos
    public function asignacion_pe()
    {
        return $this->belongsToMany('App\Personal', 'personal_has_asignatura', 'id_seccion','id_personal')->withPivot('id_periodo','id_asignatura');
    }
    public function asignacion_p()
    {
        return $this->belongsToMany('App\Periodos', 'personal_has_asignatura', 'id_seccion','id_periodo')->withPivot('id_personal','id_asignatura');
    }
    public function asignacion_a()
    {
        return $this->belongsToMany('App\asignaturas', 'personal_has_asignatura', 'id_seccion','id_asignatura')->withPivot('id_personal','id_periodo');
    }

    public function guias()
    {
        return $this->hasMany('App\Guias','id_seccion','id');
    }

    public function personalpsecciones()
    {
        return $this->hasMany('App\PersonalPSecciones','id_seccion','id');
    }
}
