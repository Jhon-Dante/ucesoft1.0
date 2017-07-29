<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RepresentantesRequest extends Request
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
            'nacionalidad' => 'required',
            'cedula' => 'required|numeric',
            'nombres' => 'required',
            'apellidos' => 'required',
            'profesion' => 'required',
            'id_parentesco' => 'required',
            'vive_estu' => 'required',
            'ingreso_apx' => 'required|numeric',
            'n_familia' => 'required|numeric',
            'direccion' => 'required',
            'codigo_hab' => 'required|numeric',
            'telf_hab' => 'required|numeric',
            'lugar_tra' => 'required',
            'codigo_tra' => 'required|numeric',
            'telf_tra' => 'required|numeric',
            'responsable_m' => 'required',
            'codigo_responsable' => 'required|numeric',
            'telf_responsable' => 'required|numeric',
            // 'codigo_opcional' => 'required|numeric',
            // 'telf_opcional' => 'required|numeric',
            // 'nombre_opcional' => 'required',
            'codigo_emergencia' => 'required|numeric',
            'telf_emergencia' => 'required|numeric'

        ];
    }
}
