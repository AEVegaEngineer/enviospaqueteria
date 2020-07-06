<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use App\Envio;
use Storage;

class ComprobanteController extends Controller
{
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
        //return "Comprobante con ID:".$id;
        $envio = Envio::where('envId',$id)->first();
        $pdf = PDF::loadView('comprobante.envio2', compact('envio'));  
        
        $fecha_envio = Carbon::createFromFormat('Y-m-d H:i:s', $envio->created_at);
        /*
        //$pdf->save(storage_path('comprobantes\comprobante-envio-'.$id.'-'.$fecha_envio.'.pdf'));
        Storage::put('public/comprobantes/comprobante-envio-'.$id.'-'.$fecha_envio.'.pdf', $pdf->output());
        //$hoy = Carbon::today()->toDateString();
        return $pdf->download('comprobante-envio-'.$id.'-'.$fecha_envio.'.pdf');
        

        $pdf = PDF::loadView('cardex.reporte-cardex', compact('cardexs','existencia','mes_long','fecha_formateada'));   
        */      
        $pdf->save(storage_path('comprobantes/comprobante-envio-'.$id.'.pdf'));
        return $pdf->stream('comprobante-envio-'.$id.'.pdf');
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
