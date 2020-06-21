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
            'envOrigen' => ['required', 'string', 'min:10'],
            'envDestino' => ['required', 'string', 'min:10'],
            'envCosto' => ['required', 'numeric', 'min:1'],
            'listCantidadPaq' => ['required', 'numeric', 'min:1'],

        ];
    }
}
