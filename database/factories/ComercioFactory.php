<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comercio;
use Faker\Generator as Faker;

$factory->define(Comercio::class, function (Faker $faker) {
    return [
        'comNombre' => $faker->name,
        'comCuit' => rand(10000000, 39999999),
        'comUsuarioId' => \DB::table('users')->max('id'),
    ];
});
