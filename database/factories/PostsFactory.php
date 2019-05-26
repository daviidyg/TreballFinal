<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'titulo' => $faker->text(30),
        'contenido' => $faker->text(200)

    ];
});
