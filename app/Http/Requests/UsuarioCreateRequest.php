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
            'usuNombres' => 'required',
            'usuApellidos' => 'required',       
            'usuDireccion' => 'required',    
            'usuTipoUsuario' => 'required',       
        ];
    }
    public function messages()
    {
        return [
            'usuEmail.required' => 'El email del usuario es requerido',
            'usuEmail.unique' => 'El email del usuario ya se encuentra registrado',

            'usuDni.required' => 'El DNI del usuario es requerido',
            'usuDni.unique' => 'El dni del usuario ya se encuentra registrado',

            'usuNombres.required' => 'Los nombres del usuario son requeridos',

            'usuApellidos.required' => 'Los apellidos del usuario son requeridos',

            'usuDireccion.required' => 'La dirección del usuario es requerida',

            'usuTipoUsuario.required' => 'El tipo de usuario es requerido',
        ];
    }
}
