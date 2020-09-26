<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\subcategorias;
use Faker\Generator as Faker;

$factory->define(subcategorias::class, function (Faker $faker) {

    return [
        'fabricante' => $faker->randomDigitNotNull,
        'subcategoria' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
