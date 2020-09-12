<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserUpdateRequest;
use App\User;
use App\Persona;
use App\Comercio;
use App\Shopping;
use App\Direccion;
use Auth;
use Redirect;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
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

        $usuarios = User::leftjoin('comercios','users.id','=','comercios.comUsuarioId')
            ->leftjoin('shoppings','users.id','=','shoppings.shopUsuarioId')
            ->leftjoin('personas','users.id','=','personas.perUsuarioId')
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
        $comShoppingIds = Shopping::pluck('shopNombre', 'shopId');
        $comShoppingIds->prepend('No', 0);
        $userdata = getUserData();
        return view('users.create',compact('userdata','comShoppingIds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
                 
        $usuario = User::create([            
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'usuTelefono' => $request['usuTelefono'],
            'privilegio' => $request['privilegio']            
        ]);
        $direccionDeOrigen = Direccion::create([
            'dirLinea1'  => $request['dirLinea1'], 
            'dirLinea2' => $request['dirLinea2'],
            'dirCiudad' => 'San Juan',
            'dirDepartamento' => $request['dirDepartamento'], 
            'dirProvincia' => 'San Juan',
            'dirZip' => $request['dirZip'],
            'dirUserId' => $usuario->id,
            'dirOrigenDestino' => 'origen',
        ]);
        if($request['privilegio'] == 1 || $request['privilegio'] == 4 || $request['privilegio'] == 5){
            //persona
            Persona::create([            
                'perNombres' => $request['perNombres'],
                'perApellidos' => $request['perApellidos'],
                'perDni' => $request['perDni'],
                'perUsuarioId' => $usuario->id         
            ]);
        } else if($request['privilegio'] == 2) {
            //comercio
            $shopping = ($request['comShoppingId'] == 0 ? null : $request['comShoppingId']);
            Comercio::create([            
                'comNombre' => $request['comNombre'],
                'comCuit' => $request['comCuit'],
                'comShoppingId' => $shopping,
                'comUsuarioId' => $usuario->id          
            ]);
        } else if($request['privilegio'] == 3) {
            //shopping
            Shopping::create([            
                'shopNombre' => $request['shopNombre'],
                'shopCuit' => $request['shopCuit'],
                'shopUsuarioId' => $request['shopUsuarioId']       
            ]);
        }
        
        //$show = Usuario::create($request);   
        return redirect('/usuario')->with('success', 'El usuario ha sido creado correctamente!');
        //return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$user = User::find($id);
        $userdata = getUserData($id);
        return $userdata;
        //return view('usuario.edit',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userid = Auth::user()->id; 
        $privilegio_updater = Auth::user()->privilegio;
        $privs = User::select(['privilegio'])->where('id',$id)->first()->privilegio;
        /*
        solo permitir acceso a administradores para editar usuarios o que los usuarios se editen a si mismos
        */
        if(($privilegio_updater == 1 || $privilegio_updater == 2 || $privilegio_updater == 3) && Auth::user()->id != $id)
            abort(404);
        
        $userdata = null;
        $comShoppingIds = Shopping::pluck('shopNombre', 'shopId');
        $comShoppingIds->prepend('No', 0);
        $mindir = Direccion::join('users','users.id','=','direcciones.dirUserId')
            ->where('users.id',$id)
            ->min('dirId');
        if($privs == 1 || $privs == 4 || $privs == 5)
        {
            $userdata = User::Join('personas', 'users.id', '=', 'personas.perUsuarioId')
                ->join('direcciones','direcciones.dirUserId','=','users.id')
                ->where('users.id',$id)
                ->where('direcciones.dirId',$mindir)
                ->first();
        }
        else if($privs == 2)
        {
            $userdata = User::Join('comercios', 'users.id', '=', 'comercios.comUsuarioId')
                ->join('direcciones','direcciones.dirUserId','=','users.id')
                ->where('users.id',$id)
                ->where('direcciones.dirId',$mindir)
                ->first();
        }
        else if($privs == 3)
        {
            $userdata = User::Join('shoppings', 'users.id', '=', 'shoppings.shopUsuarioId')
                ->join('direcciones','direcciones.dirUserId','=','users.id')
                ->where('users.id',$id)
                ->where('direcciones.dirId',$mindir)
                ->first();
        }
        
        return view('users.edit',compact('userdata','comShoppingIds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
    	//
    	$user = User::find($id);
    	$successMessage;
        // si no se recibe password, setea la misma password que ya tiene
        /*
        if($request->password_new == null)        	
        	$request->password_new = $user->password;
            */

        if (!Hash::check($request->password_old, $user->password)) {
            return Redirect::back()->withErrors(['La contraseña anterior no coincide']);
        } 
        if($request->password_new == "")
        {     
            $user->update(
                [
                    'email' => $request->email,
                    'usuTelefono' => $request->usuTelefono,        
                ]
            );      
        } else {
            $user->update(
                [
                    'email' => $request->email,
                    'usuTelefono' => $request->usuTelefono, 
                    'password' => Hash::make($request->password_new)        
                ]
            );
        }
        //actualizando la dirección
        
        $mindir = Direccion::join('users','users.id','=','direcciones.dirUserId')
            ->where('users.id',$id)
            ->min('dirId');
        $dirDepartamento;
        if($request->dirDepartamento == 0)
            $dirDepartamento = Direccion::select(['dirDepartamento'])->where('dirId',$mindir)->first()->dirDepartamento;
        else
            $dirDepartamento = $request->dirDepartamento;        
         
        Direccion::where('dirId',$mindir)->update([
            'dirLinea1' => $request->dirLinea1, 
            'dirLinea2' => $request->dirLinea2, 
            'dirCiudad' => 'San Juan',
            'dirProvincia' => 'San Juan',
            'dirDepartamento' => $dirDepartamento, 
            'dirZip' => $request->dirZip, 
            'dirUserId' => $id, 
            'dirOrigenDestino' => 'origen'
        ]);

        if($request->privilegio == 1)
        {
        	//persona
        	Persona::where('perUsuarioId',$id)->update(
        		[
        			'perNombres' => $request->perNombres,
        			'perApellidos' => $request->perApellidos,
        			'perDni' => $request->perDni,
        		]
        	);
        	$successMessage = "Datos del usuario actualizados exitosamente";
        } else if ($request->privilegio == 2) {
        	//comercio
        	//si no se ha seleccionado shopping, escribe null en db
        	if($request->comShoppingId == 0)
        		$request->comShoppingId = null;
        	Comercio::where('comUsuarioId',$id)->update(
        		[
        			'comNombre' => $request->comNombre,
        			'comShoppingId' => $request->comShoppingId,
        			'comCuit' => $request->comCuit,
        		]
        	);
        	$successMessage = "Datos del comercio actualizados exitosamente";
        } else if ($request->privilegio == 3) {
        	//Shopping
        	Shopping::where('shopUsuarioId',$id)->update(
        		[
        			'shopNombre' => $request->shopNombre,
        			'shopCuit' => $request->shopCuit,
        		]
        	);
        	$successMessage = "Datos del shopping actualizados exitosamente";
        } else if ($request->privilegio == 4) {      
            //datos personales del empleado
            Persona::where('perUsuarioId',$id)->update(
                [
                    'perNombres' => $request->perNombres,
                    'perApellidos' => $request->perApellidos,
                    'perDni' => $request->perDni,
                ]
            );      
            $successMessage = "Datos del empleado actualizados exitosamente";
        } else if ($request->privilegio == 5) {   
            //datos personales del administrador
            Persona::where('perUsuarioId',$id)->update(
                [
                    'perNombres' => $request->perNombres,
                    'perApellidos' => $request->perApellidos,
                    'perDni' => $request->perDni,
                ]
            );         
            $successMessage = "Datos del administrador actualizados exitosamente";
        }        
        
        return redirect('/home')->with('message-success',$successMessage);
    }
    /**
     * Obtiene Administradores.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdmin()
    {

    }
    /**
     * Obtiene Empleados.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmpleados()
    {
        
    }
    /**
     * Destruye recursos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

