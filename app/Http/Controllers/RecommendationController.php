<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CropRecommendation;

class RecommendationController extends Controller
{
    public function recommendCrops($region)
    {
        $cropRecommendations = CropRecommendation::where('region', $region)->get();

        return $cropRecommendations;
    }
    public function showForm()
    {
        return view('recommendation-form');
    }

        public function getRecommendation(Request $request)
    {
        // Retrieve the region from the request
        $region = $request->input('region');

        // Perform the logic to get crop recommendations based on the region
        $recommendations = CropRecommendation::where('region', $region)->get();

        // Pass the recommendations to the view
        return response()->json(['recommendations' => $recommendations]);
    }
}
