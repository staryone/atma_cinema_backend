<?php

namespace App\Http\Controllers;

use App\Models\Cast;
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'movieID' => 'required',
            'name' => 'required',
            'imagePath' => 'required',
        ]);

        $cast = Cast::create([
            'castID' => Cast::generateCastID(),
            'movieID' => $validateData['movieID'],
            'name' => $validateData['name'],
            'description' => $validateData['description'],
            'pathImage' => $validateData['pathImage'],
        ]);

        return response()->json([
            'message' => 'Berhasil create Promo',
            'post' => $cast,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cast = Cast::find($id);
        if(!$cast) {
            return response()->json(['message' => 'Cast not found'], 404);
        }

        return response()->json(['cast' => $cast]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cast $cast)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cast $cast)
    {
        //
    }
}
