<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FoodMate | Keranjang</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-white min-h-screen font-abhaya pb-32" x-data="cartApp()" x-init="init()">

    <!-- Header -->
    <header class="bg-white px-6 lg:px-12 py-6">
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

            <!-- Profile Icon -->
            <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition-colors cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
        </div>
    </header>

    <!-- Cart Content -->
    <section class="bg-white px-6 lg:px-12 py-12">
        <div class="max-w-4xl mx-auto">
            <!-- Page Title -->
            <div class="mb-8">
                <h2 class="text-2xl font-medium text-gray-400 mb-2">Keranjang</h2>
                <h1 class="text-5xl font-bold text-black">Order Details</h1>
            </div>

            <!-- Cart Items -->
            @if(empty($cartItems) || count($cartItems) == 0)
            <div class="text-center py-16">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <h3 class="text-2xl font-bold text-gray-400 mb-2">Keranjang Kosong</h3>
                <p class="text-gray-500 mb-6">Belum ada item di keranjang Anda</p>
                <a href="/menu" class="inline-block bg-[#F6A406] text-white font-semibold py-3 px-8 rounded-xl hover:bg-[#F6A406] transition-colors">
                    Mulai Belanja
                </a>
            </div>
            @else
            <div class="space-y-6 mb-8">
                @foreach($cartItems ?? [] as $item)
                <div class="bg-white rounded-xl shadow-lg p-6 flex items-center gap-6" data-cart-item>
                    <!-- Product Image -->
                    <div class="w-24 h-24 bg-gray-200 rounded-xl overflow-hidden flex-shrink-0">
                        <img src="{{ asset($item['image'] ?? 'images/food/default.png') }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                    </div>

                    <!-- Product Info -->
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-black mb-1">{{ $item['name'] }}</h3>
                        <p class="text-lg text-[#F6A406] font-semibold">{{ $item['price'] }}</p>
                    </div>

                    <!-- Quantity Controls -->
                    <div class="flex items-center gap-4">
                        <button @click="decreaseQuantity('{{ $item['id'] }}', {{ $item['quantity'] ?? 1 }})" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center" data-decrease="{{ $item['id'] }}">
                            −
                        </button>
                        <span x-text="quantities['{{ $item['id'] }}'] ?? {{ $item['quantity'] ?? 1 }}" class="text-xl font-bold text-black min-w-[30px] text-center"></span>
                        <button @click="increaseQuantity('{{ $item['id'] }}', {{ $item['quantity'] ?? 1 }})" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center" data-increase="{{ $item['id'] }}">
                            +
                        </button>
                    </div>

                    <!-- Delete Button -->
                    <button @click="removeItem('{{ $item['id'] }}', $event)" class="w-10 h-10 bg-red-100 hover:bg-red-200 text-red-600 font-bold rounded-lg transition-colors flex items-center justify-center" data-remove="{{ $item['id'] }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
                @endforeach
            </div>

            <!-- Total Summary -->
            @endif

            @if(!empty($cartItems) && count($cartItems) > 0)
            <div class="bg-[#F6A406] text-black rounded-xl p-6 mb-6">
                <div class="space-y-3">
                    <div class="flex justify-between text-lg font-bold">
                        <span>Jumlah</span>
                        <span data-cart-quantity>{{ $totalQuantity ?? 0 }}</span>
                    </div>
                    <div class="flex justify-between text-lg">
                        <span>Sub-Total</span>
                        <span data-cart-subtotal>Rp. {{ number_format($subtotal ?? 0) }}</span>
                    </div>
                    <div class="flex justify-between text-lg">
                        <span>Delivery Charge</span>
                        <span data-cart-delivery>Rp. {{ number_format(($deliveryCharge ?? 5000)) }}</span>
                    </div>
                    <div class="flex justify-between text-lg">
                        <span>Discount</span>
                        <span data-cart-discount>-Rp. {{ number_format($discount ?? 0) }}</span>
                    </div>
                    <hr class="border-black/20">
                    <div class="flex justify-between text-2xl font-bold">
                        <span>Total</span>
                        <span data-cart-total>Rp. {{ number_format($total ?? 0) }}</span>
                    </div>
                </div>
            </div>

            <!-- Place Order Button -->
            <a href="/checkout" class="block w-full bg-white text-[#F6A406] font-semibold py-3 px-6 rounded-lg border-2 border-[#F6A406] hover:bg-[#fff7ed] transition-colors text-center">
                Lanjut ke Pembayaran
            </a>
            @endif
        </div>
    </section>

    <!-- Bottom Navigation -->
    <nav class="fixed bottom-0 left-0 w-full bg-white shadow-lg rounded-t-3xl z-50 font-poppins">
        <div class="max-w-md mx-auto px-8 py-5">
            <div class="flex justify-between items-center gap-10">
                <!-- Home -->
                <a href="/menu" class="flex items-center justify-center group transition-transform hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#fcae80" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                </a>

                <!-- History -->
                <a href="/history" class="relative flex items-center justify-center group transition-transform hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#fcae80" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                    <!-- Dot Notification -->
                    <div class="absolute top-0 right-0 w-3 h-3 bg-[#F6A406] rounded-full"></div>
                </a>

                <!-- Cart with Badge (Active) -->
                <a href="/cart" class="flex flex-col items-center gap-2 group transition-transform hover:scale-110">
                    <div class="px-6 py-3 bg-[#fff7ed] rounded-2xl flex items-center justify-center relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#F6A406" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="8" cy="21" r="1"/>
                            <circle cx="19" cy="21" r="1"/>
                            <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/>
                        </svg>
                        <!-- Badge Notification -->
                        <div class="absolute -top-1 -right-1 min-w-[20px] h-5 bg-[#F6A406] rounded-full flex items-center justify-center px-1.5" data-cart-badge-wrapper>
                            <span class="text-xs font-bold text-white" data-cart-badge>{{ $cartCount ?? 0 }}</span>
                        </div>
                    </div>
                    <span class="text-sm font-bold text-black">Cart</span>
                </a>

                <!-- Profile -->
                <a href="/profile" class="flex items-center justify-center group transition-transform hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#fcae80" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </a>
            </div>
        </div>
    </nav>

    <script>
        function cartApp() {
            return {
                quantities: {},

                init() {
                    @foreach($cartItems ?? [] as $item)
                        this.quantities['{{ $item['id'] }}'] = {{ $item['quantity'] ?? 1 }};
                    @endforeach
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
</html>