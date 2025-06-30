<div class="bg-white rounded-lg shadow-sm overflow-hidden group transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg">
    <a href="{{ route('products.show', $product) }}">
        <div class="w-full h-48 bg-gray-200">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
            @endif
        </div>
        <div class="p-4">
            {{-- KODE BARU UNTUK MENAMPILKAN KATEGORI --}}
            <span class="text-xs text-gray-500">{{ $product->category?->name ?? 'Tanpa Kategori' }}</span>

            <h3 class="text-md font-semibold text-gray-800 truncate group-hover:text-indigo-600 transition-colors duration-300 mt-1" title="{{ $product->name }}">
                {{ $product->name }}
            </h3>
            <p class="text-lg font-bold text-gray-900 mt-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="text-sm text-gray-500 mt-1">Stok: {{ $product->stock }}</p>
        </div>
    </a>
</div>