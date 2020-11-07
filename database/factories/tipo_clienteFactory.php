<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\tipo_cliente;
use Faker\Generator as Faker;

$factory->define(tipo_cliente::class, function (Faker $faker) {

    return [
        'tipo_cliente' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
