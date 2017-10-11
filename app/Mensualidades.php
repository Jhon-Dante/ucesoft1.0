<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensualidades extends Model
{
    protected $table='mensualidades';
    protected $fillable=['id','id_inscripcion','id_pago','estado','forma_pago','codigo_operacion'];

   
    public function inscripcion()
    {
    	return $this->belongsTo('App\Inscripcion','id_inscripcion','id');
    }
    
    public function pagos()
    {
        return $this->belongsTo('App\Pagos','id_pago','id');
    }
    
}
