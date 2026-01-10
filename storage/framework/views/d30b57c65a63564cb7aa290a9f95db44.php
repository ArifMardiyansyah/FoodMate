<?php $__env->startSection('title', 'Edit Produk - FoodMate Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="<?php echo e(route('admin.products.index')); ?>" class="inline-flex items-center gap-2 text-gray-600 hover:text-[#F6A406] transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Daftar Produk
        </a>
    </div>

    <!-- Page Header -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Edit Produk</h2>
        <p class="text-gray-600 mt-1">Update informasi produk</p>
    </div>

    <!-- Form -->
    <form action="<?php echo e(route('admin.products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-sm p-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="space-y-6">
            <!-- Current Image Preview -->
            <?php if($product->image_path): ?>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Saat Ini</label>
                    <img src="<?php echo e(asset($product->image_path)); ?>" alt="<?php echo e($product->name); ?>" class="w-32 h-32 object-cover rounded-lg">
                </div>
            <?php endif; ?>

            <!-- Product Name -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Produk <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="<?php echo e(old('name', $product->name)); ?>" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Category -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                <div class="flex gap-2">
                    <select name="category" id="category_select" required class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                        <option value="">Pilih Kategori</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat); ?>" <?php echo e(old('category', $product->category) == $cat ? 'selected' : ''); ?>><?php echo e($cat); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <option value="__new__">+ Kategori Baru</option>
                    </select>
                    <input type="text" id="new_category" placeholder="Kategori baru..." class="hidden flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                </div>
                <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                <textarea name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent"><?php echo e(old('description', $product->description)); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Price -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Harga <span class="text-red-500">*</span></label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">Rp</span>
                    <input type="number" name="price" value="<?php echo e(old('price', $product->price)); ?>" required min="0" step="1000" class="w-full pl-12 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                </div>
                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Ganti Gambar Produk</label>
                <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, GIF. Maksimal 2MB. Kosongkan jika tidak ingin mengganti gambar.</p>
                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Rating -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Rating</label>
                <input type="number" name="rating" value="<?php echo e(old('rating', $product->rating)); ?>" min="0" max="5" step="0.1" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                <?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Stock System -->
            <div class="border-t border-gray-200 pt-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Pengaturan Stok</h3>
                
                <div class="space-y-4">
                    <!-- Use Stock System -->
                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="use_stock_system" id="use_stock_system" value="1" <?php echo e(old('use_stock_system', $product->use_stock_system) ? 'checked' : ''); ?> class="w-5 h-5 text-[#F6A406] border-gray-300 rounded focus:ring-[#F6A406]">
                        <label for="use_stock_system" class="text-sm font-semibold text-gray-700">Gunakan Sistem Stok Harian</label>
                    </div>

                    <!-- Stock Fields -->
                    <div id="stock_fields" class="space-y-4 <?php echo e(old('use_stock_system', $product->use_stock_system) ? '' : 'hidden'); ?>">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Stok Harian Default</label>
                            <input type="number" name="default_daily_stock" value="<?php echo e(old('default_daily_stock', $product->default_daily_stock)); ?>" min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Minimum Stok (Alert)</label>
                            <input type="number" name="minimum_stock" value="<?php echo e(old('minimum_stock', $product->minimum_stock)); ?>" min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Status -->
            <div class="border-t border-gray-200 pt-6">
                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" id="is_active" value="1" <?php echo e(old('is_active', $product->is_active) ? 'checked' : ''); ?> class="w-5 h-5 text-[#F6A406] border-gray-300 rounded focus:ring-[#F6A406]">
                    <label for="is_active" class="text-sm font-semibold text-gray-700">Produk Aktif (Tampil di Menu)</label>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex gap-3 pt-6 border-t border-gray-200">
                <button type="submit" class="flex-1 bg-[#F6A406] text-white px-6 py-3 rounded-lg font-semibold hover:bg-[#F08C00] transition-colors">
                    Update Produk
                </button>
                <a href="<?php echo e(route('admin.products.index')); ?>" class="flex-1 bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition-colors text-center">
                    Batal
                </a>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Handle category selection
    const categorySelect = document.getElementById('category_select');
    const newCategoryInput = document.getElementById('new_category');

    categorySelect.addEventListener('change', function() {
        if (this.value === '__new__') {
            this.classList.add('hidden');
            newCategoryInput.classList.remove('hidden');
            newCategoryInput.name = 'category';
            newCategoryInput.required = true;
            newCategoryInput.focus();
        }
    });

    newCategoryInput.addEventListener('blur', function() {
        if (!this.value) {
            this.classList.add('hidden');
            categorySelect.classList.remove('hidden');
            this.name = '';
            this.required = false;
            categorySelect.value = '<?php echo e(old('category', $product->category)); ?>';
        }
    });

    // Handle stock system toggle
    const useStockCheckbox = document.getElementById('use_stock_system');
    const stockFields = document.getElementById('stock_fields');

    useStockCheckbox.addEventListener('change', function() {
        if (this.checked) {
            stockFields.classList.remove('hidden');
        } else {
            stockFields.classList.add('hidden');
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\FoodMate\FoodMate\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>