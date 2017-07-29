<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SeccionesRequest extends Request
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
            'seccion' => 'required',
            'id_curso' => 'required'
        ];
    }
     public function messages()
     {
        return [
            'seccion.required' => 'EL CAMPO Sección ES REQUERIDO.',
            'id_curso.required' => 'NO HA SELECCIONADO NINGÚN CURSO'
        ];
     }


}
