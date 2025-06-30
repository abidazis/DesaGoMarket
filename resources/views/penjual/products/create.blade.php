<x-admin-layout>
    <h3 class="text-gray-700 text-3xl font-medium">Tambah Produk Baru</h3>
    <p class="text-gray-600 mt-1">Lengkapi formulir di bawah ini untuk menambahkan produk ke toko Anda.</p>

    <div class="mt-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            {{-- PENTING: Arahkan action ke route 'store' dan tambahkan enctype untuk upload file --}}
            <form action="{{ route('penjual.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium">Nama Produk</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full mt-1 p-2 border rounded-md @error('name') border-red-500 @enderror" required>
                            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="category_id" class="block text-gray-700 font-medium">Kategori</label>
                            <select name="category_id" id="category_id" class="w-full mt-1 p-2 border rounded-md @error('category_id') border-red-500 @enderror" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-gray-700 font-medium">Harga (Rp)</label>
                            <input type="number" name="price" id="price" value="{{ old('price') }}" class="w-full mt-1 p-2 border rounded-md @error('price') border-red-500 @enderror" required>
                            @error('price') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="stock" class="block text-gray-700 font-medium">Jumlah Stok</label>
                            <input type="number" name="stock" id="stock" value="{{ old('stock') }}" class="w-full mt-1 p-2 border rounded-md @error('stock') border-red-500 @enderror" required>
                            @error('stock') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 font-medium">Deskripsi Produk</label>
                            <textarea name="description" id="description" rows="7" class="w-full mt-1 p-2 border rounded-md @error('description') border-red-500 @enderror" required>{{ old('description') }}</textarea>
                            @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 font-medium">Gambar Produk</label>
                            <input type="file" name="image" id="image" class="w-full mt-1 p-2 border rounded-md @error('image') border-red-500 @enderror">
                            @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                     <a href="{{ route('penjual.dashboard') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 mr-2">
                        Batal
                    </a>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                        Simpan Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>