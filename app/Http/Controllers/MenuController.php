<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        // Ambil produk yang tersedia hari ini
        $products = Product::where('is_active', true)
            ->with(['dailyStocks' => function ($q) {
                $q->today();
            }])
            ->orderBy('name')
            ->get()
            ->filter(function ($product) {
                return $product->isAvailableToday();
            })
            ->groupBy(fn ($product) => $product->category ?? 'Lainnya');

        return view('menu.index', [
            'groupedProducts' => $products,
            'cartCount' => $this->cartCount(),
        ]);
    }

    public function show(Product $product)
    {
        // Cek ketersediaan produk
        if (!$product->isAvailableToday()) {
            return redirect('/menu')->with('error', 'Maaf, produk ini sedang tidak tersedia hari ini.');
        }

        $recommended = Product::where('id', '!=', $product->id)
            ->where('is_active', true)
            ->with(['dailyStocks' => function ($q) {
                $q->today();
            }])
            ->inRandomOrder()
            ->limit(4)
            ->get()
            ->filter(function ($p) {
                return $p->isAvailableToday();
            });

        // Load stok hari ini
        $product->load(['dailyStocks' => function ($q) {
            $q->today();
        }]);

        // Check if current user has favorited this product
        $isFavorited = false;
        if (Auth::check()) {
            $isFavorited = Favorite::where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->exists();
        }

        // Get favorites count
        $favoritesCount = Favorite::where('product_id', $product->id)->count();

        return view('menu.show', [
            'product' => $product,
            'recommended' => $recommended,
            'cartCount' => $this->cartCount(),
            'currentStock' => $product->getCurrentStock(),
            'isFavorited' => $isFavorited,
            'favoritesCount' => $favoritesCount,
        ]);
    }

    private function cartCount(): int
    {
        $cart = session()->get('cart', []);
        $count = 0;

        foreach ($cart as $value) {
            $count += is_array($value) ? (int) ($value['quantity'] ?? 0) : (int) $value;
        }

        return $count;
    }
}
