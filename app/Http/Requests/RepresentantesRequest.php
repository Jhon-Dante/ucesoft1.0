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
            'vive_estu' => 'required',
            'ingreso_apx' => 'required|numeric',
            'n_familia' => 'required|numeric',
            'direccion' => 'required',
            'email' => 'required',
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

    public function messages()
    {
        return [
            'nacionalidad.required' => 'DEBE SELECCIONAR LA NACIONALIDAD',
            'cedula.required' => 'DEBE INGRESAR LA CÉDULA',
            'cedula.numeric' => 'LA CÉDULA SOLO DEBE CONTENER NÚMERO',
            'nombres.required' => 'DEBE INGRESAR LOS NOMBRES DEL REPRESENTANTE',
            'apellidos.required' => 'DEBE INGRESAR LOS APELLIDOS DEL REPRESENTANTE',
            'profesion.required' => 'DEBE INGRESAR LA PROFESIÓN DEL REPRESENTANTE',
            'vive_estu.required' => 'DEBE INGRESAR SI VIVE CON EL ESTUDIANTE',
            'ingreso_apx.required' => 'INGRESE EL INGRESO APROXIMADO DEL REPRESENTANTE',
            'ingreso_apx.numeric' => 'LOS INGRESOS APROXIMADOS DEBEN SER SOLO NÚMEROS',
            'n_familia.required' => 'EL NÚMERO DE FAMILIARES EN EL HOGAR DEL REPRESENTANTE ES OBLIGATORIO',
            'n_familia.numeric' => 'EL NÚMERO DE FAMILIARES EN EL HOGAR DEL REPRESENTANTE DEBE SER SOLO NÚMERO',
            'direccion.required' => 'LA DIRECCIÓN ES OBLIGATORIO',
            'email.required' => 'EL CORREO ELECTRÓNICO ES DE CARÁCTER OBLIGATORIO',
            'codigo_hab.required' => 'EL CÓDIGO DE HABITACIÓN DEL REPRESENTANTE ES REQUERIDO',
            'codigo_hab.numeric' => 'EL CÓDIGO DE HABITACIÓN DEL REPRESENTANTE SOLO DEBE CONTENER NÚMEROS',
            'telf_hab.required' => 'EL TELÉFONO DE HABITACIÓN DEL REPRESENTANTE ES REQUERIDO',
            'telf_hab.numeric' => 'EL TELÉFONO DEL HABITACIÓN DEL REPRESENTANTE SOLO DEBE LLEVAR NÚMERO',
            'lugar_tra.required' => 'EL LUGAR DE TRABAJO DEL REPRESENTANTE ES DE CARÁCTER OBLIGATORIO',
            'codigo_tra.required' => 'EL CÓDIGO DE TELÉFONO DEL TRABAJO DEL REPRESENTANTE ES OBLIGATORIO',
            'codigo_tra.numeric' => 'EL CÓDIGO DE TELÉFONO DEL TRABAJO DEL REPRESENTANTE SOLO DEBE CONTENER NÚMEROS',
            'telf_tra.required' => 'EL TELÉFONO DEL TRABAJO DEL REPRESENTANTE ES OBLIGATORIO',
            'telf_tra.numeric' => 'EL TELÉFONO DEL TRABAJO DEL REPRESENTANTE SOLO DEBE CONTENER NÚMERO',
            'responsable_m.required' => 'EL RESPONSABLE DE PAGAR LAS MENSUALIDADES ES OBLIGATORIO',
            'codigo_responsable.required' => 'EL CÓDIGO DEL TELÉFONO DEL RESPONSABLE DE PAGAR LAS MENSUALIDADES ES REQUERIDO',
            'codigo_responsable.numeric' => 'EL CÓDIGO DEL TELÉFONO DEL RESPONSABLE DE PAGAR LAS MENSUALIDADES SOLO DEBE CONTENER NÚMEROS',
            'telf_responsable.required' => 'EL TELÉFONO DEL RESPONASBLE DEL PAGAR LAS MENSUALIDADES ES DE CARÁCTER OBLIGATORIO',
            'telf_responsable.numeric' => 'EL TELÉFONO DEL RESPONSABLE DE PAGAR LAS MENSUALIDADES SOLO DEBE CONTENER NÚMEROS',
            // 'codigo_opcional' => 'required|numeric',
            // 'telf_opcional' => 'required|numeric',
            // 'nombre_opcional' => 'required',
            'codigo_emergencia.required' => 'EL CÓDIGO DE EMERGENCIA DEL NÚMERO DE EMERGENCIA ES CARÁCTER OBLIGATORIO',
            'codigo_emergencia.numeric' => 'EL CÓDIGO DE EMERGENCIA DEL NÚMERO DE EMERGENCIA SOLO DEBE CONTENER NÚMERO',
            'telf_emergencia.required' => 'EL TELÉFONO DEL NÚMERO DE EMERGENCIA ES DE CARÁCTER OBLIGATORIO',
             'telf_emergencia.numeric' => 'EL TELÉFONO DEL NÚMERO DE EMERGENCIA SOLO DEBE CONTENER NÚMERO'

        ];
    }
}
