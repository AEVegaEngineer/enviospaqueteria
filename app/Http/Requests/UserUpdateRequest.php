<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $id = $this->input('id');
        $privilegio = $this->input('privilegio');
        if ($privilegio == 1)
        {
            //persona
            return [            
                'email' => 'required|string|max:100|unique:users,email,'.$id,
                'password' => 'nullable|string|min:8',
                'perNombres' => 'required|string|max:100',                
                'perApellidos' => 'required|string|max:100',                
                'perDni' => 'required|numeric',
                'privilegio' => 'required|numeric',
                'usuTelefono' => 'required|numeric',
                'dirDepartamento' => 'required|string|max:100',
                'dirZip' => 'required|numeric',
                'dirLinea1' => 'required|string|max:100',
                'dirLinea2' => 'required|string|max:100',
            ];
        } elseif ($privilegio == 2) {
            //comercio
            return [            
                'email' => 'required|string|max:100|unique:users,email,'.$id,
                'password' => 'nullable|string|min:8',
                'comNombre' => 'required|string|max:100',                
                'comCuit' => 'required|numeric',
                'comShoppingId' => 'numeric',
                'privilegio' => 'required|numeric',
                'usuTelefono' => 'required|numeric',
                'dirDepartamento' => 'required|string|max:100',
                'dirZip' => 'required|numeric',                
                'dirLinea1' => 'required|string|max:100',
                'dirLinea2' => 'required|string|max:100',
            ];
        } elseif ($privilegio == 3) {
            //shopping
            return [            
                'email' => 'required|string|max:100|unique:users,email,'.$id,
                'password' => 'nullable|string|min:8',
                'shopNombre' => 'required|string|max:100',                
                'shopCuit' => 'required|numeric',
                'privilegio' => 'required|numeric',
                'usuTelefono' => 'required|numeric',
                'dirDepartamento' => 'required|string|max:100',
                'dirZip' => 'required|numeric',
                'dirLinea1' => 'required|string|max:100',
                'dirLinea2' => 'required|string|max:100',
            ];
        }elseif ($privilegio == 4 || $privilegio == 5) {
            //shopping
            return [            
                'email' => 'required|string|max:100|unique:users,email,'.$id,
                'password' => 'nullable|string|min:8',
                'perNombres' => 'required|string|max:100',                
                'perApellidos' => 'required|string|max:100',                
                'perDni' => 'required|numeric',
                'usuTelefono' => 'required|numeric',             
            ];
        }       
    }
}
