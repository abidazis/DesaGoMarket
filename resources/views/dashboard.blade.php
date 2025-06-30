<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Bagian Selamat Datang & Stat Card --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p class="mt-2 text-gray-600">Ini adalah ringkasan aktivitas Anda di Marketplace Desa.</p>
                </div>
            </div>

            <div class="mt-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Produk Terbaru Untuk Anda</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @if(isset($latestProducts) && $latestProducts->count() > 0)
                        @foreach($latestProducts as $product)
                            <x-product-card :product="$product" />
                        @endforeach
                    @else
                        <p class="col-span-full text-center text-gray-500">Belum ada produk yang tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>