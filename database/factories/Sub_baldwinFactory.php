<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sub_baldwin;
use Faker\Generator as Faker;

$factory->define(Sub_baldwin::class, function (Faker $faker) {

    return [
        'subcatalogo' => $faker->word,
        'selector' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
