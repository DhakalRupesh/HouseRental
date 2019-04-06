<?php

use Faker\Generator as Faker;

$factory->define(App\Bookings::class, function (Faker $faker) {
    return [
        'status' => 'booked',
        'user_id' => '1',
        'propID' => '2',
    ];
});
