<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NBloques extends Model
{
    protected $table='n_bloques';
    protected $fillable=['id','n_bloques','id_asignatura','id_periodo'];

    public function asignatura()
    {
    	return $this->belongsTo('App\asignaturas','id_asignatura','id');
    }
    public function periodo()
    {
    	return $this->belongsTo('App\Periodos','id_periodo','id');
    }
}
