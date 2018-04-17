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
            'cedula' => 'required|numeric',
            'fecha_nacimiento' => 'required',
            'edo_civil' => 'required',
            'direccion' => 'required',
            'genero' => 'required',
            'telf_hab' => 'required|numeric',
            'celular' => 'required|numeric',
            'correo' => 'required',
            'id_cargo' => 'required'
        ];
    }
    public function messages()
        {
        return [

            'nombres.required' => 'DEBE ESPECIFICAR LOS NOMBRES DEL PERSONAL',
            'apellidos.required' => 'DEBE ESPECIFICAR LOS APELLIDOS DEL PERSONAL',
            'cedula.required' => 'DEBE ESPECIFICAR LA CÉDULA DE IDENTIDAD DEL PERSONAL',
            'cedula.numeric' => 'LA CÉDULA DEBE SER SOLO NÚMEROS',
            'fecha_nacimiento.required' => 'DEBE ESPECIFICAR LA FECHA DE NACIMIENTO DEL PERSONAL',
            'edo_civil.required' => 'DEBE ESPECIFICAR EL ESTADO CIVIL DEL PERSONAL',
            'direccion.required' => 'DEBE ESPECIFICAR LA DIRECCIÓN DEL PERSONAL',
            'genero.required' => 'DEBE ESPECIFICAR EL GÉNERO DEL PERSONAL',
            'telf_hab.required' => 'DEBE ESPECIFICAR EL TELÉFONO DE HABITACIÓN DEL PERSONAL',
            'telf_hab.numeric' => 'EL TÉLEFONO DE HABITACIÓN DEL PERSONAL SOLO DEBE CONTENER NÚMEROS',
            'celular.required' => 'DEBE ESPECIFICAR EL TELÉFONO DE CELULAR DEL PERSONAL',
            'celular.numeric' => 'EL CELULAR DEL PERSONAL SOLO DEBE CONTENER NÚMEROS',
            'correo.required' => 'DEBE ESPECIFICAR EL CORREO DEL PERSONAL',
            'id_cargo.required' => 'DEBE ASIGNARLE UN CARGO AL PERSONAL'

            ];
        }
}
