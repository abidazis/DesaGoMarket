<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Tambah Produk Baru</h2>
    <form wire:submit="saveProduct">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium">Nama Produk</label>
                    <input type="text" wire:model="name" id="name" class="w-full mt-1 p-2 border rounded-md">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="category_id" class="block text-gray-700 font-medium">Kategori</label>
                    <select wire:model="category_id" id="category_id" class="w-full mt-1 p-2 border rounded-md">
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-700 font-medium">Harga (Rp)</label>
                    <input type="number" wire:model="price" id="price" class="w-full mt-1 p-2 border rounded-md">
                    @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="stock" class="block text-gray-700 font-medium">Jumlah Stok</label>
                    <input type="number" wire:model="stock" id="stock" class="w-full mt-1 p-2 border rounded-md">
                    @error('stock') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                 <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-medium">Deskripsi Produk</label>
                    <textarea wire:model="description" id="description" rows="7" class="w-full mt-1 p-2 border rounded-md"></textarea>
                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                 <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-medium">Gambar Produk</label>
                    <input type="file" wire:model="image" id="image" class="w-full mt-1">
                    <div wire:loading wire:target="image" class="text-sm text-gray-500 mt-1">Mengunggah...</div>
                    @if ($image && !$errors->has('image'))
                        <img src="{{ $image->temporaryUrl() }}" class="mt-4 w-1/2 rounded">
                    @endif
                    @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="mt-6 flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                <span wire:loading.remove wire:target="saveProduct">Simpan Produk</span>
                <span wire:loading wire:target="saveProduct">Menyimpan...</span>
            </button>
        </div>
    </form>
</div>