<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Comercio;
use App\Persona;
use App\Shopping;
use App\Direccion;
use App\Envio;
use App\Listapaquete;
use App\Paquete;
use App\CambioEstado;
use App\User;
use Auth;
use DB;

class CuentaCorrienteController extends Controller
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
     * Show the resources
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userdata = getUserData();
        $shoppings = Shopping::pluck('shopNombre', 'shopId');
        $shoppings->prepend('Seleccionar...', 0);

        return view('cuentacorriente.index',compact('userdata','shoppings'));
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
    /**
     * Obtener cuentas corrientes
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function obtener(Request $request)
    {

        $usuario = User::where('id',$request["userid"])->first();
        switch ($usuario->privilegio) {
            case 4:
            case 5:
                $desde = new Carbon($request["desde"]);
                $hasta = new Carbon($request["hasta"]);
                $result = Envio::select(['envios.*','comercios.comNombre'])
                    ->join('comercios','comercios.comUsuarioId','=','envios.envCreatedBy')
                    ->whereBetween('envios.created_at', [$desde->format('Y-m-d')." 00:00:00", $hasta->format('Y-m-d')." 23:59:59"])
                    ->where('envios.envEstadoEnvio',4)
                    ->get();
                return $result;
                break;
            case 3:
                return "es shopping";
                break;
            default:
                return "error";
                break;
        }
        //return $request;
        //$envios = Envio::
    }
}
