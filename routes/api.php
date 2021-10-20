<?php

use App\Http\Controllers\ContractorController;
use App\Http\Controllers\PassportController;
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
Route::get('/contractors', [ContractorController::class, 'index']);
Route::get('/contractors/{contractor_id}', [ContractorController::class, 'show']);
Route::post('/contractors', [ContractorController::class, 'store']);
Route::put('/contractors/{contractor_id}', [ContractorController::class, 'update']);
Route::delete('/contractors/{contractor_id}', [ContractorController::class, 'destroy']);

Route::get('/passports', [PassportController::class, 'index']);
Route::get('/passports/{passport_id}', [PassportController::class, 'show']);
Route::post('/passports', [PassportController::class, 'store']);
Route::put('/passports/{passport_id}', [PassportController::class, 'update']);
Route::delete('/passports/{passport_id}', [PassportController::class, 'destroy']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user_id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{user_id}', [UserController::class, 'update']);
Route::delete('/users/{user_id}', [UserController::class, 'destroy']);

