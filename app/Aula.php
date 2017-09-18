<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $table = 'aulas';
    protected $fillable = ['id','nombre'];

    public function horarios()
    {
        return $this->hasMany('App\Horarios','id_aula','id');
    }


    
}
