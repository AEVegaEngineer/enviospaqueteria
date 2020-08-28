<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Envio;
use App\Listapaquete;
use App\Comercio;

class SeguimientoController extends Controller
{
    /*
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
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $envio = Envio::join('users','users.id','=','envios.envCreatedBy')
            ->where('envCodigo',$id)
            ->first();
        $listapaquetes = Listapaquete::join('envios','envios.envId','=','listapaquetes.listEnvioId')
            ->join('paquetes','paquetes.paqId','=','listapaquetes.listPaqueteId')
            ->where('envId',$envio->envId)
            ->get();
        $datosRemitente;
        switch ($envio->privilegio) {
            case 1:
                //persona
                $datosRemitente = Persona::where('perUsuarioId',$envio->id)->first(); //paso parametro id del usuario que envió
                break;
            case 2:
                //comercio
                $datosRemitente = Comercio::where('comUsuarioId',$envio->id)->first(); //paso parametro id del usuario que envió
                break;
            case 3:
                //shopping
                $datosRemitente = Shopping::where('shopUsuarioId',$envio->id)->first(); //paso parametro id del usuario que envió
                break;
            default:
                break;
        }
        return view('seguimiento.show', compact('envio','datosRemitente','listapaquetes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort(404);
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
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort(404);
    }
}
