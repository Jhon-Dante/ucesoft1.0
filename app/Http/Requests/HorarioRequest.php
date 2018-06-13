<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class HorarioRequest extends Request
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
            'id_curso'      => 'required|numeric',
            'id_seccion'    => 'required|numeric',
            'id_asignatura' => 'required|numeric',
            'id_aula'       => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'id_curso.required'      => 'No ha selecionado ningún curso',
            'id_seccion.required'    => 'No ha seleccionado ningúna sección',
            'id_asignatura.required' => 'No ha seleccionado ningúna asignatura',
            'id_aula.required'       => 'No ha seleccionado ningúna aula'
  
        ];
    }
}
