<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CargosRequest extends Request
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
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */

    public function messages()
    {
        return [
            'cargo.required' => 'El campo cargo es requerido.',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cargo' => 'required'
        ];
    }
    public function response(array $errors){
        if ($this->ajax()){
            return response()->json($errors, 200);
        }
        else
        {
        return redirect($this->redirect)
                ->withErrors($errors, 'formulario')
                ->withInput();
        }
    }
}
