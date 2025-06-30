<div>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Halaman Tes Livewire</h1>

        <div class="mb-4">
            <label for="test-input" class="block text-gray-700">Ketik sesuatu di sini:</label>
            <input id="test-input" type="text" wire:model.live="pesan" placeholder="Ketik..." class="w-full mt-1 p-2 border rounded-md">
        </div>

        <hr class="my-4">

        <h2 class="text-lg font-medium">Teks yang Anda ketik akan muncul di sini:</h2>
        <p class="text-2xl font-bold text-indigo-600 mt-2">
            {{ $pesan }}
        </p>
    </div>
</div>