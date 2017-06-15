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
}
