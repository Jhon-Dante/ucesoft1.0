<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReporteFinal extends Model
{
    protected $table='reporte_final';
    protected $fillable=['id','informe','cualitativa','fecha','dias_habiles','inasistencias','sugerencia','id_periodo'];

    public function periodo()
    {
    	return $this->belongsTo('App\Periodos','id_periodo','id');
    }
}
