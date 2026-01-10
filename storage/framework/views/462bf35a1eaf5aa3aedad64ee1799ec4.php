<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>FoodMate | Riwayat Pesanan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gradient-to-br from-orange-50 via-white to-yellow-50 min-h-screen font-abhaya pb-32">
    <header class="bg-white/80 backdrop-blur-sm px-6 lg:px-12 py-6 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-4">
                <a href="/menu" class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="text-3xl font-bold text-[#F6A406]">FoodMate</h1>
            </div>
            <form action="/logout" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="bg-[#F6A406] text-white px-6 py-3 rounded-xl font-semibold hover:bg-[#F08C00] transition-colors">
                    Logout
                </button>
            </form>
        </div>
    </header>

    <section class="bg-white px-6 lg:px-12 py-12">
        <div class="max-w-4xl mx-auto">
            <!-- Success Message -->
            <?php if(session('success')): ?>
                <div class="mb-6 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-4 rounded-2xl shadow-xl flex items-center gap-3 animate-slide-in">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-semibold"><?php echo e(session('success')); ?></span>
                </div>
            <?php endif; ?>

            <div class="mb-8 text-center">
                <h2 class="text-2xl font-medium text-gray-400 mb-2">📜 Riwayat Pesanan</h2>
                <h1 class="text-5xl font-bold bg-gradient-to-r from-[#F6A406] to-[#F08C00] bg-clip-text text-transparent">Pesanan Saya</h1>
            </div>

            <!-- Statistik Dashboard -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-gradient-to-br from-[#F6A406] to-[#F08C00] rounded-2xl p-8 text-white shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm opacity-90 mb-2 font-medium">Total Pesanan</p>
                            <h3 class="text-4xl font-bold"><?php echo e($stats['total_orders']); ?></h3>
                        </div>
                        <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl p-8 text-white shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm opacity-90 mb-2 font-medium">Total Belanja</p>
                            <h3 class="text-2xl font-bold">Rp <?php echo e(number_format($stats['total_spent'])); ?></h3>
                        </div>
                        <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl p-8 text-white shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm opacity-90 mb-2 font-medium">Selesai</p>
                            <h3 class="text-4xl font-bold"><?php echo e($stats['completed_orders']); ?></h3>
                        </div>
                        <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter dan Pencarian -->
            <div class="bg-white rounded-2xl p-8 mb-8 shadow-xl border border-orange-100">
                <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#F6A406]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    Filter & Pencarian
                </h3>
                <form method="GET" action="/history" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Pencarian -->
                        <div class="lg:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Cari Pesanan</label>
                            <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Nomor order atau nama produk..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                        </div>

                        <!-- Filter Status -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                            <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                                <option value="all" <?php echo e(request('status') == 'all' ? 'selected' : ''); ?>>Semua Status</option>
                                <option value="completed" <?php echo e(request('status') == 'completed' ? 'selected' : ''); ?>>Selesai</option>
                                <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                <option value="cancelled" <?php echo e(request('status') == 'cancelled' ? 'selected' : ''); ?>>Dibatalkan</option>
                            </select>
                        </div>

                        <!-- Sorting -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Urutkan</label>
                            <select name="sort_by" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                                <option value="created_at" <?php echo e(request('sort_by') == 'created_at' ? 'selected' : ''); ?>>Tanggal</option>
                                <option value="total" <?php echo e(request('sort_by') == 'total' ? 'selected' : ''); ?>>Total</option>
                                <option value="order_number" <?php echo e(request('sort_by') == 'order_number' ? 'selected' : ''); ?>>Nomor Order</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Tanggal Dari -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Dari Tanggal</label>
                            <input type="date" name="date_from" value="<?php echo e(request('date_from')); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                        </div>

                        <!-- Tanggal Sampai -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Sampai Tanggal</label>
                            <input type="date" name="date_to" value="<?php echo e(request('date_to')); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="bg-gradient-to-r from-[#F6A406] to-[#F08C00] text-white px-8 py-3 rounded-xl font-bold hover:shadow-xl transition-all duration-300 flex items-center gap-2 hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Cari
                        </button>
                        <a href="/history" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-semibold hover:bg-gray-300 transition-colors flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Reset
                        </a>
                    </div>
                </form>
            </div>

            <?php if($orders->isEmpty()): ?>
                <div class="text-center py-16 bg-white rounded-3xl shadow-xl p-12">
                    <div class="w-32 h-32 mx-auto mb-6 bg-gradient-to-br from-orange-100 to-yellow-100 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-[#F6A406]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-700 mb-3">Belum Ada Riwayat</h3>
                    <p class="text-gray-500 mb-8 text-lg">Anda belum melakukan pemesanan</p>
                    <a href="/menu" class="inline-block bg-gradient-to-r from-[#F6A406] to-[#F08C00] text-white font-bold py-4 px-10 rounded-2xl hover:shadow-2xl hover:scale-105 transition-all duration-300">
                        🍽️ Mulai Belanja
                    </a>
                </div>
            <?php else: ?>
                <!-- Info hasil pencarian -->
                <?php if(request()->hasAny(['search', 'status', 'date_from', 'date_to'])): ?>
                    <div class="bg-blue-50 border border-blue-200 rounded-lg px-4 py-3 mb-6 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm text-blue-800">Menampilkan <strong><?php echo e($orders->total()); ?></strong> hasil</span>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="space-y-6">
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-8 border border-orange-100">
                            <div class="flex justify-between items-start mb-6">
                                <div>
                                    <h3 class="text-lg font-bold text-black mb-1"><?php echo e($order->order_number); ?></h3>
                                    <p class="text-sm text-gray-500"><?php echo e($order->created_at?->timezone('Asia/Jakarta')->format('d M Y, H:i')); ?></p>
                                </div>
                                <div class="text-right">
                                    <div class="text-lg font-bold text-[#F6A406]">Rp. <?php echo e(number_format($order->total)); ?></div>
                                    <?php
                                        $statusConfig = [
                                            'pending' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'label' => 'Menunggu'],
                                            'cooking' => ['bg' => 'bg-orange-100', 'text' => 'text-orange-800', 'label' => '👨‍🍳 Dimasak'],
                                            'delivering' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'label' => '🚚 Diantar'],
                                            'completed' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'label' => '✅ Selesai'],
                                            'cancelled' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'label' => '❌ Dibatalkan'],
                                        ];
                                        $config = $statusConfig[$order->status] ?? ['bg' => 'bg-gray-100', 'text' => 'text-gray-700', 'label' => ucfirst($order->status)];
                                    ?>
                                    <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full <?php echo e($config['bg']); ?> <?php echo e($config['text']); ?>">
                                        <?php echo e($config['label']); ?>

                                    </span>
                                </div>
                            </div>

                            <!-- Order Tracking Timeline -->
                            <?php if($order->status !== 'cancelled'): ?>
                            <div class="mb-6 bg-gradient-to-r from-orange-50 to-yellow-50 rounded-xl p-6">
                                <h4 class="text-sm font-bold text-gray-700 mb-4">Status Pesanan</h4>
                                <div class="flex items-center justify-between relative">
                                    <!-- Progress Line -->
                                    <div class="absolute top-5 left-0 right-0 h-1 bg-gray-200 -z-0">
                                        <?php
                                            $progress = match($order->status) {
                                                'pending' => '0%',
                                                'cooking' => '33%',
                                                'delivering' => '66%',
                                                'completed' => '100%',
                                                default => '0%'
                                            };
                                        ?>
                                        <div class="h-full bg-gradient-to-r from-[#F6A406] to-[#F08C00] transition-all duration-500" style="width: <?php echo e($progress); ?>"></div>
                                    </div>

                                    <!-- Step 1: Pending -->
                                    <div class="flex flex-col items-center z-10">
                                        <div class="w-10 h-10 rounded-full flex items-center justify-center <?php echo e(in_array($order->status, ['pending', 'cooking', 'delivering', 'completed']) ? 'bg-gradient-to-br from-[#F6A406] to-[#F08C00] text-white' : 'bg-gray-200 text-gray-400'); ?> shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <span class="text-xs font-semibold mt-2 <?php echo e(in_array($order->status, ['pending', 'cooking', 'delivering', 'completed']) ? 'text-[#F6A406]' : 'text-gray-400'); ?>">Diterima</span>
                                    </div>

                                    <!-- Step 2: Cooking -->
                                    <div class="flex flex-col items-center z-10">
                                        <div class="w-10 h-10 rounded-full flex items-center justify-center <?php echo e(in_array($order->status, ['cooking', 'delivering', 'completed']) ? 'bg-gradient-to-br from-[#F6A406] to-[#F08C00] text-white' : 'bg-gray-200 text-gray-400'); ?> shadow-lg">
                                            <span class="text-lg">👨‍🍳</span>
                                        </div>
                                        <span class="text-xs font-semibold mt-2 <?php echo e(in_array($order->status, ['cooking', 'delivering', 'completed']) ? 'text-[#F6A406]' : 'text-gray-400'); ?>">Dimasak</span>
                                    </div>

                                    <!-- Step 3: Delivering -->
                                    <div class="flex flex-col items-center z-10">
                                        <div class="w-10 h-10 rounded-full flex items-center justify-center <?php echo e(in_array($order->status, ['delivering', 'completed']) ? 'bg-gradient-to-br from-[#F6A406] to-[#F08C00] text-white' : 'bg-gray-200 text-gray-400'); ?> shadow-lg">
                                            <span class="text-lg">🚚</span>
                                        </div>
                                        <span class="text-xs font-semibold mt-2 <?php echo e(in_array($order->status, ['delivering', 'completed']) ? 'text-[#F6A406]' : 'text-gray-400'); ?>">Diantar</span>
                                    </div>

                                    <!-- Step 4: Completed -->
                                    <div class="flex flex-col items-center z-10">
                                        <div class="w-10 h-10 rounded-full flex items-center justify-center <?php echo e($order->status === 'completed' ? 'bg-gradient-to-br from-green-500 to-emerald-600 text-white' : 'bg-gray-200 text-gray-400'); ?> shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <span class="text-xs font-semibold mt-2 <?php echo e($order->status === 'completed' ? 'text-green-600' : 'text-gray-400'); ?>">Selesai</span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <div class="space-y-3 mb-4">
                                <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-100 last:border-b-0">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-12 bg-gray-200 rounded-lg overflow-hidden">
                                                <img src="<?php echo e(asset($item->product_image ?? 'images/food/default.png')); ?>" alt="<?php echo e($item->product_name); ?>" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <h4 class="font-semibold text-black"><?php echo e($item->product_name); ?></h4>
                                                <p class="text-sm text-gray-500"><?php echo e($item->quantity); ?> x Rp. <?php echo e(number_format($item->product_price)); ?></p>
                                            </div>
                                        </div>
                                        <div class="text-right font-semibold text-black">Rp. <?php echo e(number_format($item->total)); ?></div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-gray-600 mb-4">
                                <div>
                                    <span class="block font-semibold text-gray-900">Metode Pembayaran</span>
                                    <span class="block capitalize"><?php echo e($order->payment_method); ?></span>
                                </div>
                                <div>
                                    <span class="block font-semibold text-gray-900">Alamat</span>
                                    <span class="block"><?php echo e($order->customer_address); ?></span>
                                </div>
                                <div>
                                    <span class="block font-semibold text-gray-900">Catatan</span>
                                    <span class="block"><?php echo e($order->notes ?? '-'); ?></span>
                                </div>
                            </div>

                            <?php if($order->feedback_rating): ?>
                                <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl px-6 py-4 flex items-center justify-between mt-4">
                                    <div class="flex items-center gap-4">
                                        <div class="flex items-center gap-1 text-2xl">
                                            <?php for($i = 0; $i < $order->feedback_rating; $i++): ?>
                                                <span class="text-yellow-400">★</span>
                                            <?php endfor; ?>
                                        </div>
                                        <span class="text-sm text-gray-700 font-medium"><?php echo e($order->feedback_comment ?? 'Terima kasih atas pesanan Anda.'); ?></span>
                                    </div>
                                    <span class="text-xs text-gray-500 bg-white px-3 py-1 rounded-full"><?php echo e($order->feedback_submitted_at?->diffForHumans()); ?></span>
                                </div>
                            <?php endif; ?>

                            <!-- Tombol Konfirmasi untuk Pesanan Selesai -->
                            <?php if($order->status === 'completed' && !$order->is_confirmed): ?>
                                <div class="mt-6 bg-gradient-to-r from-blue-50 to-indigo-50 border-2 border-blue-200 rounded-2xl p-6">
                                    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                                        <div class="flex items-center gap-4">
                                            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-bold text-gray-900 mb-1">Pesanan Sudah Diterima?</h4>
                                                <p class="text-sm text-gray-600">Konfirmasi bahwa pesanan telah sampai dengan baik</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-3 w-full md:w-auto">
                                            <form action="<?php echo e(route('history.confirm', $order->id)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin pesanan sudah diterima dengan baik?')" class="flex-1 md:flex-none">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-3 rounded-xl font-bold hover:shadow-2xl transition-all duration-300 hover:scale-105 flex items-center justify-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    Sudah Terima
                                                </button>
                                            </form>
                                            <button onclick="openContactModal('<?php echo e($order->order_number); ?>')" class="flex-1 md:flex-none bg-gradient-to-r from-red-500 to-rose-600 text-white px-6 py-3 rounded-xl font-bold hover:shadow-2xl transition-all duration-300 hover:scale-105 flex items-center justify-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                </svg>
                                                Belum Terima
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif($order->status === 'completed' && $order->is_confirmed): ?>
                                <div class="mt-6 bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-200 rounded-2xl p-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="text-lg font-bold text-green-800 mb-1">✅ Pesanan Telah Dikonfirmasi</h4>
                                            <p class="text-sm text-green-700">Dikonfirmasi pada <?php echo e($order->confirmed_at?->timezone('Asia/Jakarta')->format('d M Y, H:i')); ?></p>
                                        </div>
                                        <div class="bg-white px-4 py-2 rounded-xl shadow-md">
                                            <span class="text-xs text-gray-500"><?php echo e($order->confirmed_at?->diffForHumans()); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Pagination -->
                <?php if($orders->hasPages()): ?>
                    <div class="mt-8">
                        <?php echo e($orders->links()); ?>

                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>

    <?php echo $__env->make('layouts.partials.bottom-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Modal Hubungi Admin -->
    <div id="contactModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-3xl max-w-md w-full mx-4 shadow-2xl transform transition-all">
            <div class="p-8">
                <!-- Header -->
                <div class="text-center mb-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-red-500 to-rose-600 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Belum Menerima Pesanan?</h3>
                    <p class="text-gray-600 text-sm">Hubungi admin untuk melaporkan masalah dengan pesanan Anda</p>
                    <div class="mt-3 bg-yellow-50 border border-yellow-200 rounded-lg px-4 py-2">
                        <p class="text-sm font-semibold text-yellow-800">Order: <span id="modalOrderNumber"></span></p>
                    </div>
                </div>

                <!-- Contact Options -->
                <div class="space-y-3 mb-6">
                    <!-- WhatsApp -->
                    <a href="https://wa.me/6281234567890?text=Halo%20Admin%20FoodMate,%20saya%20ingin%20melaporkan%20pesanan%20yang%20belum%20diterima.%0A%0AOrder%20Number:%20ORDER_NUMBER_PLACEHOLDER" target="_blank" class="block bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-4 rounded-xl font-bold hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                            </div>
                            <div class="flex-1 text-left">
                                <p class="font-bold text-lg">WhatsApp</p>
                                <p class="text-sm opacity-90">Chat langsung dengan admin</p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </a>

                    <!-- Email -->
                    <a href="mailto:admin@foodmate.com?subject=Laporan%20Pesanan%20Belum%20Diterima%20-%20ORDER_NUMBER_PLACEHOLDER&body=Halo%20Admin%20FoodMate,%0A%0ASaya%20ingin%20melaporkan%20bahwa%20pesanan%20saya%20belum%20diterima.%0A%0AOrder%20Number:%20ORDER_NUMBER_PLACEHOLDER%0A%0AMohon%20bantuannya.%0A%0ATerima%20kasih." class="block bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-4 rounded-xl font-bold hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="flex-1 text-left">
                                <p class="font-bold text-lg">Email</p>
                                <p class="text-sm opacity-90">admin@foodmate.com</p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </a>

                    <!-- Phone -->
                    <a href="tel:+6281234567890" class="block bg-gradient-to-r from-purple-500 to-pink-600 text-white px-6 py-4 rounded-xl font-bold hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div class="flex-1 text-left">
                                <p class="font-bold text-lg">Telepon</p>
                                <p class="text-sm opacity-90">+62 812-3456-7890</p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </a>
                </div>

                <!-- Close Button -->
                <button onclick="closeContactModal()" class="w-full bg-gray-200 text-gray-700 px-6 py-3 rounded-xl font-bold hover:bg-gray-300 transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- Contact Modal Script -->
    <script>
        function openContactModal(orderNumber) {
            // Update order number in modal
            document.getElementById('modalOrderNumber').textContent = orderNumber;
            
            // Update WhatsApp and Email links with actual order number
            const whatsappLink = document.querySelector('a[href*="wa.me"]');
            const emailLink = document.querySelector('a[href^="mailto"]');
            
            if (whatsappLink) {
                whatsappLink.href = whatsappLink.href.replace('ORDER_NUMBER_PLACEHOLDER', orderNumber);
            }
            
            if (emailLink) {
                emailLink.href = emailLink.href.replace(/ORDER_NUMBER_PLACEHOLDER/g, orderNumber);
            }
            
            // Show modal
            document.getElementById('contactModal').classList.remove('hidden');
        }

        function closeContactModal() {
            document.getElementById('contactModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('contactModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeContactModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeContactModal();
            }
        });
    </script>

    <!-- Real-time Order Updates Script -->
    <script>
        // Real-time order status updates
        let lastCheckTimestamp = new Date().toISOString();
        let isCheckingUpdates = false;
        
        // Check for updates every 15 seconds
        const UPDATE_INTERVAL = 15000; // 15 seconds
        
        async function checkOrderUpdates() {
            if (isCheckingUpdates) return;
            
            isCheckingUpdates = true;
            
            try {
                const response = await fetch(`/api/orders/check-updates?last_check=${encodeURIComponent(lastCheckTimestamp)}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                });
                
                if (!response.ok) {
                    throw new Error('Failed to check updates');
                }
                
                const data = await response.json();
                
                // Update timestamp
                lastCheckTimestamp = data.timestamp;
                
                if (data.has_updates) {
                    console.log('Order updates detected:', data.updated_orders);
                    
                    // Show notification
                    showUpdateNotification(data.updated_orders);
                    
                    // Reload page to show updates
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                }
            } catch (error) {
                console.error('Error checking order updates:', error);
            } finally {
                isCheckingUpdates = false;
            }
        }
        
        function showUpdateNotification(updatedOrders) {
            const notification = document.createElement('div');
            notification.className = 'fixed top-20 right-6 bg-green-500 text-white px-6 py-4 rounded-xl shadow-2xl z-50 animate-slide-in-right';
            notification.style.animation = 'slideInRight 0.5s ease-out';
            
            let message = '🔔 <strong>Pesanan Diupdate!</strong><br>';
            updatedOrders.forEach(order => {
                message += `Order ${order.order_number}: ${order.status_label}<br>`;
            });
            
            notification.innerHTML = `
                <div class="flex items-start gap-3">
                    <div class="flex-1">
                        ${message}
                    </div>
                    <button onclick="this.parentElement.parentElement.remove()" class="text-white hover:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                if (notification.parentElement) {
                    notification.remove();
                }
            }, 5000);
        }
        
        // Add CSS animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            
            .animate-slide-in-right {
                animation: slideInRight 0.5s ease-out;
            }
        `;
        document.head.appendChild(style);
        
        // Start checking for updates
        setInterval(checkOrderUpdates, UPDATE_INTERVAL);
        
        // Also check when page becomes visible again
        document.addEventListener('visibilitychange', () => {
            if (!document.hidden) {
                checkOrderUpdates();
            }
        });
        
        // Initial check after 5 seconds
        setTimeout(checkOrderUpdates, 5000);
        
        console.log('✅ Real-time order updates enabled - checking every 15 seconds');
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\FoodMate\FoodMate\resources\views/history.blade.php ENDPATH**/ ?>