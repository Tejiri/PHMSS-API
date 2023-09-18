<?php

namespace Tests\Feature;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class IllnessSymptomTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_logPatientInAndGetListOfSymptoms(): void
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
            'email' => "patientfortest@gmail.com",
            'password' => 'aaaaaa'
        ]);

        $response->assertStatus(200);

        $responseData = $response->decodeResponseJson();
        $token = $responseData['token'];


        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->json('GET', '/api/v1/patients/symptoms');

        $response->assertStatus(200)
            ->assertJson([
                'status' => 200,

            ]);
    }

    public function test_logPatientInAndGetListOfAllDiagnozedIllnesses(): void
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
            'email' => "patientfortest@gmail.com",
            'password' => 'aaaaaa'
        ]);

        $response->assertStatus(200);

        $responseData = $response->decodeResponseJson();
        $token = $responseData['token'];


        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->json('GET', '/api/v1/patients/illnesses');

        $response->assertStatus(200)
            ->assertJson([
                'status' => 200,
            ]);
    }

    public function test_logPatientInAndGetListOfPossibleIllnessesBasedOnSymptomsEntered(): void
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
            'email' => "patientfortest@gmail.com",
            'password' => 'aaaaaa'
        ]);

        $response->assertStatus(200);

        $responseData = $response->decodeResponseJson();
        $token = $responseData['token'];


        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->json('POST', '/api/v1/patients/check-symptoms', ['symptoms' => '["Fatigue"]']);

        $response->assertStatus(200)
            ->assertJson([
                'status' => 200,
            ]);
    }



    public function test_logDoctorInAndGetListOfAllIllnessesInDatabase(): void
    {
      

        $response = $this->json('POST', '/api/v1/authentication/login', [
            'email' => "doctor1@gmail.com",
            'password' => 'aaaaaa'
        ]);

        $response->assertStatus(200);

        $responseData = $response->decodeResponseJson();
        $token = $responseData['token'];


        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->json('GET', '/api/v1/doctors/illnesses');

        $response->assertStatus(200)
            ->assertJson([
                'status' => 200,
            ]);
    }
}
