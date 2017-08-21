<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table='secciones';
    protected $fillable=['id','seccion','id_curso'];

    public function curso()
    {
    	return $this->belongsTo('App\Cursos', 'id_curso');
    }
    public function inscritos()
    {
    	return $this->hasMany('App\Inscritos','id_seccion','id');
    }
    public function asignaturas_inscripcion()
    {
        return $this->hasMany('App\Asignaturas_inscripcion','id_seccion','id');
    }
}
