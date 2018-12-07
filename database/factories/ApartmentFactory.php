<?php
use Faker\Generator as Faker;

$factory->define(App\Models\Apartment::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100000),
        'bedrooms' => $faker->numberBetween($min = 1, $max = 6),
        'bathrooms' => $faker->numberBetween($min = 1, $max = 6),
        'storeys' => $faker->numberBetween($min = 1, $max = 3),
        'garages' => $faker->numberBetween($min = 1, $max = 3),
        'image' => $faker->imageUrl(),
        'description' => $faker->text($maxNbChars = 200),
    ];
});
