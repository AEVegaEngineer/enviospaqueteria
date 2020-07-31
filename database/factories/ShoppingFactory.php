<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shopping;
use App\User;
use Faker\Generator as Faker;
/*
$factory->define(App\Shopping::class, function ($faker) use ($factory)  {
//$factory->define(Shopping::class, function (Faker $faker) {
    return [
        'shopNombre' => $faker->name,
        'shopCuit' => rand(10000000, 39999999),
        //'shopUsuarioId' => $factory->create(User::class)->id,
        'shopUsuarioId' => function () {
            return User::first()->id ?: factory(User::class)->create()->id;
        },
    ];
});
*/
$factory->define(Shopping::class, function ($faker) use ($factory)  {
    return [
        'shopUsuarioId' => $factory->create(User::class)->id,
        'shopNombre' => $faker->name,
        'shopCuit' => rand(10000000, 39999999),
    ];
});