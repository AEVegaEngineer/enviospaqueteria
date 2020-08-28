<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use App\Envio;
use App\Persona;
use App\Comercio;
use App\Shopping;
use App\Listapaquete;
use Storage;

class ComprobanteEntregaController extends Controller
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
        //
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
    public function store(Request $request)
    {
        //
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return "Comprobante con ID:".$id;
        $envio = Envio::join('users','users.id','=','envios.envCreatedBy')
            ->where('envId',$id)
            ->first();
        $listapaquetes = Listapaquete::join('envios','envios.envId','=','listapaquetes.listEnvioId')
            ->join('paquetes','paquetes.paqId','=','listapaquetes.listPaqueteId')
            ->where('envId',$id)
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
        $origen = Direccion::join('envios','envios.envOrigen','=','direcciones.dirId')
            ->where('dirOrigenDestino','origen');
        $destino = Direccion::join('envios','envios.envDestino','=','direcciones.dirId')
            ->where('dirOrigenDestino','destino');
        
        $pdf = PDF::loadView('comprobante.entrega', compact('envio','datosRemitente','listapaquetes','origen','destino'));  
        
        $fecha_envio = Carbon::createFromFormat('Y-m-d H:i:s', $envio->created_at);         
        $pdf->save(storage_path('comprobanteEntrega/comprobante-entrega-'.$id.'.pdf'));
        return $pdf->stream('comprobante-entrega-'.$id.'.pdf');
        //return view('comprobante.envio2', compact('envio'));
        
        
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
