<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_empleado extends Model
{
    protected $table='tipo_empleado';
    protected $fillable=['id','id_personal','tipo'];

    public function Personal(){
    	return $this->belongsTo('App\Personal','id_personal');
    }
}