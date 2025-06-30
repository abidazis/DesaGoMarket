<div class="container mx-auto mt-10 px-4">
    <h1 class="text-3xl font-bold mb-6">Keranjang Belanja Anda</h1>

    @if(Cart::count() > 0)
        <div class="bg-white shadow-md rounded my-6">
            <table class="min-w-max w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Produk</th>
                        <th class="py-3 px-6 text-center">Jumlah</th>
                        <th class="py-3 px-6 text-right">Harga</th>
                        <th class="py-3 px-6 text-right">Subtotal</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach(Cart::content() as $item)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium">{{ $item->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">{{ $item->qty }}</td>
                            <td class="py-3 px-6 text-right">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td class="py-3 px-6 text-right">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                            <td class="py-3 px-6 text-center">
                                <button wire:click="removeItem('{{ $item->rowId }}')" class="text-red-500 hover:text-red-700 font-semibold">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex justify-end">
            <div class="w-full md:w-1/3">
                <div class="bg-white shadow-md rounded p-6">
                    <div class="flex justify-between mb-4">
                        <span class="font-semibold text-lg">Subtotal</span>
                        <span class="font-semibold text-lg">Rp {{ Cart::subtotal(0, ',', '.') }}</span>
                    </div>
                    <a href="{{ route('checkout.index') }}" class="text-center w-full block bg-indigo-600 text-white font-bold py-3 px-4 rounded hover:bg-indigo-700">
                        Lanjut ke Checkout
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-20 bg-white shadow-md rounded">
            <p class="text-xl text-gray-700">Keranjang belanja Anda kosong.</p>
            <a href="{{ route('products.index') }}" class="mt-4 inline-block bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700">
                Mulai Belanja
            </a>
        </div>
    @endif
</div>