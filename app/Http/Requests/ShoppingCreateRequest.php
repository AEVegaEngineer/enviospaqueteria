<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShoppingCreateRequest extends FormRequest
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

            'shopCuit' => 'required|numeric',
            'shopNombre' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'usuEmail.required' => 'El email del shopping es requerido',
            'usuEmail.unique' => 'El email del shopping ya se encuentra registrado',

            'usuTelefono.required' => 'El teléfono del shopping es requerido',

            'usuDireccion.required' => 'La dirección del shopping es requerida',

            'usuContrasena.required' => 'La contrasena de shopping es requerida',

            'shopCuit.required' => 'El Cuit del shopping es requerido',
            'shopCuit.numeric' => 'El Cuit del shopping debe tener formato adecuado',

            'shopNombre.required' => 'El nombre del shopping es requerido',
        ];
    }
}
