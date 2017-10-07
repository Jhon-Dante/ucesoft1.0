<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalPSecciones extends Model
{
    protected $table='personalp_has_secciones';

    protected $fillable=['id_personal','id_seccion','id_periodo'];


    public function personal()
    {
    	return $this->belongsTo('App\Personal','id_personal');
    }

    public function secciones()
    {
    	return $this->belongsTo('App\Seccion','id_seccion');
    }

    public function periodos()
    {
    	return $this->belongsTo('App\Periodos','id_periodo');
    }
}
