<?php

use Faker\Generator as Faker;
use App\Model\Restaurant;

$factory->define(App\Model\Product::class, function (Faker $faker) {

    $restaurantIds = Restaurant::pluck('id');
    return [
        'name' => $faker->name,
        'price' => $faker->randomFloat(null, 0, 100000),
        'restaurant_id' => $restaurantIds->random()
    ];
});
