<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/auth/google/callback', [UserController::class, 'handleGoogleCallback']);
Route::post('/movies/fetch/{title}', [MovieController::class, 'fetchAndSaveMovie']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/profile', [UserController::class, 'profile']);
    Route::post('/user/profile/update', [UserController::class, 'updateProfile']);

    Route::get('/movies/search', [MovieController::class, 'searchMovies']);
    Route::get('/movies/now-showing', [MovieController::class, 'getNowShowingMovies']);
    Route::get('/movies/upcoming', [MovieController::class, 'getUpcomingMovies']);
    Route::get('/movies/all', [MovieController::class, 'getAllMovies']);
    Route::get('/movies/{id}', [MovieController::class, 'getMovieById']);

    Route::get('/history-orders', [HistoryController::class, 'getHistoryOrder']);

    Route::resource('studios', StudioController::class);
});

