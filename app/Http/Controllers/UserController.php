<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserUpdateRequest;
use App\User;
use App\Persona;
use App\Comercio;
use App\Shopping;
use Auth;

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
        return "user.store";
        /*         
        Usuario::create([            
            'usuEmail' => $request['usuEmail'],
            'usuNombre' => $request['usuNombre'],
            'usuApellido' => $request['usuApellido'],
            'usuActivo' => $request['usuActivo'],
            'usuDni' => $request['usuDni'],
            'usuDireccion' => $request['usuDireccion'],
            'usuActivo' => $request['usuActivo'],
            'usuTipoUsuario' => $request['usuTipoUsuario'],
            'usuContrasena' => $request['usuContrasena'],
            
            ]);
        */
        //$show = Usuario::create($request);   
        //return redirect('/usuario')->with('success', 'El usuario ha sido creado correctamente!');
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
        $privs = Auth::user()->privilegio;
        $userdata = null;
        $comShoppingIds = Shopping::pluck('shopNombre', 'shopId');
        $comShoppingIds->prepend('No', 0);
        if($privs == 1)
        {
            $userdata = User::Join('personas', 'users.id', '=', 'personas.perUsuarioId')
                ->where('users.id',$userid)
                ->first();
        }
        else if($privs == 2)
        {
            $userdata = User::Join('comercios', 'users.id', '=', 'comercios.comUsuarioId')
                ->where('users.id',$userid)
                ->first();
        }
        else if($privs == 3)
        {
            $userdata = User::Join('shoppings', 'users.id', '=', 'shoppings.shopUsuarioId')
                ->where('users.id',$userid)
                ->first();
        }
        //return $user;
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
        if($request->password == null)        	
        	$request->password = $user->password;
        $user->update(
        	[
        		'email' => $request->email,
        		'usuTelefono' => $request->usuTelefono,
        		'usuDireccion' => $request->usuDireccion,        		
        	]
        );
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
        }
        
        return redirect('/home')->with('message-success',$successMessage);
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

