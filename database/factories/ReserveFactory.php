<?php

use Faker\Generator as Faker;

$factory->define(\App\Reserve::class, function (Faker $faker) {
    $foods = \App\Food::get(['id']);
    $days = \App\Day::get(['id']);
    return [
        's_id' => 1,
        'd_id' => $faker->randomElement($days),
        'f_id' => $faker->randomElement($foods),
        'meal' => $faker->randomElement([1, 2, 3])
    ];
});
