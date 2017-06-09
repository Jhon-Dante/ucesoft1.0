<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deducciones extends Model
{
   protected $table='deducciones';
   protected $filllable=['id','deduccion','monto'];
}
