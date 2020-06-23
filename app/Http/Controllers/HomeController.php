<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comercio;
use App\Persona;
use App\Shopping;
use App\Envio;
use Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
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
        $envios = Envio::orderBy('envId', 'desc')->where('envCreatedBy',$userid)->paginate(15);
        return view('dashboard', compact('userdata','envios'));
    }
}
