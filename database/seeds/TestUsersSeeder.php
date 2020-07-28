<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/*
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),

            'id' => 1,
            'email' => "aevega1991@gmail.com",
            'password' => "\$2y\$10\$by9knUuMI75z0X5b1oOzJurfspT8rE/BeUob4Sv9ZLb5ZlocVoOTi",
            'privilegio' => 5,
            'usuTelefono' => '2645034441',
            'usuDireccion' => 'Dirección'
        ]);
        */
        factory(App\User::class, 50)->create()->each(function ($user) {

        	switch ($user->privilegio) {
        		case 1:
        			$user = factory(App\Persona::class)->make();
        			//$user->posts()->save(factory(App\::class)->make());
        			break;
        		case 2:
        			$user->posts()->save(factory(App\Comercio::class)->make());
        			break;
        		case 3:
        			$user->posts()->save(factory(App\Shopping::class)->make());
        			break;
        		
        		default:
        			break;
        	}
	        
	    });
    }
}