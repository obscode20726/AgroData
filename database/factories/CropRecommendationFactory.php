<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\CropRecommendation;

$factory->define(CropRecommendation::class, function (Faker $faker) {
    return [
        'region' => $faker->word,
        'crop' => $faker->word,
        // Define other fields
    ];
});

