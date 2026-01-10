@extends('layouts.admin')

@section('title', 'Tambah Produk - FoodMate Admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-[#F6A406] transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Daftar Produk
        </a>
    </div>

    <!-- Page Header -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Tambah Produk Baru</h2>
        <p class="text-gray-600 mt-1">Lengkapi informasi produk di bawah ini</p>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-sm p-6">
        @csrf

        <div class="space-y-6">
            <!-- Product Name -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Produk <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent" placeholder="Contoh: Nasi Goreng Spesial">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                <div class="flex gap-2">
                    <select name="category" id="category_select" required class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                        <option value="__new__">+ Kategori Baru</option>
                    </select>
                    <input type="text" id="new_category" placeholder="Kategori baru..." class="hidden flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                </div>
                @error('category')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                <textarea name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent" placeholder="Deskripsi produk...">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Price -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Harga <span class="text-red-500">*</span></label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">Rp</span>
                    <input type="number" name="price" value="{{ old('price') }}" required min="0" step="1000" class="w-full pl-12 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent" placeholder="25000">
                </div>
                @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Produk</label>
                <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent">
                <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, GIF. Maksimal 2MB</p>
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Rating -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Rating Awal</label>
                <input type="number" name="rating" value="{{ old('rating', 0) }}" min="0" max="5" step="0.1" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent" placeholder="4.5">
                @error('rating')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Stock System -->
            <div class="border-t border-gray-200 pt-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Pengaturan Stok</h3>
                
                <div class="space-y-4">
                    <!-- Use Stock System -->
                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="use_stock_system" id="use_stock_system" value="1" {{ old('use_stock_system') ? 'checked' : '' }} class="w-5 h-5 text-[#F6A406] border-gray-300 rounded focus:ring-[#F6A406]">
                        <label for="use_stock_system" class="text-sm font-semibold text-gray-700">Gunakan Sistem Stok Harian</label>
                    </div>

                    <!-- Stock Fields (shown when checkbox is checked) -->
                    <div id="stock_fields" class="space-y-4 {{ old('use_stock_system') ? '' : 'hidden' }}">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Stok Harian Default</label>
                            <input type="number" name="default_daily_stock" value="{{ old('default_daily_stock', 0) }}" min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent" placeholder="50">
                            <p class="text-sm text-gray-500 mt-1">Jumlah stok yang tersedia setiap hari</p>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Minimum Stok (Alert)</label>
                            <input type="number" name="minimum_stock" value="{{ old('minimum_stock', 5) }}" min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#F6A406] focus:border-transparent" placeholder="5">
                            <p class="text-sm text-gray-500 mt-1">Notifikasi akan muncul jika stok di bawah nilai ini</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Status -->
            <div class="border-t border-gray-200 pt-6">
                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="w-5 h-5 text-[#F6A406] border-gray-300 rounded focus:ring-[#F6A406]">
                    <label for="is_active" class="text-sm font-semibold text-gray-700">Produk Aktif (Tampil di Menu)</label>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex gap-3 pt-6 border-t border-gray-200">
                <button type="submit" class="flex-1 bg-[#F6A406] text-white px-6 py-3 rounded-lg font-semibold hover:bg-[#F08C00] transition-colors">
                    Simpan Produk
                </button>
                <a href="{{ route('admin.products.index') }}" class="flex-1 bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition-colors text-center">
                    Batal
                </a>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    // Handle category selection
    const categorySelect = document.getElementById('category_select');
    const newCategoryInput = document.getElementById('new_category');

    categorySelect.addEventListener('change', function() {
        if (this.value === '__new__') {
            this.classList.add('hidden');
            newCategoryInput.classList.remove('hidden');
            newCategoryInput.name = 'category';
            newCategoryInput.required = true;
            newCategoryInput.focus();
        }
    });

    newCategoryInput.addEventListener('blur', function() {
        if (!this.value) {
            this.classList.add('hidden');
            categorySelect.classList.remove('hidden');
            this.name = '';
            this.required = false;
            categorySelect.value = '';
        }
    });

    // Handle stock system toggle
    const useStockCheckbox = document.getElementById('use_stock_system');
    const stockFields = document.getElementById('stock_fields');

    useStockCheckbox.addEventListener('change', function() {
        if (this.checked) {
            stockFields.classList.remove('hidden');
        } else {
            stockFields.classList.add('hidden');
        }
    });
</script>
@endpush