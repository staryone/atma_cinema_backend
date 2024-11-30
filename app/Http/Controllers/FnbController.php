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
}
