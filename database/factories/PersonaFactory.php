<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Persona;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

/*
$factory->define(Persona::class, function ($faker) use ($factory)  {
//$factory->define(Persona::class, function (Faker $faker) {
    return [
        'perNombres' => $faker->name,
        'perApellidos' => $faker->lastName,
        'perDni' => rand(10000000, 39999999),
        //'perUsuarioId' => $factory->create(User::class)->id,
        'perUsuarioId' => function () {
            return User::first()->id ?: factory(User::class)->create()->id;
        },
    ];
});
*/
$factory->define(Persona::class, function ($faker) use ($factory)  {
    return [
        'perUsuarioId' => $factory->create(User::class)->id,
        'perNombres' => $faker->name,
        'perApellidos' => $faker->lastName,
        'perDni' => rand(10000000, 39999999),
    ];
});