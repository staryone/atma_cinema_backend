<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function getHistoryOrder()
    {
        $user = auth()->user();

        $historyOrders = History::join('payments', 'histories.paymentID', '=', 'payments.paymentID')
            ->join('users', 'histories.userID', '=', 'users.userID')
            ->join('screenings', 'payments.screeningID', '=', 'screenings.screeningID')
            ->join('movies', 'screenings.movieID', '=', 'movies.movieID')
            ->leftJoin('reviews', 'movies.movieID', '=', 'reviews.movieID')
            ->select(
                'histories.paymentID',
                'movies.cover',
                'movies.movieTitle as title',
                History::raw('AVG(reviews.rating) as rating'),
                'movies.genre',
                'movies.duration',
                'movies.director'
            )
            ->where('payments.paymentStatus', 'completed')
            ->whereRaw("CONCAT(screenings.date, ' ', screenings.time) < NOW()")
            ->where('users.userID', $user->userID)
            ->groupBy('histories.paymentID', 'movies.movieID', 'movies.cover', 'movies.movieTitle', 'movies.genre', 'movies.duration', 'movies.director')
            ->get();

        return response()->json($historyOrders);
    }

}
