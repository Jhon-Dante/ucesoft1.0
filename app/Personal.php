<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table='datos_basicos_personal';
    protected $fillable=['id',
    'nombres',
    'apellidos',
    'nacionalidad',
    'cedula',
    'fecha_nacimiento',
    'fecha_ingreso',
    'edad',
    'edo_civil',
    'direccion',
    'genero',
    'codigo_hab',
    'telf_hab',
    'codigo_cel',
    'celular',
    'correo',
    'id_cargo'];


    public function cargo()
    {
        return $this->belongsTo('App\Cargos', 'id_cargo');
    }


    //Relación mucho a muchos
    public function asignacion_a()
    {
        return $this->belongsToMany('App\asignaturas', 'personal_has_asignatura', 'id_personal','id_asignatura')->withPivot('id_seccion','id_periodo');
    }
    public function asignacion_p()
    {
        return $this->belongsToMany('App\Periodo', 'personal_has_asignatura', 'id_personal','id_periodo')->withPivot('id_asignatura','id_seccion');
    }
    public function asignacion_s()
    {
        return $this->belongsToMany('App\Seccion', 'personal_has_asignatura', 'id_personal','id_seccion')->withPivot('id_asignatura','id_periodo');
    }


}
