

<?php $__env->startSection('title', 'Dashboard Admin - FoodMate'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto">
    <!-- Page Header with Gradient -->
    <div class="mb-8 bg-gradient-to-r from-[#F6A406] to-[#F08C00] rounded-3xl p-8 shadow-2xl">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-4xl font-bold text-white drop-shadow-lg">Dashboard Overview</h2>
                <p class="text-white/90 mt-2 text-lg">Selamat datang kembali, <?php echo e(auth()->user()->name); ?>! 👋</p>
            </div>
            <div class="hidden md:block">
                <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 border-2 border-white/30">
                    <p class="text-white/80 text-sm">Tanggal Hari Ini</p>
                    <p class="text-white font-bold text-xl"><?php echo e(\Carbon\Carbon::now()->format('d M Y')); ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Date Filter -->
    <div class="bg-white rounded-3xl shadow-xl p-8 mb-8 border border-gray-100">
        <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#F6A406]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
            </svg>
            Filter Data
        </h3>
        <form method="GET" action="<?php echo e(route('admin.dashboard')); ?>" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Dari Tanggal</label>
                <input type="date" name="date_from" value="<?php echo e($dateFrom); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
            </div>
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Sampai Tanggal</label>
                <input type="date" name="date_to" value="<?php echo e($dateTo); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
            </div>
            <button type="submit" class="bg-gradient-to-r from-[#F6A406] to-[#F08C00] text-white px-8 py-3 rounded-2xl font-bold hover:from-[#F08C00] hover:to-[#F6A406] transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                <span class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Filter
                </span>
            </button>
        </form>
    </div>

    <!-- Today's Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-3xl shadow-2xl p-8 text-white transition-all duration-300 hover:shadow-2xl hover:scale-105 border-2 border-blue-400/30 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full -ml-12 -mb-12"></div>
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-white bg-opacity-20 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <span class="text-sm font-semibold opacity-90">Hari Ini</span>
            </div>
            <h3 class="text-4xl font-bold mb-2 relative z-10"><?php echo e($todayStats['orders']); ?></h3>
            <p class="text-sm opacity-90 relative z-10">Pesanan Hari Ini</p>
        </div>

        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-3xl shadow-2xl p-8 text-white transition-all duration-300 hover:shadow-2xl hover:scale-105 border-2 border-green-400/30 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full -ml-12 -mb-12"></div>
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-white bg-opacity-20 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="text-sm font-semibold opacity-90">Hari Ini</span>
            </div>
            <h3 class="text-4xl font-bold mb-2 relative z-10">Rp <?php echo e(number_format($todayStats['revenue'])); ?></h3>
            <p class="text-sm opacity-90 relative z-10">Revenue Hari Ini</p>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-3xl shadow-2xl p-8 text-white transition-all duration-300 hover:shadow-2xl hover:scale-105 border-2 border-purple-400/30 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full -ml-12 -mb-12"></div>
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-white bg-opacity-20 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <span class="text-sm font-semibold opacity-90">Hari Ini</span>
            </div>
            <h3 class="text-4xl font-bold mb-2 relative z-10"><?php echo e($todayStats['customers']); ?></h3>
            <p class="text-sm opacity-90 relative z-10">Customer Aktif</p>
        </div>

    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                <div class="w-10 h-10 bg-gradient-to-br from-[#F6A406] to-[#F08C00] rounded-xl flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                    </svg>
                </div>
                Tren Penjualan
            </h3>
            <div style="height: 250px; position: relative;">
                <canvas id="salesTrendChart"></canvas>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                Status Pesanan
            </h3>
            <div style="height: 300px; position: relative;">
                <canvas id="orderStatusChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Top Products & Recent Orders -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Produk Terlaris</h3>
            <div class="space-y-4">
                <?php $__empty_1 = true; $__currentLoopData = $topProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex items-center gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-[#F6A406] text-white rounded-full flex items-center justify-center font-bold">
                            <?php echo e($index + 1); ?>

                        </div>
                        <div class="flex-1">
                            <h4 class="font-semibold text-gray-900"><?php echo e($product->product_name); ?></h4>
                            <p class="text-sm text-gray-500"><?php echo e($product->total_quantity); ?> terjual</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-green-600">Rp <?php echo e(number_format($product->total_revenue)); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-gray-500 text-center py-8">Belum ada data penjualan</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                </div>
                Metode Pembayaran
            </h3>
            <div style="height: 300px; position: relative;">
                <canvas id="paymentMethodChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Recent Orders & Stats -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-gray-900">Pesanan Terbaru</h3>
                <a href="<?php echo e(route('admin.orders.index')); ?>" class="text-[#F6A406] hover:text-[#F08C00] font-semibold text-sm">
                    Lihat Semua →
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="border-b border-gray-200">
                        <tr>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">No. Pesanan</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Customer</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Items</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Jumlah</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Total</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php $__empty_1 = true; $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4">
                                    <a href="<?php echo e(route('admin.orders.show', $order->id)); ?>" class="text-[#F6A406] hover:underline font-semibold">
                                        <?php echo e($order->order_number); ?>

                                    </a>
                                </td>
                                <td class="py-3 px-4 text-gray-900"><?php echo e($order->customer_name); ?></td>
                                <td class="py-3 px-4 text-gray-900">
                                    <?php if($order->items->count() > 0): ?>
                                        <?php echo e($order->items->pluck('product_name')->join(', ')); ?>

                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                <td class="py-3 px-4 text-gray-900">
                                    <?php echo e($order->items->sum('quantity')); ?>

                                </td>
                                <td class="py-3 px-4 font-semibold text-gray-900">Rp <?php echo e(number_format($order->total)); ?></td>
                                <td class="py-3 px-4">
                                    <?php
                                        $statusColors = [
                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                            'processing' => 'bg-blue-100 text-blue-800',
                                            'completed' => 'bg-green-100 text-green-800',
                                            'cancelled' => 'bg-red-100 text-red-800',
                                        ];
                                    ?>
                                    <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full <?php echo e($statusColors[$order->status] ?? 'bg-gray-100 text-gray-800'); ?>">
                                        <?php echo e(ucfirst($order->status)); ?>

                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="py-8 text-center text-gray-500">Belum ada pesanan</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-gradient-to-br from-red-50 to-orange-50 rounded-3xl shadow-xl p-8 border-2 border-red-200">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 bg-red-100 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Stok Menipis</h3>
                </div>
                <div class="space-y-3">
                    <?php $__empty_1 = true; $__currentLoopData = $lowStockProducts->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-semibold text-gray-900 text-sm"><?php echo e($stock->product->name); ?></p>
                                <p class="text-xs text-gray-500">Sisa: <?php echo e($stock->current_stock); ?></p>
                            </div>
                            <a href="<?php echo e(route('admin.stock.index')); ?>" class="text-[#F6A406] hover:text-[#F08C00] text-sm font-semibold">
                                Update
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-gray-500 text-sm text-center py-4">Semua stok aman</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-3xl shadow-xl p-8 border-2 border-blue-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Statistik Keseluruhan</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Total Pesanan</span>
                        <span class="font-bold text-gray-900"><?php echo e($overallStats['total_orders']); ?></span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Total Revenue</span>
                        <span class="font-bold text-green-600">Rp <?php echo e(number_format($overallStats['total_revenue'])); ?></span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Total Customer</span>
                        <span class="font-bold text-gray-900"><?php echo e($overallStats['total_customers']); ?></span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Total Produk</span>
                        <span class="font-bold text-gray-900"><?php echo e($overallStats['total_products']); ?></span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Rating Rata-rata</span>
                        <span class="font-bold text-yellow-600"><?php echo e(number_format($avgRating, 1)); ?> ⭐</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    const salesTrendCtx = document.getElementById('salesTrendChart').getContext('2d');
    new Chart(salesTrendCtx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($salesTrend->pluck('date')->map(fn($d) => \Carbon\Carbon::parse($d)->format('d M'))); ?>,
            datasets: [{
                label: 'Revenue (Rp)',
                data: <?php echo json_encode($salesTrend->pluck('revenue')); ?>,
                borderColor: '#F6A406',
                backgroundColor: 'rgba(246, 164, 6, 0.1)',
                tension: 0.4,
                fill: true,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { callback: function(value) { return 'Rp ' + value.toLocaleString('id-ID'); } }
                }
            }
        }
    });

    const orderStatusCtx = document.getElementById('orderStatusChart').getContext('2d');
    new Chart(orderStatusCtx, {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode($ordersByStatus->pluck('status')->map(fn($s) => ucfirst($s))); ?>,
            datasets: [{
                data: <?php echo json_encode($ordersByStatus->pluck('count')); ?>,
                backgroundColor: ['#FCD34D', '#60A5FA', '#34D399', '#F87171'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom' } }
        }
    });

    const paymentMethodCtx = document.getElementById('paymentMethodChart').getContext('2d');
    new Chart(paymentMethodCtx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($paymentMethods->pluck('payment_method')->map(fn($p) => ucfirst($p))); ?>,
            datasets: [{
                label: 'Jumlah Transaksi',
                data: <?php echo json_encode($paymentMethods->pluck('count')); ?>,
                backgroundColor: '#F6A406',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1 } }
            }
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FoodMate\FoodMate\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>