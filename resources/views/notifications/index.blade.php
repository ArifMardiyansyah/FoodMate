<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Notifikasi - FoodMate</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-orange-50 via-white to-yellow-50 min-h-screen font-poppins pb-24">
    <div class="max-w-4xl mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <a href="/menu" class="inline-flex items-center justify-center w-10 h-10 bg-[#fff7ed] rounded-full hover:bg-[#ffedd5] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
            </a>
            @if($unreadCount > 0)
                <button id="markAllRead" class="text-sm text-[#F6A406] hover:text-[#F08C00] font-semibold">
                    Tandai Semua Dibaca
                </button>
            @endif
        </div>

        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-black mb-2">🔔 Notifikasi</h1>
            <p class="text-gray-500">Pantau status pesanan Anda</p>
        </div>

        @if($notifications->isEmpty())
            <div class="text-center py-16 bg-white rounded-3xl shadow-xl p-12">
                <div class="w-32 h-32 mx-auto mb-6 bg-gradient-to-br from-orange-100 to-yellow-100 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#F6A406" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-700 mb-3">Belum Ada Notifikasi</h3>
                <p class="text-gray-500 mb-8 text-lg">Notifikasi pesanan Anda akan muncul di sini</p>
                <a href="/menu" class="inline-block bg-gradient-to-r from-[#F6A406] to-[#F08C00] text-white font-bold py-4 px-10 rounded-2xl hover:shadow-2xl hover:scale-105 transition-all duration-300">
                    🍽️ Mulai Belanja
                </a>
            </div>
        @else
            <div class="space-y-4">
                @foreach($notifications as $notification)
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 border {{ $notification->is_read ? 'border-gray-100' : 'border-[#F6A406] bg-orange-50/30' }}" data-notification-id="{{ $notification->id }}">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0 {{ $notification->is_read ? 'bg-gray-100' : 'bg-gradient-to-br from-[#F6A406] to-[#F08C00]' }}">
                                @if($notification->type === 'cooking')
                                    <span class="text-2xl">👨‍🍳</span>
                                @elseif($notification->type === 'delivering')
                                    <span class="text-2xl">🚚</span>
                                @elseif($notification->type === 'completed')
                                    <span class="text-2xl">✅</span>
                                @else
                                    <span class="text-2xl">📦</span>
                                @endif
                            </div>
                            
                            <div class="flex-1">
                                <div class="flex items-start justify-between mb-2">
                                    <h3 class="text-lg font-bold text-black">{{ $notification->title }}</h3>
                                    @if(!$notification->is_read)
                                        <span class="w-3 h-3 bg-[#F6A406] rounded-full"></span>
                                    @endif
                                </div>
                                <p class="text-gray-700 mb-3">{{ $notification->message }}</p>
                                <div class="flex items-center justify-between">
                                    <div class="text-sm text-gray-500">
                                        <span class="font-semibold">Order #{{ $notification->order->order_number }}</span>
                                        <span class="mx-2">•</span>
                                        <span>{{ $notification->created_at->diffForHumans() }}</span>
                                    </div>
                                    @if(!$notification->is_read)
                                        <button class="mark-read text-sm text-[#F6A406] hover:text-[#F08C00] font-semibold" data-id="{{ $notification->id }}">
                                            Tandai Dibaca
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($notifications->hasPages())
                <div class="mt-8">
                    {{ $notifications->links() }}
                </div>
            @endif
        @endif
    </div>

    @include('layouts.partials.bottom-nav')

    <script>
        const csrf = document.querySelector('meta[name="csrf-token"]').content;

        // Mark single notification as read
        document.querySelectorAll('.mark-read').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                markAsRead(id);
            });
        });

        // Mark all as read
        const markAllBtn = document.getElementById('markAllRead');
        if (markAllBtn) {
            markAllBtn.addEventListener('click', function() {
                fetch('/notifications/read-all', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf,
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.reload();
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        }

        function markAsRead(id) {
            fetch(`/notifications/${id}/read`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf,
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const notifElement = document.querySelector(`[data-notification-id="${id}"]`);
                    if (notifElement) {
                        notifElement.classList.remove('border-[#F6A406]', 'bg-orange-50/30');
                        notifElement.classList.add('border-gray-100');
                        const button = notifElement.querySelector('.mark-read');
                        if (button) button.remove();
                        const dot = notifElement.querySelector('.w-3.h-3.bg-\\[\\#F6A406\\]');
                        if (dot) dot.remove();
                    }
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html>