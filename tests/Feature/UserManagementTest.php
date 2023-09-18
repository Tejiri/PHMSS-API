<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // public function test_createPatientForTest(): void
    // {


    //     $patient1 =     User::create([
    //         'username'     => 'exampleUsername',
    //         'email'        => 'testpatient1@gmail.com',
    //         'password'     =>  Hash::make('aaaaaa'),
    //         'firstName'    => Crypt::encrypt(fake()->firstName()),
    //         'lastName'     => Crypt::encrypt(fake()->lastName()),
    //         'middleName'   => Crypt::encrypt('Robert'),
    //         'dateOfBirth'  => fake()->date(),
    //         'address'      => Crypt::encrypt(fake()->address()),
    //         'postCode'     => Crypt::encrypt(fake()->postcode()),
    //         'phoneNumber'  => Crypt::encrypt(fake()->phoneNumber()),
    //         'role'         => 'patient',
    //         'gender'       => Crypt::encrypt('male'),
    //         'doctorId' => 1
    //     ]);

    //     $patient1->illnesses()->attach(3);

    //     $response = $this->withHeaders([
    //         // 'Authorization' => 'Bearer ' . $token,
    //         'Accept' => 'application/json',
    //     ])->json('POST', '/api/v1/authentication/login', $payload);

    //     // Assert to check if the update was successful
    //     $response->assertStatus(200);
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
}
