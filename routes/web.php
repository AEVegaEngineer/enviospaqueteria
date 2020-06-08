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
Route::post('/autenticacion',[ 'as' => 'auth.login','uses' => 'AuthController@login']);

Route::get('dashboard', 'FrontController@dashboard');

Route::get('logout', 'LogController@logout');

//Route::get('/home', 'HomeController@index')->name('home');
