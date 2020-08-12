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
        
        $userid = Auth::user()->id;
        $userdata = getUserData();   
        $envios;
        if(Auth::user()->privilegio == 3)
        {
            //shopping
            $a = Shopping::select('envios.*','comercios.comNombre')
                ->join('comercios', 'shoppings.shopId', '=', 'comercios.comShoppingId')
                ->join('envios', 'envios.envCreatedBy', '=', 'comercios.comUsuarioId')
                ->where('shoppings.shopUsuarioId',$userid);
            $b = Envio::select('envios.*',DB::raw("''"))
                ->where('envios.envCreatedBy',$userid);
            $envios = $a->union($b)->get();
        }     
        else if (Auth::user()->privilegio == 1 || Auth::user()->privilegio == 2)
        {
            //persona o comercio
            $envios = Envio::where('envCreatedBy',$userid)->orderBy('created_at', 'desc')
                ->get(); 
        }
        else if(Auth::user()->privilegio == 5)
        {
            $envios = Envio::orderBy('created_at', 'desc')
                ->get();
        }
        $status = 0;

        $fechaHoy = Carbon::now()->format('yy/m/d');
        //return $envios;
        return view('cuentacorriente.show',compact('userdata','envios','status','fechaHoy'));
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
