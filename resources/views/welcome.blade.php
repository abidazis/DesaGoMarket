<x-app-layout>
    {{-- Hero Banner Section --}}
    <div class="w-full bg-cover bg-center" style="height: 32rem; background-image: url('https://images.unsplash.com/photo-1551109981-08ac034b5619?q=80&w=1932&auto=format&fit=crop');">
        <div class="flex items-center justify-center h-full w-full bg-gray-900 bg-opacity-50">
            <div class="text-center">
                <h1 class="text-white text-4xl font-extrabold uppercase md:text-5xl">Belanja Produk Lokal, Majukan Desa</h1>
                <p class="text-white mt-4">Temukan produk-produk unggulan langsung dari para pengrajin dan petani di desa kami.</p>
                <a href="{{ route('products.index') }}" class="mt-8 inline-block bg-indigo-600 text-white font-bold text-lg uppercase px-8 py-3 rounded-md hover:bg-indigo-700">
                    Belanja Sekarang
                </a>
            </div>
        </div>
    </div>

    {{-- Section Produk Terbaru/Pilihan --}}
    <div class="container mx-auto px-4 py-12">
        @if(session('order_success_message'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md" role="alert">
                <p class="font-bold">Pesanan Berhasil!</p>
                <p>{{ session('order_success_message') }}</p>
            </div>
        @endif
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Produk Pilihan Untuk Anda</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($latestProducts as $product)
                <x-product-card :product="$product" />
            @empty
                <p class="col-span-full text-center text-gray-500">Produk pilihan akan segera hadir.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>