import re
import os

# Data produk yang perlu diupdate
products = [
    # Minuman yang belum diupdate
    {'file': 'es-teh-hijau.blade.php', 'id': 'es-teh-hijau', 'name': 'Es Teh Hijau', 'price': 'Rp. 5.000', 'price_num': 5000, 'image': 'images/drinks/es_teh_hijau.png'},
    {'file': 'susu-kedelai.blade.php', 'id': 'susu-kedelai', 'name': 'Susu Kedelai', 'price': 'Rp. 5.000', 'price_num': 5000, 'image': 'images/drinks/susu_kedelai.png'},
    {'file': 'minuman-boba.blade.php', 'id': 'minuman-boba', 'name': 'Minuman Boba', 'price': 'Rp. 15.000', 'price_num': 15000, 'image': 'images/drinks/minuman_boba.png'},
    {'file': 'minuman-matcha.blade.php', 'id': 'minuman-matcha', 'name': 'Minuman Matcha', 'price': 'Rp. 15.000', 'price_num': 15000, 'image': 'images/drinks/minuman_matcha.png'},
    {'file': 'minuman-jus.blade.php', 'id': 'minuman-jus', 'name': 'Minuman Jus', 'price': 'Rp. 10.000', 'price_num': 10000, 'image': 'images/drinks/minuman_jus.png'},
    {'file': 'air-mineral.blade.php', 'id': 'air-mineral', 'name': 'Air Mineral', 'price': 'Rp. 3.000', 'price_num': 3000, 'image': 'images/drinks/air_mineral.png'},
    {'file': 'kopi.blade.php', 'id': 'kopi', 'name': 'Kopi', 'price': 'Rp. 5.000', 'price_num': 5000, 'image': 'images/drinks/kopi.png'},
    {'file': 'sop-buah.blade.php', 'id': 'sop-buah', 'name': 'Sop Buah', 'price': 'Rp. 10.000', 'price_num': 10000, 'image': 'images/drinks/sop_buah.png'},
    {'file': 'es-durian-asli.blade.php', 'id': 'es-durian-asli', 'name': 'Es Durian Asli', 'price': 'Rp. 15.000', 'price_num': 15000, 'image': 'images/drinks/es_durian_asli.png'},
    {'file': 'es-cendol.blade.php', 'id': 'es-cendol', 'name': 'Es Cendol', 'price': 'Rp. 8.000', 'price_num': 8000, 'image': 'images/drinks/es_cendol.png'},
]

base_path = r'd:\FoodMate\resources\views\menu\detail'

def update_product_file(product):
    file_path = os.path.join(base_path, product['file'])
    
    if not os.path.exists(file_path):
        print(f"❌ File tidak ditemukan: {product['file']}")
        return False
    
    with open(file_path, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # 1. Tambahkan CSRF token jika belum ada
    if 'csrf-token' not in content:
        content = content.replace(
            '<meta name="viewport" content="width=device-width, initial-scale=1.0">',
            '<meta name="viewport" content="width=device-width, initial-scale=1.0">\n    <meta name="csrf-token" content="{{ csrf_token() }}">'
        )
    
    # 2. Cari dan replace bagian harga & button
    # Pattern untuk mencari bagian harga dan button
    old_pattern = r'(<!-- Harga & CTA Button -->.*?<div class="mt-8">.*?<div class="flex items-center justify-between mb-4">.*?<div>.*?<p class="text-sm text-gray-500">Harga</p>.*?<p class="text-3xl font-bold text-\[#f97316\]">.*?</p>.*?</div>.*?</div>.*?<button class="w-full bg-\[#f97316\].*?">.*?Masukkan Keranjang.*?</button>.*?</div>.*?</div>.*?</body>.*?</html>)'
    
    # Buat replacement baru
    new_section = f'''        <!-- Harga & CTA Button -->
        <div class="mt-8">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm text-gray-500">Harga</p>
                    <p class="text-3xl font-bold text-[#f97316]">{product['price']}</p>
                </div>
                <div class="flex items-center gap-3 bg-[#fff7ed] rounded-xl px-4 py-2">
                    <button onclick="decreaseQuantity()" class="w-8 h-8 flex items-center justify-center text-[#f97316] font-bold text-xl hover:bg-[#ffedd5] rounded-lg transition-colors">−</button>
                    <span id="quantity" class="text-lg font-bold text-black min-w-[20px] text-center">1</span>
                    <button onclick="increaseQuantity()" class="w-8 h-8 flex items-center justify-center text-[#f97316] font-bold text-xl hover:bg-[#ffedd5] rounded-lg transition-colors">+</button>
                </div>
            </div>
            
            <button onclick="addToCart()" class="w-full bg-[#f97316] text-white font-bold text-lg py-4 rounded-xl hover:bg-[#ea580c] transition-colors shadow-lg hover:shadow-xl">
                Masukkan Keranjang
            </button>
        </div>

    </div>

    <div id="toast" style="display: none; position: fixed; bottom: 100px; left: 50%; transform: translateX(-50%); background-color: #10b981; color: white; padding: 16px 24px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); z-index: 1000; font-weight: 500;">Item berhasil ditambahkan ke keranjang</div>

    <script>
        let quantity = 1;
        function increaseQuantity() {{ quantity++; document.getElementById('quantity').textContent = quantity; }}
        function decreaseQuantity() {{ if (quantity > 1) {{ quantity--; document.getElementById('quantity').textContent = quantity; }} }}
        async function addToCart() {{
            try {{
                const formData = new FormData();
                formData.append('id', '{product['id']}'); formData.append('name', '{product['name']}'); formData.append('price', '{product['price']}'); formData.append('price_numeric', {product['price_num']}); formData.append('image', '{product['image']}'); formData.append('quantity', quantity); formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);
                const response = await fetch('/cart/add', {{ method: 'POST', body: formData, headers: {{ 'X-Requested-With': 'XMLHttpRequest' }} }});
                const data = await response.json();
                if (data.success) {{ const toast = document.getElementById('toast'); toast.style.display = 'block'; quantity = 1; document.getElementById('quantity').textContent = quantity; setTimeout(() => {{ toast.style.display = 'none'; }}, 3000); }} else {{ alert('Gagal menambahkan item ke keranjang: ' + (data.message || 'Unknown error')); }}
            }} catch (error) {{ console.error('Error:', error); alert('Terjadi kesalahan: ' + error.message); }}
        }}
    </script>

</body>
</html>'''
    
    # Coba pattern yang lebih sederhana
    # Cari dari "<!-- Harga & CTA Button -->" sampai "</html>"
    pattern = r'(<!-- Harga & CTA Button -->.*?</html>)'
    
    if re.search(pattern, content, re.DOTALL):
        content = re.sub(pattern, new_section, content, flags=re.DOTALL)
        
        # Simpan file
        with open(file_path, 'w', encoding='utf-8') as f:
            f.write(content)
        
        print(f"✅ Berhasil update: {product['file']}")
        return True
    else:
        print(f"⚠️ Pattern tidak ditemukan di: {product['file']}")
        return False

# Jalankan update untuk semua produk
print("Memulai batch update produk...\n")
success_count = 0
fail_count = 0

for product in products:
    if update_product_file(product):
        success_count += 1
    else:
        fail_count += 1

print(f"\n{'='*50}")
print(f"Selesai!")
print(f"✅ Berhasil: {success_count} file")
print(f"❌ Gagal: {fail_count} file")
print(f"{'='*50}")