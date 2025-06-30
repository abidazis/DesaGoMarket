{{-- Kita gunakan layout pembeli --}}
<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Jelajahi Produk Desa Kami</h1>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($products as $product)
                {{-- Panggil komponen kartu produk untuk setiap produk --}}
                <x-product-card :product="$product" />
            @empty
                <p class="col-span-full text-center text-gray-500">Belum ada produk yang tersedia saat ini.</p>
            @endforelse
        </div>

        {{-- Link Paginasi --}}
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>