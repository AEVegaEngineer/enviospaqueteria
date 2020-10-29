<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaqueteCreateRequest extends FormRequest
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
            'paqDescripcion' => 'required|string|min:5',
            'paqDimensionAlto' => 'required|numeric|min:1',
            'paqDimensionAncho' => 'required|numeric|min:1',
            'paqDimensionLargo' => 'required|numeric|min:1',
            'paqDimensionUnidad' => 'required|string',
            'paqPeso' => 'required|numeric|min:1',
            'paqPesoUnidad' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'paqDescripcion.required' => 'La descripción del paquete es requerida',
            'paqDescripcion.min' => 'La longitud de la descripción debe ser mayor a 5 caracteres',

            'paqDimensionAlto.required' => 'La altura del paquete es requerida',
            'paqDimensionAlto.numeric' => 'La altura del paquete debe ser numérica',
            'paqDimensionAlto.min' => 'La altura del paquete debe ser mayor a 1',

            'paqDimensionAncho.required' => 'El ancho del paquete es requerido',
            'paqDimensionAncho.numeric' => 'El ancho del paquete debe ser numérico',
            'paqDimensionAncho.min' => 'El ancho del paquete debe ser mayor a 1',

            'paqDimensionLargo.required' => 'El largo del paquete es requerido',
            'paqDimensionLargo.numeric' => 'El largo del paquete debe ser numérico',
            'paqDimensionLargo.min' => 'El largo del paquete debe ser mayor a 1',

            'paqPeso.required' => 'El peso del paquete es requerido',
            'paqPeso.numeric' => 'El peso del paquete debe ser numérico',
            'paqPeso.min' => 'El peso del paquete debe ser mayor a 1',

            'paqPesoUnidad.required' => 'La unidad para el peso es requerida',
        ];
    }
}
