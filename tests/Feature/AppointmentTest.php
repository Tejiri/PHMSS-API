<?php

namespace Tests\Feature;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AppointmentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_getDoctorIdAndCreatePatientIfNotExistThenLoginAndGetTokenAndCreateAppointment(): void
    {
        $doctorId = Doctor::where('email', 'doctor1@gmail.com')->first()->id;
        $patientInDatabase = User::where('email', 'patientfortest@gmail.com')->first();
        if (!$patientInDatabase) {
            $patientInDatabase =     User::create([
                'username'     => 'exampleUsername',
                'email'        => 'patientfortest@gmail.com',
                'password'     =>  Hash::make('aaaaaa'),
                'firstName'    => Crypt::encrypt(fake()->firstName()),
                'lastName'     => Crypt::encrypt(fake()->lastName()),
                'middleName'   => Crypt::encrypt('Robert'),
                'dateOfBirth'  => fake()->date(),
                'address'      => Crypt::encrypt(fake()->address()),
                'postCode'     => Crypt::encrypt(fake()->postcode()),
                'phoneNumber'  => Crypt::encrypt(fake()->phoneNumber()),
                'role'         => 'patient',
                'gender'       => Crypt::encrypt('male'),
                'doctorId' => $doctorId
            ]);

            $patientInDatabase->illnesses()->attach([1]);
        }

        $response = $this->json('POST', '/api/v1/authentication/login', [
            'email' => 'patientfortest@gmail.com',
            'password' => 'aaaaaa'
        ]);

        $response->assertStatus(200);

        $responseData = $response->decodeResponseJson();
        $token = $responseData['token'];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->json('POST', '/api/v1/patients/create-appointment', [
            'date' => '2023-12-25',
            'reason' => 'Test reason',
            'startTime' => '12:00:00',
            'endTime' => '13:00:00'
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => 200,
                'message' => 'Appointment scheduled successfully'
            ]);

        // User::create(

        // )

        //         $request->validate(
        //             [
        //                 "date" =>  'required|date|after:today',
        //                 "reason" => 'required|string|min:6'
        //             ]
        //         );
        //         $patient = Auth::user();

        //         $appointment =  Appointment::create([
        //             "reason" => $request->reason,
        //             "startTime" => $request->startTime,
        //             "endTime" => $request->endTime,
        //             "date" => $request->date,
        //             "status" => "pending",
        //             "patientId" => $patient->id,
        //             "doctorId" => $patient->doctorId,

        //         ]);

        // return response()->json([
        //     "status" => 200,
        //     "message" => "Appointment sheduled successfully",
        //     "appointment" => Appointment::with('doctor')->with('patient')->find($appointment->id),
        // ], 200);
        // $user = User::factory()->create();

        // // Generate token for the user
        // $token = $user->createToken('test_token')->plainTextToken;

        // Data payload that you want to send in request
        // $payload = [
        //     'email' => 'patient1@gmail.com',
        //     'password' => 'aaaaaa',
        // ];

        // // Perform the request with headers and payload
        // $response = $this->withHeaders([
        //     // 'Authorization' => 'Bearer ' . $token,
        //     'Accept' => 'application/json',
        // ])->json('POST', '/api/v1/authentication/login', $payload);

        // // Assert to check if the update was successful
        // $response->assertStatus(200);
        //   ->assertJson([
        //       'name' => 'New Name',
        //       'email' => 'new.email@example.com',
        //   ]);
    }


    public function test_getDoctorIdAndCreatePatientIfNotExistThenLoginAndGetTokenThenGetPatientPendingAppointments(): void
    {
        $doctorId = Doctor::where('email', 'doctor1@gmail.com')->first()->id;
        $patientInDatabase = User::where('email', 'patientfortest@gmail.com')->first();
        if (!$patientInDatabase) {
            $patientInDatabase =     User::create([
                'username'     => 'exampleUsername',
                'email'        => 'patientfortest@gmail.com',
                'password'     =>  Hash::make('aaaaaa'),
                'firstName'    => Crypt::encrypt(fake()->firstName()),
                'lastName'     => Crypt::encrypt(fake()->lastName()),
                'middleName'   => Crypt::encrypt('Robert'),
                'dateOfBirth'  => fake()->date(),
                'address'      => Crypt::encrypt(fake()->address()),
                'postCode'     => Crypt::encrypt(fake()->postcode()),
                'phoneNumber'  => Crypt::encrypt(fake()->phoneNumber()),
                'role'         => 'patient',
                'gender'       => Crypt::encrypt('male'),
                'doctorId' => $doctorId
            ]);

            $patientInDatabase->illnesses()->attach([1]);
        }

        $response = $this->json('POST', '/api/v1/authentication/login', [
            'email' => 'patientfortest@gmail.com',
            'password' => 'aaaaaa'
        ]);

        $response->assertStatus(200);

        $responseData = $response->decodeResponseJson();
        $token = $responseData['token'];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->json('GET', '/api/v1/patients/pending-appointments');

        $response->assertStatus(200)
            ->assertJson([
                'status' => 200,
                // 'message' => 'Appointment scheduled successfully'
            ]);
    }


    public function test_getPatientCompletedAppointments(): void
    {
        $doctorId = Doctor::where('email', 'doctor1@gmail.com')->first()->id;
        $patientInDatabase = User::where('email', 'patientfortest@gmail.com')->first();
        if (!$patientInDatabase) {
            $patientInDatabase =     User::create([
                'username'     => 'exampleUsername',
                'email'        => 'patientfortest@gmail.com',
                'password'     =>  Hash::make('aaaaaa'),
                'firstName'    => Crypt::encrypt(fake()->firstName()),
                'lastName'     => Crypt::encrypt(fake()->lastName()),
                'middleName'   => Crypt::encrypt('Robert'),
                'dateOfBirth'  => fake()->date(),
                'address'      => Crypt::encrypt(fake()->address()),
                'postCode'     => Crypt::encrypt(fake()->postcode()),
                'phoneNumber'  => Crypt::encrypt(fake()->phoneNumber()),
                'role'         => 'patient',
                'gender'       => Crypt::encrypt('male'),
                'doctorId' => $doctorId
            ]);

            $patientInDatabase->illnesses()->attach([1]);
        }

        $response = $this->json('POST', '/api/v1/authentication/login', [
            'email' => 'patientfortest@gmail.com',
            'password' => 'aaaaaa'
        ]);

        $response->assertStatus(200);

        $responseData = $response->decodeResponseJson();
        $token = $responseData['token'];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->json('GET', '/api/v1/patients/completed-appointments');

        $response->assertStatus(200)
            ->assertJson([
                'status' => 200,
                // 'message' => 'Appointment scheduled successfully'
            ]);
    }


    public function test_logDoctorInAndUpdatePendingAppointment(): void
    {
        $doctor = Doctor::where('email', 'doctor1@gmail.com')->first();


        $response = $this->json('POST', '/api/v1/authentication/login', [
            'email' => $doctor->email,
            'password' => 'aaaaaa'
        ]);

        $response->assertStatus(200);

        $responseData = $response->decodeResponseJson();
        $token = $responseData['token'];

        $appointment = Appointment::where('reason','Test reason')->first();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->json('PUT', '/api/v1/doctors/update-appointment', [
            'appointmentId' => $appointment->id,
            'appointmentDetails' => 'Appointment details updates successfully',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => 200,
                "message" => "Appointment updated successfully",
            ]);
    }
}
