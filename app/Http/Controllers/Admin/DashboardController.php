<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\DailyStock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Get date range for filtering (default: last 7 days)
        $dateFrom = $request->get('date_from', Carbon::today()->subDays(6)->format('Y-m-d'));
        $dateTo = $request->get('date_to', Carbon::today()->format('Y-m-d'));

        // Today's Statistics
        $todayStats = [
            'orders' => Order::whereDate('created_at', Carbon::today())->count(),
            'revenue' => Order::whereDate('created_at', Carbon::today())->sum('total'),
            'customers' => Order::whereDate('created_at', Carbon::today())->distinct('user_id')->count('user_id'),
            'avg_order' => Order::whereDate('created_at', Carbon::today())->avg('total') ?? 0,
        ];

        // Overall Statistics
        $overallStats = [
            'total_orders' => Order::count(),
            'total_revenue' => Order::sum('total'),
            'total_customers' => User::where('role', 'customer')->count(),
            'total_products' => Product::count(),
            'active_products' => Product::where('is_active', true)->count(),
        ];

        // Sales trend for the last 7 days
        $salesTrend = Order::whereBetween('created_at', [
                Carbon::parse($dateFrom)->startOfDay(),
                Carbon::parse($dateTo)->endOfDay()
            ])
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as orders'),
                DB::raw('SUM(total) as revenue')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Top selling products
        $topProducts = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->whereBetween('orders.created_at', [
                Carbon::parse($dateFrom)->startOfDay(),
                Carbon::parse($dateTo)->endOfDay()
            ])
            ->select(
                'order_items.product_name',
                DB::raw('SUM(order_items.quantity) as total_quantity'),
                DB::raw('SUM(order_items.total) as total_revenue')
            )
            ->groupBy('order_items.product_name')
            ->orderByDesc('total_quantity')
            ->limit(5)
            ->get();

        // Order status distribution
        $ordersByStatus = Order::whereBetween('created_at', [
                Carbon::parse($dateFrom)->startOfDay(),
                Carbon::parse($dateTo)->endOfDay()
            ])
            ->select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get();

        // Payment method distribution
        $paymentMethods = Order::whereBetween('created_at', [
                Carbon::parse($dateFrom)->startOfDay(),
                Carbon::parse($dateTo)->endOfDay()
            ])
            ->select('payment_method', DB::raw('COUNT(*) as count'))
            ->groupBy('payment_method')
            ->get();

        // Recent orders (last 10)
        $recentOrders = Order::with(['user', 'items'])
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Low stock alerts
        $lowStockProducts = DailyStock::with('product')
            ->where('date', Carbon::today())
            ->whereHas('product', function($q) {
                $q->where('use_stock_system', true);
            })
            ->get()
            ->filter(function($stock) {
                return $stock->isLowStock();
            });

        // Average rating from feedback
        $avgRating = Order::whereNotNull('feedback_rating')->avg('feedback_rating') ?? 0;

        return view('admin.dashboard.index', compact(
            'todayStats',
            'overallStats',
            'salesTrend',
            'topProducts',
            'ordersByStatus',
            'paymentMethods',
            'recentOrders',
            'lowStockProducts',
            'avgRating',
            'dateFrom',
            'dateTo'
        ));
    }
}