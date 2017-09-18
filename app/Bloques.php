<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bloques extends Model
{
    protected $table='bloques';
    protected $fillable = ['id','bloque','id_dia'];

    public function dia()
    {
    	return $this->belongsTo('App\Dias','id_dia','id');
    }
    public function horario()
    {
    	return $this->hasMany('App\Horarios','id_bloque','id');
    }
}
