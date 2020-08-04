<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DireccionCreateRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Comercio;
use App\Persona;
use App\Shopping;
use App\Envio;
use App\Direccion;
use App\Listapaquete;
use App\Paquete;
use App\CambioEstado;
use Auth;
use DB;

class DireccionController extends Controller
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
            $envios = $a->union($b)->paginate(15);
        }     
        else if (Auth::user()->privilegio == 1 || Auth::user()->privilegio == 2)
        {
            //persona o comercio
            $envios = Envio::where('envCreatedBy',$userid)->orderBy('created_at', 'desc')
                ->paginate(15); 
        }
        else if(Auth::user()->privilegio == 5)
        {
            $envios = Envio::orderBy('created_at', 'desc')
                ->paginate(15);
        }
        $status = 0;

        $fechaHoy = Carbon::now()->format('yy/m/d');
        $direccionesOrigen = Direccion::where('dirUserId',$userid)->where('dirOrigenDestino','origen')->get();
        $direccionesDestino = Direccion::where('dirUserId',$userid)->where('dirOrigenDestino','destino')->get();
        //return $envios;
        return view('direcciones.index',compact('userdata','envios','status','fechaHoy','direccionesOrigen','direccionesDestino'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dirOrigenDestino = $_GET["dirOrigenDestino"];
        $userid = Auth::user()->id;
        $userdata = getUserData();   
        return view('direcciones.create',compact('userdata','dirOrigenDestino'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userid = Auth::user()->id;
        $request['dirCiudad'] = 'San Juan';
        $request['dirProvincia'] = 'San Juan';
        $request['dirUserId'] = $userid;
        //return $request;
        $direccion = Direccion::create([
            'dirLinea1' => $request['dirLinea1'],
            'dirLinea2' => $request['dirLinea2'],
            'dirCiudad' => $request['dirCiudad'],
            'dirProvincia' => $request['dirProvincia'],
            'dirDepartamento' => $request['dirDepartamento'],
            'dirZip' => $request['dirZip'],
            'dirUserId' => $request['dirUserId'],
            'dirOrigenDestino' => $request['dirOrigenDestino']
            ]);
        if($direccion->id !== null)
        {
            return redirect('/direccion')->with('message-success', 'La dirección ha sido registrada exitosamente, ya puede seleccionarla y continuar con su envío.');
        }
        return "Ha ocurrido un error, por favor intentelo de nuevo, si este mensaje se repite, contáctenos.";
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
        $userid = Auth::user()->id;
        $userdata = getUserData();   
        $direccion = Direccion::where('dirId',$id)->first();
        return view('direcciones.edit',compact('userdata','direccion'));        
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

        Direccion::where('dirId', '=', $id)
            ->update([
                'dirDepartamento' => $request->dirDepartamento,
                'dirZip' => $request->dirZip,
                'dirLinea1' => $request->dirLinea1,
                'dirLinea2' => $request->dirLinea2
            ]);
        return redirect('/direccion')->with('message-success', 'La dirección ha sido actualizada exitosamente, ya puede seleccionarla y continuar con su envío.');
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
