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
                /*'dirDepartamento' => 'required|string|max:100',*/
                'dirZip' => 'required|numeric',
                'dirLinea1' => 'required|string|max:150',
                'dirLinea2' => 'required|string|max:150',
            ];
        } elseif ($privilegio == 2) {
            //comercio
            return [            
                'email' => 'required|string|max:100|unique:users,email,'.$id,
                'password' => 'nullable|string|min:8',
                'comNombre' => 'required|string|max:100',                
                'comCuit' => 'required|string|max:13',
                'comShoppingId' => 'numeric',
                'privilegio' => 'required|numeric',
                'usuTelefono' => 'required|numeric',
                /*'dirDepartamento' => 'required|string|max:100',*/
                'dirZip' => 'required|numeric',                
                'dirLinea1' => 'required|string|max:150',
                'dirLinea2' => 'required|string|max:150',
            ];
        } elseif ($privilegio == 3) {
            //shopping
            return [            
                'email' => 'required|string|max:100|unique:users,email,'.$id,
                'password' => 'nullable|string|min:8',
                'shopNombre' => 'required|string|max:100',                
                'shopCuit' => 'required|string|max:13',
                'privilegio' => 'required|numeric',
                'usuTelefono' => 'required|numeric',
                /*'dirDepartamento' => 'required|string|max:100',*/
                'dirZip' => 'required|numeric',
                'dirLinea1' => 'required|string|max:150',
                'dirLinea2' => 'required|string|max:150',
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
    public function messages()
    {
        return [
            'email.required' => 'El correo electrónico es requerido',
            'email.max' => 'La logitud máxima del correo electrónico es de 100 caracteres',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La longitud mínima de la contraseña es de 8 caracteres',
            'perNombres.required' => 'El nombre es requerido',      
            'perNombres.max' => 'La logitud máxima del nombre es de 100 caracteres',          
            'perApellidos.required' => 'El apellido es requerido',     
            'perApellidos.max' => 'La logitud máxima del apellido es de 100 caracteres',           
            'perDni.required' => 'El DNI es requerido',
            'shopNombre.required' => 'El nombre del shopping es requerido',
            'shopNombre.string' => 'El nombre del shopping debe ser una cadena de texto',
            'shopNombre.max' => 'El nombre del shopping debe tener como máximo 255 caracteres',
            'shopCuit.required' => 'El CUIT del shopping es requerido',
            'shopCuit.string' => 'El CUIT del shopping debe ser una cadena de texto',
            'shopCuit.max' => 'El CUIT del shopping debe tener como máximo 13 caracteres contando guiones',
            'comNombre.required' => 'El nombre del comercio es requerido',
            'comNombre.string' => 'El nombre del comercio debe ser una cadena de texto',
            'comNombre.max' => 'El nombre del comercio debe tener como máximo 255 caracteres', 
            'comCuit.required' => 'El CUIT del comercio es requerido',
            'comCuit.string' => 'El CUIT del comercio debe ser una cadena de texto',
            'comCuit.max' => 'El CUIT del comercio debe tener como máximo 13 caracteres contando guiones',
            'comShoppingId.required' => 'El nombre del shopping es requerido',
            'comShoppingId.numeric' => 'El código del shopping debe ser numérico',
            'privilegio.required' => 'El privilegio es requerido',
            'usuTelefono.required' => 'El teléfono es requerido',
            'usuTelefono.numeric' => 'El teléfono es requerido',
            'dirDepartamento.required' => 'El departamento es requerido',
            'dirDepartamento.max' => 'La logitud máxima del departamento es de 100 caracteres',
            'dirZip.required' => 'El código postal es requerido',
            'dirZip.numeric' => 'El código postal debe ser numérico',
            'dirLinea1.required' => 'La linea 1 de dirección es requerida',
            'dirLinea1.max' => 'La logitud máxima de la linea 1 de dirección es de 150 caracteres',
            'dirLinea2.required' => 'La linea 2 de dirección es requerida',
            'dirLinea2.max' => 'La logitud máxima de la linea 2 de dirección es de 150 caracteres',
        ];
    }
}
