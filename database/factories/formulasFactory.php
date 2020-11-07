<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\formulas;
use Faker\Generator as Faker;

$factory->define(formulas::class, function (Faker $faker) {

    return [
        'compuesto' => $faker->word,
        'formula' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
