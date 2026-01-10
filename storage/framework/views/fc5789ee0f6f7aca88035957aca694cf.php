<?php $__env->startSection('title', 'Notifikasi Pesanan - FoodMate Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto">
    <!-- Page Header -->
    <div class="mb-8 bg-gradient-to-r from-[#F6A406] to-[#F08C00] rounded-3xl p-8 shadow-2xl">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-4xl font-bold text-white drop-shadow-lg">Notifikasi Pesanan</h2>
                <p class="text-white/90 mt-2 text-lg">Pantau semua pesanan baru yang masuk</p>
            </div>
            <div class="hidden md:block">
                <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 border-2 border-white/30">
                    <p class="text-white/80 text-sm">Total Notifikasi</p>
                    <p class="text-white font-bold text-3xl"><?php echo e($stats['total']); ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl shadow-xl p-6 text-white transition-all duration-200 hover:shadow-2xl hover:scale-105">
            <div class="flex items-center justify-between mb-3">
                <div class="p-3 bg-white/20 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </div>
            </div>
            <h3 class="text-3xl font-bold mb-1"><?php echo e($stats['total']); ?></h3>
            <p class="text-sm opacity-90">Total Notifikasi</p>
        </div>

        <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl shadow-xl p-6 text-white transition-all duration-200 hover:shadow-2xl hover:scale-105">
            <div class="flex items-center justify-between mb-3">
                <div class="p-3 bg-white/20 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
            </div>
            <h3 class="text-3xl font-bold mb-1"><?php echo e($stats['unread']); ?></h3>
            <p class="text-sm opacity-90">Belum Dibaca</p>
        </div>

        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl shadow-xl p-6 text-white transition-all duration-200 hover:shadow-2xl hover:scale-105">
            <div class="flex items-center justify-between mb-3">
                <div class="p-3 bg-white/20 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <h3 class="text-3xl font-bold mb-1"><?php echo e($stats['read']); ?></h3>
            <p class="text-sm opacity-90">Sudah Dibaca</p>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl shadow-xl p-6 text-white transition-all duration-200 hover:shadow-2xl hover:scale-105">
            <div class="flex items-center justify-between mb-3">
                <div class="p-3 bg-white/20 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <h3 class="text-3xl font-bold mb-1"><?php echo e($stats['today']); ?></h3>
            <p class="text-sm opacity-90">Notifikasi Hari Ini</p>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#F6A406]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                Filter Notifikasi
            </h3>
            <?php if($stats['unread'] > 0): ?>
                <form action="<?php echo e(route('admin.notifications.mark-all-read')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-xl font-semibold hover:bg-green-600 transition-colors shadow-md hover:shadow-lg flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        Tandai Semua Dibaca
                    </button>
                </form>
            <?php endif; ?>
        </div>
        <form method="GET" action="<?php echo e(route('admin.notifications.index')); ?>" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                <!-- Status Filter -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                        <option value="all" <?php echo e(request('status') == 'all' ? 'selected' : ''); ?>>Semua Status</option>
                        <option value="unread" <?php echo e(request('status') == 'unread' ? 'selected' : ''); ?>>Belum Dibaca</option>
                        <option value="read" <?php echo e(request('status') == 'read' ? 'selected' : ''); ?>>Sudah Dibaca</option>
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
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Cari</label>
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Cari notifikasi..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                </div>

                <!-- Buttons -->
                <div class="flex items-end gap-2">
                    <button type="submit" class="flex-1 bg-[#F6A406] text-white px-6 py-2 rounded-xl font-semibold hover:bg-[#F08C00] transition-colors shadow-md hover:shadow-lg">
                        Filter
                    </button>
                    <a href="<?php echo e(route('admin.notifications.index')); ?>" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-xl font-semibold hover:bg-gray-300 transition-colors">
                        Reset
                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- Notifications List -->
    <div class="space-y-4">
        <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-200 hover:shadow-xl <?php echo e(!$notification->is_read ? 'border-l-4 border-[#F6A406]' : ''); ?>">
                <div class="p-6">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-start gap-4 flex-1">
                            <!-- Icon -->
                            <div class="flex-shrink-0">
                                <?php if(!$notification->is_read): ?>
                                    <div class="w-12 h-12 bg-gradient-to-br from-[#F6A406] to-[#F08C00] rounded-full flex items-center justify-center shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                        </svg>
                                    </div>
                                <?php else: ?>
                                    <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Content -->
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 mb-2">
                                    <h3 class="text-lg font-bold text-gray-900"><?php echo e($notification->title); ?></h3>
                                    <?php if(!$notification->is_read): ?>
                                        <span class="bg-[#F6A406] text-white text-xs px-2 py-1 rounded-full font-semibold">Baru</span>
                                    <?php endif; ?>
                                </div>
                                <p class="text-gray-600 mb-3"><?php echo e($notification->message); ?></p>
                                
                                <?php if($notification->order): ?>
                                    <div class="bg-gray-50 rounded-xl p-4 mb-3">
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-sm">
                                            <div>
                                                <p class="text-gray-500 mb-1">No. Pesanan</p>
                                                <p class="font-semibold text-gray-900"><?php echo e($notification->order->order_number); ?></p>
                                            </div>
                                            <div>
                                                <p class="text-gray-500 mb-1">Pelanggan</p>
                                                <p class="font-semibold text-gray-900"><?php echo e($notification->order->customer_name); ?></p>
                                            </div>
                                            <div>
                                                <p class="text-gray-500 mb-1">Total</p>
                                                <p class="font-semibold text-green-600">Rp <?php echo e(number_format($notification->order->total)); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="flex items-center gap-4 text-sm text-gray-500">
                                    <div class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span><?php echo e($notification->created_at->diffForHumans()); ?></span>
                                    </div>
                                    <?php if($notification->is_read && $notification->read_at): ?>
                                        <div class="flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span>Dibaca <?php echo e($notification->read_at->diffForHumans()); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex flex-col gap-2">
                            <?php if($notification->order): ?>
                                <a href="<?php echo e(route('admin.orders.show', $notification->order->id)); ?>" class="bg-blue-500 text-white px-4 py-2 rounded-xl font-semibold hover:bg-blue-600 transition-colors shadow-md hover:shadow-lg text-sm text-center">
                                    Lihat Pesanan
                                </a>
                            <?php endif; ?>
                            
                            <?php if(!$notification->is_read): ?>
                                <button onclick="markAsRead(<?php echo e($notification->id); ?>)" class="bg-green-500 text-white px-4 py-2 rounded-xl font-semibold hover:bg-green-600 transition-colors shadow-md hover:shadow-lg text-sm">
                                    Tandai Dibaca
                                </button>
                            <?php endif; ?>

                            <form action="<?php echo e(route('admin.notifications.delete', $notification->id)); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus notifikasi ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="w-full bg-red-500 text-white px-4 py-2 rounded-xl font-semibold hover:bg-red-600 transition-colors shadow-md hover:shadow-lg text-sm">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Tidak Ada Notifikasi</h3>
                <p class="text-gray-600">Belum ada notifikasi pesanan yang masuk</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <?php if($notifications->hasPages()): ?>
        <div class="mt-6">
            <?php echo e($notifications->links()); ?>

        </div>
    <?php endif; ?>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
function markAsRead(notificationId) {
    fetch(`/admin/notifications/${notificationId}/mark-read`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menandai notifikasi');
    });
}

// Auto refresh setiap 30 detik untuk cek notifikasi baru
setInterval(() => {
    fetch('/admin/notifications/unread-count')
        .then(response => response.json())
        .then(data => {
            // Update badge jika ada
            const badge = document.getElementById('notification-badge');
            if (badge && data.count > 0) {
                badge.textContent = data.count;
                badge.classList.remove('hidden');
            }
        })
        .catch(error => console.error('Error:', error));
}, 30000);
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FoodMate\FoodMate\resources\views/admin/notifications/index.blade.php ENDPATH**/ ?>