<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Persona;
use App\Comercio;
use App\Shopping;
use App\Direccion;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $comShoppingIds = Shopping::pluck('shopNombre', 'shopId');
        $comShoppingIds->prepend('No', 0);
        return view('auth.register', compact('comShoppingIds'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $message = array(
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
            'dirLinea2.max' => 'La logitud máxima de la linea 2 de dirección es de 150 caracteres'
        );
        if($data['privilegio'] == 1)
        {
            return Validator::make($data, [
                //'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'perNombres' => ['required', 'string', 'max:255'],
                'perApellidos' => ['required', 'string', 'max:255'],
                'perDni' => ['required', 'numeric'],
                'privilegio' => ['required', 'numeric'],
                'usuTelefono' => ['required', 'numeric']
            ],$message);
        } else if($data['privilegio'] == 2) {
            return Validator::make($data, [
                //'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'privilegio' => ['required', 'numeric'],
                'usuTelefono' => ['required', 'numeric'],
                'comNombre' => ['required', 'string', 'max:255'],
                'comCuit' => ['required', 'string', 'max:13'],
                'comShoppingId' => ['required', 'numeric'],
            ],$message);
        } else if($data['privilegio'] == 3) {
            return Validator::make($data, [
                //'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'privilegio' => ['required', 'numeric'],
                'usuTelefono' => ['required', 'numeric'],
                'shopNombre' => ['required', 'string', 'max:255'],
                'shopCuit' => ['required', 'string', 'max:13'],
            ],$message);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $usuario = User::create([
            //'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'privilegio' => $data['privilegio'],
            'usuTelefono' => $data['usuTelefono'],
        ]);

        $direccionDeOrigen = Direccion::create([
            'dirLinea1'  => $data['dirLinea1'], 
            'dirLinea2' => $data['dirLinea2'],
            'dirCiudad' => 'San Juan',
            'dirProvincia' => 'San Juan',
            'dirDepartamento' => $data['dirDepartamento'],
            'dirZip' => $data['dirZip'],
            'dirUserId' => $usuario->id,
            'dirOrigenDestino' => 'origen',
        ]);
        
        if($data['privilegio'] == 1)
        {
            $personaRegistrada = Persona::create([
                'perNombres' => $data['perNombres'],
                'perApellidos' => $data['perApellidos'],
                'perDni' => $data['perDni'],
                'perUsuarioId' => $usuario->id,
            ]);
        }
        else if($data['privilegio'] == 2)
        {   
            if ($data['comShoppingId'] == 0)
            {
                $data['comShoppingId'] = null;
            }
            $comercioRegistrado = Comercio::create([
                'comNombre' => $data['comNombre'],
                'comCuit' => $data['comCuit'],
                'comUsuarioId' => $usuario->id,
                'comShoppingId' => $data['comShoppingId'],
            ]);
        }
        else if($data['privilegio'] == 3)
        {
            $shoppingRegistrada = Shopping::create([
                'shopNombre' => $data['shopNombre'],
                'shopCuit' => $data['shopCuit'],
                'shopUsuarioId' => $usuario->id,
            ]);
        }
        
        return $usuario;
    }
}
