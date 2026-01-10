<?php $__env->startSection('title', 'Manajemen Produk - FoodMate Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto">
    <!-- Page Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">Manajemen Produk</h2>
            <p class="text-gray-600 mt-1">Kelola semua produk makanan dan minuman</p>
        </div>
        <a href="<?php echo e(route('admin.products.create')); ?>" class="bg-[#F6A406] text-white px-6 py-3 rounded-xl font-semibold hover:bg-[#F08C00] transition-colors shadow-md hover:shadow-lg inline-flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Produk
        </a>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-2xl shadow-lg p-6 transition-all duration-200 hover:shadow-xl hover:scale-105">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Total Produk</p>
                    <p class="text-3xl font-bold text-gray-900"><?php echo e($stats['total']); ?></p>
                </div>
                <div class="p-3 bg-blue-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-lg p-6 transition-all duration-200 hover:shadow-xl hover:scale-105">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Produk Aktif</p>
                    <p class="text-3xl font-bold text-green-600"><?php echo e($stats['active']); ?></p>
                </div>
                <div class="p-3 bg-green-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-lg p-6 transition-all duration-200 hover:shadow-xl hover:scale-105">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Produk Nonaktif</p>
                    <p class="text-3xl font-bold text-red-600"><?php echo e($stats['inactive']); ?></p>
                </div>
                <div class="p-3 bg-red-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
        <form method="GET" action="<?php echo e(route('admin.products.index')); ?>" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Category Filter -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                    <select name="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                        <option value="all" <?php echo e(request('category') == 'all' ? 'selected' : ''); ?>>Semua Kategori</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat); ?>" <?php echo e(request('category') == $cat ? 'selected' : ''); ?>><?php echo e($cat); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Status Filter -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                        <option value="all" <?php echo e(request('status') == 'all' ? 'selected' : ''); ?>>Semua Status</option>
                        <option value="active" <?php echo e(request('status') == 'active' ? 'selected' : ''); ?>>Aktif</option>
                        <option value="inactive" <?php echo e(request('status') == 'inactive' ? 'selected' : ''); ?>>Nonaktif</option>
                    </select>
                </div>

                <!-- Search -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Cari Produk</label>
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Nama produk..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                </div>

                <!-- Buttons -->
                <div class="flex items-end gap-2">
                    <button type="submit" class="flex-1 bg-[#F6A406] text-white px-6 py-2 rounded-xl font-semibold hover:bg-[#F08C00] transition-colors shadow-md hover:shadow-lg">
                        Filter
                    </button>
                    <a href="<?php echo e(route('admin.products.index')); ?>" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-xl font-semibold hover:bg-gray-300 transition-colors">
                        Reset
                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-200 hover:scale-105">
                <!-- Product Image -->
                <div class="relative h-48 bg-gray-200">
                    <img src="<?php echo e(asset($product->image_path ?? 'images/food/default.png')); ?>" alt="<?php echo e($product->name); ?>" class="w-full h-full object-cover">
                    <div class="absolute top-3 right-3 flex gap-2">
                        <?php if($product->is_active): ?>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                        <?php else: ?>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Nonaktif</span>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="p-4">
                    <div class="mb-2">
                        <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                            <?php echo e($product->category); ?>

                        </span>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1 line-clamp-2"><?php echo e($product->name); ?></h3>
                    <p class="text-sm text-gray-500 mb-3 line-clamp-2"><?php echo e($product->description); ?></p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-lg font-bold text-[#F6A406]">Rp <?php echo e(number_format($product->price)); ?></p>
                            <?php if($product->rating): ?>
                                <div class="flex items-center gap-1 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                    </svg>
                                    <span class="text-sm text-gray-600"><?php echo e(number_format($product->rating, 1)); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if($product->use_stock_system): ?>
                            <div class="text-right">
                                <p class="text-xs text-gray-500">Stok Harian</p>
                                <p class="text-sm font-semibold text-gray-900"><?php echo e($product->default_daily_stock); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-2">
                        <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" class="flex-1 bg-blue-100 text-blue-600 px-4 py-2 rounded-lg font-semibold hover:bg-blue-200 transition-colors text-center text-sm">
                            Edit
                        </a>
                        <button onclick="toggleStatus(<?php echo e($product->id); ?>, <?php echo e($product->is_active ? 'false' : 'true'); ?>)" class="flex-1 <?php echo e($product->is_active ? 'bg-red-100 text-red-600 hover:bg-red-200' : 'bg-green-100 text-green-600 hover:bg-green-200'); ?> px-4 py-2 rounded-lg font-semibold transition-colors text-sm">
                            <?php echo e($product->is_active ? 'Nonaktifkan' : 'Aktifkan'); ?>

                        </button>
                        <button onclick="deleteProduct(<?php echo e($product->id); ?>)" class="bg-red-100 text-red-600 p-2 rounded-lg hover:bg-red-200 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full text-center py-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <p class="text-gray-500 text-lg">Tidak ada produk ditemukan</p>
                <a href="<?php echo e(route('admin.products.create')); ?>" class="inline-block mt-4 text-[#F6A406] hover:text-[#F08C00] font-semibold">
                    Tambah Produk Pertama
                </a>
            </div>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <?php if($products->hasPages()): ?>
        <div class="mt-8">
            <?php echo e($products->links()); ?>

        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    async function toggleStatus(productId, newStatus) {
        if (!confirm('Yakin ingin mengubah status produk ini?')) {
            return;
        }

        try {
            const response = await fetch(`/admin/products/${productId}/toggle-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
            });

            const result = await response.json();
            
            if (result.success) {
                alert(result.message);
                location.reload();
            } else {
                alert('Gagal mengubah status: ' + result.message);
            }
        } catch (error) {
            alert('Terjadi kesalahan: ' + error.message);
        }
    }

    async function deleteProduct(productId) {
        if (!confirm('Yakin ingin menghapus produk ini? Tindakan ini tidak dapat dibatalkan!')) {
            return;
        }

        try {
            const response = await fetch(`/admin/products/${productId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
            });

            const result = await response.json();
            
            if (result.success) {
                alert(result.message);
                location.reload();
            } else {
                alert('Gagal menghapus produk: ' + result.message);
            }
        } catch (error) {
            alert('Terjadi kesalahan: ' + error.message);
        }
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FoodMate\FoodMate\resources\views/admin/products/index.blade.php ENDPATH**/ ?>