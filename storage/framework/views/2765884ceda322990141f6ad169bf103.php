<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>FoodMate | Keranjang</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gradient-to-br from-orange-50 via-white to-yellow-50 min-h-screen font-abhaya pb-32" x-data="cartApp()" x-init="init()">

    <!-- Header -->
    <header class="bg-white/80 backdrop-blur-sm px-6 lg:px-12 py-6 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-4">
                <!-- Back Button -->
                <a href="/menu" class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <!-- Logo -->
                <h1 class="text-3xl font-bold text-[#F6A406]">FoodMate</h1>
            </div>

            <!-- Logout Button -->
            <form action="/logout" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="bg-[#F6A406] text-white px-6 py-3 rounded-xl font-semibold hover:bg-[#F6A406] transition-colors">
                    Logout
                </button>
            </form>
        </div>
    </header>

    <!-- Cart Content -->
    <section class="bg-white px-6 lg:px-12 py-12">
        <div class="max-w-4xl mx-auto">
            <!-- Page Title -->
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-medium text-gray-400 mb-2">🛒 Keranjang Belanja</h2>
                <h1 class="text-5xl font-bold bg-gradient-to-r from-[#F6A406] to-[#F08C00] bg-clip-text text-transparent">Order Details</h1>
            </div>

            <!-- Cart Items -->
            <?php if(empty($cartItems) || count($cartItems) == 0): ?>
            <div class="text-center py-16 bg-white rounded-3xl shadow-xl p-12">
                <div class="w-32 h-32 mx-auto mb-6 bg-gradient-to-br from-orange-100 to-yellow-100 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-[#F6A406]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-700 mb-3">Keranjang Kosong</h3>
                <p class="text-gray-500 mb-8 text-lg">Belum ada item di keranjang Anda</p>
                <a href="/menu" class="inline-block bg-gradient-to-r from-[#F6A406] to-[#F08C00] text-white font-bold py-4 px-10 rounded-2xl hover:shadow-2xl hover:scale-105 transition-all duration-300">
                    🍽️ Mulai Belanja
                </a>
            </div>
            <?php else: ?>
            <div class="space-y-5 mb-8">
                <?php $__currentLoopData = $cartItems ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 flex items-center gap-6 border border-orange-100" data-cart-item>
                    <!-- Product Image -->
                    <div class="w-28 h-28 bg-gradient-to-br from-orange-100 to-yellow-100 rounded-2xl overflow-hidden flex-shrink-0 shadow-md">
                        <img src="<?php echo e(asset($item['image'] ?? 'images/food/default.png')); ?>" alt="<?php echo e($item['name']); ?>" class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                    </div>

                    <!-- Product Info -->
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-black mb-2"><?php echo e($item['name']); ?></h3>
                        <p class="text-xl text-[#F6A406] font-bold"><?php echo e($item['price']); ?></p>
                    </div>

                    <!-- Quantity Controls -->
                    <div class="flex items-center gap-3 bg-gray-50 rounded-xl p-2">
                        <button @click="decreaseQuantity('<?php echo e($item['id']); ?>', <?php echo e($item['quantity'] ?? 1); ?>)" class="w-10 h-10 bg-white hover:bg-[#F6A406] hover:text-white text-gray-700 font-bold rounded-lg transition-all duration-300 flex items-center justify-center shadow-sm" data-decrease="<?php echo e($item['id']); ?>">
                            −
                        </button>
                        <span x-text="quantities['<?php echo e($item['id']); ?>'] ?? <?php echo e($item['quantity'] ?? 1); ?>" class="text-xl font-bold text-black min-w-[40px] text-center"></span>
                        <button @click="increaseQuantity('<?php echo e($item['id']); ?>', <?php echo e($item['quantity'] ?? 1); ?>)" class="w-10 h-10 bg-white hover:bg-[#F6A406] hover:text-white text-gray-700 font-bold rounded-lg transition-all duration-300 flex items-center justify-center shadow-sm" data-increase="<?php echo e($item['id']); ?>">
                            +
                        </button>
                    </div>

                    <!-- Delete Button -->
                    <button @click="removeItem('<?php echo e($item['id']); ?>', $event)" class="w-12 h-12 bg-red-50 hover:bg-red-500 hover:text-white text-red-600 font-bold rounded-xl transition-all duration-300 flex items-center justify-center shadow-sm" data-remove="<?php echo e($item['id']); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Total Summary -->
            <?php endif; ?>

            <?php if(!empty($cartItems) && count($cartItems) > 0): ?>
            <div class="bg-gradient-to-br from-[#F6A406] to-[#F08C00] text-white rounded-2xl p-8 mb-6 shadow-2xl">
                <h3 class="text-2xl font-bold mb-6 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    Ringkasan Pesanan
                </h3>
                <div class="space-y-4">
                    <div class="flex justify-between text-lg font-semibold bg-white/10 rounded-lg p-3">
                        <span>Jumlah Item</span>
                        <span data-cart-quantity><?php echo e($totalQuantity ?? 0); ?></span>
                    </div>
                    <div class="flex justify-between text-lg bg-white/10 rounded-lg p-3">
                        <span>Sub-Total</span>
                        <span data-cart-subtotal>Rp. <?php echo e(number_format($subtotal ?? 0)); ?></span>
                    </div>
                    <div class="flex justify-between text-lg bg-white/10 rounded-lg p-3">
                        <span>Biaya Pengiriman</span>
                        <span data-cart-delivery>Rp. <?php echo e(number_format(($deliveryCharge ?? 5000))); ?></span>
                    </div>
                    <div class="flex justify-between text-lg bg-white/10 rounded-lg p-3">
                        <span>Diskon</span>
                        <span data-cart-discount class="text-green-300">-Rp. <?php echo e(number_format($discount ?? 0)); ?></span>
                    </div>
                    <hr class="border-white/30 my-4">
                    <div class="flex justify-between text-2xl font-bold bg-white/20 rounded-xl p-4">
                        <span>Total Pembayaran</span>
                        <span data-cart-total>Rp. <?php echo e(number_format($total ?? 0)); ?></span>
                    </div>
                </div>
            </div>

            <!-- Place Order Button -->
            <a href="/checkout" class="block w-full bg-white text-[#F6A406] font-bold text-lg py-5 px-6 rounded-2xl border-2 border-[#F6A406] hover:bg-gradient-to-r hover:from-[#F6A406] hover:to-[#F08C00] hover:text-white hover:border-transparent transition-all duration-300 text-center shadow-lg hover:shadow-2xl hover:scale-105">
                🚀 Lanjut ke Pembayaran
            </a>
            <?php endif; ?>
        </div>
    </section>

    <?php echo $__env->make('layouts.partials.bottom-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <script>
        function cartApp() {
            return {
                quantities: {},

                init() {
                    <?php $__currentLoopData = $cartItems ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        this.quantities['<?php echo e($item['id']); ?>'] = <?php echo e($item['quantity'] ?? 1); ?>;
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                },

                formatCurrency(value) {
                    return new Intl.NumberFormat('id-ID').format(value || 0);
                },

                updateSummary(data) {
                    const quantityEl = document.querySelector('[data-cart-quantity]');
                    if (quantityEl) {
                        quantityEl.textContent = data.total_quantity ?? 0;
                    }

                    const subtotalEl = document.querySelector('[data-cart-subtotal]');
                    if (subtotalEl) {
                        subtotalEl.textContent = `Rp. ${this.formatCurrency(data.subtotal)}`;
                    }

                    const deliveryEl = document.querySelector('[data-cart-delivery]');
                    if (deliveryEl) {
                        deliveryEl.textContent = `Rp. ${this.formatCurrency(data.delivery_charge)}`;
                    }

                    const discountEl = document.querySelector('[data-cart-discount]');
                    if (discountEl) {
                        discountEl.textContent = `-Rp. ${this.formatCurrency(data.discount)}`;
                    }

                    const totalEl = document.querySelector('[data-cart-total]');
                    if (totalEl) {
                        totalEl.textContent = `Rp. ${this.formatCurrency(data.total)}`;
                    }

                    const badgeEl = document.querySelector('[data-cart-badge]');
                    const badgeWrapper = document.querySelector('[data-cart-badge-wrapper]');
                    if (badgeEl) {
                        badgeEl.textContent = data.cart_count ?? 0;
                    }
                    if (badgeWrapper) {
                        badgeWrapper.classList.toggle('hidden', (data.cart_count ?? 0) === 0);
                    }
                },

                increaseQuantity(id, initialQuantity = 1) {
                    if (!this.quantities[id]) {
                        this.quantities[id] = initialQuantity;
                    }
                    this.quantities[id]++;
                    this.sendQuantityUpdate(id);
                },

                decreaseQuantity(id, initialQuantity = 1) {
                    if (!this.quantities[id]) {
                        this.quantities[id] = initialQuantity;
                    }
                    if (this.quantities[id] > 1) {
                        this.quantities[id]--;
                        this.sendQuantityUpdate(id);
                    } else {
                        this.removeItem(id);
                    }
                },

                sendQuantityUpdate(id) {
                    fetch('/cart/update-quantity', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                        },
                        body: JSON.stringify({
                            id: id,
                            quantity: this.quantities[id]
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            this.updateSummary(data);
                        }
                    })
                    .catch(error => console.error('Error:', error));
                },

                removeItem(id, event) {
                    if (!confirm('Apakah Anda yakin ingin menghapus item ini dari keranjang?')) {
                        return;
                    }

                    fetch('/cart/remove-item', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                        },
                        body: JSON.stringify({ id: id })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const button = event?.target || document.querySelector(`[data-remove="${id}"]`);
                            if (button) {
                                const card = button.closest('[data-cart-item]');
                                if (card) {
                                    card.remove();
                                }
                            }

                            delete this.quantities[id];

                            if ((data.total_quantity ?? 0) <= 0) {
                                window.location.reload();
                            } else {
                                this.updateSummary(data);
                            }
                        }
                    })
                    .catch(error => console.error('Error:', error));
                }
            }
        }
    </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\FoodMate\FoodMate\resources\views/cart.blade.php ENDPATH**/ ?>