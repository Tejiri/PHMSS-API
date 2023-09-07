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
        return $request->symptoms;
        $possibleIllnesses = Illness::with('symptoms')->whereHas('symptoms', function ($query) use ($request) {
            $query->whereIn('name', $request->symptoms);
        })->get();

        return response()->json([
            "possibleIllnesses" => $possibleIllnesses,
        ], 200);
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
