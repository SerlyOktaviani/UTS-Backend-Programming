<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentController;  
use App\Http\Controllers\PasienController;  

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


#method get
Route::get('animals', [AnimalController::class, 'index']);
Route::get('student', [StudentController::class, 'index']);
Route::get('pasien', [PasienController::class, 'index']);

#pasien  berdasarkan status
Route::get('pasien/dead', [PasienController::class, 'dead']);
Route::get('pasien/positive', [PasienController::class, 'positive']);
Route::get('pasien/recovered', [PasienController::class, 'recovered']);

#method post
Route::post('animals', [AnimalController::class, 'store']);
Route::post('student', [StudentController::class, 'store']);
Route::post('pasien', [PasienController::class, 'store']);

#method put
Route::put('animals/{id}', [AnimalController::class, 'update']);
Route::put('student/{id}', [StudentController::class, 'update']);
Route::put('pasien/{id}', [PasienController::class, 'update']);

#method delete
Route::delete('animals/{id}', [AnimalController::class, 'destroy']);
Route::delete('student/{id}', [StudentController::class, 'destroy']);
Route::delete('pasien/{id}', [PasienController::class, 'destroy']);