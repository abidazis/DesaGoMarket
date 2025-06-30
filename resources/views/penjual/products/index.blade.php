<x-admin-layout>
    <div class="mb-6 flex justify-between items-center">
        <h3 class="text-gray-700 text-3xl font-medium">Kelola Produk Anda</h3>
        <a href="{{ route('penjual.products.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-md">
            + Tambah Produk Baru
        </a>
    </div>

    {{-- Pesan sukses setelah menambah/mengubah produk --}}
    @if(session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    {{-- Panggil komponen Livewire untuk menampilkan tabel produk --}}
    @livewire('penjual.manage-products')

</x-admin-layout>