<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Http;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function fetchAndSaveMovie($movieTitle)
    {
        $apiKey = '658b99e2';
        $url = "https://www.omdbapi.com/";

        $response = Http::get($url, [
            't' => $movieTitle,
            'apikey' => $apiKey,
        ]);

        if ($response->successful()) {
            $movieData = $response->json();

            if ($movieData['Response'] === 'True') {
                Movie::insert([
                    'movieID' => Movie::generateMovieID(),
                    'movieTitle' => $movieData['Title'] ?? '',
                    'duration' => isset($movieData['Runtime']) ? (int) filter_var($movieData['Runtime'], FILTER_SANITIZE_NUMBER_INT) : 0,
                    'synopsis' => $movieData['Plot'] ?? '',
                    'director' => $movieData['Director'] ?? '',
                    'writers' => $movieData['Writer'] ?? '',
                    'ageRating' => $movieData['Rated'] ?? '',
                    'genre' => $movieData['Genre'] ?? '',
                    'trailer' => null,
                    'cover' => $movieData['Poster'] ?? '',
                ]);

                return response()->json(['message' => 'Movie saved successfully!'], 201);
            } else {
                return response()->json(['error' => 'Movie not found in OMDB API.'], 404);
            }
        } else {
            return response()->json(['error' => 'Failed to fetch data from OMDB API.'], 500);
        }
    }
    public function searchMovies(Request $request)
    {
        $searchTerm = $request->input('query');

        if (!$searchTerm) {
            return response()->json([
                'error' => 'Query parameter is required.'
            ], 400);
        }

        $movies = Movie::where('movieTitle', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('director', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('genre', 'LIKE', '%' . $searchTerm . '%')
            ->get();

        return response()->json($movies);
    }
    public function getNowShowingMovies()
    {
        $movies = Movie::join('screenings', 'movies.movieID', '=', 'screenings.movieID')
            ->select(
                'movies.*'
            )
            ->whereMonth('screenings.date', now()->month)
            ->whereYear('screenings.date', now()->year)
            ->take(3)
            ->get();

        return response()->json($movies);
    }

    public function getUpcomingMovies()
    {
        $movies = Movie::join('screenings', 'movies.movieID', '=', 'screenings.movieID')
            ->select('movies.*')
            ->where('screenings.date', '>', now()->toDateString())
            ->orderBy('screenings.date')
            ->take(5)
            ->get();

        return response()->json($movies);
    }

    public function getAllMovies()
    {
        $movies = Movie::join('screenings', 'movies.movieID', '=', 'screenings.movieID')
            ->select(
                'movies.*'
            )
            ->whereMonth('screenings.date', now()->month)
            ->whereYear('screenings.date', now()->year)
            ->get();

        return response()->json($movies);
    }

    public function getMovieById($id)
    {
        $movie = Movie::find($id)->first();
        return response()->json($movie);
    }
}
