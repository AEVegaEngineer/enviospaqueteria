<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

//use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{
    use Notifiable;

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
        'usuContrasena', 
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
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
    /*
    public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['usuContrasena'] = \Hash::make($valor);
        }
    }
    */
    public function getAuthPassword()
    {
        return $this->usuContrasena;
    }
}
