<?php
use Backend\User;
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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Backend\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName ,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt(str_random(10)),
        'created_at' => $faker->dateTime,
        'active' => true,
    ];
});

$factory->define(Backend\Phone::class, function (Faker\Generator $faker) {
    return [
        'phone' => $faker->e164PhoneNumber,
        'user_id' => User::all()->random()->id,
        'created_at' => $faker->dateTime,
    ];
});
