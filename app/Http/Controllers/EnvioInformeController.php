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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = Auth::user()->id;
        $userdata = getUserData();   
        $envios;
        if($userdata->privilegio == 3)
        {
            //shopping
            $envios = Envio::join('comercios', 'envios.envCreatedBy', '=', 'comercios.comId')
                ->join('shoppings', 'shoppings.shopId', '=', 'comercios.comShoppingId')
                ->where('shoppings.shopUsuarioId',$id)
                ->paginate(15);
        }     
        else
        {
            //persona o comercio
            $envios = Envio::orderBy('envCreatedBy', 'desc')->where('envCreatedBy',$userid)->paginate(15); 
        }
               
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