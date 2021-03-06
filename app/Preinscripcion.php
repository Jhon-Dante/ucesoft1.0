<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preinscripcion extends Model
{
    protected $table='preinscripcion';
    protected $fillable=['id','id_datosBasicos','repite','pendiente','id_periodo','id_curso'];

    public function datosbasicos()
    {
    	return $this->belongsTo('App\DatosBasicos','id_datosBasicos');
    }

    public function periodos()
    {
    	return $this->belongsTo('App\Periodos','id_periodo');
    }
    public function cursos()
    {
        return $this->belongsTo('App\Cursos','id_curso');
    }

}