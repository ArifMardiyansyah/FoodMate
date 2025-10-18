<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderFeedbackController extends Controller
{
    /**
     * Show the order completed page
     */
    public function show()
    {
        return view('order.completed');
    }

    /**
     * Submit order feedback
     */
    public function submit(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'nullable|string|max:500',
        ]);

        // Here you can save the feedback to database if needed
        // Example:
        // OrderFeedback::create([
        //     'order_id' => auth()->user()->lastOrder()->id,
        //     'rating' => $validated['rating'],
        //     'feedback' => $validated['feedback'],
        // ]);

        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Thank you for your feedback!'
        ]);
    }
}