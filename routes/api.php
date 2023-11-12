<?php

use App\Http\Controllers\PlaceController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\PassportAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello', function () {
    return "Hello World";
});

Route::get('/goodbye/{name}', function ($name) {
    return "Goodbye ".$name;
});

Route::post('/info', function (Request $request) {
    return "hello ".$request["name"] .". You are " .$request["age"] ." years old";
});

//Create
Route::post('/places', [PlaceController::class, 'store']);
Route::post('/facility', [FacilityController::class, 'store']);
Route::post('/rooms', [RoomController::class, 'store']);

//Read
Route::get('/places', [PlaceController::class, 'index']);
Route::get('/places/{id}', [PlaceController::class, 'show']);
Route::get('/facility', [FacilityController::class, 'index']);
Route::get('/facility/{id}', [FacilityController::class, 'show']);
Route::get('/rooms', [RoomController::class, 'index']);

//Update
Route::put('/places/{id}', [PlaceController::class, 'update']);
Route::put('/facility/{id}', [FacilityController::class, 'update']);

//Delete
Route::delete('/places/{id}', [PlaceController::class, 'destroy']);
Route::delete('/facility/{id}', [FacilityController::class, 'destroy']);

Route::post('/places/{id}/reviews', [ReviewController::class, 'store']);
Route::get('/places/{id}/reviews', [ReviewController::class, 'index']);

Route::post('/register', [PassportAuthController::class, 'register']);
Route::post('/login', [PassportAuthController::class, 'login']);