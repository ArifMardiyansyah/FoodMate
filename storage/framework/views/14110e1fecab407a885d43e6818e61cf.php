<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($product->name); ?> - FoodMate</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-white min-h-screen font-poppins">
    <div class="max-w-4xl mx-auto px-6 py-8 pb-24">
        <div class="flex justify-between items-center mb-6">
            <a href="/menu" class="inline-flex items-center justify-center w-10 h-10 bg-[#fff7ed] rounded-full hover:bg-[#ffedd5] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
            </a>
            <a href="/cart" class="relative inline-flex items-center justify-center w-12 h-12 bg-[#fff7ed] rounded-full hover:bg-[#ffedd5] transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                </svg>
                <span id="detailCartCount" class="absolute -top-1 -right-1 min-w-[20px] h-5 bg-[#f97316] rounded-full text-xs font-semibold text-white flex items-center justify-center px-1"><?php echo e(number_format($cartCount)); ?></span>
            </a>
        </div>

        <div class="relative mb-6">
            <div class="w-full h-64 bg-[#f97316] rounded-3xl flex items-center justify-center overflow-hidden shadow-xl">
                <img src="<?php echo e(asset($product->image_path ?? 'images/food/default.png')); ?>" alt="<?php echo e($product->name); ?>" class="w-full h-full object-contain">
            </div>
        </div>

        <div class="mb-6">
            <span class="inline-block px-4 py-1.5 bg-[#fff7ed] text-[#f97316] text-sm font-semibold rounded-full mb-3"><?php echo e($product->category ?? 'Menu'); ?></span>
            <h1 class="text-3xl font-bold text-black mb-2"><?php echo e($product->name); ?></h1>
            <div class="flex items-center gap-6 mb-4 text-gray-500">
                <div class="flex items-center gap-2">
                    <span class="text-xl">⭐</span>
                    <span class="text-sm font-medium"><?php echo e(number_format($product->rating ?? 5, 1)); ?> Rating</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    <span class="text-sm font-medium">Pelanggan puas</span>
                </div>
            </div>
            <p class="text-gray-700 leading-relaxed mb-6"><?php echo e($product->description ?? 'Menu favorit pelanggan FoodMate.'); ?></p>
        </div>

        <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 mb-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm text-gray-500">Harga</p>
                    <p class="text-3xl font-bold text-[#f97316]">Rp. <?php echo e(number_format($product->price)); ?></p>
                </div>
                <div class="flex items-center gap-3">
                    <button id="decreaseDetailQuantity" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">−</button>
                    <span id="detailQuantity" class="text-xl font-bold text-black min-w-[30px] text-center">1</span>
                    <button id="increaseDetailQuantity" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">+</button>
                </div>
            </div>
            <button id="detailAddToCart" class="w-full bg-[#f97316] text-white font-bold text-lg py-4 rounded-xl hover:bg-[#ea580c] transition-colors shadow-lg hover:shadow-xl">Masukkan Keranjang</button>
        </div>

        <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 mb-10">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <p class="text-sm text-gray-500 mb-1">Favorit</p>
                    <p id="favoritesCount" class="text-lg font-semibold text-gray-700">
                        <span id="favoritesNumber"><?php echo e(number_format($favoritesCount)); ?></span> orang menyukai menu ini
                    </p>
                </div>
                <button id="favoriteButton" class="w-14 h-14 rounded-full flex items-center justify-center transition-all duration-300 <?php echo e($isFavorited ? 'bg-red-50' : 'bg-gray-100'); ?> hover:scale-110">
                    <svg id="heartIcon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="<?php echo e($isFavorited ? '#ef4444' : 'none'); ?>" stroke="<?php echo e($isFavorited ? '#ef4444' : '#6b7280'); ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-all duration-300">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                    </svg>
                </button>
            </div>
        </div>

        <?php if($recommended->isNotEmpty()): ?>
            <div>
                <h2 class="text-2xl font-semibold text-black mb-4">Rekomendasi Lainnya</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <?php $__currentLoopData = $recommended; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('menu.show', $item->slug)); ?>" class="flex gap-4 p-4 border border-gray-100 rounded-2xl hover:shadow-lg transition-shadow">
                            <div class="w-20 h-20 rounded-xl overflow-hidden bg-gray-100 flex-shrink-0">
                                <img src="<?php echo e(asset($item->image_path ?? 'images/food/default.png')); ?>" alt="<?php echo e($item->name); ?>" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-black mb-1"><?php echo e($item->name); ?></h3>
                                <p class="text-sm text-gray-500 line-clamp-2"><?php echo e($item->description); ?></p>
                                <div class="flex items-center justify-between mt-2">
                                    <span class="text-[#f97316] font-semibold">Rp. <?php echo e(number_format($item->price)); ?></span>
                                    <span class="text-xs text-gray-400">⭐ <?php echo e(number_format($item->rating ?? 5, 1)); ?></span>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div id="detailToast" class="hidden fixed bottom-24 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300"></div>

    <script>
        const detailCsrf = document.querySelector('meta[name="csrf-token"]').content;
        const quantityEl = document.getElementById('detailQuantity');
        const decreaseBtn = document.getElementById('decreaseDetailQuantity');
        const increaseBtn = document.getElementById('increaseDetailQuantity');
        const addButton = document.getElementById('detailAddToCart');
        const toast = document.getElementById('detailToast');
        const cartBadge = document.getElementById('detailCartCount');
        const productId = <?php echo e($product->id); ?>;
        
        // Favorite functionality
        const favoriteButton = document.getElementById('favoriteButton');
        const heartIcon = document.getElementById('heartIcon');
        const favoritesNumber = document.getElementById('favoritesNumber');
        let isFavorited = <?php echo e($isFavorited ? 'true' : 'false'); ?>;

        function setQuantity(value) {
            quantityEl.textContent = value;
        }

        decreaseBtn.addEventListener('click', (event) => {
            event.preventDefault();
            let value = parseInt(quantityEl.textContent, 10);
            if (value > 1) {
                setQuantity(value - 1);
            }
        });

        increaseBtn.addEventListener('click', (event) => {
            event.preventDefault();
            let value = parseInt(quantityEl.textContent, 10);
            setQuantity(value + 1);
        });

        function showDetailToast(message, type = 'success') {
            toast.textContent = message;
            toast.classList.remove('hidden');
            toast.classList.toggle('bg-green-500', type === 'success');
            toast.classList.toggle('bg-red-500', type !== 'success');
            clearTimeout(showDetailToast.timeout);
            showDetailToast.timeout = setTimeout(() => toast.classList.add('hidden'), 2500);
        }

        function updateDetailCart(count) {
            if (!cartBadge) return;
            cartBadge.textContent = count;
            cartBadge.classList.toggle('hidden', count <= 0);
        }

        addButton.addEventListener('click', (event) => {
            event.preventDefault();
            const quantity = parseInt(quantityEl.textContent, 10);
            if (quantity <= 0) return;

            const originalText = addButton.textContent;
            addButton.disabled = true;
            addButton.textContent = 'Menambahkan...';

            fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': detailCsrf,
                },
                body: JSON.stringify({ product_id: productId, quantity })
            })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        throw new Error(data.message || 'Gagal menambahkan ke keranjang');
                    }
                    showDetailToast('Item ditambahkan ke keranjang');
                    updateDetailCart(data.cart_count ?? 0);
                })
                .catch(error => {
                    console.error(error);
                    showDetailToast(error.message, 'error');
                })
                .finally(() => {
                    addButton.disabled = false;
                    addButton.textContent = originalText;
                });
        });

        // Favorite button click handler
        favoriteButton.addEventListener('click', (event) => {
            event.preventDefault();
            
            fetch('/favorites/toggle', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': detailCsrf,
                },
                body: JSON.stringify({ product_id: productId })
            })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        throw new Error(data.message || 'Gagal mengubah favorit');
                    }
                    
                    isFavorited = data.is_favorited;
                    
                    // Update heart icon
                    if (isFavorited) {
                        heartIcon.setAttribute('fill', '#ef4444');
                        heartIcon.setAttribute('stroke', '#ef4444');
                        favoriteButton.classList.remove('bg-gray-100');
                        favoriteButton.classList.add('bg-red-50');
                    } else {
                        heartIcon.setAttribute('fill', 'none');
                        heartIcon.setAttribute('stroke', '#6b7280');
                        favoriteButton.classList.remove('bg-red-50');
                        favoriteButton.classList.add('bg-gray-100');
                    }
                    
                    // Update favorites count
                    favoritesNumber.textContent = data.favorites_count.toLocaleString('id-ID');
                    
                    // Show toast
                    showDetailToast(data.message);
                })
                .catch(error => {
                    console.error(error);
                    showDetailToast(error.message, 'error');
                });
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\FoodMate\FoodMate\resources\views/menu/show.blade.php ENDPATH**/ ?>