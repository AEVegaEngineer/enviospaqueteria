<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shopping;
use Faker\Generator as Faker;

$factory->define(Shopping::class, function (Faker $faker) {
    return [
        'shopNombre' => $faker->name,
        'shopCuit' => rand(10000000, 39999999),
        'shopUsuarioId' => \DB::table('users')->max('id'),
    ];
});
