<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderNotification;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with(['user', 'items']);

        // Filter by status
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Filter by date range
        if ($request->has('date_from') && $request->date_from) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->has('date_to') && $request->date_to) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Filter by payment method
        if ($request->has('payment_method') && $request->payment_method !== 'all') {
            $query->where('payment_method', $request->payment_method);
        }

        // Search by item name (product_name in order_items)
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->whereHas('items', function ($q) use ($search) {
                $q->where('product_name', 'like', "%{$search}%");
            });
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $orders = $query->paginate(15)->withQueryString();

        // Statistics
        $stats = [
            'total' => Order::count(),
            'pending' => Order::where('status', 'pending')->count(),
            'cooking' => Order::where('status', 'cooking')->count(),
            'delivering' => Order::where('status', 'delivering')->count(),
            'completed' => Order::where('status', 'completed')->count(),
            'cancelled' => Order::where('status', 'cancelled')->count(),
            'total_revenue' => Order::where('status', 'completed')->sum('total'),
        ];

        return view('admin.orders.index', compact('orders', 'stats'));
    }

    public function show($id)
    {
        $order = Order::with(['user', 'items'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $request->validate([
                'status' => 'required|in:pending,cooking,delivering,completed,cancelled',
                'notes' => 'nullable|string',
            ]);

            $order = Order::findOrFail($id);
            $oldStatus = $order->status;
            $newStatus = $request->status;
            
            $order->status = $newStatus;
            
            // Update timestamps based on status
            if ($newStatus === 'cooking' && !$order->cooking_started_at) {
                $order->cooking_started_at = now();
            } elseif ($newStatus === 'delivering') {
                if (!$order->cooking_completed_at) {
                    $order->cooking_completed_at = now();
                }
                if (!$order->delivery_started_at) {
                    $order->delivery_started_at = now();
                }
            } elseif ($newStatus === 'completed' && !$order->delivered_at) {
                $order->delivered_at = now();
            }
            
            if ($request->notes) {
                $order->notes = ($order->notes ? $order->notes . "\n\n" : '') . 
                               "[Admin - " . now()->format('Y-m-d H:i') . "] " . $request->notes;
            }
            
            $order->save();

            // Create notification for user
            if ($order->user_id && $oldStatus !== $newStatus) {
                $this->createNotification($order, $newStatus);
            }

            return response()->json([
                'success' => true,
                'message' => 'Status pesanan berhasil diupdate',
                'order' => $order,
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Pesanan tidak ditemukan',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    private function createNotification(Order $order, string $status)
    {
        $notifications = [
            'cooking' => [
                'title' => '👨‍🍳 Pesanan Sedang Dimasak',
                'message' => 'Pesanan Anda sedang dalam proses memasak. Mohon tunggu sebentar!',
            ],
            'delivering' => [
                'title' => '🚚 Pesanan Sedang Diantar',
                'message' => 'Pesanan Anda sedang diantar menuju alamat Anda. Harap bersiap!',
            ],
            'completed' => [
                'title' => '✅ Pesanan Selesai',
                'message' => 'Pesanan Anda telah selesai diantar. Terima kasih telah berbelanja!',
            ],
            'cancelled' => [
                'title' => '❌ Pesanan Dibatalkan',
                'message' => 'Pesanan Anda telah dibatalkan. Silakan hubungi kami jika ada pertanyaan.',
            ],
        ];

        if (isset($notifications[$status])) {
            OrderNotification::create([
                'order_id' => $order->id,
                'user_id' => $order->user_id,
                'type' => $status,
                'title' => $notifications[$status]['title'],
                'message' => $notifications[$status]['message'],
            ]);
        }
    }

    public function confirmPayment(Request $request, $id)
    {
        try {
            $order = Order::findOrFail($id);

            if ($order->payment_status === 'paid') {
                return response()->json([
                    'success' => false,
                    'message' => 'Pembayaran sudah dikonfirmasi sebelumnya',
                ], 400);
            }

            // Update payment status
            $order->payment_status = 'paid';
            $order->payment_confirmed_at = now();
            
            // Auto update order status to cooking if still pending
            if ($order->status === 'pending') {
                $order->status = 'cooking';
                $order->cooking_started_at = now();
            }

            $order->save();

            // Create notification for user
            if ($order->user_id) {
                OrderNotification::create([
                    'order_id' => $order->id,
                    'user_id' => $order->user_id,
                    'type' => 'payment_confirmed',
                    'title' => '✅ Pembayaran Dikonfirmasi',
                    'message' => 'Pembayaran untuk pesanan ' . $order->order_number . ' telah dikonfirmasi. Pesanan Anda sedang diproses.',
                    'is_read' => false,
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Pembayaran berhasil dikonfirmasi',
                'order' => $order->fresh(),
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Pesanan tidak ditemukan',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function rejectPayment(Request $request, $id)
    {
        try {
            $order = Order::findOrFail($id);

            if ($order->payment_status === 'paid') {
                return response()->json([
                    'success' => false,
                    'message' => 'Pembayaran sudah dikonfirmasi, tidak bisa ditolak',
                ], 400);
            }

            // Update payment and order status
            $order->payment_status = 'failed';
            $order->status = 'cancelled';
            $order->save();

            // Create notification for user
            if ($order->user_id) {
                OrderNotification::create([
                    'order_id' => $order->id,
                    'user_id' => $order->user_id,
                    'type' => 'payment_rejected',
                    'title' => '❌ Pembayaran Ditolak',
                    'message' => 'Pembayaran untuk pesanan ' . $order->order_number . ' ditolak. Silakan hubungi admin untuk informasi lebih lanjut.',
                    'is_read' => false,
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Pembayaran berhasil ditolak',
                'order' => $order->fresh(),
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Pesanan tidak ditemukan',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        
        // Only allow deletion of cancelled orders
        if ($order->status !== 'cancelled') {
            return response()->json([
                'success' => false,
                'message' => 'Hanya pesanan yang dibatalkan yang dapat dihapus',
            ], 400);
        }

        $order->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pesanan berhasil dihapus',
        ]);
    }
}