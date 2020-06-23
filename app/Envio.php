<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [    	
    	'envActivo', 
    	'envCosto',
    	'envCreatedBy',
    	'envDestinatarioId',
    	'envDestino',
    	'envEstadoEnvio',
    	'envOrigen',
        'envEntregadoEn',
        'envEntregadoA'
    ];
}
