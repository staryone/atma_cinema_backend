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

    public function show(string $id)
    {
        $studio = Studio::find($id);
        return response()->json($studio);
    }
}
