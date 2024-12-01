<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Screening;
use Exception;

class ScreeningController extends Controller
{
    public function getScreeningsByMovieId($movieID)
    {
        try {
            $screenings = Screening::where('movieID', $movieID)->get();

            if ($screenings->isEmpty()) {
                return response()->json(['message' => 'No screenings found for this movie'], 404);
            }

            return response()->json(['data' => $screenings], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while retrieving screenings',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updateSeatLayout(Request $request, $screeningID)
    {
        try {
            $screening = Screening::find($screeningID);

            if (!$screening) {
                return response()->json(['message' => 'Screening not found'], 404);
            }

            $request->validate([
                'seats' => 'required|array',
                'status' => 'required|string|in:available,booked,reserved'
            ]);

            $seatLayout = $screening->seatLayout;
            $seatLayoutArray = json_decode($seatLayout, true);

            foreach ($request->seats as $seat) {
                if (isset($seatLayoutArray[$seat])) {
                    $seatLayoutArray[$seat] = $request->status;
                } else {
                    return response()->json([
                        'message' => "Seat $seat does not exist in the layout"
                    ], 400);
                }
            }

            $screening->seatLayout = json_encode($seatLayoutArray);
            $screening->save();

            return response()->json([
                'message' => 'Seat layout updated successfully',
                'data' => $screening
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating the seat layout',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
