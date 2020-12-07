<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\tipo_proyecto;
use Faker\Generator as Faker;

$factory->define(tipo_proyecto::class, function (Faker $faker) {

    return [
        'tipo_proyecto' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
