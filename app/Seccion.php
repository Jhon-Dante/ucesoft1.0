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
}
