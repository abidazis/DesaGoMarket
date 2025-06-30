<x-app-layout>
    <div class="py-8 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">

                        <div>
                            <div class="aspect-square bg-white rounded-lg border">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-contain rounded-lg">
                                @endif
                            </div>
                            {{-- TODO: Tambahkan gambar-gambar kecil lainnya di sini nanti --}}
                        </div>

                        <div x-data="{ quantity: 1 }">
                            <h1 class="text-3xl font-bold tracking-tight">{{ $product->name }}</h1>
                            
                            {{-- Bagian Rating & Terjual (Data Dummy) --}}
                            <div class="mt-3 flex items-center">
                                <span class="text-orange-500 font-bold">4.9</span>
                                <div class="flex items-center ml-2">
                                    {{-- SVG untuk bintang --}}
                                    @for ($i = 0; $i < 5; $i++)
                                        <svg class="w-4 h-4 text-orange-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    @endfor
                                </div>
                                <div class="ml-4 border-l pl-4 text-sm text-gray-500">707 Penilaian</div>
                                <div class="ml-4 border-l pl-4 text-sm text-gray-500">2,1RB Terjual</div>
                            </div>
                            
                            {{-- Bagian Harga --}}
                            <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                                <p class="text-3xl text-indigo-600 font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            </div>

                            {{-- Bagian Varian Produk (Tampilan Dummy) --}}
                            {{-- NOTE: Fitur variasi produk memerlukan perubahan database. Untuk saat ini, ini hanya tampilan. --}}
                            <div class="mt-6">
                                <h3 class="text-sm font-medium text-gray-900">Pilih Varian:</h3>
                                <div class="flex items-center space-x-2 mt-2">
                                    <button class="px-4 py-2 border rounded-md text-sm hover:bg-indigo-50 hover:border-indigo-500">Kecil</button>
                                    <button class="px-4 py-2 border rounded-md text-sm hover:bg-indigo-50 hover:border-indigo-500">Sedang</button>
                                    <button class="px-4 py-2 border border-indigo-600 bg-indigo-50 rounded-md text-sm">Besar</button>
                                </div>
                            </div>

                            {{-- Bagian Kuantitas & Stok --}}
                            <div class="mt-6 flex items-center">
                                <h3 class="text-sm font-medium text-gray-900 mr-4">Kuantitas</h3>
                                <div class="flex items-center border rounded-md">
                                    <button @click="quantity = Math.max(1, quantity - 1)" class="px-3 py-1 text-lg font-bold text-gray-600 hover:bg-gray-100">-</button>
                                    <span x-text="quantity" class="px-4 py-1 border-l border-r">1</span>
                                    <button @click="quantity = Math.min({{ $product->stock }}, quantity + 1)" class="px-3 py-1 text-lg font-bold text-gray-600 hover:bg-gray-100">+</button>
                                </div>
                                <p class="ml-4 text-sm text-gray-500">Tersedia {{ $product->stock }} buah</p>
                            </div>
                            
                            {{-- Tombol Aksi --}}
                            <form action="{{ route('cart.add', $product) }}" method="POST">
                                @csrf

                                {{-- Bagian Kuantitas (yang sebelumnya kita buat dengan AlpineJS) --}}
                                <div class="mt-6 flex items-center">
                                    <h3 class="text-sm font-medium text-gray-900 mr-4">Kuantitas</h3>
                                    <div class="flex items-center border rounded-md">
                                        {{-- Kita akan gunakan JavaScript sederhana untuk tombol +/- --}}
                                        <button type="button" onclick="this.nextElementSibling.stepDown()" class="px-3 py-1 text-lg font-bold text-gray-600 hover:bg-gray-100">-</button>
                                        <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-16 text-center border-l border-r">
                                        <button type="button" onclick="this.previousElementSibling.stepUp()" class="px-3 py-1 text-lg font-bold text-gray-600 hover:bg-gray-100">+</button>
                                    </div>
                                    <p class="ml-4 text-sm text-gray-500">Tersedia {{ $product->stock }} buah</p>
                                </div>

                               {{-- Tombol Aksi --}}
                                <div class="mt-8 flex items-center space-x-4">
                                    <form action="{{ route('cart.add', $product) }}" method="POST" class="w-full">
                                        @csrf
                                        {{-- Kita bisa tambahkan input kuantitas di sini jika diperlukan --}}
                                        {{-- <input type="hidden" name="quantity" value="1"> --}}
                                        <button type="submit" class="w-full bg-orange-100 border border-orange-500 text-orange-600 font-bold py-3 px-6 rounded-lg hover:bg-orange-200 transition-colors duration-300">
                                            Masukkan Keranjang
                                        </button>
                                    </form>

                                    <form action="{{ route('cart.buyNow', $product) }}" method="POST" class="w-full">
                                        @csrf
                                        {{-- <input type="hidden" name="quantity" value="1"> --}}
                                        <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:bg-indigo-700 transition-colors duration-300">
                                            Beli Sekarang
                                        </button>
                                    </form>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gray-200 rounded-full flex-shrink-0">
                        {{-- Placeholder Avatar Toko --}}
                    </div>
                    <div>
                        <p class="font-bold text-lg">{{ $product->user->name }}</p>
                        <p class="text-sm text-gray-500">Aktif 1 jam lalu</p>
                    </div>
                    <div class="flex-grow"></div>
                    <a href="#" class="px-4 py-2 border border-indigo-600 text-indigo-600 rounded-md text-sm font-medium hover:bg-indigo-50">Kunjungi Toko</a>
                </div>
            </div>
            
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-4">Spesifikasi Produk</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div class="flex"><p class="w-32 text-gray-500">Kategori</p><p class="text-sm text-indigo-600 font-semibold">{{ $product->category?->name ?? 'Tanpa Kategori' }}</p>
                        <div class="flex"><p class="w-32 text-gray-500">Stok</p><p class="text-gray-800">{{ $product->stock }}</p></div>
                        <div class="flex"><p class="w-32 text-gray-500">Merek</p><p class="text-gray-800">-</p></div>
                        <div class="flex"><p class="w-32 text-gray-500">Asal Produk</p><p class="text-gray-800">Lokal</p></div>
                        <div class="flex"><p class="w-32 text-gray-500">Dikirim Dari</p><p class="text-gray-800">KAB. BEKASI</p></div>
                    </div>

                    <hr class="my-6">

                    <h3 class="text-xl font-bold mb-4">Deskripsi Produk</h3>
                    <div class="prose max-w-none text-gray-600 whitespace-pre-wrap">
                        {{ $product->description }}
                    </div>
                </div>
            </div>

        </div>
    </div>
{{-- Menampilkan pesan sukses setelah redirect --}}
@if(session('message'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mt-6 rounded-md" role="alert">
        <p>{{ session('message') }}</p>
    </div> 
@endif

</x-app-layout>