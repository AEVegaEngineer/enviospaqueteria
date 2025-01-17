<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listapaquete;
use App\Paquete;
use App\Envio;
use App\Direccion;
use Auth;

class ListaPaqueteController extends Controller
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
        
        $userid = Auth::user()->id;
        if(Auth::user()->privilegio == 3){
            //shopping
            //envio->comercio/persona->shopping
            $usuarioValidado = Envio::join('comercios', 'comercios.comId', '=', 'envios.envCreatedBy')
                ->join('shoppings', 'shoppings.shopId', '=', 'comercios.comShoppingId')
                ->where('shoppings.shopId',$userid)
                ->where('envios.envId',$id)
                ->first();
        } else {
            //personas y comercios
            $usuarioValidado = Envio::where('envId',$id)
                ->where('envCreatedBy',$userid)
                ->first();
        }

        $usuarioValidado = true;        
        if($usuarioValidado) {
            $listapaquetes = Listapaquete::join('paquetes', 'paquetes.paqId', '=', 'listapaquetes.listPaqueteId')
                ->where('listapaquetes.listEnvioId',$id)->get();

            // direcciones del envío

            $dirOrigen = Direccion::join('envios', 'envios.envOrigen', '=', 'direcciones.dirId')
                ->select(['direcciones.*'])
                ->where('envios.envid',$id);
            $direcciones = Direccion::join('envios', 'envios.envDestino', '=', 'direcciones.dirId')
                ->select(['direcciones.*'])
                ->where('envios.envid',$id)
                ->union($dirOrigen)
                ->get();
            $data = [];
            array_push($data, $direcciones);
            array_push($data, $listapaquetes);
            
            return $data;
        }
        return null;
        
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
