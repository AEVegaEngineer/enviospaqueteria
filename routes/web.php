<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

Route::resource('envio','EnvioController');
Route::resource('usuario','UserController');
Route::resource('envioinforme','EnvioInformeController');
Route::resource('listapaquete','ListaPaqueteController');
Route::resource('comprobante','ComprobanteController');
Route::resource('comprobanteEntrega','ComprobanteEntregaController');

Route::resource('persona','PersonaController');
Route::resource('comercio','ComercioController');
Route::resource('shopping','ShoppingController');
Route::resource('admin','AdminController');
Route::resource('empleado','EmpleadoController');

Route::get('/en-espera', 'EnvioController@showEnEspera')->name('showEnEspera');
Route::get('/en-logistica', 'EnvioController@showEnLogistica')->name('showEnLogistica');
Route::get('/en-transito', 'EnvioController@showEnTransito')->name('showEnTransito');
Route::get('/entregado', 'EnvioController@showEntregado')->name('showEntregado');
Route::post('/envio/comprobanteImpreso', 'EnvioController@comprobanteImpreso')->name('comprobanteImpreso');
Route::post('/envio/envioEntregado', 'EnvioController@envioEntregado')->name('envioEntregado');