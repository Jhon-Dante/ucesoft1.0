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
            'representate' => 'required',
            'nacionalidad' => 'required',
            'cedula' => 'required|numeric',
            'nombre' => 'required',
            'apellido' => 'required',
            'lugar_nac' => 'required',
            'estado' => 'required',
            'nacimiento' => 'required|numeric',
            'edad' => 'required|numeric',
            'sexo' => 'required',
            'peso' => 'required|numeric',
            'talla' => 'required|numeric',
            'salud' => 'required',
            'direccion' => 'required',
            'nombre_p' => 'required',
            'cedula_p' => 'required|numeric',
            'vive_p' => 'required',
            'nombre_m' => 'required',
            'cedula_m' => 'required|numeric',
            'vive_m' => 'required'


        ];
    }
}
