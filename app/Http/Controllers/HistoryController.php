<?php

namespace App\Http\Controllers;

use App\Models\History;
use Exception;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function getHistoryOrders()
    {
        try {
            $userID = auth()->user()->userID;

            $tickets = History::with([
                'payment.user',
                'payment.screening.movie',
                'payment.screening.studio',
                'review'
            ])->whereHas('payment', function ($query) use ($userID) {
                $query->where('paymentStatus', 'completed')->where('userID', $userID);
            })->whereHas('payment.screening', function ($query) {
                $query->whereRaw("CONCAT(date, ' ', time) < NOW()");
            })->get();

            // if ($tickets->isEmpty()) {
            //     return response()->json('No History Orders found', 200);
            // }

            return response()->json($tickets);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while retrieving history orders',
                'error' => $e->getMessage()
            ], 500);
        }

    }

    public function createHistory(Request $request)
    {
        try {
            $userID = auth()->user()->userID;

            $request->validate([
                'paymentID' => 'required|string|max:50',
            ]);

            $history = History::create([
                'historyID' => History::generateHistoryID(),
                'userID' => $userID,
                'paymentID' => $request->paymentID,
                'reviewID' => null,
            ]);

            return response()->json([
                'message' => 'History created successfully',
                'data' => $history
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to create history',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function addReviewToHistoryOrders(Request $request, $id)
    {
        try {
            $historyOrder = History::find($id);

            $request->validate([
                'reviewID' => 'required|string|max:8'
            ]);

            $historyOrder->reviewID = $request->reviewID;
            $historyOrder->save();
            return response()->json($historyOrder);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'History order updated failed',
                'error' => $e,
            ]);
        }
    }

}
