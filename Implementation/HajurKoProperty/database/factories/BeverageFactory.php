<?php

use Faker\Generator as Faker;

$factory->define(App\Beverage::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'type' => 'wine'
    ];
});
