<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CropRecommendation;

class CropRecommendationSeeder extends Seeder
{
    public function run()
    {
        $recommendations = [
            ['region' => 'Kigali', 'crop' => 'Corn'],
            ['region' => 'Gisenyi', 'crop' => 'Wheat'],
            // Add more crop recommendations for different regions
        ];

        foreach ($recommendations as $recommendation) {
            CropRecommendation::create($recommendation);
        }
    }
}

