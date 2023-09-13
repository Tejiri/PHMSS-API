<?php

namespace App\Http\Controllers;

use App\Models\ServiceRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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

    function findDoctorRatings()
    {

        $serviceRating = ServiceRating::with('doctor')->with('user')->where('doctorId',Auth::user()->id)->get();

        foreach ($serviceRating as $rating) {
            $rating->doctor->firstName = Crypt::decrypt($rating->doctor->firstName);
            $rating->doctor->lastName = Crypt::decrypt($rating->doctor->lastName);
            $rating->doctor->middleName = Crypt::decrypt($rating->doctor->middleName);
            $rating->doctor->address = Crypt::decrypt($rating->doctor->address);
            $rating->doctor->postCode = Crypt::decrypt($rating->doctor->postCode);
            $rating->doctor->phoneNumber = Crypt::decrypt($rating->doctor->phoneNumber);
            $rating->doctor->gender = Crypt::decrypt($rating->doctor->gender);
            
            $rating->user->firstName = Crypt::decrypt($rating->user->firstName);
            $rating->user->lastName = Crypt::decrypt($rating->user->lastName);
            $rating->user->middleName = Crypt::decrypt($rating->user->middleName);
            $rating->user->address = Crypt::decrypt($rating->user->address);
            $rating->user->postCode = Crypt::decrypt($rating->user->postCode);
            $rating->user->phoneNumber = Crypt::decrypt($rating->user->phoneNumber);
            $rating->user->gender = Crypt::decrypt($rating->user->gender);
        }
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
        ServiceRating::where("patientId", Auth::user()->id)->first()->delete();
        $checkRating = ServiceRating::where("patientId", Auth::user()->id)->first();
        return response()->json([
            "status" => 200,
            "ratings" => $checkRating,
        ], 200);
    }
}
