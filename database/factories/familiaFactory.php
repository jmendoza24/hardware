<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\familia;
use Faker\Generator as Faker;

$factory->define(familia::class, function (Faker $faker) {

    return [
        'fabricante' => $faker->randomDigitNotNull,
        'familia' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
