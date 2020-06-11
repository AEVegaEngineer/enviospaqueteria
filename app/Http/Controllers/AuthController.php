<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UsuarioCreateRequest;
use App\Http\Requests\LogRequest;
use App\Usuario;
use App\Comercio;
use App\Shopping;
use App\Persona;
use Auth;
use Mail;
use Session;
use Redirect;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('auth.login');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LogRequest $request)
    {
        //con Auth::attempt siempre es necesario pasarle 'password' y 
        //poner un getter en el modelo del usuario
        if(Auth::attempt([
            'usuEmail' => $request['usuEmail'], 
            'password'=>$request['usuContrasena']
        ]))
        {
            //return Redirect::to('admin');
            Session::flash('message-success','Usted ha iniciado sesión correctamente!');
            $id = Auth::user()->id;

            //el usuario es Comercio
            if(Comercio::where('comUsuarioId',$id)->first() !== null)
            {        
                return view('dashboards.comercio');
            }
            //el usuario es Shopping
            else if(Shopping::where('shopUsuarioId',$id)->first() !== null)
            {
                return view('dashboards.shopping');
            }
            //el usuario es persona
            else
            {
                return view('dashboards.persona');                
            }
        }
        /*
        Session::flash('message-error','Los datos ingresados son incorrectos');
        return Redirect::to('/');   
        */
        Session::flash('message-error','Usuario o contraseña incorrecta.');
        return view('auth.login');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return view('front');
    }
    /**
     * Registra un usuario
     *
     * @return \Illuminate\Http\Response
     */
    public function registerForm(Request $request)
    {
        return view('auth.register');
    }

    /**
     * Registra un usuario
     *
     * @return \Illuminate\Http\Response
     */
    public function register(UsuarioCreateRequest $request)
    {

        //$show = Usuario::create($request);
        $show = Usuario::create([
            'usuEmail' => $request['usuEmail'],
            'usuContrasena' => Hash::make($request['usuContrasena']),
            //'usuContrasena' => $request['usuContrasena'],
            'usuNombres' => $request['usuNombre'],                
            'usuApellidos' => $request['usuApellido'],
            'usuDni' => $request['usuDni'],
            'usuDireccion' => $request['usuDireccion'],
            'usuActivo' => 1,
            'usuTipoUsuario' => 1,
        ]);  
        return $show;
        //return redirect('/')->with('success', 'Corona Case is successfully saved');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function recover(PasswordRecoverRequest $request)
    {
        return view('email.recover');
        //Mail::send('email.recover');       
    }
}
