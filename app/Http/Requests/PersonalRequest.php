<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PersonalRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombres' => 'required',
            'apellidos' => 'required',
            'nacio' => 'required|numeric',
            'cedula' => 'required|numeric',
            'fecha_nacimiento' => 'required',
            'edad' => 'required|numeric',
            'edo_civil' => 'required',
            'direccion' => 'required',
            'genero' => 'required',
            'codigo_hab' => 'required|numeric',
            'telf_hab' => 'required|numeric',
            'codigo_cel' => 'required|numeric',
            'celular' => 'required|numeric',
            'correo' => 'required',
            'id_cargo' => 'required'
        ];
    }
}
