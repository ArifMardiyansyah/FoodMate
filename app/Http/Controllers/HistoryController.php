<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function confirmOrder(Request $request, $id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', auth()->id())
            ->where('status', 'completed')
            ->firstOrFail();

        // Update status menjadi confirmed atau tambahkan flag
        $order->update([
            'is_confirmed' => true,
            'confirmed_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Pesanan telah dikonfirmasi. Terima kasih!');
    }

    public function index(Request $request)
    {
        $userId = auth()->id();
        
        // Query dasar untuk mendapatkan orders berdasarkan user_id
        $query = Order::with('items')->where('user_id', $userId);

        // Filter berdasarkan status jika ada
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Filter berdasarkan tanggal jika ada
        if ($request->has('date_from') && $request->date_from) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->has('date_to') && $request->date_to) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Pencarian berdasarkan order number atau nama produk
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('order_number', 'like', "%{$search}%")
                  ->orWhere('customer_name', 'like', "%{$search}%")
                  ->orWhereHas('items', function ($q) use ($search) {
                      $q->where('product_name', 'like', "%{$search}%");
                  });
            });
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $orders = $query->paginate(10)->withQueryString();

        // Statistik untuk dashboard
        $stats = [
            'total_orders' => Order::where('user_id', $userId)->count(),
            'total_spent' => Order::where('user_id', $userId)->sum('total'),
            'completed_orders' => Order::where('user_id', $userId)->where('status', 'completed')->count(),
        ];

        return view('history', [
            'orders' => $orders,
            'stats' => $stats,
        ]);
    }
}
