<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Persona;
use App\Comercio;
use App\Shopping;
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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            //'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'privilegio' => 'in:persona,comercio,shopping', 
            'usuTelefono' => ['required', 'numeric'],
            'usuDireccion' => ['required', 'string', 'max:255'],
        ]);
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
            'usuDireccion' => $data['usuDireccion'],
        ]);
        
        if($data['privilegio'] == 'persona')
        {
            $personaRegistrada = Persona::create([
                'perNombres' => $data['perNombres'],
                'perApellidos' => $data['perApellidos'],
                'perDni' => $data['perDni'],
                'perUsuarioId' => $usuario->id,
            ]);
        }
        else if($data['privilegio'] == 'comercio')
        {   
            $comercioRegistrado = Comercio::create([
                'comNombre' => $data['comNombre'],
                'comCuit' => $data['comCuit'],
                'comUsuarioId' => $usuario->id,
                'comShoppingId' => $data['comShoppingId'],
            ]);
        }
        else if($data['privilegio'] == 'shopping')
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
