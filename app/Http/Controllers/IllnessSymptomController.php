<?php

namespace App\Http\Controllers;

use App\Models\Illness;
use App\Models\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class IllnessSymptomController extends Controller
{
    //
    function findIllnessWithSymptoms(Request $request)
    {

        try {
            $symptoms = $request->input('symptoms'); // Use input() method to get the symptoms
    
            // Log symptoms for debugging
            Log::info('Symptoms: ' . json_encode($symptoms));
    
            // Return symptoms in response for debugging
            return response()->json([
                "symptoms" => $symptoms,
            ], 200);
    
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
        // try {
        //     return response()->json([
        //         "symptoms" => $request->symptoms,
        //     ], 200);
        //     $possibleIllnesses = Illness::with('symptoms')->whereHas('symptoms', function ($query) use ($request) {
        //         $query->whereIn('name', $request->symptoms);
        //     })->get();
    
        //     return response()->json([
        //         "possibleIllnesses" => $possibleIllnesses,
        //     ], 200);
        // } catch (\Throwable $th) {
        //     return $th;
        // }
       
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
