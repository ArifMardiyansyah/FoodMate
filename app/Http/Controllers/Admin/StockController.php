<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DailyStock;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StockController extends Controller
{
    // Halaman utama manajemen stok
    public function index(Request $request)
    {
        $date = $request->get('date', Carbon::today()->format('Y-m-d'));
        $category = $request->get('category', 'all');
        $search = $request->get('search');

        $query = Product::with(['dailyStocks' => function ($q) use ($date) {
            $q->where('date', $date);
        }]);

        if ($category !== 'all') {
            $query->where('category', $category);
        }

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $products = $query->orderBy('category')->orderBy('name')->get();

        // Buat stok otomatis untuk produk yang belum punya stok hari ini
        foreach ($products as $product) {
            if ($product->use_stock_system && !$product->dailyStocks->first()) {
                DailyStock::create([
                    'product_id' => $product->id,
                    'date' => $date,
                    'initial_stock' => $product->default_daily_stock,
                    'current_stock' => $product->default_daily_stock,
                    'sold_quantity' => 0,
                    'is_available' => true,
                ]);
                $product->load('dailyStocks');
            }
        }

        $categories = Product::distinct()->pluck('category')->filter();

        return view('admin.stock.index', compact('products', 'date', 'categories', 'category', 'search'));
    }

    // Update stok produk
    public function updateStock(Request $request, $productId)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'initial_stock' => 'required|integer|min:0',
            'current_stock' => 'required|integer|min:0',
            'is_available' => 'required|boolean',
            'admin_notes' => 'nullable|string',
        ]);

        $product = Product::findOrFail($productId);

        $stock = DailyStock::updateOrCreate(
            [
                'product_id' => $productId,
                'date' => $data['date'],
            ],
            [
                'initial_stock' => $data['initial_stock'],
                'current_stock' => $data['current_stock'],
                'is_available' => $data['is_available'],
                'admin_notes' => $data['admin_notes'] ?? null,
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Stok berhasil diupdate',
            'stock' => $stock,
        ]);
    }

    // Toggle ketersediaan produk
    public function toggleAvailability(Request $request, $productId)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'is_available' => 'required|boolean',
            'admin_notes' => 'nullable|string',
        ]);

        $stock = DailyStock::where('product_id', $productId)
            ->where('date', $data['date'])
            ->firstOrFail();

        $stock->is_available = $data['is_available'];
        $stock->admin_notes = $data['admin_notes'] ?? $stock->admin_notes;
        $stock->save();

        return response()->json([
            'success' => true,
            'message' => $data['is_available'] ? 'Produk tersedia untuk dijual' : 'Produk tidak tersedia untuk dijual',
            'stock' => $stock,
        ]);
    }

    // Tambah stok
    public function addStock(Request $request, $productId)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'quantity' => 'required|integer|min:1',
        ]);

        $stock = DailyStock::where('product_id', $productId)
            ->where('date', $data['date'])
            ->firstOrFail();

        $stock->increaseStock($data['quantity']);

        return response()->json([
            'success' => true,
            'message' => "Berhasil menambah {$data['quantity']} stok",
            'stock' => $stock,
        ]);
    }

    // Kurangi stok manual
    public function reduceStock(Request $request, $productId)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'quantity' => 'required|integer|min:1',
        ]);

        $stock = DailyStock::where('product_id', $productId)
            ->where('date', $data['date'])
            ->firstOrFail();

        if ($stock->decreaseStock($data['quantity'])) {
            return response()->json([
                'success' => true,
                'message' => "Berhasil mengurangi {$data['quantity']} stok",
                'stock' => $stock,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Stok tidak cukup',
        ], 400);
    }

    // Reset stok ke default
    public function resetStock(Request $request, $productId)
    {
        $data = $request->validate([
            'date' => 'required|date',
        ]);

        $product = Product::findOrFail($productId);

        $stock = DailyStock::updateOrCreate(
            [
                'product_id' => $productId,
                'date' => $data['date'],
            ],
            [
                'initial_stock' => $product->default_daily_stock,
                'current_stock' => $product->default_daily_stock,
                'sold_quantity' => 0,
                'is_available' => true,
                'admin_notes' => null,
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Stok berhasil direset ke default',
            'stock' => $stock,
        ]);
    }

    // Laporan stok
    public function report(Request $request)
    {
        $dateFrom = $request->get('date_from', Carbon::today()->subDays(7)->format('Y-m-d'));
        $dateTo = $request->get('date_to', Carbon::today()->format('Y-m-d'));

        $stocks = DailyStock::with('product')
            ->whereBetween('date', [$dateFrom, $dateTo])
            ->orderBy('date', 'desc')
            ->orderBy('product_id')
            ->get();

        $summary = [
            'total_products' => $stocks->groupBy('product_id')->count(),
            'total_sold' => $stocks->sum('sold_quantity'),
            'total_revenue' => $stocks->sum(function ($stock) {
                return $stock->sold_quantity * $stock->product->price;
            }),
            'low_stock_products' => $stocks->filter(function ($stock) {
                return $stock->isLowStock();
            })->count(),
        ];

        return view('admin.stock.report', compact('stocks', 'dateFrom', 'dateTo', 'summary'));
    }

    // API untuk mendapatkan stok produk
    public function getStock($productId, $date)
    {
        $stock = DailyStock::where('product_id', $productId)
            ->where('date', $date)
            ->with('product')
            ->first();

        if (!$stock) {
            $product = Product::findOrFail($productId);
            $stock = [
                'product_id' => $productId,
                'date' => $date,
                'initial_stock' => $product->default_daily_stock,
                'current_stock' => $product->default_daily_stock,
                'sold_quantity' => 0,
                'is_available' => true,
                'product' => $product,
            ];
        }

        return response()->json($stock);
    }
}
