<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Menu Favorit - FoodMate</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-white min-h-screen font-poppins pb-24">
    <div class="max-w-4xl mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <a href="/profile" class="inline-flex items-center justify-center w-10 h-10 bg-[#fff7ed] rounded-full hover:bg-[#ffedd5] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
            </a>
            <a href="/cart" class="relative inline-flex items-center justify-center w-12 h-12 bg-[#fff7ed] rounded-full hover:bg-[#ffedd5] transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                </svg>
                <span class="absolute -top-1 -right-1 min-w-[20px] h-5 bg-[#f97316] rounded-full text-xs font-semibold text-white flex items-center justify-center px-1"><?php echo e(number_format($cartCount)); ?></span>
            </a>
        </div>

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-black mb-2">Menu Favorit Saya</h1>
            <p class="text-gray-500">Menu yang telah Anda favoritkan</p>
        </div>

        <?php if($favorites->isEmpty()): ?>
            <div class="text-center py-16">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Favorit</h3>
                <p class="text-gray-500 mb-6">Anda belum menambahkan menu favorit</p>
                <a href="/menu" class="inline-block bg-[#f97316] text-white px-6 py-3 rounded-xl font-semibold hover:bg-[#ea580c] transition-colors">
                    Jelajahi Menu
                </a>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <?php $__currentLoopData = $favorites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('menu.show', $product->slug)); ?>" class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-shadow">
                        <div class="relative h-48 bg-gray-100">
                            <img src="<?php echo e(asset($product->image_path ?? 'images/food/default.png')); ?>" alt="<?php echo e($product->name); ?>" class="w-full h-full object-cover">
                            <div class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-full flex items-center gap-1.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="#ef4444" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                                </svg>
                                <span class="text-xs font-semibold text-gray-700"><?php echo e(number_format($product->favorites_count)); ?></span>
                            </div>
                        </div>
                        <div class="p-4">
                            <span class="inline-block px-3 py-1 bg-[#fff7ed] text-[#f97316] text-xs font-semibold rounded-full mb-2"><?php echo e($product->category ?? 'Menu'); ?></span>
                            <h3 class="text-lg font-bold text-black mb-2"><?php echo e($product->name); ?></h3>
                            <p class="text-sm text-gray-500 line-clamp-2 mb-3"><?php echo e($product->description); ?></p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold text-[#f97316]">Rp. <?php echo e(number_format($product->price)); ?></span>
                                <div class="flex items-center gap-1">
                                    <span class="text-yellow-400">⭐</span>
                                    <span class="text-sm font-medium text-gray-600"><?php echo e(number_format($product->rating ?? 5, 1)); ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>

    <?php echo $__env->make('layouts.partials.bottom-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\FoodMate\FoodMate\resources\views/favorites/index.blade.php ENDPATH**/ ?>