<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meses extends Model
{
    protected $table='meses';
    protected $fillable=['id','mes'];

    public function mes()
    {
    	return $this->hasMany('App\Mensualidades','id_mes','id');
    }
}
