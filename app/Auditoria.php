<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    protected $table='auditoria';
    protected $fillable=['id','id_user','accion'];

    public function user()
    {
    	return $this->belongsTo('App\User','id_user','id');
    }
}
