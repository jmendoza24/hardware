<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\proyectos_clientes;
use Faker\Generator as Faker;

$factory->define(proyectos_clientes::class, function (Faker $faker) {

    return [
        'id_proyecto' => $faker->randomDigitNotNull,
        'id_cliente' => $faker->randomDigitNotNull,
        'comentario' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
