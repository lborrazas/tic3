<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Pelicula;
use Faker\Generator as Faker;

$factory->define(Pelicula::class, function (Faker $faker) {
    return [
        'nombre' =>$faker->name,
        'descripcion' => $faker->text,
        'fecha' => $faker->date(),
    ];
});
