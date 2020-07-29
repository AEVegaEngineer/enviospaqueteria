<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\PersonaCreateRequest;
use App\Persona;
use App\User;
use App\Direccion;
use Auth;
use Mail;
use Session;
use Redirect;

class PersonaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userdata = getUserData();

        $usuarios = User::where('privilegio',1)
            ->orderBy('users.created_at', 'desc')            
            ->paginate(15);
        //return $usuarios;
        return view('users.index', compact('usuarios','userdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaCreateRequest $request)
    {  
        //return $request;        
        
        $hashedPass = Hash::make($request['usuContrasena']);
        
        $usuarioRegistrado = Usuario::create([            
            'usuEmail' => $request['usuEmail'],
            'usuActivo' => 1,
            'usuTelefono' => $request['usuTelefono'],
            'usuContrasena' => $hashedPass,
            'usuTipoUsuario' => 1,
        ]);        

        $direccionDeOrigen = Direccion::create([
            'dirLinea1'  => $data['dirLinea1'], 
            'dirLinea2' => $data['dirLinea2'],
            'dirCiudad' => 'San Juan',
            'dirProvincia' => $data['dirProvincia'],
            'dirZip' => $data['dirZip'],
            'dirUserId' => $usuarioRegistrado->id,
            'dirOrigenDestino' => 'origen',
        ]);
        
        $personaRegistrada = Persona::create([
            'perNombres' => $request['perNombre'],
            'perApellidos' => $request['perApellido'],
            'perDni' => $request['perDni'],
            'perUsuarioId' => $usuarioRegistrado->id,
        ]);
        //con Auth::attempt siempre es necesario pasarle 'password' y 
        //poner un getter en el modelo del usuario
        if(Auth::attempt([
            'usuEmail' => $request['usuEmail'], 
            'password'=>$request['usuContrasena']
        ])){
            Session::flash('messsage-success','Usted se ha registrado correctamente!');                   
        } 
        else
        {
            $request->flash();
            Session::flash('messsage-error','Ha ocurrido un error con el registro!');                 
        } 
        return Redirect::to('/login');
        //return view('dashboards.persona'); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
