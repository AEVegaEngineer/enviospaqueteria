<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use Session;
use Redirect;

use gavca\Http\Requests\LoginRequest;
use gavca\Http\Requests\PasswordRecoverRequest;

class LogController extends Controller
{
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(LoginRequest $request)
    {
        return view('auth.login');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        if(Auth::attempt(['email' => $request['email'], 'password'=>$request['password']])){
            return Redirect::to('admin');
        }else if(Auth::attempt(['name' => $request['email'], 'password'=>$request['password']])){
            return Redirect::to('admin');
        }
        Session::flash('message-error','Los datos ingresados son incorrectos');
        return Redirect::to('/');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function recover(PasswordRecoverRequest $request)
    {
        return view('email.recover');
        //Mail::send('email.recover');       
    }
}
