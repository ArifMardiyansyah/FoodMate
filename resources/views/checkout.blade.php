<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FoodMate | Checkout</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    
    <!-- Midtrans Snap Script -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen font-inter pb-24">

    <!-- Header -->
    <header class="bg-white px-6 lg:px-12 py-6 shadow-sm">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-4">
                <!-- Back Button -->
                <a href="/cart" class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <!-- Logo -->
                <h1 class="text-3xl font-bold text-[#f97316]">FoodMate</h1>
            </div>

            <!-- Profile Icon -->
            <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition-colors cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
        </div>
    </header>

    <!-- Checkout Content -->
    <section class="px-6 lg:px-12 py-12">
        <div class="max-w-6xl mx-auto">
            <!-- Page Title -->
            <div class="mb-8">
                <h2 class="text-2xl font-medium text-gray-400 mb-2">Checkout</h2>
                <h1 class="text-4xl font-bold text-black">Konfirmasi Pesanan</h1>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Left Column - Form -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Delivery Information -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-black mb-6 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#f97316]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Informasi Pengiriman
                        </h3>
                        
                        <form id="checkoutForm" class="space-y-4">
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text" id="name" name="name" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#f97316] focus:border-transparent transition-all"
                                    placeholder="Masukkan nama lengkap Anda">
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon</label>
                                <input type="tel" id="phone" name="phone" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#f97316] focus:border-transparent transition-all"
                                    placeholder="08xxxxxxxxxx">
                            </div>

                            <!-- Address with Location Picker -->
                            <div>
                                <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Lengkap</label>
                                
                                <!-- Location Buttons -->
                                <div class="flex gap-2 mb-3">
                                    <button type="button" onclick="getCurrentLocation()" 
                                        class="flex-1 flex items-center justify-center gap-2 px-4 py-2 bg-[#f97316] text-white rounded-lg hover:bg-[#ea580c] transition-colors text-sm font-semibold">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        Lokasi Saya
                                    </button>
                                    <button type="button" onclick="toggleMapPicker()" 
                                        class="flex-1 flex items-center justify-center gap-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors text-sm font-semibold">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                        </svg>
                                        Pilih di Peta
                                    </button>
                                </div>

                                <!-- Map Container (Hidden by default) -->
                                <div id="mapContainer" class="hidden mb-3 rounded-xl overflow-hidden border-2 border-gray-300">
                                    <div id="map" class="w-full h-80"></div>
                                    <div class="bg-white p-3 text-sm text-gray-600">
                                        <p class="font-semibold mb-1">📍 Geser marker untuk memilih lokasi</p>
                                        <p id="selectedCoords" class="text-xs text-gray-500">Koordinat: -</p>
                                    </div>
                                </div>

                                <textarea id="address" name="address" rows="4" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#f97316] focus:border-transparent transition-all resize-none"
                                    placeholder="Masukkan alamat lengkap atau gunakan tombol lokasi di atas"></textarea>
                                
                                <!-- Hidden fields for coordinates -->
                                <input type="hidden" id="latitude" name="latitude">
                                <input type="hidden" id="longitude" name="longitude">
                            </div>

                            <!-- Notes -->
                            <div>
                                <label for="notes" class="block text-sm font-semibold text-gray-700 mb-2">Catatan (Opsional)</label>
                                <textarea id="notes" name="notes" rows="2"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#f97316] focus:border-transparent transition-all resize-none"
                                    placeholder="Contoh: Jangan pakai cabe, dll"></textarea>
                            </div>
                        </form>
                    </div>

                    <!-- Payment Method -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-black mb-6 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#f97316]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            Metode Pembayaran
                        </h3>

                        <div class="space-y-3">
                            <!-- Midtrans Payment (Recommended) -->
                            <label class="flex items-center p-4 border-2 border-[#f97316] bg-orange-50 rounded-xl cursor-pointer transition-all">
                                <input type="radio" name="payment_method" value="midtrans" checked class="w-5 h-5 text-[#f97316] focus:ring-[#f97316]">
                                <div class="ml-4 flex-1">
                                    <div class="flex items-center gap-2">
                                        <div class="font-semibold text-black">Pembayaran Online</div>
                                        <span class="bg-[#f97316] text-white text-xs px-2 py-0.5 rounded-full">Rekomendasi</span>
                                    </div>
                                    <div class="text-sm text-gray-600 mt-1">Kartu Kredit, Transfer Bank, E-Wallet, QRIS</div>
                                    <div class="flex gap-1 mt-2">
                                        <span class="text-xs bg-white px-2 py-1 rounded border">💳 Credit Card</span>
                                        <span class="text-xs bg-white px-2 py-1 rounded border">🏦 Bank</span>
                                        <span class="text-xs bg-white px-2 py-1 rounded border">📱 E-Wallet</span>
                                    </div>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#f97316]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </label>

                            <!-- COD -->
                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-[#f97316] transition-all">
                                <input type="radio" name="payment_method" value="cod" class="w-5 h-5 text-[#f97316] focus:ring-[#f97316]">
                                <div class="ml-4 flex-1">
                                    <div class="font-semibold text-black">Cash on Delivery (COD)</div>
                                    <div class="text-sm text-gray-500">Bayar saat pesanan tiba</div>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-6">
                        <h3 class="text-xl font-bold text-black mb-6">Ringkasan Pesanan</h3>

                        <!-- Order Items -->
                        <div class="space-y-4 mb-6 max-h-64 overflow-y-auto">
                            @foreach($cartItems as $item)
                            <div class="flex items-center gap-3 pb-4 border-b border-gray-100">
                                <div class="w-16 h-16 bg-gray-200 rounded-lg overflow-hidden flex-shrink-0">
                                    <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-semibold text-black text-sm truncate">{{ $item['name'] }}</h4>
                                    <p class="text-sm text-gray-500">{{ $item['quantity'] }}x {{ $item['price'] }}</p>
                                </div>
                                <div class="text-sm font-bold text-[#f97316]">
                                    Rp. {{ number_format($item['price_numeric'] * $item['quantity']) }}
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Price Summary -->
                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between text-gray-600">
                                <span>Sub-Total</span>
                                <span class="font-semibold">Rp. {{ number_format($subtotal) }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Biaya Pengiriman</span>
                                <span class="font-semibold">Rp. {{ number_format($deliveryCharge) }}</span>
                            </div>
                            @if($discount > 0)
                            <div class="flex justify-between text-green-600">
                                <span>Diskon</span>
                                <span class="font-semibold">-Rp. {{ number_format($discount) }}</span>
                            </div>
                            @endif
                            <hr class="border-gray-200">
                            <div class="flex justify-between text-xl font-bold text-black">
                                <span>Total</span>
                                <span class="text-[#f97316]">Rp. {{ number_format($total) }}</span>
                            </div>
                        </div>

                        <!-- Place Order Button -->
                        <button onclick="processOrder()" class="w-full bg-[#f97316] text-white font-semibold py-4 rounded-xl hover:bg-[#ea580c] transition-colors shadow-lg hover:shadow-xl">
                            Buat Pesanan
                        </button>

                        <p class="text-xs text-gray-500 text-center mt-4">
                            Dengan melanjutkan, Anda menyetujui syarat dan ketentuan kami
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.partials.bottom-nav')

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        // Map variables
        let map = null;
        let marker = null;
        let isMapInitialized = false;

        // Initialize map
        function initMap(lat = -6.2088, lng = 106.8456) { // Default: Jakarta
            if (!isMapInitialized) {
                map = L.map('map').setView([lat, lng], 13);
                
                // Add OpenStreetMap tiles
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap contributors',
                    maxZoom: 19
                }).addTo(map);

                // Add draggable marker
                marker = L.marker([lat, lng], {
                    draggable: true,
                    icon: L.icon({
                        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34],
                        shadowSize: [41, 41]
                    })
                }).addTo(map);

                // Update coordinates when marker is dragged
                marker.on('dragend', function(e) {
                    const position = marker.getLatLng();
                    updateLocationInfo(position.lat, position.lng);
                });

                isMapInitialized = true;
                
                // Update initial location
                updateLocationInfo(lat, lng);
            } else {
                // Just update view if map already initialized
                map.setView([lat, lng], 13);
                marker.setLatLng([lat, lng]);
                updateLocationInfo(lat, lng);
            }
        }

        // Toggle map visibility
        function toggleMapPicker() {
            const mapContainer = document.getElementById('mapContainer');
            
            if (mapContainer.classList.contains('hidden')) {
                mapContainer.classList.remove('hidden');
                
                // Initialize map if not already done
                if (!isMapInitialized) {
                    // Try to get current location first
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            (position) => {
                                initMap(position.coords.latitude, position.coords.longitude);
                            },
                            () => {
                                // If geolocation fails, use default location
                                initMap();
                            }
                        );
                    } else {
                        initMap();
                    }
                }
                
                // Fix map rendering issue
                setTimeout(() => {
                    if (map) map.invalidateSize();
                }, 100);
            } else {
                mapContainer.classList.add('hidden');
            }
        }

        // Get current location using Geolocation API
        function getCurrentLocation() {
            if (!navigator.geolocation) {
                alert('Geolocation tidak didukung oleh browser Anda');
                return;
            }

            // Show loading
            const button = event.target;
            const originalHTML = button.innerHTML;
            button.innerHTML = '<svg class="animate-spin h-5 w-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
            button.disabled = true;

            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;
                    
                    // Update location info
                    updateLocationInfo(lat, lng);
                    
                    // Show map with current location
                    const mapContainer = document.getElementById('mapContainer');
                    if (mapContainer.classList.contains('hidden')) {
                        mapContainer.classList.remove('hidden');
                    }
                    
                    // Initialize or update map
                    initMap(lat, lng);
                    
                    // Restore button
                    button.innerHTML = originalHTML;
                    button.disabled = false;
                    
                    // Show success notification
                    showNotification('Lokasi berhasil didapatkan!', 'success');
                },
                (error) => {
                    let errorMessage = 'Gagal mendapatkan lokasi';
                    switch(error.code) {
                        case error.PERMISSION_DENIED:
                            errorMessage = 'Izin lokasi ditolak. Mohon aktifkan izin lokasi di browser Anda.';
                            break;
                        case error.POSITION_UNAVAILABLE:
                            errorMessage = 'Informasi lokasi tidak tersedia';
                            break;
                        case error.TIMEOUT:
                            errorMessage = 'Permintaan lokasi timeout';
                            break;
                    }
                    alert(errorMessage);
                    
                    // Restore button
                    button.innerHTML = originalHTML;
                    button.disabled = false;
                }
            );
        }

        // Update location information
        function updateLocationInfo(lat, lng) {
            // Update hidden fields
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
            
            // Update coordinates display
            document.getElementById('selectedCoords').textContent = 
                `Koordinat: ${lat.toFixed(6)}, ${lng.toFixed(6)}`;
            
            // Reverse geocoding to get address
            fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&zoom=18&addressdetails=1`)
                .then(response => response.json())
                .then(data => {
                    if (data.display_name) {
                        const addressField = document.getElementById('address');
                        // Only update if address is empty
                        if (!addressField.value.trim()) {
                            addressField.value = data.display_name;
                        }
                    }
                })
                .catch(error => {
                    console.error('Reverse geocoding error:', error);
                });
        }

        // Show notification
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = `fixed top-20 right-6 z-50 px-6 py-4 rounded-xl shadow-lg text-white font-semibold ${type === 'success' ? 'bg-green-500' : 'bg-red-500'} animate-slide-in`;
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        function processOrder() {
            // Validate form
            const form = document.getElementById('checkoutForm');
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            // Get form data
            const name = document.getElementById('name').value;
            const phone = document.getElementById('phone').value;
            const address = document.getElementById('address').value;
            const notes = document.getElementById('notes').value;
            const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
            const latitude = document.getElementById('latitude').value;
            const longitude = document.getElementById('longitude').value;

            // Prepare data
            const data = {
                name: name,
                phone: phone,
                address: address,
                notes: notes,
                latitude: latitude,
                longitude: longitude
            };

            // Show loading
            const button = event.target;
            const originalText = button.textContent;
            button.textContent = 'Memproses...';
            button.disabled = true;

            // Check payment method
            if (paymentMethod === 'midtrans') {
                // Process with Midtrans
                processMidtransPayment(data, button, originalText);
            } else {
                // Process with COD (original flow)
                processCODPayment(data, button, originalText);
            }
        }

        function processMidtransPayment(data, button, originalText) {
            fetch('/payment/midtrans/create-token', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                if (result.success && result.snap_token) {
                    // Open Midtrans Snap popup
                    window.snap.pay(result.snap_token, {
                        onSuccess: function(result) {
                            console.log('Payment success:', result);
                            window.location.href = '/payment/midtrans/finish?order_id=' + result.order_id;
                        },
                        onPending: function(result) {
                            console.log('Payment pending:', result);
                            showNotification('Pembayaran pending, silakan selesaikan pembayaran', 'info');
                            button.textContent = originalText;
                            button.disabled = false;
                        },
                        onError: function(result) {
                            console.log('Payment error:', result);
                            showNotification('Pembayaran gagal', 'error');
                            button.textContent = originalText;
                            button.disabled = false;
                        },
                        onClose: function() {
                            console.log('Payment popup closed');
                            button.textContent = originalText;
                            button.disabled = false;
                        }
                    });
                } else {
                    alert('Gagal membuat transaksi: ' + (result.message || 'Unknown error'));
                    button.textContent = originalText;
                    button.disabled = false;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memproses pembayaran');
                button.textContent = originalText;
                button.disabled = false;
            });
        }

        function processCODPayment(data, button, originalText) {
            data.payment_method = 'cod';
            
            fetch('/checkout/process', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showSuccessModal(data.order_id, data.total, data.redirect_url);
                } else {
                    alert('Gagal membuat pesanan: ' + data.message);
                    button.textContent = originalText;
                    button.disabled = false;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memproses pesanan');
                button.textContent = originalText;
                button.disabled = false;
            });
        }

        function showSuccessModal(orderId, total, redirectUrl) {
            // Create modal
            const modal = document.createElement('div');
            modal.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4';
            modal.innerHTML = `
                <div class="bg-white rounded-2xl p-8 max-w-md w-full text-center animate-bounce-in">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-black mb-2">Pesanan Berhasil!</h2>
                    <p class="text-gray-600 mb-6">Pesanan Anda sedang diproses</p>
                    
                    <div class="bg-gray-50 rounded-xl p-4 mb-6">
                        <div class="text-sm text-gray-500 mb-1">Order ID</div>
                        <div class="text-lg font-bold text-[#f97316]">${orderId}</div>
                        <div class="text-sm text-gray-500 mt-3 mb-1">Total Pembayaran</div>
                        <div class="text-2xl font-bold text-black">Rp. ${new Intl.NumberFormat('id-ID').format(total)}</div>
                    </div>
                    
                    <p class="text-xs text-gray-500 mb-4">Anda akan dialihkan ke halaman rating...</p>
                    <button onclick="window.location.href='${redirectUrl}'" class="w-full bg-[#f97316] text-white font-semibold py-3 rounded-xl hover:bg-[#ea580c] transition-colors">
                        Lanjut ke Rating
                    </button>
                </div>
            `;
            document.body.appendChild(modal);
            
            // Auto redirect after 3 seconds
            setTimeout(() => {
                window.location.href = redirectUrl;
            }, 3000);
        }
    </script>

    <style>
        @keyframes bounce-in {
            0% {
                transform: scale(0.3);
                opacity: 0;
            }
            50% {
                transform: scale(1.05);
            }
            70% {
                transform: scale(0.9);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
        .animate-bounce-in {
            animation: bounce-in 0.5s ease-out;
        }

        @keyframes slide-in {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        .animate-slide-in {
            animation: slide-in 0.3s ease-out;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
        .animate-spin {
            animation: spin 1s linear infinite;
        }
    </style>
</body>
</html>