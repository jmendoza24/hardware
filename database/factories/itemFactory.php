<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\item;
use Faker\Generator as Faker;

$factory->define(item::class, function (Faker $faker) {

    return [
        'disenio' => $faker->word,
        'item' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
