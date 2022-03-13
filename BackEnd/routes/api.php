<?php

use App\Http\Controllers\CountriesApiController;
use App\Http\Controllers\JobFieldsApiController;
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