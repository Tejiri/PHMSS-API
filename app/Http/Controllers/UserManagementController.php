<?php

namespace App\Http\Controllers;

use App\Models\Illness;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserManagementController extends Controller
{
    //

    function attachIllnessToUser(Request $request, $patientId)
    {
        $patient = User::with('illnesses')->find($patientId);

        if (!$patient->illnesses->contains($request->illnessId)) {
            $patient->illnesses()->attach($request->illnessId);
            $patient->load('illnesses');
        }

        return $patient;
    }

    function updateBiodata(Request $request)
    {
        $patientId = Auth::user()->id;
        $user = User::find($patientId);


        $user->update([
            "username" => $request->username != null ?  $request->username : $user->username,
            "firstName" => $request->firstName != null ? Crypt::encrypt($request->firstName) : $user->firstName,
            "lastName" => $request->lastName != null ? Crypt::encrypt($request->lastName) : $user->lastName,
            "middleName" => $request->middleName != null ? Crypt::encrypt($request->middleName) : $user->middleName,
            "dateOfBirth" => $request->dateOfBirth != null ? $request->dateOfBirth : $user->dateOfBirth,
            "address" => $request->address != null ? Crypt::encrypt($request->address) : $user->address,
            "postCode" => $request->postCode != null ? Crypt::encrypt($request->postCode) : $user->postCode,
            "phoneNumber" => $request->phoneNumber != null ? Crypt::encrypt($request->phoneNumber) : $user->phoneNumber,
            "role" => $user->role,
            "emergencyName" => $request->emergencyName != null ? $request->emergencyName : $user->emergencyName,
            "emergencyPheneNumber" => $request->emergencyPhoneNumber != null ? $request->emergencyPhoneNumber : $user->emergency,
            "emergencyEmail" => $request->emergencyEmail != null ? $request->emergencyEmail : $user->emergency,
            "emergencyRelationship" => $request->emergencyRelationship != null ? $request->emergencyRelationship : $user->emergency
        ]);

        return response()->json([
            "status" => 200,
            "message" => "Biodata information has been updated successfully",
            "updatedUser" => $user,
        ], 200);
    }


    function updatePassword(Request $request)
    {
        $patientId = Auth::user()->id;
        $user = User::find($patientId);


        $user->update([
            "password" => $request->password != null ?  $request->password : $user->password,
             ]);

        return response()->json([
            "status" => 200,
            "message" => "Password has been updated successfully",
            "updatedUser" => $user,
        ], 200);

    }

    function getBiodata()
    {
        return response()->json([
            "status" => 200,
            "biodata" =>  Auth::user()
        ], 200);
    }
    function registerPatient(Request $request)
    {

        $findUser = User::where("email", $request->email)->first();
        if ($findUser) {
            return response()->json([
                "status" => 400,
                "message" => "User already registered",
            ], 400);
        } else {
            $createdUser =   User::create($request->all());

            return response()->json([
                "status" => 200,
                "user" => $createdUser,
                "message" => "User registered successfully",
            ], 200);
        }
    }
}
