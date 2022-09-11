<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('main.index');

Route::resource('/genres', \App\Http\Controllers\GenreController::class);

Route::get('/movies/publish', [\App\Http\Controllers\MovieController::class, 'publish_list'])->name('movies.publish_list');
Route::post('/movies/publish/{movie}', [\App\Http\Controllers\MovieController::class, 'publish_toggle'])->name('movies.publish_toggle');
Route::resource('movies', \App\Http\Controllers\MovieController::class);
