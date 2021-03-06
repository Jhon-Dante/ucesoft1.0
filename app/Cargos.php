<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'cargos';
    protected $fillable = ['id', 'cargo'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function personal()
    {
        return $this->hasMany('App\Personal', 'id_cargo', 'id');
    }
}
