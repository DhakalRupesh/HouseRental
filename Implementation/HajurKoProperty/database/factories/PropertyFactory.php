<?php

use Faker\Generator as Faker;

$factory->define(App\Properties::class, function (Faker $faker) {
    return [
        'propType_id' => '2',
        'propFor' => $faker->word,
        'propDistrict' => $faker->word,
        'propLocation' => $faker->word,
        'propSize' => '2',
        'suitableFor' => $faker->word,
        'waterP' => '21',
        'electricP' => '22',
        'totPrice' => '23',
        'description' => $faker->text,
        'approval' => $faker->word,
        'user_id' => '1',
    ];
});
