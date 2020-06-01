<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioCreateRequest extends FormRequest
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
            'usuEmail' => 'required|unique:usuarios',
            'usuDni' => 'required|unique:usuarios',
            'usuNombre' => 'required',
            'usuApellido' => 'required',       
            'usuDireccion' => 'required',       
            'usuContrasena' => 'required',  
        ];
    }
    public function messages()
    {
        return [
            'usuEmail.required' => 'El email del usuario es requerido',
            'usuEmail.unique' => 'El email del usuario ya se encuentra registrado',

            'usuDni.required' => 'El DNI del usuario es requerido',
            'usuDni.unique' => 'El dni del usuario ya se encuentra registrado',

            'usuNombre.required' => 'Los nombres del usuario son requeridos',

            'usuApellido.required' => 'Los apellidos del usuario son requeridos',

            'usuDireccion.required' => 'La dirección del usuario es requerida',

            'usuContrasena.required' => 'La contrasena de usuario es requerida',
        ];
    }
}
