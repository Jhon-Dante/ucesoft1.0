<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Representantes extends Model
{
    protected $table='representantes';
    protected $fillable=['id',
    'nacionalidad',
    'cedula',
    'nombres',
    'apellidos',
    'profesion',
    'id_parentesco',
    'vive_estu',
    'ingreso_apx',
    'n_familia',
    'direccion',
    'email',
    'codigo_hab',
    'telf_hab',
    'lugar_tra',
    'codigo_tra',
    'telf_tra',
    'responsable_m',
    'codigo_responsable',
    'telf_responsable',
    'codigo_opcional',
    'telf_opcional',
    'nombre_opcional',
    'codigo_emergencia',
    'telf_emergencia'];

    public function parentesco()
    {

    	//belongsTo = Uno a muchos
    	return $this->belongsTo('App\Parentesco','id_parentesco');
    }
    public function datos_basicos()
    {
        return $this->hasMany('App\DatosBasicos','id_representante','id');
    }
}
