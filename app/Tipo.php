<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'tipo_personal';

    protected $fillable = [
        'tipo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function cargos(){

        return $this->hasMany('App\Cargos', 'id_tipo_personal', 'id');
    }
}
