<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deducciones extends Model
{
   protected $table='deducciones';
   protected $fillable=['id','deduccion','monto'];
}
