<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderNotification;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function __construct()
    {
        // Set Midtrans configuration
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    /**
     * Create Snap Token untuk pembayaran
     */
    public function createSnapToken(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'notes' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $cartItems = session()->get('cart', []);

        if (empty($cartItems)) {
            return response()->json(['success' => false, 'message' => 'Keranjang kosong'], 400);
        }

        // Calculate cart summary
        $summary = $this->calculateCartSummary($cartItems);
        $sessionId = $request->session()->getId();
        $userId = auth()->id();

        // Validasi stok sebelum checkout
        foreach ($cartItems as $item) {
            $product = Product::find($item['product_id']);
            
            if ($product && $product->use_stock_system) {
                if (!$product->isAvailableToday()) {
                    return response()->json([
                        'success' => false,
                        'message' => "Maaf, {$product->name} sudah tidak tersedia hari ini.",
                    ], 400);
                }

                $currentStock = $product->getCurrentStock();
                if ($item['quantity'] > $currentStock) {
                    return response()->json([
                        'success' => false,
                        'message' => "Maaf, stok {$product->name} hanya tersisa {$currentStock} porsi.",
                    ], 400);
                }
            }
        }

        // Create order
        $order = DB::transaction(function () use ($data, $cartItems, $summary, $sessionId, $userId) {
            $orderNumber = 'ORD-' . now()->format('YmdHis') . Str::upper(Str::random(4));
            
            $order = Order::create([
                'order_number' => $orderNumber,
                'session_id' => $sessionId,
                'user_id' => $userId,
                'customer_name' => $data['name'],
                'customer_phone' => $data['phone'],
                'customer_address' => $data['address'],
                'latitude' => $data['latitude'] ?? null,
                'longitude' => $data['longitude'] ?? null,
                'payment_method' => 'midtrans',
                'payment_status' => 'pending',
                'notes' => $data['notes'] ?? null,
                'subtotal' => $summary['subtotal'],
                'delivery_charge' => $summary['deliveryCharge'],
                'discount' => $summary['discount'],
                'total' => $summary['total'],
                'status' => 'pending',
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'] ?? null,
                    'product_name' => $item['name'],
                    'product_slug' => $item['slug'] ?? null,
                    'product_image' => $item['image'] ?? null,
                    'product_price' => $item['price_numeric'],
                    'quantity' => $item['quantity'],
                    'total' => $item['price_numeric'] * $item['quantity'],
                ]);

                // Kurangi stok produk
                $product = Product::find($item['product_id']);
                if ($product && $product->use_stock_system) {
                    $product->reduceStock($item['quantity']);
                }
            }

            // Buat notifikasi untuk admin
            $admins = User::where('role', 'admin')->get();
            foreach ($admins as $admin) {
                OrderNotification::create([
                    'order_id' => $order->id,
                    'user_id' => $admin->id,
                    'type' => 'new_order',
                    'title' => 'Pesanan Baru Masuk!',
                    'message' => "Pesanan baru dari {$data['name']} dengan total Rp " . number_format($summary['total']),
                    'is_read' => false,
                ]);
            }

            return $order;
        });

        // Prepare item details for Midtrans
        $itemDetails = [];
        foreach ($cartItems as $item) {
            $itemDetails[] = [
                'id' => $item['product_id'] ?? Str::random(10),
                'price' => $item['price_numeric'],
                'quantity' => $item['quantity'],
                'name' => $item['name'],
            ];
        }

        // Add delivery charge
        if ($summary['deliveryCharge'] > 0) {
            $itemDetails[] = [
                'id' => 'DELIVERY',
                'price' => $summary['deliveryCharge'],
                'quantity' => 1,
                'name' => 'Biaya Pengiriman',
            ];
        }

        // Prepare transaction details
        $transactionDetails = [
            'order_id' => $order->order_number,
            'gross_amount' => $summary['total'],
        ];

        // Customer details
        $customerDetails = [
            'first_name' => $data['name'],
            'phone' => $data['phone'],
            'shipping_address' => [
                'address' => $data['address'],
                'phone' => $data['phone'],
            ],
        ];

        // Prepare Snap API parameter
        $params = [
            'transaction_details' => $transactionDetails,
            'item_details' => $itemDetails,
            'customer_details' => $customerDetails,
            'enabled_payments' => config('midtrans.enabled_payments'),
        ];

        try {
            // Get Snap Token
            $snapToken = Snap::getSnapToken($params);

            // Store snap token in order
            $order->update(['snap_token' => $snapToken]);

            // Clear cart
            session()->forget('cart');
            session()->put('last_order_id', $order->id);

            return response()->json([
                'success' => true,
                'snap_token' => $snapToken,
                'order_number' => $order->order_number,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat transaksi: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Handle Midtrans notification callback
     */
    public function handleNotification(Request $request)
    {
        try {
            $notification = new Notification();

            $transactionStatus = $notification->transaction_status;
            $fraudStatus = $notification->fraud_status;
            $orderId = $notification->order_id;

            $order = Order::where('order_number', $orderId)->first();

            if (!$order) {
                return response()->json(['message' => 'Order not found'], 404);
            }

            // Handle different transaction status
            if ($transactionStatus == 'capture') {
                if ($fraudStatus == 'accept') {
                    $order->update([
                        'payment_status' => 'paid',
                        'payment_confirmed_at' => now(),
                        'status' => 'cooking',
                        'cooking_started_at' => now(),
                    ]);
                }
            } elseif ($transactionStatus == 'settlement') {
                $order->update([
                    'payment_status' => 'paid',
                    'payment_confirmed_at' => now(),
                    'status' => 'cooking',
                    'cooking_started_at' => now(),
                ]);
            } elseif ($transactionStatus == 'pending') {
                $order->update([
                    'payment_status' => 'pending',
                    'status' => 'pending',
                ]);
            } elseif ($transactionStatus == 'deny' || $transactionStatus == 'expire' || $transactionStatus == 'cancel') {
                $order->update([
                    'payment_status' => 'failed',
                    'status' => 'cancelled',
                ]);
            }

            return response()->json(['message' => 'Notification handled successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Finish page after payment
     */
    public function finish(Request $request)
    {
        $orderId = $request->query('order_id');
        $order = Order::where('order_number', $orderId)->first();

        if (!$order) {
            return redirect('/menu')->with('error', 'Pesanan tidak ditemukan');
        }

        return redirect()->route('order.completed')->with('success', 'Pembayaran berhasil!');
    }

    /**
     * Unfinish page (user cancel payment)
     */
    public function unfinish(Request $request)
    {
        return redirect('/cart')->with('error', 'Pembayaran dibatalkan');
    }

    /**
     * Error page
     */
    public function error(Request $request)
    {
        return redirect('/cart')->with('error', 'Terjadi kesalahan dalam proses pembayaran');
    }

    /**
     * Calculate cart summary
     */
    private function calculateCartSummary(array $cart): array
    {
        $subtotal = 0;
        $totalQuantity = 0;

        foreach ($cart as $item) {
            $quantity = (int) ($item['quantity'] ?? 0);
            $priceNumeric = (int) ($item['price_numeric'] ?? 0);

            $subtotal += $priceNumeric * $quantity;
            $totalQuantity += $quantity;
        }

        $deliveryCharge = $totalQuantity > 0 ? 5000 : 0;
        $discount = 0;
        $total = $subtotal + $deliveryCharge - $discount;
        $cartCount = $totalQuantity;

        return [
            'subtotal' => $subtotal,
            'deliveryCharge' => $deliveryCharge,
            'discount' => $discount,
            'total' => $total,
            'totalQuantity' => $totalQuantity,
            'cartCount' => $cartCount,
        ];
    }
}