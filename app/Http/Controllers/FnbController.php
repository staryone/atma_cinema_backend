<?php

namespace App\Http\Controllers;

use App\Models\Fnb;
use Illuminate\Http\Request;

class FnbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fnbs = Fnb::all();
        return response()->json($fnbs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required',
            'pathImage' => 'required',
            ]);
    
            $fnb = Fnb::create([
                'fnbID' => Fnb::generateFnbID(),
                'name' => $validateData['name'],
                'category' => $validateData['category'],
                'description' => $validateData['description'],
                'price' => $validateData['price'],
                'pathImage' => $validateData['pathImage'],
            ]);
    
            return response()->json([
                'message' => 'Berhasil create Fnb',
                'post' => $fnb,
            ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $fnb = Fnb::find($id);
        if(!$fnb) {
            return response()->json(['message' => 'Fnb not found'], 404);
        }

        return response()->json(['fnb' => $fnb]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fnb $fnb)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fnb $fnb)
    {
        //
    }
}
