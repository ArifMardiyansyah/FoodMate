@extends('layouts.admin')

@section('title', 'Detail Pesanan - FoodMate Admin')

@section('content')
<div class="max-w-5xl mx-auto">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-[#F6A406] transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Daftar Pesanan
        </a>
    </div>

    <!-- Page Header -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Order #{{ $order->order_number }}</h2>
                <p class="text-gray-600 mt-1">{{ $order->created_at->format('d F Y, H:i') }}</p>
            </div>
            <div>
                @php
                    $statusColors = [
                        'pending' => 'bg-yellow-100 text-yellow-800',
                        'processing' => 'bg-blue-100 text-blue-800',
                        'completed' => 'bg-green-100 text-green-800',
                        'cancelled' => 'bg-red-100 text-red-800',
                    ];
                @endphp
                <span class="inline-block px-4 py-2 text-sm font-bold rounded-lg {{ $statusColors[$order->status] ?? 'bg-gray-100 text-gray-800' }}">
                    {{ strtoupper($order->status) }}
                </span>
            </div>
        </div>
        
        <div class="flex gap-3">
            <button onclick="openStatusModal()" class="bg-[#F6A406] text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#F08C00] transition-colors">
                Update Status
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Order Items -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Item Pesanan</h3>
                <div class="space-y-4">
                    @foreach($order->items as $item)
                        <div class="flex items-center gap-4 pb-4 border-b border-gray-200 last:border-0">
                            <div class="w-16 h-16 bg-gray-200 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="{{ asset($item->product_image ?? 'images/food/default.png') }}" alt="{{ $item->product_name }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-900">{{ $item->product_name }}</h4>
                                <p class="text-sm text-gray-500">Rp {{ number_format($item->product_price) }} x {{ $item->quantity }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-gray-900">Rp {{ number_format($item->total) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Order Summary -->
                <div class="mt-6 pt-6 border-t border-gray-200 space-y-2">
                    <div class="flex justify-between text-gray-600">
                        <span>Subtotal</span>
                        <span class="font-semibold">Rp {{ number_format($order->subtotal) }}</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Biaya Pengiriman</span>
                        <span class="font-semibold">Rp {{ number_format($order->delivery_charge) }}</span>
                    </div>
                    @if($order->discount > 0)
                        <div class="flex justify-between text-green-600">
                            <span>Diskon</span>
                            <span class="font-semibold">- Rp {{ number_format($order->discount) }}</span>
                        </div>
                    @endif
                    <div class="flex justify-between text-lg font-bold text-gray-900 pt-2 border-t border-gray-200">
                        <span>Total</span>
                        <span>Rp {{ number_format($order->total) }}</span>
                    </div>
                </div>
            </div>

            <!-- Feedback (if exists) -->
            @if($order->feedback_rating)
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Feedback Customer</h3>
                    <div class="flex items-center gap-2 mb-3">
                        <div class="flex gap-1">
                            @for($i = 1; $i <= 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 {{ $i <= $order->feedback_rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                            @endfor
                        </div>
                        <span class="font-semibold text-gray-900">{{ $order->feedback_rating }}/5</span>
                    </div>
                    @if($order->feedback_comment)
                        <p class="text-gray-700 bg-gray-50 p-4 rounded-lg">{{ $order->feedback_comment }}</p>
                    @endif
                    <p class="text-sm text-gray-500 mt-2">{{ $order->feedback_submitted_at->format('d F Y, H:i') }}</p>
                </div>
            @endif
        </div>

        <!-- Customer & Delivery Info -->
        <div class="space-y-6">
            <!-- Customer Info -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Informasi Customer</h3>
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-gray-500">Nama</p>
                        <p class="font-semibold text-gray-900">{{ $order->customer_name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">No. Telepon</p>
                        <p class="font-semibold text-gray-900">{{ $order->customer_phone }}</p>
                    </div>
                    @if($order->user)
                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="font-semibold text-gray-900">{{ $order->user->email }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Delivery Info -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Informasi Pengiriman</h3>
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-gray-500">Alamat</p>
                        <p class="font-semibold text-gray-900">{{ $order->customer_address }}</p>
                    </div>
                    @if($order->latitude && $order->longitude)
                        <div>
                            <p class="text-sm text-gray-500 mb-2">Lokasi</p>
                            <a href="https://www.google.com/maps?q={{ $order->latitude }},{{ $order->longitude }}" target="_blank" class="inline-flex items-center gap-2 text-[#F6A406] hover:text-[#F08C00] font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Lihat di Maps
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Payment Info -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Informasi Pembayaran</h3>
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-gray-500">Metode Pembayaran</p>
                        <p class="font-semibold text-gray-900">{{ ucfirst($order->payment_method) }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Status Pembayaran</p>
                        @php
                            $paymentColors = [
                                'pending' => 'bg-yellow-100 text-yellow-800',
                                'paid' => 'bg-green-100 text-green-800',
                                'failed' => 'bg-red-100 text-red-800',
                                'cancelled' => 'bg-gray-100 text-gray-800',
                            ];
                        @endphp
                        <span class="inline-block px-3 py-1 text-xs font-bold rounded-full {{ $paymentColors[$order->payment_status] ?? 'bg-gray-100 text-gray-800' }}">
                            {{ $order->payment_status_label }}
                        </span>
                        @if($order->payment_confirmed_at)
                            <p class="text-xs text-gray-500 mt-1">Dikonfirmasi: {{ $order->payment_confirmed_at->format('d M Y H:i') }}</p>
                        @endif
                    </div>
                    @if($order->notes)
                        <div>
                            <p class="text-sm text-gray-500">Catatan</p>
                            <p class="text-gray-900 bg-gray-50 p-3 rounded-lg text-sm">{{ $order->notes }}</p>
                        </div>
                    @endif
                </div>

                <!-- Payment Confirmation Buttons -->
                @if($order->payment_status === 'pending')
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <p class="text-sm font-semibold text-gray-700 mb-3">⚠️ Konfirmasi Pembayaran</p>
                        <div class="flex gap-2">
                            <button onclick="confirmPayment({{ $order->id }})" class="flex-1 bg-green-500 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-600 transition-colors text-sm">
                                ✓ Konfirmasi
                            </button>
                            <button onclick="rejectPayment({{ $order->id }})" class="flex-1 bg-red-500 text-white px-4 py-2 rounded-lg font-semibold hover:bg-red-600 transition-colors text-sm">
                                ✗ Tolak
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Status -->
<div id="statusModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
        <h3 class="text-xl font-bold text-gray-900 mb-4">Update Status Pesanan</h3>
        <form id="statusForm" class="space-y-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status Baru</label>
                <select id="new_status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                    <option value="cooking" {{ $order->status == 'cooking' ? 'selected' : '' }}>Sedang Dimasak</option>
                    <option value="delivering" {{ $order->status == 'delivering' ? 'selected' : '' }}>Sedang Diantar</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Catatan (Opsional)</label>
                <textarea id="status_notes" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent" placeholder="Tambahkan catatan..."></textarea>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="flex-1 bg-[#F6A406] text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#F08C00] transition-colors">
                    Update Status
                </button>
                <button type="button" onclick="closeStatusModal()" class="flex-1 bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-semibold hover:bg-gray-300 transition-colors">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    function openStatusModal() {
        document.getElementById('statusModal').classList.remove('hidden');
    }

    function closeStatusModal() {
        document.getElementById('statusModal').classList.add('hidden');
    }

    document.getElementById('statusForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const status = document.getElementById('new_status').value;
        const notes = document.getElementById('status_notes').value;

        try {
            const response = await fetch(`/admin/orders/{{ $order->id }}/update-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ status, notes }),
            });

            if (!response.ok) {
                const errorData = await response.json();
                throw new Error(errorData.message || 'Gagal mengupdate status');
            }

            const result = await response.json();
            
            if (result.success) {
                alert('Status pesanan berhasil diupdate!');
                location.reload();
            } else {
                alert('Gagal update status: ' + result.message);
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan: ' + error.message);
        }
    });

    // Payment Confirmation Functions
    async function confirmPayment(orderId) {
        if (!confirm('Konfirmasi pembayaran untuk pesanan ini?\n\nPesanan akan otomatis diproses (status berubah ke Cooking).')) {
            return;
        }

        try {
            const response = await fetch(`/admin/orders/${orderId}/confirm-payment`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
            });

            const result = await response.json();
            
            if (result.success) {
                alert('✅ ' + result.message);
                location.reload();
            } else {
                alert('❌ ' + result.message);
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan: ' + error.message);
        }
    }

    async function rejectPayment(orderId) {
        if (!confirm('Tolak pembayaran untuk pesanan ini?\n\nPesanan akan otomatis dibatalkan.')) {
            return;
        }

        try {
            const response = await fetch(`/admin/orders/${orderId}/reject-payment`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
            });

            const result = await response.json();
            
            if (result.success) {
                alert('✅ ' + result.message);
                location.reload();
            } else {
                alert('❌ ' + result.message);
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan: ' + error.message);
        }
    }
</script>
@endpush