<?php

namespace App\Http\Controllers;

use App\Models\Illness;
use App\Models\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IllnessSymptomController extends Controller
{
    //
    function findIllnessWithSymptoms(Request $request)
    {
        try {

            $jsonString = $request->getContent(); // Gets the raw content of the request
    $decodedData = json_decode($jsonString, true);

            $possibleIllnesses = Illness::with('symptoms')->whereHas('symptoms', function ($query) use ($request,$decodedData) {
                $query->whereIn('name', $decodedData['symptoms']);
            })->get();

            return response()->json([
                "possibleIllnesses" => $possibleIllnesses,
            ], 200);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    function getSymptoms()
    {
        return response()->json([
            "status" => 200,
            "symptoms" => Symptom::all(),
        ], 200);
    }

    function getIllnesses()
    {
        return response()->json([
            "status" => 200,
            "illnesses" => Illness::all(),
        ], 200);
    }

    function getPatientIllnesses()
    {
        $patient = Auth::user();
        return response()->json([
            "illnesses" => $patient->illnesses,
        ], 200);
    }
}
