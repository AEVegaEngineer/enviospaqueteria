<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EnvioCreateRequest;
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

class EnvioController extends Controller
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
        //return $envios;
        return view('envios.index',compact('userdata','envios','status','fechaHoy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $origen = Direccion::where('dirId',$_REQUEST["origen"])->first();
        $destino = Direccion::where('dirId',$_REQUEST["destino"])->first();
        
        $userdata = getUserData();
        return view('envios.create',compact('userdata','origen','destino'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnvioCreateRequest $request)
    {
        /*
        * Este es el paquete estándar, por ahora no se crearán paquetes,
        * todas las listas paquetes utilizarán un paquete estándar con id 1,
        * para bases de datos recién importadas que no tengan paquetes,
        * crear este paquete manualmente.
        *
        $PaqueteRegistrado = Paquete::create([
            'paqDescripcion' => $request['paqDescripcion'],
            'paqDimensionAlto' => 1.0,
            'paqDimensionAncho' => 1.0,
            'paqDimensionLargo' => 1.0,
            'paqDimensionUnidad' => "Paquete",
            'paqPeso' => 5.0,
            'paqPesoUnidad' => "Kilos",
        ]);
        */
        $userid = Auth::user()->id;
        
        //return $ListapaqueteRegistrada->id;
        $EnvioRegistrado = Envio::create([
            'envOrigen' => $request['envOrigen'],
            'envDestino' => $request['envDestino'],
            'envCosto' => $request['envCosto'],
            'envActivo' => 1,            
            'envCreatedBy' => $userid,
            'envEstadoEnvio' => 1,
            'envCodigo' => Str::random(32),
        ]);
        CambioEstado::create([
            'cambEnvioId' => $EnvioRegistrado->id, 
            'cambEstado' => 1,
            'cambCreatedBy' => $userid,
        ]);
        $ListapaqueteRegistrada = Listapaquete::create([
            'listPaqueteId' => 1,
            'listCantidadPaq' => $request['listCantidadPaq'],
            'listEnvioId' => $EnvioRegistrado->id,
        ]);
        return redirect('/envio')->with('message-success', 'El envío ha sido registrado exitosamente');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEnEspera()
    {
        return envioXStatus(1);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEnLogistica()
    {
        return envioXStatus(2);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEnTransito()
    {
        return envioXStatus(3);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEntregado()
    {
        return envioXStatus(4);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comprobanteImpreso(Request $request)
    {
        if ($request->isMethod('post')){            
            $envId = $request["idenvio"];
            Envio::where('envId', '=', $envId)
                ->update(['envComprobanteImpreso' => 1]);            
        }
    }
    /**
     * Muesta envíos según estado
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
        $userid = Auth::user()->id;
        $envio = Envio::where('envId', $id)->first();
        $estadoActual = $envio->envEstadoEnvio;
        $nuevoEstado = $estadoActual + 1;
        Envio::where('envId', '=', $id)
            ->update(['envEstadoEnvio' => $nuevoEstado]);
        CambioEstado::create([
            'cambEnvioId' => $id, 
            'cambEstado' => $nuevoEstado,
            'cambCreatedBy' => $userid,
        ]);
        return redirectByStatus($nuevoEstado);
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
function envioXStatus($status)
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
            ->where('shoppings.shopUsuarioId',$userid)
            ->where('envEstadoEnvio',$status);
        $b = Envio::select('envios.*',DB::raw("''"))
            ->where('envios.envCreatedBy',$userid);

        $envios = $a->union($b)->paginate(15);
    }     
    else if (Auth::user()->privilegio == 1 || Auth::user()->privilegio == 2)
    {
        //persona o comercio
        $envios = Envio::where('envCreatedBy',$userid)->orderBy('created_at', 'desc')
            ->where('envEstadoEnvio',$status)
            ->paginate(15); 
    }
    else if(Auth::user()->privilegio == 4 || Auth::user()->privilegio == 5)
    {
        $envios = Envio::orderBy('created_at', 'desc')
            ->where('envEstadoEnvio',$status)
            ->paginate(15);
    }

    $fechaHoy = Carbon::now()->format('yy/m/d');
    return view('envios.index',compact('userdata','envios','status','fechaHoy'));






    $userdata = getUserData();   
    /*
    $envios = Envio::orderBy('created_at', 'desc')
        ->where('envEstadoEnvio',$status)
        ->paginate(15);
        */
    $fechaHoy = Carbon::now()->format('yy/m/d');
    
    return view('envios.index',compact('userdata','envios','status','fechaHoy'));
}
function redirectByStatus($status){
    switch ($status) {
        case 1:
            return redirect('/en-espera')->with('message-success', 'El envío ahora está en espera');
            break;
        case 2:
            return redirect('/en-logistica')->with('message-success', 'El envío ahora está en logística');
            break;
        case 3:
            return redirect('/en-transito')->with('message-success', 'El envío ahora está en tránsito a destino');
            break;
        case 4:
            return redirect('/entregado')->with('message-success', 'El envío ha sido entregado a destino');
            break;
        
        default:
            break;
    }
    
}
