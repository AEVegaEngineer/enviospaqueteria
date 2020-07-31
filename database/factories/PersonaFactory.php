<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Persona;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Persona::class, function (Faker $faker) {
    return [
        'perNombres' => $faker->name,
        'perApellidos' => $faker->lastName,
        'perDni' => rand(10000000, 39999999),
        'perUsuarioId' => \DB::table('users')->max('id'),
    ];
});
