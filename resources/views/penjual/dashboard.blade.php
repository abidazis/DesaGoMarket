<x-admin-layout>
    <div class="mb-6 flex justify-between items-center">
        <h3 class="text-gray-700 text-3xl font-medium">Dashboard</h3>
        <a href="{{ route('penjual.products.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-md">
            + Tambah Produk Baru
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <x-stats-card title="Total Produk" value="{{ $totalProduk }}" linkText="Lihat produk" linkHref="#" colorClass="text-indigo-600"/>
        <x-stats-card title="Pesanan Baru" value="{{ $pesananBaru }}" linkText="Lihat pesanan" linkHref="#" colorClass="text-blue-600"/>
        <x-stats-card title="Produk Habis" value="{{ $produkHabis }}" linkText="Perbarui stok" linkHref="#" colorClass="text-orange-600"/>
        
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h4 class="text-gray-500 text-sm font-medium">Total Pendapatan (Selesai)</h4>
            <p class="text-3xl font-bold mt-2">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
            <a href="#" class="text-sm font-medium mt-4 inline-block text-green-600">Lihat riwayat</a>
        </div>
    </div>

    <div class="mt-8">
        @livewire('penjual.manage-products')
    </div>
</x-admin-layout>