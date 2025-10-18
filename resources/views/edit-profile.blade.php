<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FoodMate | Edit Profil</title>
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
                <a href="/profile" class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition-colors">
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

    <!-- Edit Profile Content -->
    <section class="bg-white px-6 lg:px-12 py-12">
        <div class="max-w-2xl mx-auto">
            <!-- Page Title -->
            <div class="mb-8">
                <h2 class="text-2xl font-medium text-gray-400 mb-2">Edit Profil</h2>
                <h1 class="text-5xl font-bold text-black">Perbarui Informasi</h1>
            </div>

            <!-- Edit Profile Form -->
            <form action="/profile/update" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Profile Photo Section -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h3 class="text-2xl font-bold text-black mb-6">Foto Profil</h3>

                    <div class="flex items-center gap-6">
                        <!-- Current Photo -->
                        <div class="w-24 h-24 bg-[#F6A406] rounded-full flex items-center justify-center overflow-hidden">
                            @if(session('profile_photo'))
                                <img id="profile-photo-preview" src="{{ asset('storage/' . session('profile_photo')) }}" alt="Profile Photo" class="w-full h-full object-cover">
                            @else
                                <img id="profile-photo-preview" src="" alt="Profile Photo" class="w-full h-full object-cover" style="display: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            @endif
                        </div>

                        <!-- Upload Button -->
                        <div class="flex-1">
                            <label for="profile_photo" class="block">
                                <div class="bg-[#F6A406] text-white px-6 py-3 rounded-xl font-semibold hover:bg-[#F6A406] transition-colors cursor-pointer text-center">
                                    Pilih Foto Baru
                                </div>
                                <input type="file" id="profile_photo" name="profile_photo" accept="image/*" class="hidden" onchange="previewImage(this)">
                            </label>
                            <p class="text-sm text-gray-500 mt-2">Format: JPG, PNG, GIF. Maksimal 2MB</p>
                        </div>
                    </div>
                </div>

                <!-- Personal Information -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h3 class="text-2xl font-bold text-black mb-6">Informasi Pribadi</h3>

                    <div class="space-y-6">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-lg font-semibold text-black mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name" value="{{ session('profile_name', 'Nama Pengguna') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#F6A406] focus:border-transparent"
                                   required>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-lg font-semibold text-black mb-2">Email</label>
                            <input type="email" id="email" name="email" value="{{ session('profile_email', 'user@email.com') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#F6A406] focus:border-transparent"
                                   required>
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-lg font-semibold text-black mb-2">Nomor Telepon</label>
                            <input type="tel" id="phone" name="phone" value="{{ session('profile_phone', '+62 812-3456-7890') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#F6A406] focus:border-transparent"
                                   required>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4">
                    <a href="/profile" class="flex-1 bg-gray-200 text-gray-700 font-semibold py-4 px-6 rounded-xl hover:bg-gray-300 transition-colors text-center">
                        Batal
                    </a>
                    <button type="submit" class="flex-1 bg-[#F6A406] text-white font-semibold py-4 px-6 rounded-xl hover:bg-[#F6A406] transition-colors">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
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

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Update the profile photo preview
                    const previewImg = document.querySelector('#profile-photo-preview');
                    if (previewImg) {
                        previewImg.src = e.target.result;
                        previewImg.style.display = 'block';
                        // Hide the default icon
                        const defaultIcon = previewImg.parentElement.querySelector('svg');
                        if (defaultIcon) {
                            defaultIcon.style.display = 'none';
                        }
                    }
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>
</html>