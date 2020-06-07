<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UsuarioCreateRequest;
use App\Http\Requests\LogRequest;
use App\Usuario;
use Auth;
use Mail;
use Session;
use Redirect;

class AuthController extends Controller
{
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
        ])){
            //return Redirect::to('admin');
            Session::flash('status','Usted ha iniciado sesión correctamente!');
            return "logged";
            //return view('welcome');
        
        }/*else if(Auth::attempt(['name' => $request['email'], 'password'=>$request['password']])){
            return Redirect::to('admin');

        }*/
        /*
        $errors = array();
        $errors = ["errors" => ["Los datos ingresados son incorrectos"]];
        array_push($errors, );
        return view('auth.login')->with($errors);
        */
        return 'Los datos ingresados son incorrectos';
        /*
        Session::flash('message-error','Los datos ingresados son incorrectos');
        return Redirect::to('/');
        */
        //return redirect('/tipousuario');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
    /**
     * Registra un usuario
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        return view('auth.register');
    }

    /**
     * Registra un usuario
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioCreateRequest $request)
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
