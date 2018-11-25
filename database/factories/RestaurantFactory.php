<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Restaurant::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'status' => $faker->randomElement(['ACTIVE', 'CLOSED']),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
    ];
});
