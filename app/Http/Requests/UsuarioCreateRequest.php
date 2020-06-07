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
            'usuTelefono' => 'required',            
            'usuDireccion' => 'required',       
            'usuContrasena' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'usuEmail.required' => 'El email del usuario es requerido',
            'usuEmail.unique' => 'El email del usuario ya se encuentra registrado',

            'usuTelefono.required' => 'El teléfono del usuario es requeridos',

            'usuDireccion.required' => 'La dirección del usuario es requerida',

            'usuContrasena.required' => 'La contrasena de usuario es requerida',
        ];
    }
}
