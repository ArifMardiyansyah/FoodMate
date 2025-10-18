<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FoodMate | Menu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white min-h-screen font-abhaya pt-24 pb-24">
    
    <!-- Header -->
    <nav class="bg-white shadow-sm fixed top-0 left-0 right-0 w-full z-50">
        <div class="w-full px-6 lg:px-12">
            <div class="max-w-7xl mx-auto flex justify-between items-center h-20">
                <div class="flex items-center">
                    <img src="{{ asset('images/logo/logo1.png') }}" alt="FoodMate Logo" class="w-24 h-16 object-contain">
                    <span class="ml-3 text-2xl font-bold text-gray-900">FoodMate</span>
                </div>


                <a href="/" class="bg-[#F6A406] text-white px-6 py-3 rounded-xl font-semibold hover:bg-[#F6A406] transition-colors">
                    Logout
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-white px-6 lg:px-12">
        <div class="absolute right-0 hero-gradient orange-bg-section z-0 hidden lg:block"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center min-h-[70vh] lg:min-h-screen py-12 lg:py-20">
                <div class="space-y-10">
                    <div>
                        <h2 class="text-5xl lg:text-6xl font-bold text-black leading-tight mb-2">Mudah Pesan</h2>
                        <h3 class="text-5xl lg:text-6xl font-bold leading-tight" style="color: #F6A406;">Nikmat Diantar</h3>
                    </div>

                    <div class="search-bar flex items-center rounded-full p-1 max-w-md shadow-lg">
                        <div class="bg-orange-500 text-white p-3 rounded-full mr-3">
                            <img src="{{ asset('images/icon/search.png') }}" alt="Search" class="w-5 h-5">
                        </div>
                        <input
                            type="text"
                            id="searchInput"
                            placeholder="Cari disini"
                            class="flex-1 bg-transparent text-gray-700 placeholder-gray-500 outline-none px-2 py-2"
                        />
                        <button class="p-2 mr-2">
                            <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>

                    <div>
                        <p class="text-5xl lg:text-6xl font-bold text-black leading-tight">Makanan</p>
                        <p class="text-5xl lg:text-6xl font-bold leading-tight" style="color: #F6A406;">Dengan Cita Rasa Kampus</p>
                    </div>
                </div>

                <div class="hidden lg:block relative h-[520px]">
                    <div class="absolute transform rotate-2 z-20" style="top: 40px; right: -40px; width: 600px; height: 380px;">
                        <img src="{{ asset('images/food/nasi_uduk.png') }}" alt="Nasi Uduk" class="w-full h-full object-contain drop-shadow-2xl">
                    </div>
                    <div class="absolute transform -rotate-6 z-10" style="bottom: -60px; right: 90px; width: 280px; height: 280px;">
                        <img src="{{ asset('images/food/pecel_lele.png') }}" alt="Pecel Lele" class="w-full h-full object-contain drop-shadow-xl">
                    </div>
                    <div class="absolute transform rotate-6 z-10" style="bottom: -40px; right: -220px; width: 320px; height: 280px;">
                        <img src="{{ asset('images/food/sate_ayam.png') }}" alt="Sate Ayam" class="w-full h-full object-contain drop-shadow-xl">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 md:grid-cols-3">
                <div class="bg-[#F6A406] rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-[#F6A406] rounded-full flex items-center justify-center mx-auto mb-4">
                        <img src="{{ asset('images/icon/discount (1).png') }}" alt="Discount" class="w-12 h-12">
                    </div>
                    <h4 class="text-lg font-bold text-black mb-2">Diskon</h4>
                    <p class="text-sm text-black">Dapatkan diskon gratis biaya antar 1 item untuk pembelian 5 item sekaligus</p>
                </div>

                <div class="bg-[#F6A406] rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-[#F6A406] rounded-full flex items-center justify-center mx-auto mb-4">
                        <img src="{{ asset('images/icon/rush (1).png') }}" alt="Fast Service" class="w-12 h-12">
                    </div>
                    <h4 class="text-lg font-bold text-black mb-2">Cepat Tanpa Antri</h4>
                    <p class="text-sm text-black">Langsung diantar tanpa antre</p>
                </div>

                <div class="bg-[#F6A406] rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-[#F6A406] rounded-full flex items-center justify-center mx-auto mb-4">
                        <img src="{{ asset('images/icon/fresh (1).png') }}" alt="Fresh Food" class="w-12 h-12">
                    </div>
                    <h4 class="text-lg font-bold text-black mb-2">Fresh Food</h4>
                    <p class="text-sm text-black">Dibuat dengan bahan segar setiap saat</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Makanan Section -->
    <section class="bg-white px-6 lg:px-12 py-16">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-bold text-center text-black mb-12">Menu Tersedia</h2>
            
            <!-- Menu Grid -->
            <div id="menuGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Menu Card: Mie Goreng -->
                <a href="/menu/mie-goreng" class="block menu-item" data-name="Mie Goreng">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <!-- Image Container -->
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/food/mie_goreng.jpg') }}" alt="Mie Goreng" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            
                            <!-- Heart Icon (Favorite) -->
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            
                            <!-- Rating -->
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        
                        <!-- Card Content -->
                        <div class="p-5">
                            <!-- Menu Name -->
                            <h3 class="text-xl font-bold text-black mb-2">Mie Goreng</h3>
                            
                            <!-- Description -->
                            <p class="text-sm text-gray-500 mb-4">Ayam | Telur | Sayur | Nasi</p>
                            
                            <!-- Info Row -->
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <!-- Porsi -->
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                
                                <!-- Waktu -->
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                
                                <!-- Harga -->
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 12.000</span>
                                </div>
                            </div>
                            
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">
                                    +
                                </button>
                            </div>
                            
                            <!-- Button Pesan -->
                            <button onclick="event.preventDefault(); addToCart(this, 'mie-goreng', 'Mie Goreng', 'Rp. 12.000', 12000, 'images/food/pecel_ayam.png');" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Menu Card: Mie Rebus -->
                <a href="/menu/mie-rebus" class="block menu-item" data-name="Mie Rebus">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/food/mie_rebus.jpg') }}" alt="Mie Rebus" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Mie Rebus</h3>
                            <p class="text-sm text-gray-500 mb-4">Ayam | Telur | Sayur | Kuah</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 12.000</span>
                                </div>
                            </div>
                            
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">
                                    +
                                </button>
                            </div>
                            
                            <button onclick="event.preventDefault(); addToCart(this, 'mie-rebus', 'Mie Rebus', 'Rp. 12.000', 12000, 'images/food/pecel_lele.png');" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Menu Card: Soto -->
                <a href="/menu/soto" class="block menu-item" data-name="Soto">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/food/soto.jpeg') }}" alt="Soto" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Soto</h3>
                            <p class="text-sm text-gray-500 mb-4">Ayam | Kuah | Nasi | Kerupuk</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 15.000</span>
                                </div>
                            </div>
                            
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">
                                    +
                                </button>
                            </div>
                            
                            <button onclick="event.preventDefault(); addToCartAuto(this);" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Menu Card: Sup Daging Sapi -->
                <a href="/menu/sup-daging-sapi" class="block menu-item" data-name="Sup Daging Sapi">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/food/sup_daging.jpeg') }}" alt="Sup Daging Sapi" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Sup Daging Sapi</h3>
                            <p class="text-sm text-gray-500 mb-4">Daging Sapi | Sayur | Kuah | Nasi</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 20.000</span>
                                </div>
                            </div>
                            
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">
                                    +
                                </button>
                            </div>
                            
                            <button onclick="event.preventDefault(); addToCartAuto(this);" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Menu Card: Risol Sayur -->
                <a href="/menu/risol-sayur" class="block menu-item" data-name="Risol Sayur">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/food/risol.jpeg') }}" alt="Risol Sayur" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Risol Sayur</h3>
                            <p class="text-sm text-gray-500 mb-4">Sayur | Wortel | Kentang | Tepung</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 3.000</span>
                                </div>
                            </div>
                            
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">
                                    +
                                </button>
                            </div>
                            
                            <button onclick="event.preventDefault(); addToCartAuto(this);" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Menu Card: Donat Kentang -->
                <a href="/menu/donat-kentang" class="block menu-item" data-name="Donat Kentang">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/food/donat.jpeg') }}" alt="Donat Kentang" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Donat Kentang</h3>
                            <p class="text-sm text-gray-500 mb-4">Kentang | Tepung | Gula | Topping</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 4.000</span>
                                </div>
                            </div>
                            
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">
                                    +
                                </button>
                            </div>
                            
                            <button onclick="event.preventDefault(); addToCartAuto(this);" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Menu Card: Pecel Ayam -->
                <a href="/menu/pecal-ayam" class="block menu-item" data-name="Pecel Ayam">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/food/pecel_ayam.png') }}" alt="Pecel Ayam" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Pecel Ayam</h3>
                            <p class="text-sm text-gray-500 mb-4">Ayam | Tahu | Tempe | Sayur</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 15.000</span>
                                </div>
                            </div>
                            
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">
                                    +
                                </button>
                            </div>
                            
                            <button onclick="event.preventDefault(); addToCartAuto(this);" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Menu Card: Pecel Lele -->
                <a href="/menu/pecal-lele" class="block menu-item" data-name="Pecel Lele">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/food/pecel_lele.png') }}" alt="Pecel Lele" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Pecel Lele</h3>
                            <p class="text-sm text-gray-500 mb-4">Lele | Nasi | Sayur | Tahu | Tempe</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 15.000</span>
                                </div>
                            </div>
                            
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">
                                    +
                                </button>
                            </div>
                            
                            <button onclick="event.preventDefault(); addToCartAuto(this);" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Menu Card: Nasi Goreng -->
                <a href="/menu/nasi-goreng" class="block menu-item" data-name="Nasi Goreng">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/food/nasi_goreng.png') }}" alt="Nasi Goreng" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Nasi Goreng</h3>
                            <p class="text-sm text-gray-500 mb-4">Telur | Nasi | Sayur</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 12.000</span>
                                </div>
                            </div>
                            
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">
                                    +
                                </button>
                            </div>
                            
                            <button onclick="event.preventDefault(); addToCartAuto(this);" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Menu Card: Sate Ayam -->
                <a href="/menu/sate-ayam" class="block menu-item" data-name="Sate Ayam">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/food/sate_ayam.png') }}" alt="Sate Ayam" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Sate Ayam</h3>
                            <p class="text-sm text-gray-500 mb-4">Daging Sate | Kacang | Lontong</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 10.000</span>
                                </div>
                            </div>
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    +
                                </button>
                            </div>
                            <button onclick="event.preventDefault(); addToCartAuto(this);" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Menu Card: Gado Gado -->
                <a href="/menu/gado-gado" class="block menu-item" data-name="Gado Gado">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/food/gado_gado.png') }}" alt="Gado Gado" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Gado Gado</h3>
                            <p class="text-sm text-gray-500 mb-4">Sayur | Telur | Lontong</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 10.000</span>
                                </div>
                            </div>
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    +
                                </button>
                            </div>
                            <button onclick="event.preventDefault(); addToCartAuto(this);" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Menu Card: Nasi Uduk -->
                <a href="/menu/nasi-uduk" class="block menu-item" data-name="Nasi Uduk">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/food/nasi_uduk.png') }}" alt="Nasi Uduk" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Nasi Uduk</h3>
                            <p class="text-sm text-gray-500 mb-4">Nasi | Ayam | Tempe | Telur</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 10.000</span>
                                </div>
                            </div>
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    +
                                </button>
                            </div>
                            <button onclick="event.preventDefault(); addToCartAuto(this);" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </section>

    <!-- Drinks Section -->
    <section class="bg-gray-50 px-6 lg:px-12 py-16">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-bold text-center text-black mb-12">Drinks</h2>
            
            <!-- Drinks Grid -->
            <div id="drinksGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Drink Card: Es Teh Hijau -->
                <a href="/menu/es-teh-hijau" class="block menu-item" data-name="Es Teh Hijau">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/drink/es_teh_hijau.png') }}" alt="Es Teh Hijau" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Es Teh Hijau</h3>
                            <p class="text-sm text-gray-500 mb-4">Teh Hijau | Es Batu | Gula</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 5.000</span>
                                </div>
                            </div>
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    +
                                </button>
                            </div>
                            <button onclick="event.preventDefault(); addToCartAuto(this);" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Drink Card: Susu Kedelai -->
                <a href="/menu/susu-kedelai" class="block menu-item" data-name="Susu Kedelai">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/drink/susu_kedelai.png') }}" alt="Susu Kedelai" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Susu Kedelai</h3>
                            <p class="text-sm text-gray-500 mb-4">Susu Kedelai Dingin</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 12.000</span>
                                </div>
                            </div>
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    +
                                </button>
                            </div>
                            <button onclick="event.preventDefault(); addToCartAuto(this);" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Drink Card: Es Teh -->
                <a href="/menu/es-teh" class="block menu-item" data-name="Es Teh">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/drink/es_teh.png') }}" alt="Es Teh" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Es Teh</h3>
                            <p class="text-sm text-gray-500 mb-4">Teh Manis Dingin</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 5.000</span>
                                </div>
                            </div>
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    +
                                </button>
                            </div>
                            <button onclick="event.preventDefault(); addToCartAuto(this);" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Drink Card: Es Durian Asli -->
                <a href="/menu/es-durian-asli" class="block menu-item" data-name="Es Durian Asli">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/drink/es_durian.jpeg') }}" alt="Es Durian Asli" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Es Durian Asli</h3>
                            <p class="text-sm text-gray-500 mb-4">Durian | Susu | Es Batu</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                <span class="text-xs">1</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-xs">1 menit</span>
                            </div>
                            <div class="ml-auto">
                                <span class="text-lg font-bold text-[#F6A406]">Rp. 5.000</span>
                            </div>
                        </div>
                        <!-- Quantity Counter -->
                        <div class="flex items-center justify-center gap-4 mb-4">
                            <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                −
                            </button>
                            <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                            <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                +
                            </button>
                        </div>
                        <button class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                            Pesan
                        </button>
                    </div>
                </div>
                </a>

                <!-- Drink Card: Es Cendol -->
                <a href="/menu/es-cendol" class="block menu-item" data-name="Es Cendol">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/drink/es_cendol.jpeg') }}" alt="Es Cendol" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Es Cendol</h3>
                            <p class="text-sm text-gray-500 mb-4">Cendol | Santan | Gula Merah | Es</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 5.000</span>
                                </div>
                            </div>
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    +
                                </button>
                            </div>
                            <button onclick="event.preventDefault(); addToCartAuto(this);" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Drink Card: Minuman Boba -->
                <a href="/menu/minuman-boba" class="block menu-item" data-name="Minuman Boba">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/drink/minuman_boba.jpeg') }}" alt="Minuman Boba" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Minuman Boba</h3>
                            <p class="text-sm text-gray-500 mb-4">Boba | Susu | Es Batu</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 6.000</span>
                                </div>
                            </div>
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    +
                                </button>
                            </div>
                            <button onclick="event.preventDefault(); addToCartAuto(this);" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Drink Card: Minuman Matcha -->
                <a href="/menu/minuman-matcha" class="block menu-item" data-name="Minuman Matcha">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/drink/matcha.jpg') }}" alt="Minuman Matcha" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Minuman Matcha</h3>
                            <p class="text-sm text-gray-500 mb-4">Matcha | Susu | Es Batu</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 12.000</span>
                                </div>
                            </div>
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    +
                                </button>
                            </div>
                            <button onclick="event.preventDefault(); addToCartAuto(this);" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Drink Card: Minuman Jus -->
                <a href="/menu/minuman-jus" class="block menu-item" data-name="Minuman Jus">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/drink/minuman_jus.jpg') }}" alt="Minuman Jus" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Minuman Jus</h3>
                            <p class="text-sm text-gray-500 mb-4">Buah Segar | Es Batu</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 5.000</span>
                                </div>
                            </div>
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    +
                                </button>
                            </div>
                            <button onclick="event.preventDefault(); addToCartAuto(this);" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Drink Card: Air Mineral -->
                <a href="/menu/air-mineral" class="block menu-item" data-name="Air Mineral">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/drink/air_mineral.jpeg') }}" alt="Air Mineral" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Air Mineral</h3>
                            <p class="text-sm text-gray-500 mb-4">Air Mineral Dingin</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 5.000</span>
                                </div>
                            </div>
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    +
                                </button>
                            </div>
                            <button onclick="event.preventDefault(); addToCartAuto(this);" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Drink Card: Kopi -->
                <a href="/menu/kopi" class="block menu-item" data-name="Kopi">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/drink/kopi.jpeg') }}" alt="Kopi" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Kopi</h3>
                            <p class="text-sm text-gray-500 mb-4">Kopi | Gula | Susu</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 12.000</span>
                                </div>
                            </div>
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    +
                                </button>
                            </div>
                            <button onclick="event.preventDefault(); addToCartAuto(this);" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Drink Card: Sop Buah -->
                <a href="/menu/sop-buah" class="block menu-item" data-name="Sop Buah">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 group cursor-pointer">
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/drink/sop_buah.jpeg') }}" alt="Sop Buah" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                            <button class="absolute top-4 left-4 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md hover:bg-[#F6A406] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md flex items-center gap-1">
                                <span class="text-yellow-500">⭐</span>
                                <span class="text-sm font-semibold text-black">5.0</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-black mb-2">Sop Buah</h3>
                            <p class="text-sm text-gray-500 mb-4">Buah Segar | Sirup | Es Batu</p>
                            <div class="flex items-center gap-4 mb-4 text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-xs">1</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-xs">1 menit</span>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-lg font-bold text-[#F6A406]">Rp. 5.000</span>
                                </div>
                            </div>
                            <!-- Quantity Counter -->
                            <div class="flex items-center justify-center gap-4 mb-4">
                                <button onclick="event.preventDefault(); decreaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    −
                                </button>
                                <span class="quantity-display text-xl font-bold text-black min-w-[30px] text-center">1</span>
                                <button onclick="event.preventDefault(); increaseQuantity(this);" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 rounded-lg flex items-center justify-center text-xl font-bold text-black transition-colors">
                                    +
                                </button>
                            </div>
                            <button onclick="event.preventDefault(); addToCartAuto(this);" class="w-full bg-[#F6A406] text-white font-semibold py-3 rounded-xl hover:bg-[#F6A406] transition-colors shadow-md hover:shadow-lg">
                                Pesan
                            </button>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </section>

    <!-- Bottom Navigation -->
    <nav class="fixed bottom-0 left-0 w-full bg-white shadow-lg rounded-t-3xl z-50 font-poppins">
        <div class="max-w-md mx-auto px-8 py-5">
            <div class="flex justify-between items-center gap-10">
                <!-- Home (Active) -->
                <a href="/menu" class="flex flex-col items-center gap-2 group transition-transform hover:scale-110">
                    <div class="px-6 py-3 bg-[#fff7ed] rounded-2xl flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#F6A406" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                    </div>
                    <span class="text-sm font-bold text-black">Home</span>
                </a>

                <!-- History -->
                <a href="/history" class="relative flex items-center justify-center group transition-transform hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#fcae80" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                    <div class="absolute top-0 right-0 w-3 h-3 bg-[#F6A406] rounded-full"></div>
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

    <script>
        // Fungsi untuk menambah jumlah
        function increaseQuantity(button) {
            const quantitySpan = button.parentElement.querySelector('.quantity-display');
            let currentValue = parseInt(quantitySpan.textContent);
            quantitySpan.textContent = currentValue + 1;
        }

        // Fungsi untuk mengurangi jumlah
        function decreaseQuantity(button) {
            const quantitySpan = button.parentElement.querySelector('.quantity-display');
            let currentValue = parseInt(quantitySpan.textContent);
            if (currentValue > 1) {
                quantitySpan.textContent = currentValue - 1;
            }
        }

        // Fungsi pencarian menu
        function searchMenu() {
            const searchInput = document.getElementById('searchInput');
            const searchTerm = searchInput.value.toLowerCase().trim();
            const menuItems = document.querySelectorAll('.menu-item');
            
            let hasVisibleItems = false;
            
            menuItems.forEach(item => {
                const menuName = item.getAttribute('data-name').toLowerCase();
                
                if (menuName.includes(searchTerm)) {
                    item.style.display = 'block';
                    hasVisibleItems = true;
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Tampilkan pesan jika tidak ada hasil
            const menuGrid = document.getElementById('menuGrid');
            const drinksGrid = document.getElementById('drinksGrid');
            
            // Hapus pesan "tidak ditemukan" yang ada
            const existingMessage = document.querySelector('.no-results-message');
            if (existingMessage) {
                existingMessage.remove();
            }
            
            // Jika tidak ada item yang terlihat dan ada input pencarian
            if (!hasVisibleItems && searchTerm !== '') {
                const noResultsMessage = document.createElement('div');
                noResultsMessage.className = 'no-results-message col-span-full text-center py-12';
                noResultsMessage.innerHTML = `
                    <div class="text-gray-400 text-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="font-semibold">Menu "${searchTerm}" tidak ditemukan</p>
                        <p class="text-sm mt-2">Coba kata kunci lain</p>
                    </div>
                `;
                menuGrid.appendChild(noResultsMessage);
            }
        }

        // Fungsi untuk menambahkan item ke cart (dengan parameter)
        function addToCart(button, id, name, price, priceNumeric, image) {
            // Ambil quantity dari card yang sama
            const card = button.closest('.bg-white');
            const quantityDisplay = card.querySelector('.quantity-display');
            const quantity = parseInt(quantityDisplay.textContent);
            
            // Data yang akan dikirim
            const data = {
                id: id,
                name: name,
                price: price,
                price_numeric: priceNumeric,
                image: image,
                quantity: quantity
            };
            
            // Kirim request ke server
            fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Tampilkan notifikasi sukses
                    showNotification('✓ ' + data.message, 'success');
                    
                    // Reset quantity ke 1
                    quantityDisplay.textContent = '1';
                    
                    // Redirect ke halaman cart setelah 1 detik
                    setTimeout(() => {
                        window.location.href = '/cart';
                    }, 1000);
                } else {
                    showNotification('✗ Gagal menambahkan ke keranjang', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('✗ Terjadi kesalahan', 'error');
            });
        }
        
        // Fungsi untuk menambahkan item ke cart (otomatis dari card)
        function addToCartAuto(button) {
            // Ambil data dari card
            const card = button.closest('.bg-white');
            const menuLink = card.closest('.menu-item');
            const quantityDisplay = card.querySelector('.quantity-display');
            
            // Ambil data menu
            const name = menuLink.getAttribute('data-name');
            const menuTitle = card.querySelector('h3').textContent;
            const priceText = card.querySelector('.text-lg.font-bold.text-\\[\\#f97316\\]').textContent;
            const image = card.querySelector('img').getAttribute('src');
            const quantity = parseInt(quantityDisplay.textContent);
            
            // Generate ID dari nama (lowercase, replace space dengan dash)
            const id = name.toLowerCase().replace(/\s+/g, '-');
            
            // Parse harga numeric (hapus "Rp. " dan ".")
            const priceNumeric = parseInt(priceText.replace(/[^0-9]/g, ''));
            
            // Data yang akan dikirim
            const data = {
                id: id,
                name: name,
                price: priceText,
                price_numeric: priceNumeric,
                image: image,
                quantity: quantity
            };
            
            // Kirim request ke server
            fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Tampilkan notifikasi sukses
                    showNotification('✓ ' + data.message, 'success');
                    
                    // Reset quantity ke 1
                    quantityDisplay.textContent = '1';
                    
                    // Redirect ke halaman cart setelah 1 detik
                    setTimeout(() => {
                        window.location.href = '/cart';
                    }, 1000);
                } else {
                    showNotification('✗ Gagal menambahkan ke keranjang', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('✗ Terjadi kesalahan', 'error');
            });
        }
        
        // Fungsi untuk menampilkan notifikasi
        function showNotification(message, type) {
            // Hapus notifikasi yang ada
            const existingNotif = document.querySelector('.cart-notification');
            if (existingNotif) {
                existingNotif.remove();
            }
            
            // Buat notifikasi baru
            const notification = document.createElement('div');
            notification.className = 'cart-notification fixed top-24 right-6 z-50 px-6 py-4 rounded-xl shadow-2xl transform transition-all duration-300';
            
            if (type === 'success') {
                notification.classList.add('bg-green-500', 'text-white');
            } else {
                notification.classList.add('bg-red-500', 'text-white');
            }
            
            notification.innerHTML = `
                <div class="flex items-center gap-3">
                    <span class="text-lg font-semibold">${message}</span>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            // Animasi masuk
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 10);
            
            // Hapus setelah 3 detik
            setTimeout(() => {
                notification.style.transform = 'translateX(400px)';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }

        // Event listener untuk input pencarian
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            
            // Pencarian saat mengetik
            searchInput.addEventListener('input', searchMenu);
            
            // Pencarian saat menekan Enter
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    searchMenu();
                }
            });
        });
    </script>

</body>
</html>