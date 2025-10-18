<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    private function calculateCartSummary(array $cart): array
    {
        $subtotal = 0;
        $totalQuantity = 0;

        foreach ($cart as $item) {
            $quantity = $item['quantity'] ?? 0;
            $priceNumeric = $item['price_numeric'] ?? 0;

            $subtotal += $priceNumeric * $quantity;
            $totalQuantity += $quantity;
        }

        $deliveryCharge = $totalQuantity > 0 ? 5000 : 0;
        $discount = 0;
        $total = $subtotal + $deliveryCharge - $discount;
        $cartCount = count($cart);

        return [
            'subtotal' => $subtotal,
            'deliveryCharge' => $deliveryCharge,
            'discount' => $discount,
            'total' => $total,
            'totalQuantity' => $totalQuantity,
            'cartCount' => $cartCount,
        ];
    }

    public function index()
    {
        // Get cart items from session
        $cartItems = session()->get('cart', []);

        $summary = $this->calculateCartSummary($cartItems);

        return view('cart', array_merge(['cartItems' => $cartItems], $summary));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'id' => 'required|string',
            'name' => 'required|string',
            'price' => 'required|string',
            'price_numeric' => 'required|numeric',
            'image' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        // Get current cart from session
        $cart = session()->get('cart', []);

        // Check if item already exists in cart
        $itemId = $request->id;

        if (isset($cart[$itemId])) {
            // Update quantity if item exists
            $cart[$itemId]['quantity'] += $request->quantity;
        } else {
            // Add new item to cart
            $cart[$itemId] = [
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'price_numeric' => $request->price_numeric,
                'image' => $request->image,
                'quantity' => $request->quantity,
            ];
        }

        // Save cart to session
        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => 'Item berhasil ditambahkan ke keranjang',
            'cart_count' => count($cart)
        ]);
    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'id' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity;
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

        return response()->json(['success' => false, 'message' => 'Item not found'], 404);
    }

    public function removeItem(Request $request)
    {
        $request->validate([
            'id' => 'required|string',
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);

            $summary = $this->calculateCartSummary($cart);

            return response()->json(array_merge(['success' => true], $summary));
        }

        return response()->json(['success' => false, 'message' => 'Item not found'], 404);
    }

    public function getCartCount()
    {
        $cart = session()->get('cart', []);
        return response()->json(['count' => count($cart)]);
    }

    public function checkout()
    {
        // Get cart items from session
        $cartItems = session()->get('cart', []);

        // Redirect to cart if empty
        if (empty($cartItems)) {
            return redirect('/cart')->with('error', 'Keranjang Anda kosong');
        }

        // Calculate totals
        $subtotal = 0;
        foreach ($cartItems as $item) {
            $subtotal += $item['price_numeric'] * $item['quantity'];
        }

        $deliveryCharge = 5000;
        $discount = 0;
        $total = $subtotal + $deliveryCharge - $discount;

        return view('checkout', compact('cartItems', 'subtotal', 'deliveryCharge', 'discount', 'total'));
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'payment_method' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        // Get cart items
        $cartItems = session()->get('cart', []);

        if (empty($cartItems)) {
            return response()->json(['success' => false, 'message' => 'Keranjang kosong'], 400);
        }

        // Calculate totals
        $subtotal = 0;
        foreach ($cartItems as $item) {
            $subtotal += $item['price_numeric'] * $item['quantity'];
        }

        $deliveryCharge = 5000;
        $discount = 0;
        $total = $subtotal + $deliveryCharge - $discount;

        // Here you would typically save the order to database
        // Order data would include:
        // - Customer info: name, phone, address
        // - Location: latitude, longitude (if provided)
        // - Cart items with quantities and prices
        // - Payment method
        // - Totals: subtotal, delivery charge, discount, total

        $orderData = [
            'order_id' => 'ORD-' . time(),
            'customer' => [
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ],
            'items' => $cartItems,
            'payment_method' => $request->payment_method,
            'notes' => $request->notes,
            'subtotal' => $subtotal,
            'delivery_charge' => $deliveryCharge,
            'discount' => $discount,
            'total' => $total,
            'created_at' => now(),
        ];

        // TODO: Save $orderData to database when orders table is created
        // Example: Order::create($orderData);

        // Clear cart
        session()->forget('cart');

        // Store order data in session for order completed page
        session()->put('last_order', $orderData);

        return response()->json([
            'success' => true,
            'message' => 'Pesanan berhasil dibuat!',
            'order_id' => $orderData['order_id'],
            'total' => $total,
            'redirect_url' => route('order.completed')
        ]);
    }
}
