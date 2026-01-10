<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Completed - FoodMate</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @keyframes slideInDown {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.5); }
            to { opacity: 1; transform: scale(1); }
        }
        @keyframes bounce {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-in-down { animation: slideInDown 0.6s ease-out; }
        .animate-scale-in { animation: scaleIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1); }
        .animate-bounce-once { animation: bounce 0.6s ease-in-out; }
        .animate-fade-in-up { animation: fadeInUp 0.6s ease-out; }
        .header-illustration { background: linear-gradient(135deg, #FF6600 0%, #FFB347 100%); position: relative; overflow: hidden; }
        .header-illustration::before { content: ''; position: absolute; top: -50%; left: -50%; width: 200%; height: 200%; background-image: radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%), radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%); animation: moveBackground 15s ease-in-out infinite; }
        @keyframes moveBackground { 0%, 100% { transform: translate(0, 0); } 50% { transform: translate(20px, -20px); } }
        .checkmark-circle { width: 120px; height: 120px; background-color: #FF6600; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; box-shadow: 0 8px 24px rgba(255, 102, 0, 0.3); }
        .checkmark-icon { font-size: 60px; color: white; }
        .order-summary { background: #fff; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); padding: 24px; margin-top: 24px; }
        .order-summary h2 { font-size: 20px; font-weight: 700; margin-bottom: 16px; color: #111827; }
        .order-summary .info-row { display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 14px; color: #4B5563; }
        .order-summary .info-row span:last-child { font-weight: 600; color: #111827; }
        .order-items { margin-top: 16px; border-top: 1px solid #E5E7EB; padding-top: 16px; }
        .order-item { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; }
        .order-item:last-child { margin-bottom: 0; }
        .order-item .details { flex: 1; margin-left: 12px; }
        .order-item .details h3 { font-size: 16px; font-weight: 600; margin: 0; }
        .order-item .details p { font-size: 14px; color: #6B7280; margin: 4px 0 0; }
        .order-item .total { font-weight: 600; color: #FF6600; }
        .star-rating { display: flex; justify-content: center; gap: 12px; }
        .star { cursor: pointer; font-size: 32px; transition: all 0.3s ease; }
        .star.inactive { color: #E5E7EB; }
        .star.active { color: #FF6600; transform: scale(1.2); }
        .star:hover { transform: scale(1.3); }
        .feedback-input { background-color: #F9FAFB; border: 1.5px solid #E5E7EB; padding: 12px 16px; border-radius: 12px; font-size: 14px; transition: all 0.3s ease; width: 100%; font-family: inherit; }
        .feedback-input:focus { outline: none; border-color: #FF6600; background-color: #FFFFFF; box-shadow: 0 0 0 3px rgba(255, 102, 0, 0.1); }
        .btn-primary { background-color: #FF6600; color: white; padding: 14px 32px; border-radius: 12px; border: none; font-weight: 600; cursor: pointer; transition: all 0.3s ease; font-size: 16px; width: 100%; }
        .btn-primary:hover:not(:disabled) { background-color: #E55A00; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(255, 102, 0, 0.3); }
        .btn-primary:disabled { opacity: 0.5; cursor: not-allowed; }
        .btn-secondary { background-color: white; color: #FF6600; padding: 14px 32px; border-radius: 12px; border: 2px solid #FF6600; font-weight: 600; cursor: pointer; transition: all 0.3s ease; font-size: 16px; width: 100%; }
        .btn-secondary:hover { background-color: #FFF5F0; transform: translateY(-2px); }
        .loading-overlay { display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 50; justify-content: center; align-items: center; }
        .loading-overlay.show { display: flex; }
        .spinner { border: 4px solid rgba(255, 255, 255, 0.3); border-top: 4px solid #FF6600; border-radius: 50%; width: 40px; height: 40px; animation: spin 1s linear infinite; }
        .success-message { background-color: #ECFDF5; color: #065F46; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; display: none; animation: slideInDown 0.5s ease-out; border-left: 4px solid #10B981; }
        .success-message.show { display: block; }
        .button-container { display: flex; gap: 1rem; }
        .button-container button { flex: 1; }
    </style>
</head>
<body class="bg-white">
    <div x-data="orderFeedback()" class="min-h-screen flex flex-col">
        <div class="header-illustration h-40 relative">
            <div class="relative z-10 h-full"></div>
        </div>
        <div class="flex-1 px-6 pb-8">
            <div class="relative -mt-20 mb-8 animate-scale-in">
                <div class="checkmark-circle">
                    <i class="fas fa-check checkmark-icon animate-bounce-once"></i>
                </div>
            </div>
            <div class="text-center mb-8 animate-fade-in-up" style="animation-delay: 0.2s;">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Terima Kasih!</h1>
                <p class="text-xl font-semibold text-gray-800 mb-1">Pesanan Anda Berhasil</p>
                <p class="text-sm text-muted">Berikan rating untuk pengalaman Anda</p>
            </div>

            @if($order)
                <div class="order-summary animate-fade-in-up" style="animation-delay: 0.3s;">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h2>Ringkasan Pesanan</h2>
                            <p class="text-sm text-gray-500">Nomor Pesanan: <span class="font-semibold text-gray-900">{{ $order->order_number }}</span></p>
                            <p class="text-xs text-gray-400">{{ $order->created_at?->timezone('Asia/Jakarta')->format('d M Y, H:i') }}</p>
                        </div>
                        <div class="text-right">
                            <span class="text-xs uppercase tracking-wide text-gray-500">Total</span>
                            <div class="text-2xl font-bold text-[#FF6600]">Rp. {{ number_format($order->total) }}</div>
                        </div>
                    </div>
                    <div class="info-row">
                        <span>Nama Pemesan</span>
                        <span>{{ $order->customer_name }}</span>
                    </div>
                    <div class="info-row">
                        <span>Nomor Telepon</span>
                        <span>{{ $order->customer_phone }}</span>
                    </div>
                    <div class="info-row">
                        <span>Alamat Pengiriman</span>
                        <span class="text-right max-w-xs">{{ $order->customer_address }}</span>
                    </div>
                    <div class="info-row">
                        <span>Metode Pembayaran</span>
                        <span class="capitalize">{{ $order->payment_method }}</span>
                    </div>
                    @if($order->notes)
                        <div class="info-row">
                            <span>Catatan</span>
                            <span class="text-right max-w-xs">{{ $order->notes }}</span>
                        </div>
                    @endif
                    <div class="order-items">
                        @foreach($order->items as $item)
                            <div class="order-item">
                                <div class="flex items-center">
                                    <div class="w-14 h-14 rounded-lg overflow-hidden bg-gray-100">
                                        <img src="{{ asset($item->product_image ?? 'images/food/default.png') }}" alt="{{ $item->product_name }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="details">
                                        <h3>{{ $item->product_name }}</h3>
                                        <p>{{ $item->quantity }} x Rp. {{ number_format($item->product_price) }}</p>
                                    </div>
                                </div>
                                <div class="total">Rp. {{ number_format($item->total) }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div id="successMessage" class="success-message">
                <div class="flex items-center gap-2">
                    <i class="fas fa-check-circle"></i>
                    <span>Feedback berhasil dikirim!</span>
                </div>
            </div>

            <div class="mb-8 animate-fade-in-up" style="animation-delay: 0.4s;">
                <div class="star-rating">
                    <template x-for="i in 5" :key="i">
                        <i
                            class="fas fa-star star"
                            :class="i <= rating ? 'active' : 'inactive'"
                            @click="rating = i"
                            @mouseover="tempRating = i"
                            @mouseleave="tempRating = 0"
                            :style="`color: ${i <= tempRating ? '#FF6600' : (i <= rating ? '#FF6600' : '#E5E7EB')}`"
                        ></i>
                    </template>
                </div>
            </div>

            <div class="mb-8 animate-fade-in-up" style="animation-delay: 0.6s;">
                <div class="relative">
                    <i class="fas fa-pen absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input
                        x-model="feedback"
                        type="text"
                        placeholder="Tulis feedback Anda"
                        class="feedback-input pl-12"
                        maxlength="500"
                    >
                </div>
            </div>

            <div class="button-container animate-fade-in-up" style="animation-delay: 0.8s;">
                <button
                    @click="submitFeedback()"
                    :disabled="!rating || isLoading"
                    class="btn-primary"
                >
                    <span x-show="!isLoading">Kirim Feedback</span>
                    <span x-show="isLoading">
                        <i class="fas fa-spinner fa-spin mr-2"></i>Mengirim...
                    </span>
                </button>
                <button
                    @click="skipFeedback()"
                    class="btn-secondary"
                >
                    Lewati
                </button>
            </div>

            <p class="text-center text-xs text-muted mt-6">
                Masukan Anda membantu kami meningkatkan kualitas layanan
            </p>
        </div>
    </div>

    <div id="loadingOverlay" class="loading-overlay">
        <div class="spinner"></div>
    </div>

    <script>
        function orderFeedback() {
            return {
                rating: 0,
                tempRating: 0,
                feedback: '',
                isLoading: false,

                async submitFeedback() {
                    if (!this.rating) {
                        alert('Silakan pilih rating terlebih dahulu');
                        return;
                    }

                    this.isLoading = true;
                    document.getElementById('loadingOverlay').classList.add('show');

                    try {
                        const response = await fetch('{{ route("order-feedback.submit") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            },
                            body: JSON.stringify({
                                rating: this.rating,
                                feedback: this.feedback,
                            })
                        });

                        const data = await response.json();

                        if (data.success) {
                            document.getElementById('successMessage').classList.add('show');
                            setTimeout(() => {
                                window.location.href = '/menu';
                            }, 2000);
                        } else {
                            throw new Error(data.message || 'Gagal mengirim feedback');
                        }
                    } catch (error) {
                        alert(error.message);
                    } finally {
                        this.isLoading = false;
                        document.getElementById('loadingOverlay').classList.remove('show');
                    }
                },

                skipFeedback() {
                    window.location.href = '/menu';
                }
            };
        }
    </script>
</body>
</html>
