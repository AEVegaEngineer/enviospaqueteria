<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaqueteCreateRequest;
use App\Paquete;

class PaqueteController extends Controller
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
        $paquetes = Paquete::orderBy('created_at', 'desc')->paginate(15);
        return view('paquetes.index',compact('paquetes'));
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
    public function store(PaqueteCreateRequest $request)
    {
        $paqueteCreado = Paquete::create([
            'paqDescripcion' => $request['paqDescripcion'],
            'paqDimensionAlto' => $request['paqDimensionAlto'],
            'paqDimensionAncho' => $request['paqDimensionAncho'],
            'paqDimensionLargo' => $request['paqDimensionLargo'],
            'paqDimensionUnidad' => $request['paqDimensionUnidad'],
            'paqPeso' => $request['paqPeso'],
            'paqPesoUnidad' => $request['paqPesoUnidad']
        ]);
        //return "se ha creado exitosamente";
        return redirect('/paquete')->with('message-success', 'El paquete se ha registrado exitosamente');
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
        $paquete = Paquete::where('paqId',$id)->first();
        return view('paquetes.edit',compact('paquete'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaqueteCreateRequest $request, $id)
    {
        Paquete::where('paqId', '=', $id)->update([
            'paqDescripcion' => $request['paqDescripcion'],
            'paqDimensionAlto' => $request['paqDimensionAlto'],
            'paqDimensionAncho' => $request['paqDimensionAncho'],
            'paqDimensionLargo' => $request['paqDimensionLargo'],
            'paqDimensionUnidad' => $request['paqDimensionUnidad'],
            'paqPeso' => $request['paqPeso'],
            'paqPesoUnidad' => $request['paqPesoUnidad']
        ]);
        return redirect('/paquete')->with('message-success', 'El paquete se ha actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paquete::where('paqId',$id)->delete();
        return redirect('/paquete')->with('message-success', 'El paquete se ha eliminado exitosamente');
    }
}
