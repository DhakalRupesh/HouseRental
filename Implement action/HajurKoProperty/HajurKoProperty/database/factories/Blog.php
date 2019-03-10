<?php

use Faker\Generator as Faker;

$factory->define(App\Blog::class, function (Faker $faker) {
    return [
        //
        'title'=>$faker->realText(100),
        'slug'=>str_slug($faker->realText(100)),
        'image'=>$faker->imageUrl() 
    ];
});
