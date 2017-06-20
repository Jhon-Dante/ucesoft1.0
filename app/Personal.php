<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table='personal';
    protected $fillable=['id','nombres','apellidos','nacionalidad','cedula','fecha_nacimiento','fecha_ingreso','edad','edo_civil','direccion','codigo_telf','telefono_hab','codigo_cel','celular','id_cargo'];
}
