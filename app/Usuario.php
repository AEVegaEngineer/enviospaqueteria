<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'usuEmail',     	
    	'usuNombres', 
    	'usuApellidos',
    	'usuDni',
    	'usuDireccion',
    	'usuActivo',
    	'usuTipoUsuario',

    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'usuContrasena', 
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /*
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    */
}
