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
        'envCodigo', 
    	'envCosto',
    	'envCreatedBy',
    	'envDestinatarioId',
    	'envDestino',
    	'envEstadoEnvio',
    	'envOrigen',
        'envEntregadoEn',
        'envEntregadoA',
        'envComprobanteImpreso'
    ];
}
