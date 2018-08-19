<?php

use App\Species;
use Faker\Generator as Faker;

$factory->define(Species::class, function (Faker $faker) {
    return [
        'species' => $faker->word,
        'genus' => $faker->randomElement(['apis', 'bombus', 'osmia', 'lasioglossum', 'megachile']),
    ];
});
