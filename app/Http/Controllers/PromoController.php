<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promos = Promo::all();
        return response()->json($promos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'pathImage' => 'required',
        ]);

        $promo = Promo::create([
            'promoID' => Promo::generatePromoID(),
            'name' => $validateData['name'],
            'description' => $validateData['description'],
            'pathImage' => $validateData['pathImage'],
        ]);

        return response()->json([
            'message' => 'Berhasil create Promo',
            'post' => $promo,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $promo = Promo::find($id);
        if(!$promo) {
            return response()->json(['message' => 'Promo not found'], 404);
        }

        return response()->json(['promo' => $promo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promo $promo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promo $promo)
    {
        //
    }
}
