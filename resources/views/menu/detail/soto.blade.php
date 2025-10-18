<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Soto - FoodMate</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white min-h-screen font-poppins">
    <div class="max-w-2xl mx-auto px-6 py-8 pb-24">
        <div class="mb-4"><p class="text-sm text-gray-400 mb-4">Detail Makanan</p>
            <a href="/menu" class="inline-flex items-center justify-center w-10 h-10 bg-[#fff7ed] rounded-full hover:bg-[#ffedd5] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg></a></div>
        <div class="relative mb-6"><div class="w-full h-80 bg-[#f97316] rounded-3xl flex items-center justify-center overflow-hidden">
                <img src="{{ asset('images/food/soto.jpeg') }}" alt="Soto" class="w-full h-full object-cover"></div>
            <div class="absolute top-4 right-4 flex gap-3">
                <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-transform"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg></button>
                <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-transform"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg></button></div>
            <div class="flex justify-center gap-2 mt-4"><div class="w-8 h-1 bg-[#f97316] rounded-full"></div><div class="w-8 h-1 bg-gray-200 rounded-full"></div><div class="w-8 h-1 bg-gray-200 rounded-full"></div></div></div>
        <div class="mb-6"><span class="inline-block px-4 py-1.5 bg-[#fff7ed] text-[#f97316] text-sm font-semibold rounded-full mb-3">Popular</span>
            <h1 class="text-3xl font-bold text-black mb-4">Soto</h1>
            <div class="flex items-center gap-6"><div class="flex items-center gap-2"><span class="text-xl">⭐</span><span class="text-sm text-gray-500 font-medium">5.0 Rating</span></div>
                <div class="flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg><span class="text-sm text-gray-500 font-medium">70+ Order</span></div></div></div>
        <div class="mb-6"><h2 class="text-xl font-bold text-black mb-3">Deskripsi</h2>
            <p class="text-gray-700 leading-relaxed mb-4">Soto tradisional Indonesia yang hangat dan menyegarkan. Dibuat dengan kaldu yang kaya rasa, potongan daging ayam yang lembut, dan disajikan dengan nasi putih atau kunyit. Aromanya yang menggugah selera akan membuat Anda ketagihan.</p>
            <h3 class="text-lg font-semibold text-black mb-3">Bahan-bahan:</h3>
            <ul class="space-y-2 mb-4"><li class="flex items-center gap-2 text-gray-700"><span class="w-1.5 h-1.5 bg-[#f97316] rounded-full"></span>Daging Ayam</li>
                <li class="flex items-center gap-2 text-gray-700"><span class="w-1.5 h-1.5 bg-[#f97316] rounded-full"></span>Kunyit</li>
                <li class="flex items-center gap-2 text-gray-700"><span class="w-1.5 h-1.5 bg-[#f97316] rounded-full"></span>Rempah Tradisional</li>
                <li class="flex items-center gap-2 text-gray-700"><span class="w-1.5 h-1.5 bg-[#f97316] rounded-full"></span>Nasi Putih</li></ul>
            <p class="text-sm text-gray-400 italic">*Sajian khas yang hangat dan berkhasiat.</p></div>
        <div class="mt-8"><div class="flex items-center justify-between mb-4"><div><p class="text-sm text-gray-500">Harga</p><p class="text-3xl font-bold text-[#f97316]">Rp. 10.000</p></div>
                <div class="flex items-center gap-3"><button onclick="decreaseQuantity()" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">−</button>
                    <span id="quantity" class="text-xl font-bold text-black min-w-[30px] text-center">1</span>
                    <button onclick="increaseQuantity()" class="w-10 h-10 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition-colors flex items-center justify-center">+</button></div></div>
            <button id="addToCartBtn" onclick="addToCart()" class="w-full bg-[#f97316] text-white font-bold text-lg py-4 rounded-xl hover:bg-[#ea580c] transition-colors shadow-lg hover:shadow-xl">Masukkan Keranjang</button></div></div>
    <div id="toast" style="display: none;" class="fixed bottom-24 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300"><p class="font-semibold" id="toastMessage"></p></div>
    <script>
        let quantity = 1;
        function increaseQuantity() { quantity++; document.getElementById('quantity').textContent = quantity; }
        function decreaseQuantity() { if (quantity > 1) { quantity--; document.getElementById('quantity').textContent = quantity; } }
        async function addToCart() {
            const btn = document.getElementById('addToCartBtn');
            btn.disabled = true; btn.textContent = 'Menambahkan...'; btn.classList.add('opacity-50', 'cursor-not-allowed');
            try {
                const formData = new FormData();
                formData.append('id', 'soto'); formData.append('name', 'Soto'); formData.append('price', 'Rp. 10.000'); formData.append('price_numeric', 10000); formData.append('image', 'images/food/soto.jpeg'); formData.append('quantity', quantity); formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);
                const response = await fetch('/cart/add', { method: 'POST', body: formData });
                const data = await response.json();
                if (data.success) { const toast = document.getElementById('toast'); const toastMessage = document.getElementById('toastMessage'); toastMessage.textContent = data.message; toast.style.display = 'block'; quantity = 1; document.getElementById('quantity').textContent = quantity; setTimeout(() => { toast.style.display = 'none'; }, 3000); } else { throw new Error(data.message || 'Gagal menambahkan ke keranjang'); }
            } catch (error) { console.error('Error:', error); const toast = document.getElementById('toast'); const toastMessage = document.getElementById('toastMessage'); toastMessage.textContent = 'Terjadi kesalahan: ' + error.message; toast.style.display = 'block'; setTimeout(() => { toast.style.display = 'none'; }, 3000); } finally { btn.disabled = false; btn.textContent = 'Masukkan Keranjang'; btn.classList.remove('opacity-50', 'cursor-not-allowed'); }
        }
    </script>
</body>
</html>