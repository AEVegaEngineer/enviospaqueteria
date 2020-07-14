<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnvioCreateRequest extends FormRequest
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
            'envOrigen' => 'required|string|min:10',
            'envDestino' => 'required|string|min:10',
            'envCosto' => 'required|numeric|min:1',
            'listCantidadPaq' => 'required|numeric|min:1',
        ];

    }
    public function messages()
    {
        return [
            'envOrigen.required' => 'La dirección de orígen del envío es requerida',
            'envOrigen.min' => 'La dirección de orígen del envío es debe tener diez caracteres como mínimo',
            'envDestino.required' => 'La dirección de destino del envío es requerida',
            'envDestino.min' => 'La dirección de destino del envío es debe tener diez caracteres como mínimo',
            'envCosto.required' => 'El costo del envío es requerido',
            'envCosto.numeric' => 'El costo del envío debe ser numérico',
            'envCosto.min' => 'El costo del envío es debe tener al menos un caracter',
        ];
    }
}
