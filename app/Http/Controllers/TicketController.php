<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Exception;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function createTicket(Request $request)
    {
        $user = auth()->user();
        try {
            $request->validate([
                'paymentID' => 'required|string|max:8|exists:payments,paymentID',
                'seatID' => 'required|string|max:8',
                'status' => 'required|in:Success,Cancelled',
            ]);

            $ticket = Ticket::create([
                'ticketID' => Ticket::generateTicketID(),
                'paymentID' => $request->paymentID,
                'seatID' => $request->seatID,
                'status' => $request->status,
            ]);

            return response()->json([
                'message' => 'Ticket created successfully',
                'data' => $ticket
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while creating the ticket',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getTicketsByUserId()
    {
        try {
            $userID = auth()->user()->userID;
            $tickets = Ticket::where('userID', $userID)->get();

            if ($tickets->isEmpty()) {
                return response()->json('No tickets found', 404);
            }

            return response()->json([$tickets], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while retrieving tickets',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Get ticket by ticketID
    // public function getTicketById($ticketID)
    // {
    //     try {
    //         $ticket = Ticket::find($ticketID);

    //         if (!$ticket) {
    //             return response()->json('Ticket not found', 404);
    //         }

    //         return response()->json($ticket, 200);
    //     } catch (Exception $e) {
    //         return response()->json([
    //             'message' => 'An error occurred while retrieving the ticket',
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    public function getActiveOrders()
    {
        try {
            $userID = auth()->user()->userID;

            $tickets = Ticket::with([
                'payment.user',
                'payment.screening.movie',
                'payment.screening.studio'
            ])->whereHas('payment', function ($query) use ($userID) {
                $query->where('userID', $userID);
            })->get();

            // if ($tickets->isEmpty()) {
            //     return response()->json('No tickets found', 404);
            // }

            return response()->json($tickets);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while retrieving tickets',
                'error' => $e->getMessage()
            ], 500);
        }

    }
}
