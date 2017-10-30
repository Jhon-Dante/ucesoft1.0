  <?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoletinFinal extends Model
{
    protected $table='boletin_final';
    protected $fillable=['id','id_asignatura','promedio','informe','fecha','id_datosBasicos','id_periodo'];

    public function datosbasicos()
    {
    	return $this->belongsTo('App\DatosBasicos','id_datosBasicos','id');
    }
    public function periodo()
    {
    	return $this->belongsTo('App\Periodos','id_periodo','id');
    }
    public function asignatura()
    {
    	return $this->belongsTo('App\Asignaturas','id_asignatura','id');
    }
}
