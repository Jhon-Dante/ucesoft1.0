<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DatosBasicosRequest extends Request
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
            'id_representante' => 'required',
            'id_parentesco' => 'required',
            'nacionalidad' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'lugar_nac' => 'required',
            'estado' => 'required',
            'fecha_nac' => 'required',
            'sexo' => 'required',
            'peso' => 'required|numeric',
            'talla' => 'required',
            'salud' => 'required',
            'direccion' => 'required'


        ];
    }

        public function messages()
    {
        return [
            'id_representante' => 'DEBE SELECCIONAR EL REPRESENTANTE DEL ESTUDIANTE',
            'id_parentesco' => 'DEBE SELECCIONAR EL PARENTESCO DEL REPRESENTANTE CON EL ESTUDIANTE',
            'nacionalidad.required' => 'DEBE SELECCIONAR LA NACIONALIDAD',
            'nombres.required' => 'DEBE INGRESAR LOS NOMBRES DEL ESTUDIANTE',
            'apellidos.required' => 'DEBE INGRESAR LOS APELLIDOS DEL ESTUDIANTE',
            'lugar_nac.required' => 'DEBE INGRESAR EL LUGAR DE NACIMIENTO DEL ESTUDIANTE (EJP: Hospital de Maracay)',
            'estado.required' => 'DEBE INGRESAR EL ESTADO DE PROCEDENCIA DEL ESTUDIANTE',
            'fecha_nac.required' => 'DEBE ESPECIFICAR LA FECHA DE NACIMIENTO DEL ESTUDIANTE',
            'sexo.required' => 'DEBE ESPECIFICAR EL GÉNERO DEL ESTUDIANTE',
            'peso.required' => 'DEBE ESPECIFICAR EL PESO DEL ESTUDIANTE',
            'peso.numeric' => 'EL PESO SOLO DEBE CONTENER NÚMERO',
            'talla.required' => 'DEBE ESPECIFICAR LA TALLA DEL ESTUDIANTE',
            'salud.required' => 'DEBE ESPECIFICAR LAS CONDICIONES O ENFERMEDADES DEL ESTUDIANTE, SI NO TIENE, TRANSCRIBA : Ningun(a)',
            'direccion.required' => 'DEBE ESPECIFICAR LA DIRECCIÓN EXACTA DEL ESTUDIANTE'
        ];
    }
}
