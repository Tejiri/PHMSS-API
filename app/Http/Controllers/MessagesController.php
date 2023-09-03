<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    //

    function sendMessageToDoctor(Request $request)
    {

        // return $patientId;
        $patient = Auth::user();

        $message =  UserMessages::create([
            "message" => $request->message,
            "type" => $request->type,
            "patientId" => $patient->id,
            "doctorId" => $request->doctorId,
            "videoUrl" => $request->videoUrl
        ]);

        $message = $message->fresh();

        return response()->json([
            "status" => 200,
            "message" => "Message sent successfully",
            "userMessage" => $message,
        ], 200);
    }

    function getPatientMessages()
    {
        $patient = Auth::user();
        $userMessages = UserMessages::where('patientId', $patient->id)->orderBy('created_at', 'desc')->get();
        return response()->json([
            "status" => 200,
            "userMessages" => $userMessages,
        ], 200);
    }

    function getDoctorMessages()
    {
        $doctor = Auth::user();
        $userMessages = UserMessages::where('doctorId', $doctor->id)->orderBy('created_at', 'desc')->get();

        return response()->json([
            "status" => 200,
            "userMessages" => $userMessages,
        ], 200);
    }

    function getPatientMessagesWithDoctor(Request $request)
    {
        $patient = Auth::user();
        return UserMessages::where('patientId', $patient->id)->where('doctorId', $request->doctorId)->orderBy('created_at', 'desc')->get();
    }
}
