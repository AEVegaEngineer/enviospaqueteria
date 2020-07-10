<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comercio;
use App\Persona;
use App\Shopping;
use App\Envio;
use App\Listapaquete;
use App\Paquete;
use Auth;

class EnvioInformeController extends Controller
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
        $envios;
        if(Auth::user()->privilegio == 3)
        {
            //shopping
            $envios = Envio::join('comercios', 'envios.envCreatedBy', '=', 'comercios.comUsuarioId')
                ->join('shoppings', 'shoppings.shopId', '=', 'comercios.comShoppingId')
                ->where('shoppings.shopUsuarioId',$userid)
                //->get();
                ->paginate(15);
        }     
        else
        {
            //persona o comercio
            $envios = Envio::orderBy('envCreatedBy', 'desc')->where('envCreatedBy',$userid)
                //->get();
                ->paginate(15); 
        }
        //return $envios;
        return view('envioinforme.index',compact('userdata','envios'));
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