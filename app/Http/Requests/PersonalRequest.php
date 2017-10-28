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
    public function messages()
        {
        return [

            'nombres.required' => 'DEBE ESPECIFICAR LOS NOMBRES DEL PERSONAL',
            'apellidos.required' => 'DEBE ESPECIFICAR LOS APELLIDOS DEL PERSONAL',
            'nacio.required' => 'DEBE ESPECIFICAR LA NACIONALIDAD DEL PERSONAL',
            'cedula.required' => 'DEBE ESPECIFICAR LA CÉDULA DE IDENTIDAD DEL PERSONAL',
            'cedula.numeric' => 'LA CÉDULA DEBE SER SOLO NÚMEROS',
            'fecha_nacimiento.required' => 'DEBE ESPECIFICAR LA FECHA DE NACIMIENTO DEL PERSONAL',
            'edad.required' => 'DEBE ESPECIFICAR LA EDAD DEL PERSONAL',
            'edad.numeric' => 'LA EDAD SOLO DEBE CONTENER NÚMEROS',
            'edo_civil.required' => 'DEBE ESPECIFICAR EL ESTADO CIVIL DEL PERSONAL',
            'direccion.required' => 'DEBE ESPECIFICAR LA DIRECCIÓN DEL PERSONAL',
            'genero.required' => 'DEBE ESPECIFICAR EL GÉNERO DEL PERSONAL',
            'codigo_hab.required' => 'DEBE ESPECIFICAR EL CÓDIGO DE HABITACIÓN DEL PERSONAL',
            'codigo_hab.numeric' => 'EL CÓDIGO DE HABITACIÓN SOLO DEBE CONTENER NÚMEROS',
            'telf_hab.required' => 'DEBE ESPECIFICAR EL TELÉFONO DE HABITACIÓN DEL PERSONAL',
            'telf_hab.numeric' => 'EL TÉLEFONO DE HABITACIÓN DEL PERSONAL SOLO DEBE CONTENER NÚMEROS',
            'codigo_cel.required' => 'DEBE ESPECIFICAR EL CÓDIGO DE CELULAR DEL PERSONAL',
            'codigo_cel.numeric' => 'EL CÓDIGO DE CELULAR SOLO DEBE CONTENER NÚMEROS',
            'celular.required' => 'DEBE ESPECIFICAR EL TELÉFONO DE CELULAR DEL PERSONAL',
            'celular.numeric' => 'EL CELULAR DEL PERSONAL SOLO DEBE CONTENER NÚMEROS',
            'correo.required' => 'DEBE ESPECIFICAR EL CORREO DEL PERSONAL',
            'id_cargo.required' => 'DEBE ASIGNARLE UN CARGO AL PERSONAL'

            ];
        }
}
