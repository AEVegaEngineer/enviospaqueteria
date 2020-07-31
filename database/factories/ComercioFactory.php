<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comercio;
use App\User;
use Faker\Generator as Faker;
/*
$factory->define(App\Comercio::class, function ($faker) use ($factory)  {
//$factory->define(Comercio::class, function ($faker) use ($factory)  {
    return [
        'comNombre' => $faker->name,
        'comCuit' => rand(10000000, 39999999),
        //'comUsuarioId' => $factory->create(User::class)->id,
        'comUsuarioId' => function () {
            return User::first()->id ?: factory(User::class)->create()->id;
        },
    ];
});
*/
$factory->define(Comercio::class, function ($faker) use ($factory)  {
    return [
        'comUsuarioId' => $factory->create(User::class)->id,
        'comNombre' => $faker->name,
        'comCuit' => rand(10000000, 39999999),
    ];
});
