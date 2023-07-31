<?php

namespace Database\Factories;

use App\Models\Crop;
use Illuminate\Database\Eloquent\Factories\Factory;

class CropFactory extends Factory
{
    protected $model = Crop::class;

    public function definition()
    {
        // Define the default state of the Crop model for testing
        return [
            // Define attributes here using Faker library or fixed values
            'crop_type' => $this->faker->word,
            'farmer_id' => 1,
            'season_id' => 1,
            'area' => $this->faker->randomFloat(2, 1, 1000),
            'planting_date' => $this->faker->date,
            'seed_type' => $this->faker->word,
            'fertilizer_amount' => $this->faker->randomFloat(2, 0, 100),
            'pesticide_type' => $this->faker->word,
            'yield' => $this->faker->randomFloat(2, 0, 10000),
        ];
    }
}
