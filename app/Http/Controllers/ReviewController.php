<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Exception;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function createReview(Request $request, $movieID)
    {
        try {
            $userID = auth()->user()->userID;

            $request->validate([
                'comment' => 'nullable|string',
                'rating' => 'required|integer|min:1|max:5',
            ]);

            $review = Review::create([
                'reviewID' => '',
                'userID' => $userID,
                'movieID' => $movieID,
                'comment' => $request->comment,
                'rating' => $request->rating,
                'reviewDate' => now(),
            ]);

            return response()->json([
                'message' => 'Review created successfully',
                'data' => $review,
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while creating the review',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getReviewsByAuthenticatedUser()
    {
        try {
            $userID = auth()->user()->userID;

            $reviews = Review::where('userID', $userID)->get();

            if ($reviews->isEmpty()) {
                return response()->json(['message' => 'No reviews found for this user'], 404);
            }

            return response()->json(['data' => $reviews], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while retrieving reviews',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getReviewByMovie($movieID)
    {
        try {
            $userID = auth()->user()->userID;

            $review = Review::where('movieID', $movieID)
                ->where('userID', $userID)
                ->first();

            if (!$review) {
                return response()->json(['message' => 'Review not found'], 404);
            }

            return response()->json(['data' => $review], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while retrieving the review',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function editReview(Request $request, $reviewID)
    {
        try {
            $userID = auth()->user()->userID;

            $review = Review::where('reviewID', $reviewID)
                ->where('userID', $userID)
                ->first();

            if (!$review) {
                return response()->json(['message' => 'Review not found'], 404);
            }

            $request->validate([
                'comment' => 'nullable|string',
                'rating' => 'nullable|integer|min:1|max:5',
            ]);

            $review->update([
                'comment' => $request->comment ?? $review->comment,
                'rating' => $request->rating ?? $review->rating,
            ]);

            return response()->json([
                'message' => 'Review updated successfully',
                'data' => $review,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating the review',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
