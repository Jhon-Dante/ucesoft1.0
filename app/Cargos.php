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
    protected $fillable = ['id', 'id_tipo_personal', 'cargo'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function tipo_personal()
    {
        return $this->belongsTo('App\Tipo', 'id_tipo_personal');
    }
}
