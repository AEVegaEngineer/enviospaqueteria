<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listapaquete extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [    	
    	'listCantidadPaq', 
    	'listPaqueteId',
    	'listEnvioId'
    ];
}
