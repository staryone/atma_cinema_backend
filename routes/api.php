<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\FnbController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ScreeningController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/auth/google/callback', [UserController::class, 'handleGoogleCallback']);

Route::post('/movies/fetch/{title}', [MovieController::class, 'fetchAndSaveMovie']);
Route::get('/movies/search', [MovieController::class, 'searchMovies']);
Route::get('/movies/now-showing', [MovieController::class, 'getNowShowingMovies']);
Route::get('/movies/upcoming', [MovieController::class, 'getUpcomingMovies']);
Route::get('/movies/all', [MovieController::class, 'getAllMovies']);
Route::get('/movies/{id}', [MovieController::class, 'getMovieById']);

Route::get('/promos/fnb', [PromoController::class, 'getFnbPromo']);
Route::get('/promos/general', [PromoController::class, 'getGeneralPromo']);

Route::get('/fnbs/{category}', [FnbController::class, 'getFnbsByCategory']);

Route::get('/cast/generate', [CastController::class, 'generateCastByMovie']);

Route::get('/screenings/movie/{movieID}', [ScreeningController::class, 'getScreeningsByMovieId']);
Route::get('/screenings/{screeningID}', [ScreeningController::class, 'getScreeningById']);

Route::get('/reviews/all/{movieID}', [ReviewController::class, 'getAllReviewByMovie']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/profile', [UserController::class, 'profile']);
    Route::post('/profile/update', [UserController::class, 'updateProfile']);
    Route::post('/profile/change-password', [UserController::class, 'changePassword']);

    Route::get('/histories', [HistoryController::class, 'getHistoryOrders']);
    Route::post('/histories', [HistoryController::class, 'createHistory']);
    Route::post('/histories/{id}/add-review', [HistoryController::class, 'addReviewToHistoryOrders']);

    Route::resource('studios', StudioController::class);

    Route::post('/payments', [PaymentController::class, 'createPayment']);
    Route::get('/payments/{id}', [PaymentController::class, 'getPaymentById']);
    Route::patch('/payments/{id}/status', [PaymentController::class, 'editStatusPayment']);

    Route::put('/screenings/{screeningID}/seat-layout', [ScreeningController::class, 'updateSeatLayout']);

    Route::post('/tickets', [TicketController::class, 'createTicket']);
    Route::get('/tickets/user', [TicketController::class, 'getTicketsByUserId']);
    Route::get('/tickets/active', [TicketController::class, 'getActiveOrders']);
    // Route::get('/tickets/{ticketID}', [TicketController::class, 'getTicketById']);

    Route::post('/reviews/movie/{movieID}', [ReviewController::class, 'createReview']);
    Route::get('/reviews', [ReviewController::class, 'getReviewsByAuthenticatedUser']);
    Route::get('/reviews/movie/{movieID}', [ReviewController::class, 'getReviewByMovie']);
    Route::put('/reviews/movie/{movieID}', [ReviewController::class, 'editReview']);

    Route::post('/messages', [MessageController::class, 'store']);
});

