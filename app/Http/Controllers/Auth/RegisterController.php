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
        
        if($data['privilegio'] == 'persona')
        {
            return Validator::make($data, [
                //'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'perNombres' => ['required', 'string', 'max:255'],
                'perApellidos' => ['required', 'string', 'max:255'],
                'perDni' => ['required', 'numeric'],
                'privilegio' => 'in:persona,comercio,shopping', 
                'usuTelefono' => ['required', 'numeric'],
                'usuDireccion' => ['required', 'string', 'max:255'],
            ]);
        } else if($data['privilegio'] == 'comercio') {
            return Validator::make($data, [
                //'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'privilegio' => 'in:persona,comercio,shopping', 
                'usuTelefono' => ['required', 'numeric'],
                'usuDireccion' => ['required', 'string', 'max:255'],
                'comNombre' => ['required', 'string', 'max:255'],
                'comCuit' => ['required', 'numeric'],
                'comShoppingId' => ['required', 'numeric'],
            ]);
        } else if($data['privilegio'] == 'shopping') {
            return Validator::make($data, [
                //'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'privilegio' => 'in:persona,comercio,shopping', 
                'usuTelefono' => ['required', 'numeric'],
                'usuDireccion' => ['required', 'string', 'max:255'],
                'shopNombre' => ['required', 'string', 'max:255'],
                'shopCuit' => ['required', 'numeric'],
            ]);
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
