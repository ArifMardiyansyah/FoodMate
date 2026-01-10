<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'FoodMate Admin'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-gray-50 min-h-screen font-abhaya">
    <!-- Header -->
    <header class="bg-gradient-to-r from-[#F6A406] to-[#F08C00] shadow-lg sticky top-0 z-40">
        <div class="px-6 lg:px-12 py-5">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-8">
                    <div class="flex items-center gap-3">
                        <div>
                            <h1 class="text-3xl font-bold text-white drop-shadow-md">Admin Panel</h1>
                            <p class="text-white/80 text-sm">Admin</p>
                        </div>
                    </div>
                    <nav class="hidden lg:flex items-center gap-2">
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="px-5 py-2.5 rounded-xl font-semibold transition-all <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-white text-[#F6A406] shadow-md' : 'text-white hover:bg-white/20'); ?>">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Dashboard
                            </div>
                        </a>
                        <a href="<?php echo e(route('admin.notifications.index')); ?>" class="px-5 py-2.5 rounded-xl font-semibold transition-all relative <?php echo e(request()->routeIs('admin.notifications.*') ? 'bg-white text-[#F6A406] shadow-md' : 'text-white hover:bg-white/20'); ?>">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                Notifikasi
                                <?php
                                    $unreadCount = \App\Models\OrderNotification::where('type', 'new_order')->where('is_read', false)->count();
                                ?>
                                <?php if($unreadCount > 0): ?>
                                    <span id="notification-badge" class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">
                                        <?php echo e($unreadCount > 9 ? '9+' : $unreadCount); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        </a>
                        <a href="<?php echo e(route('admin.orders.index')); ?>" class="px-5 py-2.5 rounded-xl font-semibold transition-all <?php echo e(request()->routeIs('admin.orders.*') ? 'bg-white text-[#F6A406] shadow-md' : 'text-white hover:bg-white/20'); ?>">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                Pesanan
                            </div>
                        </a>
                        <a href="<?php echo e(route('admin.products.index')); ?>" class="px-5 py-2.5 rounded-xl font-semibold transition-all <?php echo e(request()->routeIs('admin.products.*') ? 'bg-white text-[#F6A406] shadow-md' : 'text-white hover:bg-white/20'); ?>">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                                Produk
                            </div>
                        </a>
                        <a href="<?php echo e(route('admin.stock.index')); ?>" class="px-5 py-2.5 rounded-xl font-semibold transition-all <?php echo e(request()->routeIs('admin.stock.*') ? 'bg-white text-[#F6A406] shadow-md' : 'text-white hover:bg-white/20'); ?>">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                Stok
                            </div>
                        </a>
                    </nav>
                </div>
                <div class="flex items-center gap-3">
                    <div class="hidden md:flex items-center gap-3 bg-white/20 px-4 py-2 rounded-xl">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#F6A406]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="text-white">
                            <p class="font-semibold"><?php echo e(auth()->user()->name); ?></p>
                            <p class="text-xs text-white/80">Administrator</p>
                        </div>
                    </div>
                    <form action="/logout" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="bg-white text-[#F6A406] px-6 py-2.5 rounded-xl font-semibold hover:bg-gray-100 transition-all shadow-md hover:shadow-lg">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Navigation -->
    <div class="lg:hidden bg-white shadow-md sticky top-[88px] z-30">
        <nav class="flex overflow-x-auto">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="flex-shrink-0 px-6 py-4 font-semibold border-b-4 transition-all <?php echo e(request()->routeIs('admin.dashboard') ? 'border-[#F6A406] text-[#F6A406] bg-orange-50' : 'border-transparent text-gray-600 hover:bg-gray-50'); ?>">
                <div class="flex flex-col items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="text-xs">Dashboard</span>
                </div>
            </a>
            <a href="<?php echo e(route('admin.notifications.index')); ?>" class="flex-shrink-0 px-6 py-4 font-semibold border-b-4 transition-all relative <?php echo e(request()->routeIs('admin.notifications.*') ? 'border-[#F6A406] text-[#F6A406] bg-orange-50' : 'border-transparent text-gray-600 hover:bg-gray-50'); ?>">
                <div class="flex flex-col items-center gap-1">
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <?php if($unreadCount > 0): ?>
                            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full w-4 h-4 flex items-center justify-center">
                                <?php echo e($unreadCount > 9 ? '9+' : $unreadCount); ?>

                            </span>
                        <?php endif; ?>
                    </div>
                    <span class="text-xs">Notifikasi</span>
                </div>
            </a>
            <a href="<?php echo e(route('admin.orders.index')); ?>" class="flex-shrink-0 px-6 py-4 font-semibold border-b-4 transition-all <?php echo e(request()->routeIs('admin.orders.*') ? 'border-[#F6A406] text-[#F6A406] bg-orange-50' : 'border-transparent text-gray-600 hover:bg-gray-50'); ?>">
                <div class="flex flex-col items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span class="text-xs">Pesanan</span>
                </div>
            </a>
            <a href="<?php echo e(route('admin.products.index')); ?>" class="flex-shrink-0 px-6 py-4 font-semibold border-b-4 transition-all <?php echo e(request()->routeIs('admin.products.*') ? 'border-[#F6A406] text-[#F6A406] bg-orange-50' : 'border-transparent text-gray-600 hover:bg-gray-50'); ?>">
                <div class="flex flex-col items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span class="text-xs">Produk</span>
                </div>
            </a>
            <a href="<?php echo e(route('admin.stock.index')); ?>" class="flex-shrink-0 px-6 py-4 font-semibold border-b-4 transition-all <?php echo e(request()->routeIs('admin.stock.*') ? 'border-[#F6A406] text-[#F6A406] bg-orange-50' : 'border-transparent text-gray-600 hover:bg-gray-50'); ?>">
                <div class="flex flex-col items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <span class="text-xs">Stok</span>
                </div>
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <main class="px-6 lg:px-12 py-8">
        <?php if(session('success')): ?>
            <div class="max-w-7xl mx-auto mb-6">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
                    <span class="block sm:inline"><?php echo e(session('success')); ?></span>
                </div>
            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="max-w-7xl mx-auto mb-6">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative" role="alert">
                    <span class="block sm:inline"><?php echo e(session('error')); ?></span>
                </div>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\FoodMate\FoodMate\resources\views/layouts/admin.blade.php ENDPATH**/ ?>