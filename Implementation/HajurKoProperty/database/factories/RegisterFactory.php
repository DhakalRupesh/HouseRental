<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'fullname' => $faket->word,
        'eamil' => $faker->unique()->safeEmail,
        'district' => $faker->word,
        'city' => $faker->word,
        'address' => $faker->word,
        'mobNo' => $faker->phoneNumber,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'
    ];
});
