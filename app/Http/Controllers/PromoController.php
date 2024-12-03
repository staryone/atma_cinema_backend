<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function getFnbPromo()
    {
        $promo = Promo::where('isFnb', '=', true)->get();

        if (!$promo) {
            return response()->json(['message' => 'Promo fnb not found'], 404);
        }

        return response()->json($promo);
    }

    public function getGeneralPromo()
    {
        $promo = Promo::where('isFnb', '=', false)->get();

        if (!$promo) {
            return response()->json(['message' => 'Promo fnb not found'], 404);
        }

        return response()->json($promo);
    }
}
