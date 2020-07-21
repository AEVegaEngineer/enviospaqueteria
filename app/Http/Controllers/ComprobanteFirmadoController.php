<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Auth;
use App\Envio;
class ComprobanteFirmadoController extends Controller
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
        $file = $request->file('envComprobanteEntrega');
        /*
        //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';
   
        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';
   
        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';
   
        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';
   
        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();
   
        //Move Uploaded File
        $destinationPath = 'comprobantesFirmados';
        $file->move($destinationPath,$file->getClientOriginalName());
        */
        //return $request;
        $envId = $request->modalDetallesEnvId;
        $nombre = 'comprobante_firmado_envio_'.$envId.$file->getClientOriginalExtension();
        Envio::where('envId', '=', $envId)
            ->update([
                'envEstadoEnvio' => 4,
                'envEntregadoA' => $request->envEntregadoA,
                'envEntregadoEn' => $request->envEntregadoEn,
                'envComprobanteFirmado' => $nombre
            ]);
        $path = $request->file('envComprobanteEntrega')->storeAs('comprobantesFirmados',$nombre);
        return redirect('/entregado')->with('message-success', 'El envío ha sido entregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $envio = Envio::where('envId', '=', $id)->first();
        if($envio == null)
            return redirect('/entregado')->with('message-error', 'El envío no existe');
        $nombre = $envio->envComprobanteFirmado;
        if($nombre == "")
            return redirect('/entregado')->with('message-error', 'El nombre del archivo no se encuentra en la base de datos');
        $pathToFile = '../storage/app/comprobantesFirmados/'.$nombre;
        return response()->file($pathToFile);
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
