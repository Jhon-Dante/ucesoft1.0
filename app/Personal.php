<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table='datos_basicos_personal';
    protected $fillable=['id','nombres','apellidos','nacionalidad','cedula','fecha_nacimiento','fecha_ingreso','edad','edo_civil','direccion','codigo_hab','telefono_hab','codigo_cel','celular','id_cargo'];


     public function cargo()
    {
        return $this->belongsTo('App\Cargos', 'id_cargo');
    }
}
