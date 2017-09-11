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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => substr($faker->name, 0, strpos($faker->name, " "));
        'last_name' => substr($faker->name, 0, strpos($faker->name, " "));
        'email' => $faker->unique()->safeEmail,
        'telephone' => $faker->phoneNumber,
        'role_id' => 2,
        'password' => $password ?: $password = bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});
