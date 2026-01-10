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

class CartController extends Controller
{
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

    private function formatPrice(int $value): string
    {
        return 'Rp. ' . number_format($value, 0, ',', '.');
    }

    public function index()
    {
        $cartItems = session()->get('cart', []);
        $summary = $this->calculateCartSummary($cartItems);

        return view('cart', array_merge([
            'cartItems' => $cartItems,
        ], $summary));
    }

    public function addToCart(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|integer|min:1',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::where('is_active', true)->findOrFail($data['product_id']);

        // Cek ketersediaan stok
        if (!$product->isAvailableToday()) {
            return response()->json([
                'success' => false,
                'message' => 'Maaf, produk ini sedang tidak tersedia hari ini.',
            ], 400);
        }

        // Cek apakah stok cukup
        if ($product->use_stock_system) {
            $currentStock = $product->getCurrentStock();
            $cart = session()->get('cart', []);
            $existingQuantity = isset($cart[(string)$product->id]) ? $cart[(string)$product->id]['quantity'] : 0;
            $totalQuantity = $existingQuantity + $data['quantity'];

            if ($totalQuantity > $currentStock) {
                return response()->json([
                    'success' => false,
                    'message' => "Maaf, stok hanya tersisa {$currentStock} porsi.",
                ], 400);
            }
        }

        $cart = session()->get('cart', []);
        $key = (string) $product->id;

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] += $data['quantity'];
        } else {
            $cart[$key] = [
                'id' => $product->id,
                'product_id' => $product->id,
                'slug' => $product->slug,
                'name' => $product->name,
                'price' => $this->formatPrice($product->price),
                'price_numeric' => $product->price,
                'image' => $product->image_path,
                'quantity' => $data['quantity'],
            ];
        }

        session()->put('cart', $cart);

        $summary = $this->calculateCartSummary($cart);

        return response()->json([
            'success' => true,
            'message' => 'Item berhasil ditambahkan ke keranjang',
            'cart_count' => $summary['cartCount'],
        ]);
    }

    public function updateQuantity(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);
        $key = (string) $data['id'];

        if (!isset($cart[$key])) {
            return response()->json(['success' => false, 'message' => 'Item not found'], 404);
        }

        $cart[$key]['quantity'] = $data['quantity'];
        session()->put('cart', $cart);

        $summary = $this->calculateCartSummary($cart);

        return response()->json([
            'success' => true,
            'subtotal' => $summary['subtotal'],
            'total' => $summary['total'],
            'delivery_charge' => $summary['deliveryCharge'],
            'discount' => $summary['discount'],
            'total_quantity' => $summary['totalQuantity'],
            'cart_count' => $summary['cartCount'],
        ]);
    }

    public function removeItem(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
        ]);

        $cart = session()->get('cart', []);
        $key = (string) $data['id'];

        if (!isset($cart[$key])) {
            return response()->json(['success' => false, 'message' => 'Item not found'], 404);
        }

        unset($cart[$key]);
        session()->put('cart', $cart);

        $summary = $this->calculateCartSummary($cart);

        return response()->json(array_merge([
            'success' => true,
        ], $summary));
    }

    public function getCartCount()
    {
        $cart = session()->get('cart', []);
        $summary = $this->calculateCartSummary($cart);

        return response()->json(['count' => $summary['cartCount']]);
    }

    public function checkout()
    {
        $cartItems = session()->get('cart', []);

        if (empty($cartItems)) {
            return redirect('/cart')->with('error', 'Keranjang Anda kosong');
        }

        $summary = $this->calculateCartSummary($cartItems);

        return view('checkout', array_merge([
            'cartItems' => $cartItems,
        ], $summary));
    }

    public function processCheckout(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'payment_method' => 'required|string',
            'notes' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $cartItems = session()->get('cart', []);

        if (empty($cartItems)) {
            return response()->json(['success' => false, 'message' => 'Keranjang kosong'], 400);
        }

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

        $order = DB::transaction(function () use ($data, $cartItems, $summary, $sessionId, $userId) {
            $order = Order::create([
                'order_number' => 'ORD-' . now()->format('YmdHis') . Str::upper(Str::random(4)),
                'session_id' => $sessionId,
                'user_id' => $userId,
                'customer_name' => $data['name'],
                'customer_phone' => $data['phone'],
                'customer_address' => $data['address'],
                'latitude' => $data['latitude'] ?? null,
                'longitude' => $data['longitude'] ?? null,
                'payment_method' => $data['payment_method'],
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

        session()->forget('cart');
        session()->put('last_order_id', $order->id);

        return response()->json([
            'success' => true,
            'message' => 'Pesanan berhasil dibuat!',
            'order_id' => $order->order_number,
            'total' => $summary['total'],
            'redirect_url' => route('order.completed'),
        ]);
    }
}
