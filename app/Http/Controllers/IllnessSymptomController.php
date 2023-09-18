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

            $symptoms = json_decode($request->input('symptoms'), true);
            $possibleIllnesses = Illness::with('symptoms')->whereHas('symptoms', function ($query) use ($symptoms) {
                $query->whereIn('name', $symptoms);
            })->get();

            return response()->json([
                "status"=>200,
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
            "illnesses" => Illness::orderBy( 'name','asc' )->get(),
        ], 200);
    }

    function getPatientIllnesses()
    {
        $patient = Auth::user();
        return response()->json([
            "status" => 200,
            "illnesses" => $patient->illnesses,
        ], 200);
    }
}
