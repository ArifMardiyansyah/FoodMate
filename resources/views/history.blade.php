<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FoodMate | Riwayat Pesanan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-white min-h-screen font-abhaya pb-32">

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

            <!-- Logout Button -->
            <a href="/" class="bg-[#F6A406] text-white px-6 py-3 rounded-xl font-semibold hover:bg-[#F6A406] transition-colors">
                Logout
            </a>
        </div>
    </header>

    <!-- History Content -->
    <section class="bg-white px-6 lg:px-12 py-12">
        <div class="max-w-4xl mx-auto">
            <!-- Page Title -->
            <div class="mb-8">
                <h2 class="text-2xl font-medium text-gray-400 mb-2">Riwayat</h2>
                <h1 class="text-5xl font-bold text-black">Pesanan Saya</h1>
            </div>

            <!-- Order History -->
            @if(empty($orderHistory))
            <div class="text-center py-16">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <h3 class="text-2xl font-bold text-gray-400 mb-2">Belum Ada Riwayat</h3>
                <p class="text-gray-500 mb-6">Anda belum melakukan pemesanan</p>
                <a href="/menu" class="inline-block bg-[#F6A406] text-white font-semibold py-3 px-8 rounded-xl hover:bg-[#F6A406] transition-colors">
                    Mulai Belanja
                </a>
            </div>
            @else
            <div class="space-y-6">
                @foreach($orderHistory as $order)
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                    <!-- Order Header -->
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-bold text-black mb-1">{{ $order['id'] }}</h3>
                            <p class="text-sm text-gray-500">{{ date('d M Y', strtotime($order['date'])) }}</p>
                        </div>
                        <div class="text-right">
                            <div class="text-lg font-bold text-[#F6A406]">Rp. {{ number_format($order['total']) }}</div>
                            <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                                @if($order['status'] == 'completed') bg-green-100 text-green-800
                                @elseif($order['status'] == 'pending') bg-yellow-100 text-yellow-800
                                @elseif($order['status'] == 'cancelled') bg-red-100 text-red-800
                                @endif">
                                @if($order['status'] == 'completed') Selesai
                                @elseif($order['status'] == 'pending') Diproses
                                @elseif($order['status'] == 'cancelled') Dibatalkan
                                @endif
                            </span>
                        </div>
                    </div>

                    <!-- Order Items -->
                    <div class="space-y-3 mb-4">
                        @foreach($order['items'] as $item)
                        <div class="flex justify-between items-center py-2 border-b border-gray-100 last:border-b-0">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-gray-200 rounded-lg overflow-hidden">
                                    <img src="{{ asset('images/food/default.png') }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h4 class="font-semibold text-black">{{ $item['name'] }}</h4>
                                    <p class="text-sm text-gray-500">{{ $item['quantity'] }} x Rp. {{ number_format($item['price']) }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="font-semibold text-black">Rp. {{ number_format($item['quantity'] * $item['price']) }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Order Actions -->
                    <div class="flex gap-3 pt-4 border-t border-gray-100">
                        <button class="flex-1 bg-gray-100 text-gray-700 font-semibold py-3 px-4 rounded-xl hover:bg-gray-200 transition-colors">
                            Pesan Lagi
                        </button>
                        <button class="flex-1 bg-[#F6A406] text-white font-semibold py-3 px-4 rounded-xl hover:bg-[#F6A406] transition-colors">
                            Lihat Detail
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
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

                <!-- History (Active) -->
                <a href="/history" class="flex flex-col items-center gap-2 group transition-transform hover:scale-110">
                    <div class="px-6 py-3 bg-[#fff7ed] rounded-2xl flex items-center justify-center relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#F6A406" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                        </svg>
                    </div>
                    <span class="text-sm font-bold text-black">History</span>
                </a>

                <!-- Cart with Badge -->
                <a href="/cart" class="relative flex items-center justify-center group transition-transform hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#F6A406" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="8" cy="21" r="1"/>
                        <circle cx="19" cy="21" r="1"/>
                        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/>
                    </svg>
                    <!-- Badge Notification -->
                    @php
                        $cartCount = count(session()->get('cart', []));
                    @endphp
                    @if($cartCount > 0)
                    <div class="absolute -top-1 -right-1 min-w-[20px] h-5 bg-[#F6A406] rounded-full flex items-center justify-center px-1.5">
                        <span class="text-xs font-bold text-white">{{ $cartCount }}</span>
                    </div>
                    @endif
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

</body>
</html>