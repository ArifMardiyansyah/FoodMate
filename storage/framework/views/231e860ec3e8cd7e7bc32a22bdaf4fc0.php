<?php $__env->startSection('title', 'Manajemen Pesanan - FoodMate Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto">
    <!-- Page Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">Manajemen Pesanan</h2>
            <p class="text-gray-600 mt-1">Kelola semua pesanan dari customer</p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-6">
        <div class="bg-white rounded-2xl shadow-lg p-4 transition-all duration-200 hover:shadow-xl hover:scale-105">
            <p class="text-sm text-gray-600 mb-1">Total</p>
            <p class="text-2xl font-bold text-gray-900"><?php echo e($stats['total']); ?></p>
        </div>
        <div class="bg-white rounded-2xl shadow-lg p-4 transition-all duration-200 hover:shadow-xl hover:scale-105">
            <p class="text-sm text-gray-600 mb-1">Pending</p>
            <p class="text-2xl font-bold text-yellow-600"><?php echo e($stats['pending']); ?></p>
        </div>
        <div class="bg-white rounded-2xl shadow-lg p-4 transition-all duration-200 hover:shadow-xl hover:scale-105">
            <p class="text-sm text-gray-600 mb-1">Cooking</p>
            <p class="text-2xl font-bold text-orange-600"><?php echo e($stats['cooking']); ?></p>
        </div>
        <div class="bg-white rounded-2xl shadow-lg p-4 transition-all duration-200 hover:shadow-xl hover:scale-105">
            <p class="text-sm text-gray-600 mb-1">Delivering</p>
            <p class="text-2xl font-bold text-blue-600"><?php echo e($stats['delivering']); ?></p>
        </div>
        <div class="bg-white rounded-2xl shadow-lg p-4 transition-all duration-200 hover:shadow-xl hover:scale-105">
            <p class="text-sm text-gray-600 mb-1">Completed</p>
            <p class="text-2xl font-bold text-green-600"><?php echo e($stats['completed']); ?></p>
        </div>
        <div class="bg-white rounded-2xl shadow-lg p-4 transition-all duration-200 hover:shadow-xl hover:scale-105">
            <p class="text-sm text-gray-600 mb-1">Cancelled</p>
            <p class="text-2xl font-bold text-red-600"><?php echo e($stats['cancelled']); ?></p>
        </div>
        <div class="bg-white rounded-2xl shadow-lg p-4 transition-all duration-200 hover:shadow-xl hover:scale-105">
            <p class="text-sm text-gray-600 mb-1">Revenue</p>
            <p class="text-lg font-bold text-green-600">Rp <?php echo e(number_format($stats['total_revenue'] / 1000)); ?>K</p>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
        <form method="GET" action="<?php echo e(route('admin.orders.index')); ?>" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                <!-- Status Filter -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                        <option value="all" <?php echo e(request('status') == 'all' ? 'selected' : ''); ?>>Semua Status</option>
                        <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                        <option value="cooking" <?php echo e(request('status') == 'cooking' ? 'selected' : ''); ?>>Cooking</option>
                        <option value="delivering" <?php echo e(request('status') == 'delivering' ? 'selected' : ''); ?>>Delivering</option>
                        <option value="completed" <?php echo e(request('status') == 'completed' ? 'selected' : ''); ?>>Completed</option>
                        <option value="cancelled" <?php echo e(request('status') == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                    </select>
                </div>

                <!-- Date From -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Dari Tanggal</label>
                    <input type="date" name="date_from" value="<?php echo e(request('date_from')); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                </div>

                <!-- Date To -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Sampai Tanggal</label>
                    <input type="date" name="date_to" value="<?php echo e(request('date_to')); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                </div>

                <!-- Search -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Cari Items</label>
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Cari nama makanan..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                </div>

                <!-- Buttons -->
                <div class="flex items-end gap-2">
                    <button type="submit" class="flex-1 bg-[#F6A406] text-white px-6 py-2 rounded-xl font-semibold hover:bg-[#F08C00] transition-colors shadow-md hover:shadow-lg">
                        Filter
                    </button>
                    <a href="<?php echo e(route('admin.orders.index')); ?>" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-xl font-semibold hover:bg-gray-300 transition-colors">
                        Reset
                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- Orders Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-100 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">No. Pesanan</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Customer</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Tanggal</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Items</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Jumlah</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">Total</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Metode</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Pembayaran</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Status</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <a href="<?php echo e(route('admin.orders.show', $order->id)); ?>" class="text-[#F6A406] hover:underline font-semibold">
                                    <?php echo e($order->order_number); ?>

                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <div>
                                    <p class="font-semibold text-gray-900"><?php echo e($order->customer_name); ?></p>
                                    <p class="text-sm text-gray-500"><?php echo e($order->customer_phone); ?></p>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">
                                <?php echo e($order->created_at->format('d M Y')); ?><br>
                                <span class="text-sm text-gray-500"><?php echo e($order->created_at->format('H:i')); ?></span>
                            </td>
                            <td class="px-6 py-4 text-gray-900">
                                <?php if($order->items->count() > 0): ?>
                                    <?php echo e($order->items->pluck('product_name')->join(', ')); ?>

                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 text-center text-gray-900 font-semibold">
                                <?php echo e($order->items->sum('quantity')); ?>

                            </td>
                            <td class="px-6 py-4 text-right font-bold text-gray-900">
                                Rp <?php echo e(number_format($order->total)); ?>

                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">
                                    <?php echo e(ucfirst($order->payment_method)); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <?php
                                    $paymentColors = [
                                        'pending' => 'bg-yellow-100 text-yellow-800',
                                        'paid' => 'bg-green-100 text-green-800',
                                        'failed' => 'bg-red-100 text-red-800',
                                        'cancelled' => 'bg-gray-100 text-gray-800',
                                    ];
                                ?>
                                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full <?php echo e($paymentColors[$order->payment_status] ?? 'bg-gray-100 text-gray-800'); ?>">
                                    <?php echo e($order->payment_status_label); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <?php
                                    $statusColors = [
                                        'pending' => 'bg-yellow-100 text-yellow-800',
                                        'cooking' => 'bg-orange-100 text-orange-800',
                                        'delivering' => 'bg-blue-100 text-blue-800',
                                        'completed' => 'bg-green-100 text-green-800',
                                        'cancelled' => 'bg-red-100 text-red-800',
                                    ];
                                    $statusLabels = [
                                        'pending' => 'Pending',
                                        'cooking' => '👨‍🍳 Cooking',
                                        'delivering' => '🚚 Delivering',
                                        'completed' => '✅ Completed',
                                        'cancelled' => '❌ Cancelled',
                                    ];
                                ?>
                                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full <?php echo e($statusColors[$order->status] ?? 'bg-gray-100 text-gray-800'); ?>">
                                    <?php echo e($statusLabels[$order->status] ?? ucfirst($order->status)); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <?php if($order->payment_status === 'pending'): ?>
                                        <button onclick="confirmPayment(<?php echo e($order->id); ?>)" class="p-2 bg-green-100 text-green-600 rounded-lg hover:bg-green-200 transition-colors" title="Konfirmasi Pembayaran">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('admin.orders.show', $order->id)); ?>" class="p-2 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 transition-colors" title="Lihat Detail">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <button onclick="openStatusModal(<?php echo e($order->id); ?>, '<?php echo e($order->status); ?>')" class="p-2 bg-orange-100 text-orange-600 rounded-lg hover:bg-orange-200 transition-colors" title="Update Status">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="10" class="px-6 py-12 text-center text-gray-500">
                                Tidak ada pesanan ditemukan
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php if($orders->hasPages()): ?>
            <div class="px-6 py-4 border-t border-gray-200">
                <?php echo e($orders->links()); ?>

            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Modal Update Status -->
<div id="statusModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
        <h3 class="text-xl font-bold text-gray-900 mb-4">Update Status Pesanan</h3>
        <form id="statusForm" class="space-y-4">
            <input type="hidden" id="order_id">
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status Baru</label>
                <select id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                    <option value="pending">Pending</option>
                    <option value="cooking">👨‍🍳 Cooking (Sedang Dimasak)</option>
                    <option value="delivering">🚚 Delivering (Sedang Diantar)</option>
                    <option value="completed">✅ Completed (Selesai)</option>
                    <option value="cancelled">❌ Cancelled (Dibatalkan)</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Catatan (Opsional)</label>
                <select id="new_status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                    <option value="pending">Menunggu Konfirmasi</option>
                    <option value="cooking">Sedang Dimasak</option>
                    <option value="delivering">Sedang Diantar</option>
                    <option value="completed">Selesai</option>
                    <option value="cancelled">Dibatalkan</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Catatan (Opsional)</label>
                <textarea id="status_notes" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent" placeholder="Tambahkan catatan..."></textarea>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="flex-1 bg-[#F6A406] text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#F08C00] transition-colors">
                    Update Status
                </button>
                <button type="button" onclick="closeStatusModal()" class="flex-1 bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-semibold hover:bg-gray-300 transition-colors">
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

    function openStatusModal(orderId, currentStatus) {
        document.getElementById('order_id').value = orderId;
        document.getElementById('new_status').value = currentStatus;
        document.getElementById('status_notes').value = '';
        document.getElementById('statusModal').classList.remove('hidden');
    }

    function closeStatusModal() {
        document.getElementById('statusModal').classList.add('hidden');
    }

    document.getElementById('statusForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const orderId = document.getElementById('order_id').value;
        const status = document.getElementById('new_status').value;
        const notes = document.getElementById('status_notes').value;

        try {
            const response = await fetch(`/admin/orders/${orderId}/update-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ status, notes }),
            });

            if (!response.ok) {
                const errorData = await response.json();
                throw new Error(errorData.message || 'Gagal mengupdate status');
            }

            const result = await response.json();
            
            if (result.success) {
                alert('Status pesanan berhasil diupdate!');
                location.reload();
            } else {
                alert('Gagal update status: ' + result.message);
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan: ' + error.message);
        }
    });

    // Payment Confirmation Function
    async function confirmPayment(orderId) {
        if (!confirm('Konfirmasi pembayaran untuk pesanan ini?\n\nPesanan akan otomatis diproses (status berubah ke Cooking).')) {
            return;
        }

        try {
            const response = await fetch(`/admin/orders/${orderId}/confirm-payment`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
            });

            const result = await response.json();
            
            if (result.success) {
                alert('✅ ' + result.message);
                location.reload();
            } else {
                alert('❌ ' + result.message);
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan: ' + error.message);
        }
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FoodMate\FoodMate\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>