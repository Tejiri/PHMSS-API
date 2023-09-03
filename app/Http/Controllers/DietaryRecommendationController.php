<?php

namespace App\Http\Controllers;

use App\Models\DietaryRecommendation;
use Illuminate\Http\Request;

class DietaryRecommendationController extends Controller
{
    //

    function  createDiet(Request $request)
    {
        $dietaryRecommendation = DietaryRecommendation::create(
            [
                "illnessId" => $request->illnessId,
                "name" => $request->name,
                "description" => $request->description,
                "imageUrl" => $request->imageUrl,
            ]
        );

        return response()->json(
            [
                "status" => 200,
                "message" => "Diet created successfully",
                "dietaryRecommendation" => $dietaryRecommendation
            ],
            200
        );
    }

    function getDietaryRecommendations(Request $request, $illnessId)
    {

        return response()->json(
            [
                "status" => 200,
                "dietaryRecommendations" => DietaryRecommendation::where("illnessId", $illnessId)->get()
            ],
            200
        );
    }
}
