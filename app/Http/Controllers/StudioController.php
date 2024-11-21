<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studio = Studio::all();
        return response()->json($studio);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'capacity' => 'required|integer',
        ]);

        $studio = Studio::create([
            'name' => $validatedData['name'],
            'capacity' => $validatedData['capacity'],
        ]);

        return response()->json([
            'message' => 'Berhasil create Studio',
            'post' => $studio,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $studio = Studio::find($id);
        return response()->json($studio);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $studio = Studio::find($id);

        $validatedData = $request->validate([
            'name' => 'required|string',
            'capacity' => 'required|integer',
        ]);

        $studio->update($validatedData);

        return response()->json([
            'message' => 'Berhasil mengupdate Studio',
            'post' => $studio,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $studio = Studio::find($id);

        if (!$studio) {
            return response()->json(['message' => 'Studio tidak ditemukan']);
        }

        $studio->delete();
        return response()->json(['message' => 'Studio berhasil dihapus']);
    }
}
