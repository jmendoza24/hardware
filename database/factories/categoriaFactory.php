<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\categoria;
use Faker\Generator as Faker;

$factory->define(categoria::class, function (Faker $faker) {

    return [
        'fabricante' => $faker->randomDigitNotNull,
        'categoria' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
