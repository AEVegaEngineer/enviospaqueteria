<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UsuarioCreateRequest;
use App\User;
use App\Shopping;
use Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuario.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
        //return "cosas";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioCreateRequest $request)
    {
        return $request;
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
        $user = User::find($id);
        return $user;
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
        $userdata;
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
            $userdata = User::Join('shoppings', 'users.id', '=', 'shoppings.comUsuarioId')
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
