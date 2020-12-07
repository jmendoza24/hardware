<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\proyectos_files;
use Faker\Generator as Faker;

$factory->define(proyectos_files::class, function (Faker $faker) {

    return [
        'id_proyecto' => $faker->randomDigitNotNull,
        'tipo_file' => $faker->randomDigitNotNull,
        'file' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
