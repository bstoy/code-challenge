<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Property::class, function (Faker $faker) {
    return [
        'city' => $faker->city,
        'country_code' => 'GB',
        'building_name' => $faker->optional(0.3)->streetName,
        'address_1' => str_replace("\n", ', ', $faker->streetAddress),
        'address_2' => $faker->optional(0.3)->secondaryAddress,
        'post_code' => $faker->postcode,
    ];
});
