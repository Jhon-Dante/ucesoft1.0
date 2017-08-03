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
            'nacionalidad' => 'required',
            'cedula' => 'required|numeric',
            'nombres' => 'required',
            'apellidos' => 'required',
            'lugar_nac' => 'required',
            'estado' => 'required',
            'fecha_nac' => 'required',
            'edad' => 'required|numeric',
            'sexo' => 'required',
            'peso' => 'required|numeric',
            'talla' => 'required',
            'salud' => 'required',
            'direccion' => 'required'


        ];
    }
}
