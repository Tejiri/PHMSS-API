<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    function registerDoctor(Request $request)
    {

        $doctor = Doctor::create([
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);


        $token =  $doctor->createToken('refiners-Token')->plainTextToken;

        return response(
            [
                'user' => $doctor,
                'token' => $token
            ],
            200
        );
    }

    function registerPatient(Request $request)
    {

        $doctor = Doctor::where('id', 1)->get()->first();
        return $doctor;
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);


        $token =  $user->createToken('refiners-Token')->plainTextToken;

        return response(
            [
                'user' => $doctor,
                'token' => $token
            ],
            200
        );
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $user = User::with('doctor')->where('email', $request->email)->first();

            $token = $user->createToken('phmss-Token')->plainTextToken;
            $user->firstName = Crypt::decrypt($user->firstName);
            $user->lastName = Crypt::decrypt($user->lastName);
            $user->middleName = Crypt::decrypt($user->middleName);
            $user->address = Crypt::decrypt($user->address);
            $user->postCode = Crypt::decrypt($user->postCode);
            $user->phoneNumber = Crypt::decrypt($user->phoneNumber);
            $user->gender = Crypt::decrypt($user->gender);
            $user->token = $token;

            $user->doctor->firstName = Crypt::decrypt($user->doctor->firstName);
            $user->doctor->lastName = Crypt::decrypt($user->doctor->lastName);
            $user->doctor->middleName = Crypt::decrypt($user->doctor->middleName);
            $user->doctor->address = Crypt::decrypt($user->doctor->address);
            $user->doctor->postCode = Crypt::decrypt($user->doctor->postCode);
            $user->doctor->phoneNumber = Crypt::decrypt($user->doctor->phoneNumber);
            $user->doctor->gender = Crypt::decrypt($user->doctor->gender);


            return response()->json([
                "user" => $user,
                'token' => $token,
                "message" => "Login successful"
            ], 200);
        }

        if (Auth::guard('doctor')->attempt($credentials)) {
            $doctor = Doctor::with('patients')->where('email', $request->email)->first();
            $token = $doctor->createToken('phmss-Token')->plainTextToken;

            $doctor->firstName = Crypt::decrypt($doctor->firstName);
            $doctor->lastName = Crypt::decrypt($doctor->lastName);
            $doctor->middleName = Crypt::decrypt($doctor->middleName);
            $doctor->address = Crypt::decrypt($doctor->address);
            $doctor->postCode = Crypt::decrypt($doctor->postCode);
            $doctor->phoneNumber = Crypt::decrypt($doctor->phoneNumber);
            $doctor->gender = Crypt::decrypt($doctor->gender);
            $doctor->token = $token;

            foreach ($doctor->patients as $patient) {
                $patient->firstName = Crypt::decrypt($patient->firstName);
                $patient->lastName = Crypt::decrypt($patient->lastName);
                $patient->middleName = Crypt::decrypt($patient->middleName);
                $patient->address = Crypt::decrypt($patient->address);
                $patient->postCode = Crypt::decrypt($patient->postCode);
                $patient->phoneNumber = Crypt::decrypt($patient->phoneNumber);
                $patient->gender = Crypt::decrypt($patient->gender);
            }
            return response()->json([
                "user" => $doctor,
                'token' => $token,
                "message" => "Login successful"
            ], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

}
