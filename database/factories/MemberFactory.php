<?php

// database/factories/UserModelFactory.php
use Faker\Generator as Faker;

$factory->define(App\Models\Member::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone_number' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'fee' => $faker->numberBetween(0, 20),
    ];
});
