<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Meta;
use Faker\Generator as Faker;

$factory->define(Meta::class, function (Faker $faker) {

    return [
        'valor' => $faker->word,
        'categoria_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
