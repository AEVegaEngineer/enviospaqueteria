<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [    	
    	'shopNombre', 
    	'shopCuit',
    	'shopDireccion',
    ];
}
