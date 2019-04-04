<?php

use Faker\Generator as Faker;

$factory->define(App\Proptypes::class, function (Faker $faker) {
    return [
        'propertyType' => $faker->word
    ];
});
