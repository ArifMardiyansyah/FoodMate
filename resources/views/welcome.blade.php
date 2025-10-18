<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'FoodMate') }} - Mudah Pesan Nikmat Diantar</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@800&display=swap" rel="stylesheet">

    <!-- BoxIcons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white min-h-screen font-abhaya pt-20">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm fixed top-0 left-0 right-0 w-full z-50">
        <div class="w-full px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <img src="{{ asset('images/logo/logo1.png') }}"
                         alt="FoodMate Logo"
                         class="w-30 h-20">
                    <span class="ml-3 text-2xl font-bold text-gray-900">FoodMate</span>
                </div>

                <!-- Spacer to push navigation to the right -->
                <div class="flex-1"></div>


                <!-- User Icon with dropdown -->
                <div class="relative">
                    <button id="account-btn" type="button" class="bg-white text-gray-700 p-3 rounded-full shadow-sm border focus:outline-none focus:ring-2 focus:ring-orange-400">
                        <img src="{{ asset('images/icon/account.png') }}"
                             alt="User Account"
                             class="w-6 h-6">
                    </button>
                    <div id="account-menu" class="hidden absolute right-0 mt-2 w-44 bg-white rounded-xl shadow-lg border z-50 overflow-hidden">
                        <a href="/register" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Register</a>
                        <a href="/login" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div id="home" class="bg-white relative overflow-hidden min-h-screen">
        <!-- Orange curved background - exact Figma dimensions -->
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
                            <img src="{{ asset('images/icon/search.png') }}"
                                 alt="Search"
                                 class="w-5 h-5">
                        </div>
                        <input
                            type="text"
                            placeholder="Cari disini"
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
                    <!-- Gambar Utama Nasi Uduk -->
                    <div class="absolute transform rotate-2 z-20" style="top: 18%; right: -18px; width: 750px; height: 480px;">
                        <div class="relative w-full h-full">
                            <img src="{{ asset('images/food/nasi_uduk.png') }}"
                                 alt="Nasi Uduk"
                                 class="w-full h-full object-contain drop-shadow-2xl">
                        </div>
                    </div>

                    <!-- Bawah Kiri Pecel Lele) -->
                    <div class="absolute transform -rotate-12 z-10" style="bottom: -1.5vh; right: 80px; width: 320px; height: 320px;">
                        <div class="relative w-full h-full">
                            <img src="{{ asset('images/food/pecel_lele.png') }}"
                                 alt="Pecel Lele"
                                 class="w-full h-full object-contain drop-shadow-xl">
                        </div>
                    </div>

                    <!-- Bawah Kanan Sate Ayam) -->
                    <div class="absolute transform rotate-6 z-15" style="bottom: -5.5vh; right: -350px; width: 420px; height: 360px;">
                        <div class="relative w-full h-full">
                            <img src="{{ asset('images/food/sate_ayam.png') }}"
                                 alt="Sate Ayam"
                                 class="w-full h-full object-contain drop-shadow-xl">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 md:grid-cols-3">
                <!-- Diskon -->
                <div class="bg-yellow-400 rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        <img src="{{ asset('images/icon/discount (1).png') }}"
                             alt="Discount"
                             class="w-12 h-12">
                    </div>

                    <h3 class="text-lg font-bold text-black mb-2">Diskon</h3>
                    <p class="text-sm text-black">Dapatkan diskon gratis biaya antar 1 item untuk pembelian 5 item sekaligus</p>
                </div>

                <!-- Cepat Tanpa Antri -->
                <div class="bg-yellow-400 rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        <img src="{{ asset('images/icon/rush (1).png') }}"
                             alt="Fast Service"
                             class="w-15 h-15">
                    </div>
                    <h3 class="text-lg font-bold text-black mb-2">Cepat Tanpa Antri</h3>
                    <p class="text-sm text-black">Langsung diantar setelah masak</p>
                </div>

                <!-- Fresh Food -->
                <div class="bg-yellow-400 rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        <img src="{{ asset('images/icon/fresh (1).png') }}"
                             alt="Fresh Food"
                             class="w-12 h-12">
                    </div>
                    <h3 class="text-lg font-bold text-black mb-2">Fresh Food</h3>
                    <p class="text-sm text-black">Dibuat dengan bahan segar setiap saat</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Section -->
    <div id="menu" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-600">Menu Tersedia</h2>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <!-- Pecel Ayam -->
                <div class="bg-white rounded-2xl p-4 shadow-lg">
                    <div class="w-90 h-70 bg-gray-100 rounded-xl mb-4 overflow-hidden">
                        <img src="{{ asset('images/food/pecel_ayam.png') }}"
                             alt="Pecel Ayam"
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Rating -->
                    <div class="flex items-center mb-2">
                        <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-sm font-bold">5.0</span>

                        <svg class="w-4 h-4 text-red-400 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <h3 class="text-lg font-bold text-black mb-1">Pecel Ayam</h3>
                    <p class="text-sm text-gray-600 mb-4">Ayam | Tahu dan Tempe | Sambal | Sayur | Nasi</p>

                    <!-- Quantity and Price -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-2">
                            <button class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-lg font-bold">−</span>
                            </button>
                            <span class="font-bold">1</span>
                            <button class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-lg font-bold">+</span>
                            </button>
                        </div>
                        <span class="text-lg font-bold">Rp. 15.000</span>
                    </div>

                    <button class="w-full bg-orange-500 text-white py-3 rounded-xl font-bold hover:bg-orange-600 transition">
                        Pesan
                    </button>
                </div>

                <!-- Pecel Lele -->
                <div class="bg-white rounded-2xl p-4 shadow-lg">
                    <div class="w-full h-70 bg-gray-100 rounded-xl mb-4 overflow-hidden">
                        <img src="{{ asset('images/food/pecel_lele.png') }}"
                             alt="Pecel Lele"
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Rating -->
                    <div class="flex items-center mb-2">
                        <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-sm font-bold">5.0</span>

                        <svg class="w-4 h-4 text-red-400 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <h3 class="text-lg font-bold text-black mb-1">Pecel Lele</h3>
                    <p class="text-sm text-gray-600 mb-4">Lele | Nasi | Sayur | Tahu dan Tempe | Sambal </p>

                    <!-- Quantity and Price -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-2">
                            <button class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-lg font-bold">−</span>
                            </button>
                            <span class="font-bold">1</span>
                            <button class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-lg font-bold">+</span>
                            </button>
                        </div>
                        <span class="text-lg font-bold">Rp. 15.000</span>
                    </div>

                    <button class="w-full bg-orange-500 text-white py-3 rounded-xl font-bold hover:bg-orange-600 transition">
                        Pesan
                    </button>
                </div>

                <!-- Nasi Goreng -->
                <div class="bg-white rounded-2xl p-4 shadow-lg">
                    <div class="w-full h-70 bg-gray-100 rounded-xl mb-4 overflow-hidden">
                        <img src="{{ asset('images/food/nasi_goreng.png') }}"
                             alt="Nasi Goreng"
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Rating -->
                    <div class="flex items-center mb-2">
                        <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-sm font-bold">5.0</span>

                        <svg class="w-4 h-4 text-red-400 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <h3 class="text-lg font-bold text-black mb-1">Nasi Goreng</h3>
                    <p class="text-sm text-gray-600 mb-4">Telur | Sosis | Tomat | Sayur</p>

                    <!-- Quantity and Price -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-2">
                            <button class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-lg font-bold">−</span>
                            </button>
                            <span class="font-bold">1</span>
                            <button class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-lg font-bold">+</span>
                            </button>
                        </div>
                        <span class="text-lg font-bold">Rp. 12.000</span>
                    </div>

                    <button class="w-full bg-orange-500 text-white py-3 rounded-xl font-bold hover:bg-orange-600 transition">
                        Pesan
                    </button>
                </div>

                <!-- Sate Ayam -->
                    <div class="bg-white rounded-2xl p-4 shadow-lg">
                    <div class="w-full h-70 bg-gray-100 rounded-xl mb-4 overflow-hidden">
                        <img src="{{ asset('images/food/sate_ayam.png') }}"
                             alt="Sate Ayam"
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Rating -->
                    <div class="flex items-center mb-2">
                        <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-sm font-bold">5.0</span>

                        <svg class="w-4 h-4 text-red-400 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <h3 class="text-lg font-bold text-black mb-1">Sate Ayam</h3>
                    <p class="text-sm text-gray-600 mb-4">Daging Ayam | Ketupat | Isian</p>

                    <!-- Quantity and Price -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-2">
                            <button class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-lg font-bold">−</span>
                            </button>
                            <span class="font-bold">1</span>
                            <button class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-lg font-bold">+</span>
                            </button>
                        </div>
                        <span class="text-lg font-bold">Rp. 10.000</span>
                    </div>

                    <button class="w-full bg-orange-500 text-white py-3 rounded-xl font-bold hover:bg-orange-600 transition">
                        Pesan
                    </button>
                </div>

                <!-- Gado Gado -->
                    <div class="bg-white rounded-2xl p-4 shadow-lg">
                    <div class="w-full h-70 bg-gray-100 rounded-xl mb-4 overflow-hidden">
                        <img src="{{ asset('images/food/gado_gado.png') }}"
                             alt="Gado Gado"
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Rating -->
                    <div class="flex items-center mb-2">
                        <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-sm font-bold">5.0</span>

                        <svg class="w-4 h-4 text-red-400 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <h3 class="text-lg font-bold text-black mb-1">Gado Gado</h3>
                    <p class="text-sm text-gray-600 mb-4">Ketupat | telur | Mie | Tahu | Buncis | Sayuran</p>

                    <!-- Quantity and Price -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-2">
                            <button class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-lg font-bold">−</span>
                            </button>
                            <span class="font-bold">1</span>
                            <button class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-lg font-bold">+</span>
                            </button>
                        </div>
                        <span class="text-lg font-bold">Rp. 10.000</span>
                    </div>

                    <button class="w-full bg-orange-500 text-white py-3 rounded-xl font-bold hover:bg-orange-600 transition">
                        Pesan
                    </button>
                </div>

                <!-- Nasi Uduk -->
                <div class="bg-white rounded-2xl p-4 shadow-lg">
                    <div class="w-full h-70 bg-gray-100 rounded-xl mb-4 overflow-hidden">
                        <img src="{{ asset('images/food/nasi_uduk.png') }}"
                             alt="Nasi Goreng"
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Rating -->
                    <div class="flex items-center mb-2">
                        <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-sm font-bold">5.0</span>

                        <svg class="w-4 h-4 text-red-400 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <h3 class="text-lg font-bold text-black mb-1">Nasi Uduk</h3>
                    <p class="text-sm text-gray-600 mb-4">Telur | Mie | Orek Tempe | Teri | Kerupuk | Sayur</p>

                    <!-- Quantity and Price -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-2">
                            <button class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-lg font-bold">−</span>
                            </button>
                            <span class="font-bold">1</span>
                            <button class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-lg font-bold">+</span>
                            </button>
                        </div>
                        <span class="text-lg font-bold">Rp. 10.000</span>
                    </div>

                    <button class="w-full bg-orange-500 text-white py-3 rounded-xl font-bold hover:bg-orange-600 transition">
                        Pesan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Drinks Section -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-600">Drinks</h2>
            </div>

            <div class="grid gap-6 md:grid-cols-3 max-w-4xl mx-auto">
                <!-- Es Teh Hijau -->
                <div class="bg-white rounded-2xl p-4 shadow-lg">
                    <div class="w-full h-70 bg-gray-100 rounded-xl mb-4 overflow-hidden">
                        <img src="{{ asset('images/drink/es_teh_hijau.png') }}"
                             alt="Es Teh Hijau"
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Rating -->
                    <div class="flex items-center mb-2">
                        <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-sm font-bold">5.0</span>

                        <svg class="w-4 h-4 text-red-400 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <h3 class="text-lg font-bold text-black mb-1">Es Teh Hijau</h3>
                    <p class="text-sm text-gray-600 mb-4">Teh Hijau | Es</p>

                    <!-- Quantity and Price -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-2">
                            <button class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-lg font-bold">−</span>
                            </button>
                            <span class="font-bold">1</span>
                            <button class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-lg font-bold">+</span>
                            </button>
                        </div>
                        <span class="text-lg font-bold">Rp. 5.000</span>
                    </div>

                    <button class="w-full bg-orange-500 text-white py-3 rounded-xl font-bold hover:bg-orange-600 transition">
                        Pesan
                    </button>
                </div>
                {{-- Susu Kedelai --}}
                <div class="bg-white rounded-2xl p-4 shadow-lg">
                    <div class="w-full h-70 bg-gray-100 rounded-xl mb-4 overflow-hidden">
                        <img src="{{ asset('images/drink/susu_kedelai.png') }}"
                             alt="Susu Kedelai"
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Rating -->
                    <div class="flex items-center mb-2">
                        <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-sm font-bold">5.0</span>

                        <svg class="w-4 h-4 text-red-400 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <h3 class="text-lg font-bold text-black mb-1">Susu Kedelai</h3>
                    <p class="text-sm text-gray-600 mb-4">Susu | Kedelai</p>

                    <!-- Quantity and Price -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-2">
                            <button class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-lg font-bold">−</span>
                            </button>
                            <span class="font-bold">1</span>
                            <button class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-lg font-bold">+</span>
                            </button>
                        </div>
                        <span class="text-lg font-bold">Rp. 10.000</span>
                    </div>

                    <button class="w-full bg-orange-500 text-white py-3 rounded-xl font-bold hover:bg-orange-600 transition">
                        Pesan
                    </button>
                </div>

                <!-- Es Teh -->
                <div class="bg-white rounded-2xl p-4 shadow-lg">
                    <div class="w-full h-70 bg-gray-100 rounded-xl mb-4 overflow-hidden">
                        <img src="{{ asset('images/drink/es_teh.png') }}"
                             alt="Nasi Goreng"
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Rating -->
                    <div class="flex items-center mb-2">
                        <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-sm font-bold">5.0</span>

                        <svg class="w-4 h-4 text-red-400 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <h3 class="text-lg font-bold text-black mb-1">Es Teh</h3>
                    <p class="text-sm text-gray-600 mb-4">Teh | Es </p>

                    <!-- Quantity and Price -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-2">
                            <button class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-lg font-bold">−</span>
                            </button>
                            <span class="font-bold">1</span>
                            <button class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-lg font-bold">+</span>
                            </button>
                        </div>
                        <span class="text-lg font-bold">Rp. 10.000</span>
                    </div>

                    <button class="w-full bg-orange-500 text-white py-3 rounded-xl font-bold hover:bg-orange-600 transition">
                        Pesan
                    </button>
                </div>                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial Section -->
    <div class="py-16 bg-white50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-600 mb-8">Testimoni Pembeli</h2>
            </div>

            <div class="grid gap-8 md:grid-cols-3 max-w-5xl mx-auto">
                <!-- Budi -->
                <div class="bg-white rounded-2xl p-6 text-center shadow-lg">
                    <div class="w-20 h-20 bg-yellow-400 rounded-full mx-auto mb-4 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/icon/man.png') }}"
                             alt="Budi"
                             class="w-16 h-16 object-cover">
                    </div>

                    <!-- Rating -->
                    <div class="flex justify-center mb-4">
                        <svg class="w-5 h-5 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-black mb-3">Budi</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>

                <!-- Ridho -->
                <div class="bg-white rounded-2xl p-6 text-center shadow-lg">
                    <div class="w-20 h-20 bg-yellow-400 rounded-full mx-auto mb-4 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/icon/man.png') }}"
                             alt="Ridho"
                             class="w-16 h-16 object-cover">
                    </div>

                    <!-- Rating -->
                    <div class="flex justify-center mb-4">
                        <svg class="w-5 h-5 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-black mb-3">Ridho</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>

                <!-- Suci -->
                <div class="bg-white rounded-2xl p-6 text-center shadow-lg">
                    <div class="w-20 h-20 bg-red-400 rounded-full mx-auto mb-4 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/icon/woman.png') }}"
                             alt="Suci"
                             class="w-16 h-16 object-cover">
                    </div>

                    <!-- Rating -->
                    <div class="flex justify-center mb-4">
                        <svg class="w-5 h-5 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-black mb-3">Suci</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="py-16 bg-white">
        <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex rounded-lg overflow-hidden shadow-lg">
                <input type="email"
                       placeholder="Enter Your Email Here"
                       class="flex-1 px-4 py-3 border-0 focus:outline-none text-gray-600 placeholder-gray-400">
                <button class="bg-orange-500 text-white px-8 py-3 font-bold hover:bg-orange-600 transition">
                    Subscribe
                </button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer id="contact" style="background-color: #f6a406;" class="text-white">
        <div class="w-full px-4 sm:px-6 lg:px-8">
            <!-- Top brand and social icons -->
            <div class="flex items-center justify-between py-4">
                <div class="flex items-center">
                    <img src="{{ asset('images/logo/logo1.png') }}" alt="FoodMate Logo" class="w-30 h-20 mr-2">
                    <span class="text-xl font-bold">FoodMate</span>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="https://wa.me/6282171972709" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-white/30 ring-2 ring-white/60 flex items-center justify-center hover:bg-white/40 transition">
                        <i class='bx bxl-whatsapp text-xl text-white'></i>
                    </a>
                    <a href="https://instagram.com/arif.mardiyansyah?igshid=MzNlNGNkZWQ4Mg==" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-white/30 ring-2 ring-white/60 flex items-center justify-center hover:bg-white/40 transition">
                        <i class='bx bxl-instagram-alt text-xl text-white'></i>
                    </a>
                    <a href="https://www.facebook.com/arif.mardiyansyah.37?mibextid=ZbWKwL" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-white/30 ring-2 ring-white/60 flex items-center justify-center hover:bg-white/40 transition">
                        <i class='bx bxl-facebook text-xl text-white'></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="border-t border-white/60 w-full"></div>
        <div class="w-full px-4 sm:px-6 lg:px-8">
            <!-- Links grid -->
            <div class="grid gap-8 md:grid-cols-4 py-8">
                <div>
                    <h4 class="text-lg font-bold mb-4">Contact Us</h4>
                    <ul class="space-y-2">
                        <li>Foodmate Team</li>
                        <li>Sago, Painan, Kec IV Jurai</li>
                        <li>unppessel@gmail.com</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Explore</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:opacity-90">Foods</a></li>
                        <li><a href="#" class="hover:opacity-90">Drinks</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="hover:opacity-90">Home</a></li>
                        <li><a href="#menu" class="hover:opacity-90">Menu</a></li>
                        <li><a href="#contact" class="hover:opacity-90">About-us</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Resources</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:opacity-90">Privacy & Policy</a></li>
                        <li><a href="#" class="hover:opacity-90">Help Center</a></li>
                        <li><a href="#" class="hover:opacity-90">Support</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="border-t border-white/60 w-full"></div>
        <div class="w-full px-4 sm:px-6 lg:px-8">
            <div class="py-4 text-center">
                <p>By FoodMate Team</p>
            </div>
        </div>
    </footer>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const btn = document.getElementById('account-btn');
        const menu = document.getElementById('account-menu');
        if (!btn || !menu) return;

        // Toggle on button click
        btn.addEventListener('click', function (e) {
          e.stopPropagation();
          menu.classList.toggle('hidden');
        });

        // Close on outside click
        document.addEventListener('click', function () {
          menu.classList.add('hidden');
        });

        // Close on Escape key
        document.addEventListener('keydown', function (e) {
          if (e.key === 'Escape') {
            menu.classList.add('hidden');
          }
        });
      });
    </script>
</body>
</html>
