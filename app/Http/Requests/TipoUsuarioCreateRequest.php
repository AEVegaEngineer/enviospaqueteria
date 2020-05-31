<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoUsuarioCreateRequest extends FormRequest
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
            'tipUsuDescripcion' => 'required|max:255|min:4', 
            'tipCreatedBy' => 'required',            
        ];
    }
    public function messages()
    {
        return [
            'tipUsuDescripcion.required' => 'La descripción del tipo de usuario es requerida',
            'tipUsuDescripcion.max' => 'La longitud de la descripción del tipo de usuario tiene como máximo 255 caracteres',
            'tipUsuDescripcion.min' => 'La longitud de la descripción del tipo de usuario tiene como mínimo 4 caracteres',

            'tipCreatedBy.required' => 'Es necesario registrar el usuario que ha creado este tipo de usuario',
        ];
    }
}
