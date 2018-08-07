<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(\App\Student::class, function (Faker $faker) {
    $food_id = $faker->randomNumber(3, true);
    return [
        'name' => $faker->firstName,
        'student_id' => $faker->randomNumber(3, true),
        'food_id' => $food_id,
        'password' => Hash::make($food_id)
    ];
});
