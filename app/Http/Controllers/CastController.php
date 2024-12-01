<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\Movie;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $casts = Cast::all();
        return response()->json($casts);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cast = Cast::find($id);
        if (!$cast) {
            return response()->json(['message' => 'Cast not found'], 404);
        }

        return response()->json(['cast' => $cast]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function generateCastByMovie(Request $request)
    {
        $movieName = $request->input('name');
        if (!$movieName) {
            return response()->json(['error' => 'Film name is required'], 400);
        }

        $apiKey = env('TMDB_API_KEY');
        $client = new Client();

        try {
            $searchResponse = $client->get("https://api.themoviedb.org/3/search/movie", [
                'query' => [
                    'api_key' => $apiKey,
                    'query' => $movieName,
                ]
            ]);

            $searchResults = json_decode($searchResponse->getBody(), true);

            if (empty($searchResults['results'])) {
                return response()->json(['error' => 'Film not found'], 404);
            }

            $movie = $searchResults['results'][0];
            $movieId = $movie['id'];

            $creditsResponse = $client->get("https://api.themoviedb.org/3/movie/{$movieId}/credits", [
                'query' => [
                    'api_key' => $apiKey,
                ]
            ]);

            $credits = json_decode($creditsResponse->getBody(), true);
            $castList = $credits['cast'] ?? [];

            $mydbmovies = Movie::where('movieTitle', 'LIKE', '%' . $movieName . '%')
                ->take(1)
                ->get();

            $mydbmovie = $mydbmovies->first();



            foreach ($castList as $cast) {
                if ($cast['profile_path'] != null && $cast['profile_path'] != '') {
                    $fullPathImage = "https://image.tmdb.org/t/p/w500" . $cast['profile_path'];
                    Cast::updateOrCreate(
                        ['castID' => Cast::generateCastID()],
                        [
                            'movieID' => $mydbmovie->movieID,
                            'name' => $cast['name'],
                            'pathImage' => $fullPathImage
                        ]
                    );
                }

            }

            return response()->json([
                'movie' => $movie,
                'cast_saved_to_database' => $castList
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch data from TMDb', 'details' => $e->getMessage()], 500);
        }
    }
}
