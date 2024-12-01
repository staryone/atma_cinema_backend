<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PaymentController extends Controller
{
    public function createPayment(Request $request)
    {
        try {
            $user = auth()->user();
            $request->validate([
                'screeningID' => 'required|string|max:8|exists:screenings,screeningID',
                'paymentMethod' => 'required|string',
                'paymentStatus' => 'required|in:pending,completed,failed',
                'paymentDate' => 'required|date',
                'totalPayment' => 'required|numeric|min:0',
            ]);

            $request['paymentDate'] = Carbon::createFromFormat('d/m/Y', $request['paymentDate'])->format('Y-m-d');

            $user = Payment::create([
                'paymentID' => Payment::generateUserID(),
                'userID' => $user->userID,
                'screeningID' => $request->screeningID,
                'paymentMethod' => $request->paymentMethod,
                'paymentStatus' => $request->paymentStatus,
                'paymentDate' => $request->paymentDate,
                'totalPayment' => $request->totalPayment,
            ]);

            $payment = Payment::create($request->all());

            return response()->json([
                'message' => 'Payment created successfully',
                'data' => $payment
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => `Payment created failed: $e`,
            ], 400);
        }
    }

    public function getPaymentById($id)
    {
        $payment = Payment::find($id);

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        return response()->json([
            'data' => $payment
        ], 200);
    }
}
