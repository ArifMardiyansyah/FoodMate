<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get user's favorite products with their current stock
        $favorites = $user->favoriteProducts()
            ->where('is_active', true)
            ->with(['dailyStocks' => function ($q) {
                $q->today();
            }])
            ->withCount('favorites')
            ->get();

        return view('favorites.index', [
            'favorites' => $favorites,
            'cartCount' => $this->cartCount(),
        ]);
    }

    public function toggle(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $user = Auth::user();
        $productId = $request->product_id;

        // Check if already favorited
        $favorite = Favorite::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($favorite) {
            // Remove from favorites
            $favorite->delete();
            $isFavorited = false;
            $message = 'Dihapus dari favorit';
        } else {
            // Add to favorites
            Favorite::create([
                'user_id' => $user->id,
                'product_id' => $productId,
            ]);
            $isFavorited = true;
            $message = 'Ditambahkan ke favorit';
        }

        // Get updated favorites count for this product
        $favoritesCount = Favorite::where('product_id', $productId)->count();

        return response()->json([
            'success' => true,
            'is_favorited' => $isFavorited,
            'favorites_count' => $favoritesCount,
            'message' => $message,
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