<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EnvioCreateRequest;
use App\Comercio;
use App\Persona;
use App\Shopping;
use App\Envio;
use App\Listapaquete;
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
        $userid = Auth::user()->id;
        $userdata = getUserData();        
        $envios = Envio::orderBy('envId', 'desc')->where('envCreatedBy',$userid)->paginate(15);        
        return view('dashboard',compact('userdata','envios'));
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
        /*
        * Este es el paquete estándar, por ahora no se crearán paquetes,
        * todas las listas paquetes utilizarán un paquete estándar con id 1,
        * para bases de datos recién importadas que no tengan paquetes,
        * crear este paquete manualmente.
        *
        $PaqueteRegistrado = Paquete::create([
            'paqDescripcion' => $request['paqDescripcion'],
            'paqDimensionAlto' => 1.0,
            'paqDimensionAncho' => 1.0,
            'paqDimensionLargo' => 1.0,
            'paqDimensionUnidad' => "Paquete",
            'paqPeso' => 5.0,
            'paqPesoUnidad' => "Kilos",
        ]);
        */
        $userid = Auth::user()->id;
        
        //return $ListapaqueteRegistrada->id;
        $EnvioRegistrado = Envio::create([
            'envOrigen' => $request['envOrigen'],
            'envDestino' => $request['envDestino'],
            'envCosto' => $request['envCosto'],
            'envActivo' => 1,            
            'envCreatedBy' => $userid,
            'envEstadoEnvio' => 1,
        ]);
        $ListapaqueteRegistrada = Listapaquete::create([
            'listPaqueteId' => 1,
            'listCantidadPaq' => $request['listCantidadPaq'],
            'listEnvioId' => $EnvioRegistrado->id,
        ]);
        return redirect('/envio')->with('message-success', 'El envío ha sido registrado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
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
