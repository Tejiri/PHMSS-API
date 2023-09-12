<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Illness;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = User::where('email', 'admin1@gmail.com')->first();

        if (!$admin) {
            User::create([
                'username'     => 'Admin1',
                'email'        => 'admin1@gmail.com',
                'password'     =>  Hash::make('aaaaaa'),
                'firstName'    => Crypt::encrypt('Admin'),
                'lastName'     => Crypt::encrypt('Lastname'),
                'middleName'   => Crypt::encrypt('Robert'),
                'dateOfBirth'  => '1990-01-01',
                'address'      => Crypt::encrypt('123 Main St, City'),
                'postCode'     => Crypt::encrypt('12345'),
                'phoneNumber'  => Crypt::encrypt('123-456-7890'),
                'role'         => 'admin',
                'gender'       => Crypt::encrypt('male'),
            ]);
        }
        $doctor1InDatabase = Doctor::where('email', 'doctor1@gmail.com')->first();

        if (!$doctor1InDatabase) {
            Doctor::create([
                'username'     => 'Doctor1',
                'email'        => 'doctor1@gmail.com',
                'password'     => Hash::make('aaaaaa'),
                'firstName'    => Crypt::encrypt('John'),
                'lastName'     => Crypt::encrypt('Doe'),
                'middleName'   => Crypt::encrypt('Robert'),
                'dateOfBirth'  => '1990-01-01',
                'address'      => Crypt::encrypt('123 Main St, City'),
                'postCode'     => Crypt::encrypt('12345'),
                'phoneNumber'  => Crypt::encrypt('123-456-7890'),
                'role'         => 'doctor',
                'gender'       => Crypt::encrypt('male'),
            ]);
        }
        $doctorId = Doctor::where('email', 'doctor1@gmail.com')->first()->id;
        $illnessIds = [
            optional(Illness::where('name', 'Asthma')->first())->id,
            optional(Illness::where('name', 'Diabetes Mellitus (Types 1 & 2)')->first())->id,
            optional(Illness::where('name', 'Hypertension (High Blood Pressure)')->first())->id,
            optional(Illness::where('name', 'Rheumatoid Arthritis')->first())->id,
            optional(Illness::where('name', 'Chronic Obstructive Pulmonary Disease (COPD)')->first())->id,
            optional(Illness::where('name', 'Osteoporosis')->first())->id,
            optional(Illness::where('name', 'Multiple Sclerosis (MS)')->first())->id,
            optional(Illness::where('name', 'Alzheimer\'s Disease')->first())->id,
            optional(Illness::where('name', 'Parkinson\'s Disease')->first())->id,
            optional(Illness::where('name', 'Chronic Kidney Disease (CKD)')->first())->id,
            optional(Illness::where('name', 'Heart Disease')->first())->id,
            optional(Illness::where('name', 'Hepatitis B')->first())->id,
            optional(Illness::where('name', 'Inflammatory Bowel Disease (IBD)')->first())->id,
            optional(Illness::where('name', 'Lupus')->first())->id,
            optional(Illness::where('name', 'Fibromyalgia')->first())->id,
        ];

        $illnessIds = array_filter($illnessIds);

        $patient1InDatabase = User::where('email', 'patient1@gmail.com')->first();

        if (!$patient1InDatabase) {
            $patient1 =     User::create([
                'username'     => 'exampleUsername',
                'email'        => 'patient1@gmail.com',
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

            $patient1->illnesses()->attach([Arr::random($illnessIds)]);
        }

        $patient2InDatabase = User::where('email', 'patient2@gmail.com')->first();

        if (!$patient2InDatabase) {
            $patient2 = User::create([
                'username'     => 'exampleUsername',
                'email'        => 'patient2@gmail.com',
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

            $patient2->illnesses()->attach([Arr::random($illnessIds)]);
        }

        $patient3InDatabase = User::where('email', 'patient3@gmail.com')->first();

        if (!$patient3InDatabase) {
            $patient3 =    User::create([
                'username'     => 'exampleUsername',
                'email'        => 'patient3@gmail.com',
                'password'     => Hash::make('aaaaaa'),
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
            $patient3->illnesses()->attach([Arr::random($illnessIds)]);
        }

        $patient4InDatabase = User::where('email', 'patient4@gmail.com')->first();

        if (!$patient4InDatabase) {
            $patient4 =  User::create([
                'username'     => 'exampleUsername',
                'email'        => 'patient4@gmail.com',
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
            $patient4->illnesses()->attach([Arr::random($illnessIds)]);
        }

        $patient5InDatabase = User::where('email', 'patient5@gmail.com')->first();

        if (!$patient5InDatabase) {
            $patient5 =  User::create([
                'username'     => 'exampleUsername',
                'email'        => 'patient5@gmail.com',
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
            $patient5->illnesses()->attach([Arr::random($illnessIds)]);
        }
    }
}
