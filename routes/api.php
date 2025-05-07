<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\PublisherController;
use App\Http\Controllers\Api\GenreController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('games', GameController::class);
    Route::apiResource('publishers', PublisherController::class);
    Route::apiResource('genres', GenreController::class);
});
