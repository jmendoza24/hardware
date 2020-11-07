<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\disenio;
use Faker\Generator as Faker;

$factory->define(disenio::class, function (Faker $faker) {

    return [
        'fabricante' => $faker->randomDigitNotNull,
        'disenio' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
