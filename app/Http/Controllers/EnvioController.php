<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request\EnvioCreateRequest;
use App\Comercio;
use App\Persona;
use App\Shopping;
use App\Envio;
use App\ListaPaquete;
use App\Paquete;
use Auth;

class EnvioController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userdata = getUserData();
        return view('envios.create',compact('userdata'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnvioCreateRequest $request)
    {
        $envioRegistrado = Envio::create([
            'envOrigen' => $request['envOrigen'],
            'envDestino' => $request['envDestino'],
            'envCosto' => $request['envCosto'],
            'envActivo' => 1,
        ]);
        $personaRegistrada = ListaPaquete::create([
            'perNombres' => $request['perNombres'],
            'perApellidos' => $request['perApellidos'],
            'perDni' => $request['perDni'],
            'perUsuarioId' => $usuario->id,
        ]);
        $personaRegistrada = Paquete::create([
            'perNombres' => $request['perNombres'],
            'perApellidos' => $request['perApellidos'],
            'perDni' => $request['perDni'],
            'perUsuarioId' => $usuario->id,
        ]);
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
/*
*@author Andrés Vega
*@descripción: función utilitaria que obtiene datos del usuario para mostrar en vista
*@return userdata: data del usuario
*/

function getUserData(){
    $userid = Auth::user()->id;
    $isUserComercio = Comercio::where('comUsuarioId',$userid)->first();
    $isUserShopping = Shopping::where('shopUsuarioId',$userid)->first();
    $isUserPersona = Persona::where('perUsuarioId',$userid)->first();
    $userdata = null;
    if($isUserComercio)
        $userdata = $isUserComercio;
    else if($isUserShopping)
        $userdata = $isUserShopping;
    else if($isUserPersona)
        $userdata = $isUserPersona;
    return $userdata;
}
