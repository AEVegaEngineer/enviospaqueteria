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
    return view('front');
});

Route::resource('tipousuario', 'TipoUsuarioController');
Route::resource('usuario', 'UsuarioController');
Route::resource('persona', 'PersonaController');
Route::resource('comercio', 'ComercioController');
Route::resource('shopping', 'ShoppingController');

// Log Controller
/*
Route::resource('auth','AuthController');

Route::get('/register', ['as' => 'auth.register','uses' => 'AuthController@register']);

Route::get('/logout', 'AuthController@logout');
*/

/* Métodos para autenticación */
Route::get('/loginForm',[ 'as' => 'auth.index', 'uses' => 'AuthController@index']);
Route::post('/autenticado',[ 'as' => 'auth.login', 'uses' => 'AuthController@login']);
Route::get('/logout',[ 'as' => 'auth.logout', 'uses' => 'AuthController@logout']);
Route::get('/registerForm', ['as' => 'auth.registerForm','uses' => 'AuthController@registerForm']);
Route::get('/register', ['as' => 'auth.register','uses' => 'AuthController@register']);
Route::get('/comDashboard', ['as' => 'front.comDashboard','uses' => 'FrontController@comDashboard']);
Route::get('/shopDashboard', ['as' => 'front.shopDashboard','uses' => 'FrontController@shopDashboard']);
Route::get('/perDashboard', ['as' => 'front.perDashboard','uses' => 'FrontController@perDashboard']);
