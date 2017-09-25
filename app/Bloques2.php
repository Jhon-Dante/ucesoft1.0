<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bloques2 extends Model
{
    protected $table='bloques2';
    protected $fillable = ['id','bloque','id_dia'];

    public function dia()
    {
    	return $this->belongsTo('App\Dias','id_dia','id');
    }
    public function horario2()
    {
    	return $this->hasMany('App\Horarios2','id_bloque','id');
    }
}
