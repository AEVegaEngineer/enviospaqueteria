<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Auth;
use App\Comercio;
use App\Shopping;
use App\Persona;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
/*
*@author Andrés Vega
*@descripción: función utilitaria que obtiene datos del usuario para mostrar en vista
*@return userdata: data del usuario
*/
function getUserData($userid = null){
	if($userid == null)		
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