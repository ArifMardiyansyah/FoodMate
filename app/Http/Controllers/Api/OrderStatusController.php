<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    /**
     * Check for order updates for the current user
     */
    public function checkUpdates(Request $request)
    {
        $userId = auth()->id();
        
        // Get the last check timestamp from request
        $lastCheck = $request->get('last_check');
        
        if ($lastCheck) {
            // Check if there are any orders updated after last check
            $hasUpdates = Order::where('user_id', $userId)
                ->where('updated_at', '>', $lastCheck)
                ->exists();
            
            if ($hasUpdates) {
                // Get updated orders
                $updatedOrders = Order::with('items')
                    ->where('user_id', $userId)
                    ->where('updated_at', '>', $lastCheck)
                    ->get()
                    ->map(function ($order) {
                        return [
                            'id' => $order->id,
                            'order_number' => $order->order_number,
                            'status' => $order->status,
                            'status_label' => $order->status_label,
                            'updated_at' => $order->updated_at->toIso8601String(),
                        ];
                    });
                
                return response()->json([
                    'has_updates' => true,
                    'updated_orders' => $updatedOrders,
                    'timestamp' => now()->toIso8601String(),
                ]);
            }
        }
        
        return response()->json([
            'has_updates' => false,
            'timestamp' => now()->toIso8601String(),
        ]);
    }
    
    /**
     * Get current status of a specific order
     */
    public function getOrderStatus($orderId)
    {
        $userId = auth()->id();
        
        $order = Order::with('items')
            ->where('id', $orderId)
            ->where('user_id', $userId)
            ->first();
        
        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found',
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'order' => [
                'id' => $order->id,
                'order_number' => $order->order_number,
                'status' => $order->status,
                'status_label' => $order->status_label,
                'created_at' => $order->created_at->format('d M Y, H:i'),
                'cooking_started_at' => $order->cooking_started_at?->format('H:i'),
                'cooking_completed_at' => $order->cooking_completed_at?->format('H:i'),
                'delivery_started_at' => $order->delivery_started_at?->format('H:i'),
                'delivered_at' => $order->delivered_at?->format('H:i'),
                'total' => $order->total,
                'items' => $order->items->map(function ($item) {
                    return [
                        'product_name' => $item->product_name,
                        'quantity' => $item->quantity,
                        'total' => $item->total,
                    ];
                }),
            ],
        ]);
    }
    
    /**
     * Get all orders for current user with their current status
     */
    public function getAllOrders(Request $request)
    {
        $userId = auth()->id();
        
        $orders = Order::with('items')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($order) {
                return [
                    'id' => $order->id,
                    'order_number' => $order->order_number,
                    'status' => $order->status,
                    'status_label' => $order->status_label,
                    'total' => $order->total,
                    'created_at' => $order->created_at->format('d M Y, H:i'),
                    'updated_at' => $order->updated_at->toIso8601String(),
                    'items_count' => $order->items->count(),
                ];
            });
        
        return response()->json([
            'success' => true,
            'orders' => $orders,
            'timestamp' => now()->toIso8601String(),
        ]);
    }
}