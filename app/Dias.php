<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dias extends Model
{
    protected $table='dias';
    protected $fillable = ['id','dia'];

    public function bloque()
    {
    	return $this->hasMany('App\Bloques','id_dia','id');
    }
}
