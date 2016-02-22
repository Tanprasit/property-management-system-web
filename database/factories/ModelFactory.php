<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'full_name' => $faker->name,
        'email' => $faker->email,
        'mobile' => $faker->phoneNumber,
        'status' => $faker->word,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Device::class, function(Faker\Generator $faker) {
    return [
        'model' => $faker->word,
        'manufactorer' => $faker->word,
        'sdk_version' => $faker->randomNumber($nbDigits = NULL),
        'product' => $faker->word,
        'serial_number' => str_random(12),
    ];
});

$factory->define(App\Property::class, function(Faker\Generator $faker) {
    return [
        'address_line_1' => $faker->streetAddress,
        'address_line_2' => $faker->secondaryAddress,
        'city' => $faker->city,
        'county' => $faker->state,
        'postcode' => $faker->postcode,
    ];
});

$factory->define(App\Notification::class, function(Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'type' => $faker->word,
        'notes' => $faker->word,
        'data' => str_random(50),
    ];
});