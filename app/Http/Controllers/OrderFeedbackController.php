<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderFeedbackController extends Controller
{
    /**
     * Show the order completed page
     */
    public function show()
    {
        $order = null;

        if ($lastOrderId = session()->pull('last_order_id')) {
            $order = Order::with('items')->find($lastOrderId);
        }

        return view('order.completed', [
            'order' => $order,
        ]);
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

        $order = Order::where('session_id', session()->getId())
            ->latest()
            ->first();

        if ($order) {
            $order->update([
                'feedback_rating' => $validated['rating'],
                'feedback_comment' => $validated['feedback'] ?? null,
                'feedback_submitted_at' => now(),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your feedback!'
        ]);
    }
}