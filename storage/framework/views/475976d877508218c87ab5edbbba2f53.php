<?php $__env->startSection('title', 'Manajemen Stok - FoodMate Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto">
    <!-- Page Header -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Manajemen Stok</h2>
        <p class="text-gray-600 mt-1">Kelola stok harian produk</p>
    </div>

    <!-- Filter Section -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
        <form method="GET" action="/admin/stock" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Tanggal -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal</label>
                    <input type="date" name="date" value="<?php echo e($date); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                </div>

                <!-- Kategori -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                    <select name="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                        <option value="all" <?php echo e($category == 'all' ? 'selected' : ''); ?>>Semua Kategori</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat); ?>" <?php echo e($category == $cat ? 'selected' : ''); ?>><?php echo e($cat); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Pencarian -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Cari Produk</label>
                    <input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Nama produk..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                </div>

                <!-- Button -->
                <div class="flex items-end gap-2">
                    <button type="submit" class="flex-1 bg-[#F6A406] text-white px-6 py-2 rounded-xl font-semibold hover:bg-[#F08C00] transition-colors shadow-md hover:shadow-lg">
                        Filter
                    </button>
                    <a href="/admin/stock" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-xl font-semibold hover:bg-gray-300 transition-colors">
                        Reset
                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- Stock Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Produk</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Kategori</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Stok Awal</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Terjual</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Sisa</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Status</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    $stock = $product->dailyStocks->first();
                                    $useStock = $product->use_stock_system;
                                ?>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-12 bg-gray-200 rounded-lg overflow-hidden">
                                                <img src="<?php echo e(asset($product->image_path ?? 'images/food/default.png')); ?>" alt="<?php echo e($product->name); ?>" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <h4 class="font-semibold text-gray-900"><?php echo e($product->name); ?></h4>
                                                <p class="text-sm text-gray-500">Rp <?php echo e(number_format($product->price)); ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                            <?php echo e($product->category ?? 'Lainnya'); ?>

                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <?php if($useStock && $stock): ?>
                                            <span class="font-semibold text-gray-900"><?php echo e($stock->initial_stock); ?></span>
                                        <?php else: ?>
                                            <span class="text-gray-400">-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <?php if($useStock && $stock): ?>
                                            <span class="font-semibold text-red-600"><?php echo e($stock->sold_quantity); ?></span>
                                        <?php else: ?>
                                            <span class="text-gray-400">-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <?php if($useStock && $stock): ?>
                                            <div class="flex flex-col items-center gap-1">
                                                <span class="font-bold text-lg <?php echo e($stock->isLowStock() ? 'text-red-600' : 'text-green-600'); ?>">
                                                    <?php echo e($stock->current_stock); ?>

                                                </span>
                                                <div class="w-full bg-gray-200 rounded-full h-2">
                                                    <div class="h-2 rounded-full <?php echo e($stock->getStockPercentage() > 50 ? 'bg-green-500' : ($stock->getStockPercentage() > 20 ? 'bg-yellow-500' : 'bg-red-500')); ?>" 
                                                         style="width: <?php echo e($stock->getStockPercentage()); ?>%"></div>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <span class="text-green-600 font-semibold">Unlimited</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <?php if($useStock && $stock): ?>
                                            <button onclick="toggleAvailability(<?php echo e($product->id); ?>, <?php echo e($stock->is_available ? 'false' : 'true'); ?>)" 
                                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-lg font-semibold transition-colors <?php echo e($stock->is_available ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-red-100 text-red-800 hover:bg-red-200'); ?>">
                                                <span class="w-2 h-2 rounded-full <?php echo e($stock->is_available ? 'bg-green-500' : 'bg-red-500'); ?>"></span>
                                                <?php echo e($stock->is_available ? 'Tersedia' : 'Habis'); ?>

                                            </button>
                                        <?php else: ?>
                                            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-lg font-semibold bg-blue-100 text-blue-800">
                                                <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                                Selalu Tersedia
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php if($useStock && $stock): ?>
                                            <div class="flex items-center justify-center gap-2">
                                                <button onclick="openEditModal(<?php echo e($product->id); ?>, <?php echo e(json_encode($stock)); ?>)" 
                                                        class="p-2 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 transition-colors" title="Edit Stok">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </button>
                                                <button onclick="addStock(<?php echo e($product->id); ?>)" 
                                                        class="p-2 bg-green-100 text-green-600 rounded-lg hover:bg-green-200 transition-colors" title="Tambah Stok">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                                    </svg>
                                                </button>
                                                <button onclick="resetStock(<?php echo e($product->id); ?>)" 
                                                        class="p-2 bg-yellow-100 text-yellow-600 rounded-lg hover:bg-yellow-200 transition-colors" title="Reset Stok">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                    </svg>
                                                </button>
                                            </div>
                                        <?php else: ?>
                                            <span class="text-gray-400 text-sm">Tidak menggunakan stok</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                        Tidak ada produk ditemukan
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>

<!-- Modal Edit Stok -->
<div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl p-6 max-w-md w-full mx-4">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Edit Stok Produk</h3>
            <form id="editForm" class="space-y-4">
                <input type="hidden" id="edit_product_id">
                <input type="hidden" id="edit_date" value="<?php echo e($date); ?>">
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Stok Awal</label>
                    <input type="number" id="edit_initial_stock" min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Stok Saat Ini</label>
                    <input type="number" id="edit_current_stock" min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Status Ketersediaan</label>
                    <select id="edit_is_available" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Catatan Admin</label>
                    <textarea id="edit_admin_notes" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent" placeholder="Catatan opsional..."></textarea>
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="flex-1 bg-[#F6A406] text-white px-6 py-2 rounded-xl font-semibold hover:bg-[#F08C00] transition-colors shadow-md hover:shadow-lg">
                        Simpan
                    </button>
                    <button type="button" onclick="closeEditModal()" class="flex-1 bg-gray-200 text-gray-700 px-6 py-2 rounded-xl font-semibold hover:bg-gray-300 transition-colors">
                        Batal
                    </button>
                </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        const currentDate = '<?php echo e($date); ?>';

        function openEditModal(productId, stock) {
            document.getElementById('edit_product_id').value = productId;
            document.getElementById('edit_initial_stock').value = stock.initial_stock;
            document.getElementById('edit_current_stock').value = stock.current_stock;
            document.getElementById('edit_is_available').value = stock.is_available ? '1' : '0';
            document.getElementById('edit_admin_notes').value = stock.admin_notes || '';
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        document.getElementById('editForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const productId = document.getElementById('edit_product_id').value;
            const data = {
                date: currentDate,
                initial_stock: parseInt(document.getElementById('edit_initial_stock').value),
                current_stock: parseInt(document.getElementById('edit_current_stock').value),
                is_available: document.getElementById('edit_is_available').value === '1',
                admin_notes: document.getElementById('edit_admin_notes').value,
            };

            try {
                const response = await fetch(`/admin/stock/${productId}/update`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify(data),
                });

                const result = await response.json();
                
                if (result.success) {
                    alert('Stok berhasil diupdate!');
                    location.reload();
                } else {
                    alert('Gagal update stok: ' + result.message);
                }
            } catch (error) {
                alert('Terjadi kesalahan: ' + error.message);
            }
        });

        async function toggleAvailability(productId, isAvailable) {
            const notes = prompt(isAvailable ? 'Catatan (opsional):' : 'Alasan tidak tersedia:');
            
            try {
                const response = await fetch(`/admin/stock/${productId}/toggle-availability`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        date: currentDate,
                        is_available: isAvailable,
                        admin_notes: notes,
                    }),
                });

                const result = await response.json();
                
                if (result.success) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Gagal update status: ' + result.message);
                }
            } catch (error) {
                alert('Terjadi kesalahan: ' + error.message);
            }
        }

        async function addStock(productId) {
            const quantity = prompt('Jumlah stok yang ingin ditambahkan:');
            
            if (!quantity || isNaN(quantity) || parseInt(quantity) <= 0) {
                alert('Jumlah tidak valid!');
                return;
            }

            try {
                const response = await fetch(`/admin/stock/${productId}/add`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        date: currentDate,
                        quantity: parseInt(quantity),
                    }),
                });

                const result = await response.json();
                
                if (result.success) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Gagal menambah stok: ' + result.message);
                }
            } catch (error) {
                alert('Terjadi kesalahan: ' + error.message);
            }
        }

        async function resetStock(productId) {
            if (!confirm('Reset stok ke default? Ini akan menghapus data penjualan hari ini.')) {
                return;
            }

            try {
                const response = await fetch(`/admin/stock/${productId}/reset`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        date: currentDate,
                    }),
                });

                const result = await response.json();
                
                if (result.success) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Gagal reset stok: ' + result.message);
                }
            } catch (error) {
                alert('Terjadi kesalahan: ' + error.message);
            }
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FoodMate\FoodMate\resources\views/admin/stock/index.blade.php ENDPATH**/ ?>