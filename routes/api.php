<?php

use App\Http\Controllers\ContractorController;
use App\Http\Controllers\PassportController;
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
Route::post('/contractors', [ContractorController::class, 'store']);
Route::put('/contractors/{contractor_id}', [ContractorController::class, 'update']);
Route::delete('/contractors/{contractor_id}', [ContractorController::class, 'destroy']);
Route::get('/contractors/{contractor_id}', [ContractorController::class, 'show']);

Route::get('/passports', [PassportController::class, 'index']);
Route::post('/passports', [PassportController::class, 'store']);
Route::put('/passports/{passport_id}', [PassportController::class, 'update']);
Route::delete('/passports/{passport_id}', [PassportController::class, 'destroy']);
Route::get('/passports/{passport_id}', [PassportController::class, 'show']);
