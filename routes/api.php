<?php

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

Route::group(['prefix' => 'v1'], function () {
    Route::get('/genres', [\App\Http\Controllers\API\v1\GenreController::class, 'index']);
    Route::get('/genres/{genre}', [\App\Http\Controllers\API\v1\GenreController::class, 'show']);

    Route::get('/movies', [\App\Http\Controllers\API\v1\MovieController::class, 'index']);
    Route::get('/movies/{movie}', [\App\Http\Controllers\API\v1\MovieController::class, 'show']);
});
