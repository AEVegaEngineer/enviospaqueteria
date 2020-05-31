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
Route::resource('tipousuario', 'TipoUsuarioController');

// Log Controller
Route::resource('log','LogController');
Route::get('/login',['as' => 'log.index','uses' => 'LogController@index']);
Route::post('/authLogin',[ 'as' => 'log.login','uses' => 'LogController@login']);
Route::get('logout', 'LogController@logout');
