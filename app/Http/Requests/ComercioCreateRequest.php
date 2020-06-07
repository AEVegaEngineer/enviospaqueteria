<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComercioCreateRequest extends FormRequest
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

            'comCuit' => 'required|numeric',
            'comNombre' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'usuEmail.required' => 'El email del comercio es requerido',
            'usuEmail.unique' => 'El email del comercio ya se encuentra registrado',

            'usuTelefono.required' => 'El teléfono del comercio es requerido',

            'usuDireccion.required' => 'La dirección del comercio es requerida',

            'usuContrasena.required' => 'La contrasena de comercio es requerida',

            'comCuit.required' => 'El Cuit del comercio es requerido',
            'comCuit.numeric' => 'El Cuit del comercio debe tener formato adecuado',

            'comNombre.required' => 'El nombre del comercio es requerido',
        ];
    }
}
