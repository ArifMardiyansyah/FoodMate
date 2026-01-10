<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>FoodMate | Edit Profil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
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
            <form action="/logout" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="bg-[#F6A406] text-white px-6 py-3 rounded-xl font-semibold hover:bg-[#F6A406] transition-colors">
                    Logout
                </button>
            </form>
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
                <?php echo csrf_field(); ?>
                <?php echo method_field('POST'); ?>

                <!-- Profile Photo Section -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h3 class="text-2xl font-bold text-black mb-6">Foto Profil</h3>

                    <div class="flex items-center gap-6">
                        <!-- Current Photo -->
                        <div class="w-24 h-24 bg-[#F6A406] rounded-full flex items-center justify-center overflow-hidden">
                            <?php if($user?->profile_photo_url ?? false): ?>
                                <img id="profile-photo-preview" src="<?php echo e($user->profile_photo_url); ?>" alt="Profile Photo" class="w-full h-full object-cover">
                            <?php elseif($profilePhoto): ?>
                                <img id="profile-photo-preview" src="<?php echo e(asset('storage/' . $profilePhoto)); ?>" alt="Profile Photo" class="w-full h-full object-cover">
                            <?php else: ?>
                                <img id="profile-photo-preview" src="" alt="Profile Photo" class="w-full h-full object-cover" style="display: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            <?php endif; ?>
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
                            <input type="text" id="name" name="name" value="<?php echo e(old('name', $user?->name)); ?>"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#F6A406] focus:border-transparent"
                                   required>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-lg font-semibold text-black mb-2">Email</label>
                            <input type="email" id="email" name="email" value="<?php echo e(old('email', $user?->email)); ?>"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#F6A406] focus:border-transparent"
                                   required>
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-lg font-semibold text-black mb-2">Nomor Telepon</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo e(old('phone', $profilePhone ?? '')); ?>"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#F6A406] focus:border-transparent"
                                   placeholder="Masukkan nomor telepon">
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

    <?php echo $__env->make('layouts.partials.bottom-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

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
</html><?php /**PATH C:\xampp\htdocs\FoodMate\FoodMate\resources\views/edit-profile.blade.php ENDPATH**/ ?>