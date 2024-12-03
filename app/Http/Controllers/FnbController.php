<?php

namespace App\Http\Controllers;

use App\Models\Fnb;
use Illuminate\Http\Request;

class FnbController extends Controller
{
    public function index()
    {
        $fnbs = Fnb::all();
        return response()->json($fnbs);
    }

    public function getFnbsByCategory($category)
    {
        $fnbs = Fnb::where('category', $category)->get();

        if ($fnbs->isNotEmpty()) {
            return response()->json($fnbs);
        }

        return response()->json([
            'message' => 'No FnB found for the specified category.',
        ], 404);
    }
}
