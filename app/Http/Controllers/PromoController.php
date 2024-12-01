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
}
