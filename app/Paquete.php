<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
       	
    	'paqDescripcion',
    	'paqDimensionAlto', 
    	'paqDimensionAncho', 
    	'paqDimensionLargo', 
    	'paqDimensionUnidad', 
    	'paqPeso', 
    	'paqPesoUnidad', 
    ];
}
