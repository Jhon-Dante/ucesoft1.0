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
            'id_representante' => 'required|numeric',
            'id_parentesco' => 'required|numeric',
            'nacionalidad' => 'required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'nombres' => 'required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'apellidos' => 'required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'lugar_nac' => 'required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'estado' => 'required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'fecha_nac' => 'required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'sexo' => 'required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'peso' => 'required|numeric',
            'talla' => 'required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'salud' => 'required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'direccion' => 'required|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/'


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
