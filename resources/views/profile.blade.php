<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FoodMate | Profil</title>
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

    <!-- Profile Content -->
    <section class="bg-white px-6 lg:px-12 py-12">
        <div class="max-w-4xl mx-auto">
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Page Title -->
            <div class="mb-8">
                <h2 class="text-2xl font-medium text-gray-400 mb-2">Akun</h2>
                <h1 class="text-5xl font-bold text-black">Profil Saya</h1>
            </div>

            <!-- Profile Card -->
            <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                <div class="flex items-center gap-6 mb-8">
                    <!-- Profile Avatar -->
                    <div class="w-20 h-20 bg-[#F6A406] rounded-full flex items-center justify-center overflow-hidden">
                        @if(session('profile_photo'))
                            <img src="{{ asset('storage/' . session('profile_photo')) }}" alt="Profile Photo" class="w-full h-full object-cover">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        @endif
                    </div>

                    <!-- Profile Info -->
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-black mb-1">{{ session('profile_name', 'Nama Pengguna') }}</h3>
                        <p class="text-gray-500">{{ session('profile_email', 'user@email.com') }}</p>
                        <p class="text-gray-500">{{ session('profile_phone', '+62 812-3456-7890') }}</p>
                    </div>

                    <!-- Edit Button -->
                    <a href="/profile/edit" class="bg-[#F6A406] text-white px-6 py-3 rounded-xl font-semibold hover:bg-[#F6A406] transition-colors inline-block">
                        Edit Profil
                    </a>
                </div>

                <!-- Profile Stats -->
                <div class="grid grid-cols-3 gap-6 mb-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-[#F6A406] mb-2">12</div>
                        <div class="text-sm text-gray-500">Pesanan</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-[#F6A406] mb-2">4.8</div>
                        <div class="text-sm text-gray-500">Rating</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-[#F6A406] mb-2">Rp 250K</div>
                        <div class="text-sm text-gray-500">Total Belanja</div>
                    </div>
                </div>
            </div>

            <!-- Menu Options -->
            <div class="space-y-4">
                <!-- Order History -->
                <a href="#" class="block bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-[#F6A406]/10 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#F6A406]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-black">Riwayat Pesanan</h3>
                            <p class="text-sm text-gray-500">Lihat semua pesanan Anda</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </a>

                <!-- Favorite Items -->
                <a href="#" class="block bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-[#F6A406]/10 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#F6A406]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-black">Favorit</h3>
                            <p class="text-sm text-gray-500">Menu favorit Anda</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </a>

                <!-- Settings -->
                <a href="#" class="block bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-[#F6A406]/10 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#F6A406]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-black">Pengaturan</h3>
                            <p class="text-sm text-gray-500">Kelola akun dan aplikasi</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </a>

                <!-- Help & Support -->
                <a href="#" class="block bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-[#F6A406]/10 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#F6A406]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-black">Bantuan & Dukungan</h3>
                            <p class="text-sm text-gray-500">Butuh bantuan? Hubungi kami</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </a>

                <!-- Logout -->
                <button class="w-full block bg-red-50 rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow text-left">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-red-600">Keluar</h3>
                            <p class="text-sm text-red-500">Keluar dari akun Anda</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </button>
            </div>
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

                <!-- Profile (Active) -->
                <a href="/profile" class="flex flex-col items-center gap-2 group transition-transform hover:scale-110">
                    <div class="px-6 py-3 bg-[#fff7ed] rounded-2xl flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#F6A406" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </div>
                    <span class="text-sm font-bold text-black">Profile</span>
                </a>
            </div>
        </div>
    </nav>

</body>
</html>