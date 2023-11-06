<?php

use App\Http\Controllers\PlaceController;
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

//Read
Route::get('/places', [PlaceController::class, 'index']);
Route::get('/places/{id}', [PlaceController::class, 'show']);

//Update
Route::put('/places/{id}', [PlaceController::class, 'update']);

//Delete
Route::delete('/places/{id}', [PlaceController::class, 'destroy']);