<nav class="fixed bottom-0 left-0 w-full bg-white shadow-lg rounded-t-3xl z-50 font-poppins">
    <div class="max-w-md mx-auto px-6 py-5">
        <div class="flex justify-between items-center gap-6">
            <!-- Home -->
            <?php $activeHome = request()->is('menu'); ?>
            <a href="/menu" class="flex flex-col items-center gap-2 group transition-transform hover:scale-110">
                <div class="px-6 py-3 rounded-2xl flex items-center justify-center <?php echo e($activeHome ? 'bg-[#fff7ed]' : 'bg-transparent'); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="<?php echo e($activeHome ? '#F6A406' : '#fcae80'); ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                </div>
                <span class="text-sm font-bold <?php echo e($activeHome ? 'text-black' : 'text-gray-700'); ?>">Home</span>
            </a>

            <!-- History -->
            <?php $activeHistory = request()->is('history'); ?>
            <a href="/history" class="flex flex-col items-center gap-2 group transition-transform hover:scale-110">
                <div class="px-6 py-3 rounded-2xl flex items-center justify-center <?php echo e($activeHistory ? 'bg-[#fff7ed]' : 'bg-transparent'); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="<?php echo e($activeHistory ? '#F6A406' : '#fcae80'); ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                </div>
                <span class="text-sm font-bold <?php echo e($activeHistory ? 'text-black' : 'text-gray-700'); ?>">History</span>
            </a>

            <!-- Cart with Badge -->
            <?php $activeCart = request()->is('cart'); ?>
            <a href="/cart" class="relative flex flex-col items-center gap-2 group transition-transform hover:scale-110">
                <div class="px-6 py-3 rounded-2xl flex items-center justify-center <?php echo e($activeCart ? 'bg-[#fff7ed]' : 'bg-transparent'); ?> relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="<?php echo e($activeCart ? '#F6A406' : '#fcae80'); ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="8" cy="21" r="1"/>
                        <circle cx="19" cy="21" r="1"/>
                        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/>
                    </svg>
                    <?php $cartCount = count(session()->get('cart', [])); ?>
                    <?php if($cartCount > 0): ?>
                    <div class="absolute -top-1 -right-1 min-w-[20px] h-5 bg-[#F6A406] rounded-full flex items-center justify-center px-1.5">
                        <span class="text-xs font-bold text-white"><?php echo e($cartCount); ?></span>
                    </div>
                    <?php endif; ?>
                </div>
                <span class="text-sm font-bold <?php echo e($activeCart ? 'text-black' : 'text-gray-700'); ?>">Cart</span>
            </a>

            <!-- Notifications -->
            <?php 
                $activeNotif = request()->is('notifications') || request()->is('notifications/*');
                $unreadCount = auth()->check() ? auth()->user()->unreadNotifications()->count() : 0;
            ?>
            <a href="/notifications" class="relative flex flex-col items-center gap-2 group transition-transform hover:scale-110">
                <div class="px-6 py-3 rounded-2xl flex items-center justify-center <?php echo e($activeNotif ? 'bg-[#fff7ed]' : 'bg-transparent'); ?> relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="<?php echo e($activeNotif ? '#F6A406' : '#fcae80'); ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                    </svg>
                    <?php if($unreadCount > 0): ?>
                    <div class="absolute -top-1 -right-1 min-w-[20px] h-5 bg-red-500 rounded-full flex items-center justify-center px-1.5">
                        <span class="text-xs font-bold text-white"><?php echo e($unreadCount); ?></span>
                    </div>
                    <?php endif; ?>
                </div>
                <span class="text-sm font-bold <?php echo e($activeNotif ? 'text-black' : 'text-gray-700'); ?>">Notif</span>
            </a>

            <!-- Profile -->
            <?php $activeProfile = request()->is('profile') || request()->is('profile/*'); ?>
            <a href="/profile" class="flex flex-col items-center gap-2 group transition-transform hover:scale-110">
                <div class="px-6 py-3 rounded-2xl flex items-center justify-center <?php echo e($activeProfile ? 'bg-[#fff7ed]' : 'bg-transparent'); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="<?php echo e($activeProfile ? '#F6A406' : '#fcae80'); ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </div>
                <span class="text-sm font-bold <?php echo e($activeProfile ? 'text-black' : 'text-gray-700'); ?>">Profile</span>
            </a>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\FoodMate\resources\views/layouts/partials/bottom-nav.blade.php ENDPATH**/ ?>