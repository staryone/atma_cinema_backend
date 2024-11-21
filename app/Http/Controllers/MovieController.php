<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movie = Movie::all();
        return response()->json($movie);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'movieTitle' => 'required|string',
            'duration' => 'required|integer',
            'synopsis' => 'nullable|text',
            'director' => 'required|text',
            'writers' => 'nullable|text',
            'ageRating' => 'required|string',
            'genre' => 'required|string',
            'cover' => 'nullable|string',
        ]);

        $movie = Movie::create([
            'movieTitle' => $validatedData['movieTitle'],
            'duration' => $validatedData['duration'],
            'synopsis' => $validatedData['synopsis'],
            'director' => $validatedData['director'],
            'writers' => $validatedData['writers'],
            'ageRating' => $validatedData['ageRating'],
            'genre' => $validatedData['genre'],
            'cover' => $validatedData['cover'],
        ]);

        return response()->json([
            'message' => 'Berhasil create Movie',
            'post' => $movie,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::find($id);
        return response()->json($movie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movie = Movie::find($id);

        $validatedData = $request->validate([
            'movieTitle' => 'required|string',
            'duration' => 'required|integer',
            'synopsis' => 'nullable|text',
            'director' => 'required|text',
            'writers' => 'nullable|text',
            'ageRating' => 'required|string',
            'genre' => 'required|string',
            'cover' => 'nullable|string',
        ]);

        $movie->update($validatedData);

        return response()->json([
            'message' => 'Berhasil mengupdate Movie',
            'post' => $movie,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json(['message' => 'Movie tidak ditemukan']);
        }

        $movie->delete();
        return response()->json(['message' => 'Movie berhasil dihapus']);
    }
}
