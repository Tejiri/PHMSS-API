<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    //     public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $credentials = $request->only('email', 'password');

    //     $user = User::where('email', $credentials['email'])->first();
    //     $doctor = Doctor::where('email', $credentials['email'])->first();

    //     if ($user && Hash::check($credentials['password'], $user->password)) {
    //         $token = $user->createToken('app-token')->plainTextToken;
    //         return response()->json(['user' => $user, 'token' => $token], 200);
    //     } elseif ($doctor && Hash::check($credentials['password'], $doctor->password)) {
    //         $token = $doctor->createToken('app-token')->plainTextToken;
    //         return response()->json(['doctor' => $doctor, 'token' => $token], 200);
    //     }

    //     return response()->json(['message' => 'Invalid credentials'], 401);
    // }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $user = User::with('doctor')->where('email', $request->email)->first();
            $token = $user->createToken('phmss-Token')->plainTextToken;
            return response()->json([
                "user" => $user,
                'token' => $token,
                "message" => "Login successful"
            ], 200);
        }

        if (Auth::guard('doctor')->attempt($credentials)) {
            $doctor = Doctor::with('patients')->where('email', $request->email)->first();
            $token = $doctor->createToken('phmss-Token')->plainTextToken;
            return response()->json([
                "user" => $doctor,
                'token' => $token,
                "message" => "Login successful"
            ], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    // function login(Request $request)
    // {

    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {

    //         $user = User::where('email', $request->email)->first();

    //         if ($user) {
    //             $token =   $user->createToken('phmss-Token')->plainTextToken;
    //             $response = [
    //                 "user" => $user,
    //                 'token' => $token,
    //                 "message" => "Login successful"
    //             ];
    //             return response()->json($response, 200);
    //         } else {
    //             $doctor = Doctor::where('email', $request->email)->first();
    //             if ($doctor) {
    //                 $token =   $doctor->createToken('phmss-Token')->plainTextToken;
    //                 $response = [
    //                     "user" => $doctor,
    //                     'token' => $token,
    //                     "message" => "Login successful"
    //                 ];
    //                 return response()->json($response, 200);
    //             }
    //         }
    //     } else {
    //         return response()->json(['message' => 'Invalid credentials'], 401);
    //     }
    // }
}
