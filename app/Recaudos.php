<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recaudos extends Model
{
    protected $table='recaudos';
    protected $fillable=['part_nac','boleta_v','ci','fotos','ci_repre','foto_repre','cer_promo','cer_calif','solv_a','tim_fis','const_tra','carpeta_m','id_datosBasicos'];

    public function datosbasicos()
    {
    	return $this->belongsTo('App\DatosBasicos','id_datosBasicos');
    }
}
