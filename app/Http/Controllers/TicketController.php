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
                'screeningID' => 'required|string|max:8|exists:screenings,screeningID',
                'seatID' => 'required|string|max:8',
                'status' => 'required|in:Success,cancelled',
            ]);

            $ticket = Ticket::create([
                'ticketID' => Ticket::generateTicketID(),
                'paymentID' => $request->paymentID,
                'userID' => $user->userID,
                'screeningID' => $request->screeningID,
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

    public function getTicketsByUserId($userID)
    {
        try {
            $tickets = Ticket::where('userID', $userID)->get();

            if ($tickets->isEmpty()) {
                return response()->json(['message' => 'No tickets found for this user'], 404);
            }

            return response()->json(['data' => $tickets], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while retrieving tickets',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Get ticket by ticketID
    public function getTicketById($ticketID)
    {
        try {
            $ticket = Ticket::find($ticketID);

            if (!$ticket) {
                return response()->json(['message' => 'Ticket not found'], 404);
            }

            return response()->json(['data' => $ticket], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while retrieving the ticket',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
