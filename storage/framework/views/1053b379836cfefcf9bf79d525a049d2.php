<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>FoodMate | Profil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gradient-to-br from-orange-50 via-white to-yellow-50 min-h-screen font-abhaya pb-32">

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

    <!-- Profile Content -->
    <section class="bg-white px-6 lg:px-12 py-12">
        <div class="max-w-4xl mx-auto">
            <!-- Success Message -->
            <?php if(session('success')): ?>
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <!-- Page Title -->
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-medium text-gray-400 mb-2">👤 Akun Saya</h2>
                <h1 class="text-5xl font-bold bg-gradient-to-r from-[#F6A406] to-[#F08C00] bg-clip-text text-transparent">Profil Saya</h1>
            </div>

            <!-- Profile Card -->
            <div class="bg-gradient-to-br from-white to-orange-50 rounded-2xl shadow-2xl p-10 mb-8 border border-orange-100">
                <div class="flex items-center gap-6 mb-8">
                    <!-- Profile Avatar -->
                    <div class="w-24 h-24 bg-gradient-to-br from-[#F6A406] to-[#F08C00] rounded-full flex items-center justify-center overflow-hidden shadow-xl ring-4 ring-orange-200">
                        <?php if($user?->profile_photo_url ?? false): ?>
                            <img src="<?php echo e($user->profile_photo_url); ?>" alt="Profile Photo" class="w-full h-full object-cover">
                        <?php elseif($profilePhoto): ?>
                            <img src="<?php echo e(asset('storage/' . $profilePhoto)); ?>" alt="Profile Photo" class="w-full h-full object-cover">
                        <?php else: ?>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        <?php endif; ?>
                    </div>

                    <!-- Profile Info -->
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-black mb-1"><?php echo e($user?->name); ?></h3>
                        <p class="text-gray-500"><?php echo e($user?->email); ?></p>
                        <p class="text-gray-500"><?php echo e($profilePhone ?? 'Nomor telepon belum diatur'); ?></p>
                    </div>

                    <!-- Edit Button -->
                    <a href="/profile/edit" class="bg-gradient-to-r from-[#F6A406] to-[#F08C00] text-white px-8 py-3 rounded-xl font-bold hover:shadow-xl transition-all duration-300 inline-block hover:scale-105">
                        ✏️ Edit Profil
                    </a>
                </div>

                <!-- Profile Stats -->
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-gradient-to-br from-[#F6A406] to-[#F08C00] rounded-2xl p-6 text-white text-center shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <div class="text-4xl font-bold mb-2"><?php echo e(number_format($totalOrders)); ?></div>
                        <div class="text-sm opacity-90 font-medium">Total Pesanan</div>
                    </div>
                    <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl p-6 text-white text-center shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <div class="text-2xl font-bold mb-2">Rp <?php echo e(number_format($totalSpending, 0, ',', '.')); ?></div>
                        <div class="text-sm opacity-90 font-medium">Total Belanja</div>
                    </div>
                </div>
            </div>

            <!-- Menu Options -->
            <div class="space-y-5">
                <!-- Order History -->
                <a href="/history" class="block bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 border border-orange-100 hover:border-[#F6A406] group">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-[#F6A406]/20 to-[#F08C00]/20 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
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
                <a href="/favorites" class="block bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 border border-orange-100 hover:border-[#F6A406] group">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-red-100 to-pink-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
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
                <a href="#" class="block bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 border border-orange-100 hover:border-[#F6A406] group">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
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
                <a href="#" class="block bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 border border-orange-100 hover:border-[#F6A406] group">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-100 to-violet-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
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
                <form action="/logout" method="POST" class="w-full">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="w-full bg-gradient-to-r from-red-50 to-pink-50 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 text-left border border-red-100 hover:border-red-300 group">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-red-100 to-red-200 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
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
                </form>
            </div>
        </div>
    </section>

    <?php echo $__env->make('layouts.partials.bottom-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>
</html><?php /**PATH C:\xampp\htdocs\FoodMate\resources\views/profile.blade.php ENDPATH**/ ?>