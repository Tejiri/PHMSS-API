<?php

use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DietaryRecommendationController;
use App\Http\Controllers\IllnessSymptomController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ServiceRatingController;
use App\Http\Controllers\UserManagementController;
use App\Models\Illness;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/







// attachMedicationToIllness


// Route::put("v1" . '/doctors/appointments', [AppointmentsController::class, 'updateAppointment']);









$appVersion = "v1";
Route::middleware(['auth:sanctum'])->group(function () use ($appVersion) {

  Route::middleware(['checkIfAdmin'])->group(function () use ($appVersion) {
    Route::post("v1" . '/admins/register-patient', [UserManagementController::class, 'registerPatient']);
    Route::post("v1" . '/admins/register-doctor', [UserManagementController::class, 'registerDoctor']);
  });

  Route::middleware(['checkIfDoctor'])->group(function () use ($appVersion) {
    Route::post($appVersion . '/doctors/create-diet', [DietaryRecommendationController::class, 'createDiet']);
    Route::get($appVersion . '/doctors/completed-appointments', [AppointmentsController::class, 'getDoctorCompletedAppointments']);
    Route::get($appVersion . '/doctors/pending-appointments', [AppointmentsController::class, 'getDoctorPendingAppointments']);
    Route::get($appVersion  . '/doctors/messages', [MessagesController::class, 'getDoctorMessages']);
    Route::put($appVersion  . '/doctors/update-appointment', [AppointmentsController::class, 'updateAppointment']);
    Route::get($appVersion  . '/doctors/ratings', [ServiceRatingController::class, 'findDoctorRatings']);
    Route::post($appVersion  . '/doctors/create-medication', [MedicationController::class, 'createMedication']);
    // Route::post($appVersion . '/doctors/attach-medication-to-illness', [MedicationController::class, 'attachMedicationToIllness']);
    // Route::post($appVersion . '/doctors/attach-illness', [UserManagementController::class, 'attachIllnessToUser']);
    Route::get($appVersion . '/doctors/illnesses', [IllnessSymptomController::class, 'getIllnesses']);
  });

  Route::middleware(['checkIfPatient'])->group(function () use ($appVersion) {
    Route::get($appVersion . '/patients/biodata', [UserManagementController::class, 'getBiodata']);
    Route::get($appVersion . '/patients/illnesses', [IllnessSymptomController::class, 'getPatientIllnesses']);
    Route::get($appVersion . '/patients/medications', [MedicationController::class, 'getMedicationForIllness']);
    Route::get($appVersion . '/patients/check-symptoms', [IllnessSymptomController::class, 'findIllnessWithSymptoms']);
    Route::get($appVersion . '/patients/symptoms', [IllnessSymptomController::class, 'getSymptoms']);
    Route::post($appVersion . '/patients/rate-doctor', [ServiceRatingController::class, 'rateDoctor']);
    Route::get($appVersion . '/patients/doctor-ratings/{doctorId}', [ServiceRatingController::class, 'findDoctorRatings']);
    Route::post($appVersion . '/patients/send-message', [MessagesController::class, 'sendMessageToDoctor']);
    Route::get($appVersion . '/patients/messages', [MessagesController::class, 'getPatientMessages']);
    Route::post($appVersion . '/patients/create-appointment', [AppointmentsController::class, 'createAppointment']);
    Route::get($appVersion . '/patients/pending-appointments', [AppointmentsController::class, 'getPatientPendingAppointments']);
    Route::get($appVersion . '/patients/completed-appointments', [AppointmentsController::class, 'getPatientCompletedAppointments']);
    Route::put($appVersion . '/patients/update-biodata', [UserManagementController::class, 'updateBiodata']);
    Route::get($appVersion . '/patients/{illnessId}/dietary-recommendations', [DietaryRecommendationController::class, 'getDietaryRecommendations']);
  });
});

Route::post('v1/authentication/login', [AuthController::class, "login"]);
