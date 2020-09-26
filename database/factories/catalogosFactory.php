<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\catalogos;
use Faker\Generator as Faker;

$factory->define(catalogos::class, function (Faker $faker) {

    return [
        'fabricante' => $faker->randomDigitNotNull,
        'catalogo' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
