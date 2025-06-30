<x-admin-layout>
    <h3 class="text-gray-700 text-3xl font-medium">Pesanan Masuk</h3>
    <p class="text-gray-600 mt-1">Kelola semua pesanan yang masuk untuk produk Anda.</p>

    <div class="mt-8">
        {{-- Ini adalah cara yang benar untuk memanggil komponen Livewire di halaman --}}
        @livewire('penjual.manage-orders')
    </div>
</x-admin-layout>