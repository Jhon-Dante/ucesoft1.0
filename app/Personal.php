<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table='personal';
    protected $fillable=['id',
    'nombres',
    'apellidos',
    'nacio',
    'cedula',
    'direccion',
    'tenencia',
    'nacimiento',
    'edad',
    'sexo',
    'edo_civil',
    'ciudad',
    'estado',
    'pais',
    'telf_movil',
    'telf_fijo',
    'correo',
    'titulo',
    'mencion',
    'id_tipoPersonal',
    'id_cargo'];


     public function cargo()
    {
        return $this->belongsTo('App\Cargos', 'id_cargo');
    }
}
