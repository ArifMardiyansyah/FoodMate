<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>FoodMate | Menu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-white min-h-screen font-abhaya pt-24 pb-24">
    <nav class="bg-white shadow-sm fixed top-0 left-0 right-0 w-full z-50">
        <div class="w-full px-6 lg:px-12">
            <div class="max-w-7xl mx-auto flex justify-between items-center h-20">
                <div class="flex items-center">
                    <img src="<?php echo e(asset('images/logo/logo1.png')); ?>" alt="FoodMate Logo" class="w-24 h-16 object-contain">
                    <span class="ml-3 text-2xl font-bold text-gray-900">FoodMate</span>
                </div>
                <div class="flex items-center gap-6">
                    <a href="/cart" class="relative inline-flex items-center justify-center w-12 h-12 rounded-full bg-[#F6A406]/10 hover:bg-[#F6A406]/20 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#F6A406" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="8" cy="21" r="1"/>
                            <circle cx="19" cy="21" r="1"/>
                            <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/>
                        </svg>
                        <span id="menuCartCount" class="absolute -top-1 -right-1 min-w-[22px] h-[22px] rounded-full bg-[#F6A406] text-white text-xs font-semibold flex items-center justify-center px-1"><?php echo e(number_format($cartCount)); ?></span>
                    </a>
                    <form action="/logout" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="bg-[#F6A406] text-white px-6 py-3 rounded-xl font-semibold hover:bg-[#F08C00] transition-colors">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <section class="bg-white relative overflow-hidden min-h-screen">
        <div class="absolute right-0 hero-gradient orange-bg-section z-0"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="flex items-center min-h-screen py-16">
                <!-- Left Content -->
                <div class="w-full lg:w-1/2 py-12 relative z-10">
                    <h1 class="text-5xl lg:text-6xl font-bold text-black mb-2 leading-tight">
                        Mudah Pesan
                    </h1>
                    <h1 class="text-5xl lg:text-6xl font-bold mb-8 leading-tight" style="color: #F6A406;">
                        Nikmat Diantar
                    </h1>

                    <!-- Search Bar -->
                    <div class="search-bar flex items-center rounded-full p-1 max-w-md mb-12 shadow-lg">
                        <div class="bg-orange-500 text-white p-3 rounded-full mr-3">
                            <img src="<?php echo e(asset('images/icon/search.png')); ?>"
                                 alt="Search"
                                 class="w-5 h-5">
                        </div>
                        <input
                            type="text"
                            id="searchInput"
                            placeholder="Cari menu atau kategori"
                            class="flex-1 bg-transparent text-gray-700 placeholder-gray-500 outline-none px-2 py-2"
                        />
                        <button class="p-2 mr-2">
                            <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>

                    <h2 class="text-5xl lg:text-6xl font-bold text-black mb-2 leading-tight">
                        Makanan
                    </h2>
                    <h2 class="text-5xl lg:text-6xl font-bold mb-2 leading-tight" style="color: #F6A406;">
                        Dengan Cita Rasa
                    </h2>
                    <h2 class="text-5xl lg:text-6xl font-bold leading-tight" style="color: #F6A406;">
                        Kampus
                    </h2>
                </div>

                <!-- Sisi Kanan - Food Images -->
                <div class="hidden lg:block w-1/2 relative h-screen">
                    <!-- Gambar Utama Mie Goreng -->
                    <div class="absolute transform rotate-2 z-20" style="top: 18%; right: -18px; width: 750px; height: 480px;">
                        <div class="relative w-full h-full">
                            <img src="<?php echo e(asset('images/food/mie_goreng.png')); ?>"
                                 alt="Mie Goreng"
                                 class="w-full h-full object-contain drop-shadow-2xl">
                        </div>
                    </div>

                    <!-- Bawah Kiri Nasi Goreng -->
                    <div class="absolute transform -rotate-12 z-10" style="bottom: -1.5vh; right: 80px; width: 320px; height: 320px;">
                        <div class="relative w-full h-full">
                            <img src="<?php echo e(asset('images/food/nasgor.png')); ?>"
                                 alt="Nasi Goreng"
                                 class="w-full h-full object-contain drop-shadow-xl">
                        </div>
                    </div>

                    <!-- Bawah Kanan Sate Ayam -->
                    <div class="absolute transform rotate-6 z-15" style="bottom: -1vh; right: -230px; width: 250px; height: 260px;">
                        <div class="relative w-full h-full">
                            <img src="<?php echo e(asset('images/food/sate_ayam.png')); ?>"
                                 alt="Sate Ayam"
                                 class="w-full h-full object-contain drop-shadow-xl">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 md:grid-cols-3">
                <div class="bg-[#F6A406] rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-[#F6A406] rounded-full flex items-center justify-center mx-auto mb-4">
                        <img src="<?php echo e(asset('images/icon/discount (1).png')); ?>" alt="Discount" class="w-12 h-12">
                    </div>
                    <h4 class="text-lg font-bold text-black mb-2">Diskon</h4>
                    <p class="text-sm text-black">Dapatkan diskon gratis biaya antar 1 item untuk pembelian 5 item sekaligus</p>
                </div>
                <div class="bg-[#F6A406] rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-[#F6A406] rounded-full flex items-center justify-center mx-auto mb-4">
                        <img src="<?php echo e(asset('images/icon/rush (1).png')); ?>" alt="Cepat" class="w-12 h-12">
                    </div>
                    <h4 class="text-lg font-bold text-black mb-2">Cepat Tanpa Antri</h4>
                    <p class="text-sm text-black">Langsung diantar tanpa antre</p>
                </div>
                <div class="bg-[#F6A406] rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-[#F6A406] rounded-full flex items-center justify-center mx-auto mb-4">
                        <img src="<?php echo e(asset('images/icon/fresh (1).png')); ?>" alt="Fresh" class="w-12 h-12">
                    </div>
                    <h4 class="text-lg font-bold text-black mb-2">Fresh Food</h4>
                    <p class="text-sm text-black">Dibuat dengan bahan segar setiap saat</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white px-6 lg:px-12 py-16">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-bold text-center text-black mb-12">Menu Tersedia</h2>
            <div id="menuSections" class="space-y-16">
                <?php
                    // Urutkan kategori: Makanan (Food) -> Minuman (Drink) -> Snack (Snack)
                    $order = ['Makanan' => 1, 'Minuman' => 2, 'Snack' => 3];
                    $sorted = $groupedProducts->sortBy(function($items, $key) use ($order) {
                        $normalized = strtolower($key);
                        if (str_contains($normalized, 'makanan') || str_contains($normalized, 'food')) return 1;
                        if (str_contains($normalized, 'minum') || str_contains($normalized, 'drink')) return 2;
                        if (str_contains($normalized, 'snack')) return 3;
                        return 99; // selain itu di akhir
                    });
                ?>
                <?php $__currentLoopData = $sorted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="space-y-6" data-category-section>
                        <div class="flex items-center justify-between">
                            <h3 class="text-3xl font-bold text-black"><?php echo e($category); ?></h3>
                            <span class="text-sm text-gray-400"><?php echo e($products->count()); ?> pilihan</span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="bg-white rounded-2xl p-4 shadow-lg" data-menu-card data-name="<?php echo e(strtolower($product->name)); ?>" data-category="<?php echo e(strtolower($category)); ?>">
                                    <a href="<?php echo e(route('menu.show', $product->slug)); ?>" class="block">
                                        <div class="w-90 h-70 bg-gray-100 rounded-xl mb-4 overflow-hidden">
                                            <img src="<?php echo e(asset($product->image_path ?? 'images/food/default.png')); ?>"
                                                 alt="<?php echo e($product->name); ?>"
                                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                        </div>

                                        <!-- Rating -->
                                        <div class="flex items-center mb-2">
                                            <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <span class="text-sm font-bold"><?php echo e(number_format($product->rating ?? 5, 1)); ?></span>

                                            <svg class="w-4 h-4 text-red-400 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>

                                        <h3 class="text-lg font-bold text-black mb-1"><?php echo e($product->name); ?></h3>
                                        <p class="text-sm text-gray-600 mb-4"><?php echo e($product->description); ?></p>
                                    </a>

                                    <!-- Quantity and Price -->
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center space-x-2">
                                            <button class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center" data-action="decrease">
                                                <span class="text-lg font-bold">−</span>
                                            </button>
                                            <span class="font-bold" data-quantity>1</span>
                                            <button class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center" data-action="increase">
                                                <span class="text-lg font-bold">+</span>
                                            </button>
                                        </div>
                                        <span class="text-lg font-bold">Rp. <?php echo e(number_format($product->price)); ?></span>
                                    </div>

                                    <?php
                                        $productPayload = [
                                            'id' => $product->id,
                                            'name' => $product->name,
                                            'price' => $product->price,
                                            'image' => $product->image_path,
                                            'slug' => $product->slug,
                                        ];
                                    ?>
                                    <button class="w-full bg-orange-500 text-white py-3 rounded-xl font-bold hover:bg-orange-600 transition" data-action="add" data-product='<?php echo json_encode($productPayload, 15, 512) ?>'>Pesan</button>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <?php echo $__env->make('layouts.partials.bottom-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div id="toast" class="hidden fixed bottom-24 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300"></div>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        const toastEl = document.getElementById('toast');

        function showToast(message, type = 'success') {
            toastEl.textContent = message;
            toastEl.classList.remove('hidden');
            toastEl.classList.toggle('bg-green-500', type === 'success');
            toastEl.classList.toggle('bg-red-500', type !== 'success');
            clearTimeout(showToast.timeout);
            showToast.timeout = setTimeout(() => toastEl.classList.add('hidden'), 2500);
        }

        document.querySelectorAll('[data-menu-card]').forEach(card => {
            const decreaseBtn = card.querySelector('[data-action="decrease"]');
            const increaseBtn = card.querySelector('[data-action="increase"]');
            const addBtn = card.querySelector('[data-action="add"]');
            const quantityEl = card.querySelector('[data-quantity]');

            decreaseBtn.addEventListener('click', (event) => {
                event.preventDefault();
                let value = parseInt(quantityEl.textContent, 10);
                if (value > 1) {
                    quantityEl.textContent = value - 1;
                }
            });

            increaseBtn.addEventListener('click', (event) => {
                event.preventDefault();
                let value = parseInt(quantityEl.textContent, 10);
                quantityEl.textContent = value + 1;
            });

            addBtn.addEventListener('click', (event) => {
                event.preventDefault();
                const product = JSON.parse(addBtn.dataset.product);
                const quantity = parseInt(quantityEl.textContent, 10);
                addToCart(product.id, quantity, addBtn);
            });
        });

        function addToCart(productId, quantity, button) {
            if (!productId || quantity <= 0) {
                return;
            }
            const original = button.textContent;
            button.disabled = true;
            button.textContent = 'Menambahkan...';
            fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({ product_id: productId, quantity }),
            })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        throw new Error(data.message || 'Gagal menambahkan ke keranjang');
                    }
                    button.textContent = original;
                    button.disabled = false;
                    updateCartCount(data.cart_count ?? 0);
                    showToast('Item berhasil ditambahkan ke keranjang');
                })
                .catch(error => {
                    console.error(error);
                    button.textContent = original;
                    button.disabled = false;
                    showToast(error.message, 'error');
                });
        }

        function updateCartCount(count) {
            const headerBadge = document.getElementById('menuCartCount');
            const navBadge = document.querySelector('[data-cart-badge]');
            if (headerBadge) {
                headerBadge.textContent = count;
                headerBadge.classList.toggle('hidden', count <= 0);
            }
            if (navBadge) {
                navBadge.textContent = count;
                navBadge.classList.toggle('hidden', count <= 0);
            }
        }

        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', () => {
            const keyword = searchInput.value.trim().toLowerCase();
            
            // Search through all cards
            document.querySelectorAll('[data-menu-card]').forEach(card => {
                const name = card.dataset.name;
                const category = card.dataset.category;
                const match = name.includes(keyword) || category.includes(keyword);
                card.classList.toggle('hidden', !match);
            });
            
            // Hide/show category sections based on visible cards
            document.querySelectorAll('[data-category-section]').forEach(section => {
                const visibleCards = section.querySelectorAll('[data-menu-card]:not(.hidden)');
                section.classList.toggle('hidden', visibleCards.length === 0);
            });
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\FoodMate\FoodMate\resources\views/menu/index.blade.php ENDPATH**/ ?>