<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\ShoppingCreateRequest;
use App\Shopping;
use App\Usuario;
use Auth;
use Mail;
use Session;
use Redirect;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        if($target == 'materiaprima')
            $existencia = materiaprima::where('mp_codigo',$id)->first()->mp_cantidad;
        else if($target == 'producciona')
            $front_target = 'Producción B';
        else if($target == 'produccionb')
            $front_target = 'Producción B';
        else if($target == 'produccionc')
            $front_target = 'Producción C';
        return view('ajustes.inventario',compact('target','id','existencia'));
        */
        return view('dashboards.shopping');
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
    public function store(ShoppingCreateRequest $request)
    {
        $hashedPass = Hash::make($request['usuContrasena']);
        
        $usuarioRegistrado = Usuario::create([            
            'usuEmail' => $request['usuEmail'],
            'usuActivo' => 1,
            'usuTelefono' => $request['usuTelefono'],
            'usuDireccion' => $request['usuDireccion'],
            'usuContrasena' => $hashedPass,
            'usuTipoUsuario' => 3,
        ]);        
        
        $shoppingRegistrada = Shopping::create([
            'shopNombre' => $request['shopNombre'],
            'shopCuit' => $request['shopCuit'],
            'shopUsuarioId' => $usuarioRegistrado->id,
        ]);
        //con Auth::attempt siempre es necesario pasarle 'password' y 
        //poner un getter en el modelo del usuario
        if(Auth::attempt([
            'usuEmail' => $request['usuEmail'], 
            'password'=>$request['usuContrasena']
        ])){
            Session::flash('messsage-success','Usted se ha registrado correctamente!');
        } 
        else
        {
            $request->flash();
            Session::flash('messsage-error','Ha ocurrido un error con el registro!');
        } 
        return Redirect::to('/login');
        //return view('dashboards.shopping'); 
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
