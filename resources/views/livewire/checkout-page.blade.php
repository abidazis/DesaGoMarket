<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6">Checkout</h1>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2">
            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <h2 class="text-xl font-bold mb-4">Alamat Pengiriman</h2>
                <p class="text-gray-600">{{ $shippingAddress }}</p>
                {{-- TODO: Buat fitur ganti alamat --}}
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4">Opsi Pengiriman</h2>
                <div class="space-y-4">
                    <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-indigo-500">
                        <input type="radio" name="courier" value="jne" wire:model.live="selectedCourier" class="h-5 w-5 text-indigo-600">
                        <span class="ml-4">JNE Reguler (Estimasi 2-3 hari)</span>
                        <span class="ml-auto font-semibold">Rp 15.000</span>
                    </label>
                    <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-indigo-500">
                        <input type="radio" name="courier" value="jnt" wire:model.live="selectedCourier" class="h-5 w-5 text-indigo-600">
                        <span class="ml-4">J&T Express (Estimasi 1-2 hari)</span>
                        <span class="ml-auto font-semibold">Rp 18.000</span>
                    </label>
                </div>
                @error('selectedCourier') <p class="text-red-500 text-sm mt-2">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="bg-white p-6 rounded-lg shadow-md sticky top-24">
                <h2 class="text-xl font-bold mb-4">Ringkasan Pesanan</h2>
                
                @foreach($cartItems as $item)
                <div class="flex justify-between items-center mb-2">
                    <span class="text-gray-600">{{ $item['name'] }} <span class="text-sm">x{{ $item['qty'] }}</span></span>
                    <span class="text-gray-800 font-medium">Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</span>
                </div>
                @endforeach

                <hr class="my-4">

                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Subtotal</span>
                    <span class="text-gray-800">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Ongkos Kirim</span>
                    <span class="text-gray-800">Rp {{ number_format($shippingCost, 0, ',', '.') }}</span>
                </div>

                <hr class="my-4">
                
                <div class="flex justify-between mb-4">
                    <span class="font-bold text-lg">Total</span>
                    <span class="font-bold text-lg text-indigo-600">Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
                </div>

                <button wire:click="placeOrder" wire:loading.attr="disabled" class="w-full bg-indigo-600 text-white font-bold py-3 px-4 rounded hover:bg-indigo-700 disabled:bg-indigo-300">
                    <span wire:loading.remove wire:target="placeOrder">
                        Buat Pesanan
                    </span>
                    <span wire:loading wire:target="placeOrder">
                        Memproses...
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>