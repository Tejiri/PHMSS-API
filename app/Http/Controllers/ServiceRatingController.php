<?php

namespace App\Http\Controllers;

use App\Models\ServiceRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceRatingController extends Controller
{
    //

    function rateDoctor(Request $request)
    {
        // return $request;

        $patient = Auth::user();

        $request->validate([
            'rating' => 'required|numeric|min:0|max:5',
        ]);

        $ratingExists = ServiceRating::where('patientId', $patient->id)->first();

        if ($ratingExists) {
            return response()->json([
                "status" => 400,
                "rating" => $ratingExists,
                "message" => "Rating has already been sent",
            ], 400);
        }

        $rating =   ServiceRating::create(
            [
                "rating" => $request->rating,
                "description" => $request->description,
                "patientId" => $patient->id,
                "doctorId" => $request->doctorId
            ]
        );
        return response()->json([
            "message" => "Rating sent successfully",
            "rating" => $rating,
        ], 200);
    }

    function findDoctorRatings($doctorId)
    {

        $serviceRating = ServiceRating::with('doctor')->with('user')->where('doctorId', $doctorId)->get();
        return response()->json([
            "status" => 200,
            "ratings" => $serviceRating,
        ], 200);
    }

    function findPatientRating()
    {
        $serviceRating = ServiceRating::where("patientId", Auth::user()->id)->first();
        return response()->json([
            "status" => 200,
            "rating" => $serviceRating,
        ], 200);
    }

    function deleteRating()
    {
        // $serviceRating = 
        ServiceRating::where("patientId", Auth::user()->id)->first()->delete();
        $checkRating = ServiceRating::where("patientId", Auth::user()->id)->first();
        return response()->json([
            "status" => 200,
            "ratings" => $checkRating,
        ], 200);
    }
}
