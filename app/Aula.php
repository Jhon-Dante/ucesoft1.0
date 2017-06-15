<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'aulas';

    protected $fillable = ['nombre'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];


    
}
