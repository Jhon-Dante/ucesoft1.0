<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model
{
    protected $table='parentesco';
    protected $filllable=['id','parentesco'];

    public function representantes(){

    	//hasMany = Tiene muchos
    	return $this->hasMany('App\Representantes','id_parentesco','id');
    }
}
