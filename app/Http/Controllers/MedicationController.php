<?php

namespace App\Http\Controllers;

use App\Models\Illness;
use App\Models\Medication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicationController extends Controller
{
    //

    function createMedication(Request $request)
    {
        $medication =   Medication::create(
            [
                "name" => $request->name,
                "description" => $request->description,
                "dosage" => $request->dosage,
                "frequency" => $request->frequency,
                "imageUrl" => $request->imageUrl
            ]
        );

        $medication->illnesses()->attach($request->illnessId);
        $medication->load('illnesses');

        return response()->json(
            [
                "status" => 200,
                "message" => "Medication created successfully",
                "medication" => $medication
            ],
            200
        );
    }

    // function attachMedicationToIllness($medicationId)
    // {
    //     $medication  = Medication::find($medicationId);

    //     return $medication;

    // }


    function getMedicationForIllness(Request $request)
    {
        $illness = Illness::find($request->illnessId);

        return response()->json(
            [
                "illness" => $illness,
                "medications" => $illness->medications
            ],
            200
        );
    }
}
