<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogRequest extends FormRequest
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
            'usuEmail' => 'required',
            'usuContrasena' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'usuEmail.required' => 'El email del usuario es requerido',
            'usuContrasena.required' => 'La contrasena de usuario es requerida',
        ];
    }
}


