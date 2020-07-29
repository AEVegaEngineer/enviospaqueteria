<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direcciones';
   	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [    	
    	'dirLinea1', 
    	'dirLinea2',
    	'dirCiudad',
    	'dirProvincia',
        'dirDepartamento',
    	'dirZip',
    	'dirUserId',
    	'dirOrigenDestino'
    ];
}
