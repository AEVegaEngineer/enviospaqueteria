<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
	return [
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$by9knUuMI75z0X5b1oOzJurfspT8rE/BeUob4Sv9ZLb5ZlocVoOTi', // password
        'remember_token' => Str::random(10),
        'privilegio' => rand(1, 5),
        'usuTelefono' => rand(2640000000, 2649999999),
        //'usuDireccion' => $faker->address
    ];
});
