# Script untuk update semua file produk yang tersisa

$products = @(
    @{file='minuman-boba.blade.php'; id='minuman-boba'; name='Minuman Boba'; price='Rp. 15.000'; priceNum=15000; image='images/drinks/minuman_boba.png'},
    @{file='minuman-matcha.blade.php'; id='minuman-matcha'; name='Minuman Matcha'; price='Rp. 15.000'; priceNum=15000; image='images/drinks/minuman_matcha.png'},
    @{file='minuman-jus.blade.php'; id='minuman-jus'; name='Minuman Jus'; price='Rp. 10.000'; priceNum=10000; image='images/drinks/minuman_jus.png'},
    @{file='air-mineral.blade.php'; id='air-mineral'; name='Air Mineral'; price='Rp. 3.000'; priceNum=3000; image='images/drinks/air_mineral.png'},
    @{file='kopi.blade.php'; id='kopi'; name='Kopi'; price='Rp. 5.000'; priceNum=5000; image='images/drinks/kopi.png'},
    @{file='sop-buah.blade.php'; id='sop-buah'; name='Sop Buah'; price='Rp. 10.000'; priceNum=10000; image='images/drinks/sop_buah.png'},
    @{file='es-durian-asli.blade.php'; id='es-durian-asli'; name='Es Durian Asli'; price='Rp. 15.000'; priceNum=15000; image='images/drinks/es_durian_asli.png'},
    @{file='es-cendol.blade.php'; id='es-cendol'; name='Es Cendol'; price='Rp. 8.000'; priceNum=8000; image='images/drinks/es_cendol.png'}
)

$basePath = "d:\FoodMate\resources\views\menu\detail"

foreach ($product in $products) {
    $filePath = Join-Path $basePath $product.file
    
    if (Test-Path $filePath) {
        $content = Get-Content $filePath -Raw -Encoding UTF8
        
        # 1. Tambahkan CSRF token jika belum ada
        if ($content -notmatch 'csrf-token') {
            $content = $content -replace '<meta name="viewport" content="width=device-width, initial-scale=1.0">', '<meta name="viewport" content="width=device-width, initial-scale=1.0">`n    <meta name="csrf-token" content="{{ csrf_token() }}">'
        }
        
        # 2. Replace bagian harga dan button
        $oldPattern = '(<!-- Harga & CTA Button -->.*?</html>)'
        
        $newSection = @"
        <!-- Harga & CTA Button -->
        <div class="mt-8">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm text-gray-500">Harga</p>
                    <p class="text-3xl font-bold text-[#f97316]">$($product.price)</p>
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
        function increaseQuantity() { quantity++; document.getElementById('quantity').textContent = quantity; }
        function decreaseQuantity() { if (quantity > 1) { quantity--; document.getElementById('quantity').textContent = quantity; } }
        async function addToCart() {
            try {
                const formData = new FormData();
                formData.append('id', '$($product.id)'); formData.append('name', '$($product.name)'); formData.append('price', '$($product.price)'); formData.append('price_numeric', $($product.priceNum)); formData.append('image', '$($product.image)'); formData.append('quantity', quantity); formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);
                const response = await fetch('/cart/add', { method: 'POST', body: formData, headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                const data = await response.json();
                if (data.success) { const toast = document.getElementById('toast'); toast.style.display = 'block'; quantity = 1; document.getElementById('quantity').textContent = quantity; setTimeout(() => { toast.style.display = 'none'; }, 3000); } else { alert('Gagal menambahkan item ke keranjang: ' + (data.message || 'Unknown error')); }
            } catch (error) { console.error('Error:', error); alert('Terjadi kesalahan: ' + error.message); }
        }
    </script>

</body>
</html>
"@
        
        $content = $content -replace $oldPattern, $newSection
        
        # Simpan file
        Set-Content -Path $filePath -Value $content -Encoding UTF8 -NoNewline
        
        Write-Host "✅ Berhasil update: $($product.file)" -ForegroundColor Green
    } else {
        Write-Host "❌ File tidak ditemukan: $($product.file)" -ForegroundColor Red
    }
}

Write-Host "`n========================================" -ForegroundColor Cyan
Write-Host "Update selesai!" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan