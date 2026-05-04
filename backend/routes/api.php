<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\TownshipController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ProviderController;

Route::get('/cities', [CityController::class, 'index']);
Route::post('/cities', [CityController::class, 'store']);
Route::get('/cities/{id}', [CityController::class, 'show']);
Route::put('/cities/{id}', [CityController::class, 'update']);
Route::delete('/cities/{id}', [CityController::class, 'destroy']);

Route::get('/townships', [TownshipController::class, 'index']);
Route::post('/townships', [TownshipController::class, 'store']);
Route::get('/townships/{id}', [TownshipController::class, 'show']);
Route::put('/townships/{id}', [TownshipController::class, 'update']);
Route::delete('/townships/{id}', [TownshipController::class, 'destroy']);
Route::get('/townships/city/{city_id}', [TownshipController::class, 'byCity']);

Route::get('/services', [ServiceController::class, 'index']);
Route::post('/services', [ServiceController::class, 'store']);
Route::get('/services/{id}', [ServiceController::class, 'show']);
Route::put('/services/{id}', [ServiceController::class, 'update']);
Route::delete('/services/{id}', [ServiceController::class, 'destroy']);
Route::get('/services/township/{township_id}', [ServiceController::class, 'byTownship']);

Route::prefix('providers')->group(function () {
    Route::get('/', [ProviderController::class, 'index']);
    Route::get('/{id}', [ProviderController::class, 'show']);

    Route::get('/{id}/services', [ProviderController::class, 'services']);
    Route::get('/{id}/areas', [ProviderController::class, 'areas']);
});

