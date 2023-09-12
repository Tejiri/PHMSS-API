<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentsController extends Controller
{
    //

    function createAppointment(Request $request)
    {

        $request->validate(
            [
                "date" =>  'required|date|after:today',
                "reason" => 'required|min:6'
            ]
        );
        $patient = Auth::user();
        // return response()->json([
        //     "status" => 200,
        //     "request" => $request->all(),
        // ], 200);


        $appointment =  Appointment::create([
            "reason" => $request->reason,
            "startTime" => $request->startTime,
            "endTime" => $request->endTime,
            "date" => $request->date,
            "status" => "pending",
            "patientId" => $patient->id,
            "doctorId" => $patient->doctorId,

        ]);

        return response()->json([
            "status" => 200,
            "message" => "Appointment sheduled successfully",
            "appointment" => Appointment::with('doctor')->with('patient')->find($appointment->id),
        ], 200);
    }

    function getPatientPendingAppointments()
    {
        $patient = Auth::user();
        $pendingAppointments =  Appointment::where('patientId', $patient->id)->where('status', 'pending')->orderBy('created_at', 'desc')->get();

        return response()->json(
            [
                "status" => 200,
                "appointments" => $pendingAppointments
            ],
            200
        );
    }

    function getPatientCompletedAppointments()
    {
        $patient = Auth::user();
        $completedAppointments =  Appointment::where('patientId', $patient->id)->where('status', 'completed')->orderBy('created_at', 'desc')->get();

        return  response()->json(
            [
                "status" => 200,
                "appointments" => $completedAppointments
            ],
            200
        );
    }


    function getDoctorPendingAppointments(Request   $request)
    {
        $doctor = Auth::user();
        $pendingAppointments =  Appointment::where('doctorId', $doctor->id)->where('status', 'pending')->orderBy('created_at', 'desc')->get();

        return response()->json(
            [
                "status" => 200,
                "appointments" => $pendingAppointments
            ],
            200
        );
    }

    function getDoctorCompletedAppointments()
    {
        $doctor = Auth::user();
        $completedAppointments =  Appointment::where('doctorId', $doctor->id)->where('status', 'completed')->orderBy('created_at', 'desc')->get();

        return response()->json(
            [
                "status" => 200,
                "appointments" => $completedAppointments
            ],
            200
        );
    }


    function updateAppointment(Request $request)
    {

        $appointment = Appointment::find($request->appointmentId);

        $appointment->update([
            "appointmentDetails"=>$request->appointmentDetails,
            "status" => "completed"
        ]);

        return  response()->json(
            [
                "status" => 200,
                "message" => "Appointment updated successfully",
                "updatedAppointment" => $appointment
            ],
            200
        );
    }
}
