<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Categoria;
use Faker\Generator as Faker;

$factory->define(Categoria::class, function (Faker $faker) {

    return [
        'nome' => $faker->word,
        'ativo' => $faker->word,
        'tipo' => $faker->randomElement(['Receita:R', 'Despesa:D', 'Objetivo:O']),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
