#!/usr/bin/env python3
"""
Script untuk menambahkan fitur Add to Cart ke semua halaman detail produk
"""

import os
import re

# Daftar produk dengan informasi lengkap
products = [
    # Makanan yang belum selesai
    {'file': 'soto.blade.php', 'id': 'soto', 'name': 'Soto', 'price': 'Rp. 10.000', 'price_numeric': 10000, 'image': 'images/food/soto.png'},
    {'file': 'sup-daging-sapi.blade.php', 'id': 'sup-daging-sapi', 'name': 'Sup Daging Sapi', 'price': 'Rp. 15.000', 'price_numeric': 15000, 'image': 'images/food/sup_daging_sapi.png'},
    {'file': 'risol-sayur.blade.php', 'id': 'risol-sayur', 'name': 'Risol Sayur', 'price': 'Rp. 5.000', 'price_numeric': 5000, 'image': 'images/food/risol_sayur.png'},
    {'file': 'donat-kentang.blade.php', 'id': 'donat-kentang', 'name': 'Donat Kentang', 'price': 'Rp. 5.000', 'price_numeric': 5000, 'image': 'images/food/donat_kentang.png'},
    
    # Minuman
    {'file': 'es-teh-hijau.blade.php', 'id': 'es-teh-hijau', 'name': 'Es Teh Hijau', 'price': 'Rp. 5.000', 'price_numeric': 5000, 'image': 'images/drinks/es_teh_hijau.png'},
    {'file': 'susu-kedelai.blade.php', 'id': 'susu-kedelai', 'name': 'Susu Kedelai', 'price': 'Rp. 10.000', 'price_numeric': 10000, 'image': 'images/drinks/susu_kedelai.png'},
    {'file': 'es-teh.blade.php', 'id': 'es-teh', 'name': 'Es Teh', 'price': 'Rp. 3.000', 'price_numeric': 3000, 'image': 'images/drinks/es_teh.png'},
    {'file': 'minuman-boba.blade.php', 'id': 'minuman-boba', 'name': 'Minuman Boba', 'price': 'Rp. 15.000', 'price_numeric': 15000, 'image': 'images/drinks/minuman_boba.png'},
    {'file': 'minuman-matcha.blade.php', 'id': 'minuman-matcha', 'name': 'Minuman Matcha', 'price': 'Rp. 12.000', 'price_numeric': 12000, 'image': 'images/drinks/minuman_matcha.png'},
    {'file': 'minuman-jus.blade.php', 'id': 'minuman-jus', 'name': 'Minuman Jus', 'price': 'Rp. 10.000', 'price_numeric': 10000, 'image': 'images/drinks/minuman_jus.png'},
    {'file': 'air-mineral.blade.php', 'id': 'air-mineral', 'name': 'Air Mineral', 'price': 'Rp. 3.000', 'price_numeric': 3000, 'image': 'images/drinks/air_mineral.png'},
    {'file': 'kopi.blade.php', 'id': 'kopi', 'name': 'Kopi', 'price': 'Rp. 8.000', 'price_numeric': 8000, 'image': 'images/drinks/kopi.png'},
    {'file': 'sop-buah.blade.php', 'id': 'sop-buah', 'name': 'Sop Buah', 'price': 'Rp. 12.000', 'price_numeric': 12000, 'image': 'images/drinks/sop_buah.png'},
    {'file': 'es-durian-asli.blade.php', 'id': 'es-durian-asli', 'name': 'Es Durian Asli', 'price': 'Rp. 15.000', 'price_numeric': 15000, 'image': 'images/drinks/es_durian_asli.png'},
    {'file': 'es-cendol.blade.php', 'id': 'es-cendol', 'name': 'Es Cendol', 'price': 'Rp. 8.000', 'price_numeric': 8000, 'image': 'images/drinks/es_cendol.png'},
]

base_path = r'd:\FoodMate\resources\views\menu\detail'

def update_product_page(product):
    """Update satu halaman produk dengan fitur add to cart"""
    file_path = os.path.join(base_path, product['file'])
    
    if not os.path.exists(file_path):
        print(f"File tidak ditemukan: {file_path}")
        return False
    
    with open(file_path, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Pattern untuk mencari bagian harga dan button
    pattern = r'(<!-- Harga & CTA Button -->.*?<div class="mt-8">.*?<div class="flex items-center justify-between mb-4">.*?<div>.*?<p class="text-sm text-gray-500">Harga</p>.*?<p class="text-3xl font-bold text-\[#f97316\]">)(Rp\. [\d,\.]+)(</p>.*?</div>.*?</div>.*?<button class="w-full bg-\[#f97316\] text-white font-bold text-lg py-4 rounded-xl hover:bg-\[#ea580c\] transition-colors shadow-lg hover:shadow-xl">.*?Masukkan Keranjang.*?</button>.*?</div>.*?</div>.*?</body>.*?</html>)'
    
    # Replacement dengan quantity controls dan JavaScript
    replacement = f'''<!-- Harga & CTA Button -->
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
                formData.append('id', '{product['id']}'); formData.append('name', '{product['name']}'); formData.append('price', '{product['price']}'); formData.append('price_numeric', {product['price_numeric']}); formData.append('image', '{product['image']}'); formData.append('quantity', quantity); formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);
                const response = await fetch('/cart/add', {{ method: 'POST', body: formData, headers: {{ 'X-Requested-With': 'XMLHttpRequest' }} }});
                const data = await response.json();
                if (data.success) {{ const toast = document.getElementById('toast'); toast.style.display = 'block'; quantity = 1; document.getElementById('quantity').textContent = quantity; setTimeout(() => {{ toast.style.display = 'none'; }}, 3000); }} else {{ alert('Gagal menambahkan item ke keranjang: ' + (data.message || 'Unknown error')); }}
            }} catch (error) {{ console.error('Error:', error); alert('Terjadi kesalahan: ' + error.message); }}
        }}
    </script>

</body>
</html>'''
    
    # Coba replace dengan regex
    new_content = re.sub(pattern, replacement, content, flags=re.DOTALL)
    
    if new_content == content:
        print(f"Tidak ada perubahan untuk {product['file']} - pattern tidak cocok")
        return False
    
    # Simpan file
    with open(file_path, 'w', encoding='utf-8') as f:
        f.write(new_content)
    
    print(f"✓ Berhasil update {product['file']}")
    return True

def main():
    """Main function"""
    print("Memulai update halaman produk...")
    print(f"Total produk: {len(products)}\n")
    
    success_count = 0
    failed_count = 0
    
    for product in products:
        if update_product_page(product):
            success_count += 1
        else:
            failed_count += 1
    
    print(f"\n{'='*50}")
    print(f"Selesai!")
    print(f"Berhasil: {success_count}")
    print(f"Gagal: {failed_count}")
    print(f"{'='*50}")

if __name__ == '__main__':
    main()