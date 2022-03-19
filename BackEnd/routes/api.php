<?php

use App\Http\Controllers\CountriesApiController;
use App\Http\Controllers\JobApplicationApiController;
use App\Http\Controllers\JobFieldsApiController;
use App\Http\Controllers\JobListingsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/all-countries', [CountriesApiController::class, 'getAllCountries']);
Route::get('/all-job-fields', [JobFieldsApiController::class, 'getAllJobFields']);
Route::post('/create-user/jobSeeker', [UserController::class, 'createJobSeeker']);
Route::post('/create-user/recruiter', [UserController::class, 'createRecruiter']);
Route::post('create-job-listing', [JobListingsController::class, 'createJobListing']);
Route::get('get-job-listings/{company_id}', [JobListingsController::class, 'getJobListingsForCompany']);
Route::get('get-running-jobs', [JobListingsController::class, 'getAllRunningJobs']);
Route::get('get-job/{uuid}', [JobListingsController::class, 'getJobListingsFromUUID']);
Route::get('get-job-applicants/{job_uuid}', [JobApplicationApiController::class, 'getJobApplicationsFromUUID']);
Route::post('apply-for-job', [JobApplicationApiController::class, 'addJobApplicant']);
Route::post('/login', [UserController::class, 'login']);