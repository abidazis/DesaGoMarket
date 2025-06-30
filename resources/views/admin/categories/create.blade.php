<x-admin-layout>
    <h3 class="text-gray-700 text-3xl font-medium">Tambah Kategori Baru</h3>

    <div class="mt-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium">Nama Kategori</label>
                    <input type="text" name="name" id="name" class="w-full mt-1 p-2 border rounded-md @error('name') border-red-500 @enderror" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kita tidak perlu input slug di sini, karena dibuat otomatis --}}

                <div class="flex justify-end">
                    <a href="{{ route('admin.categories.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 mr-2">
                        Batal
                    </a>
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                        Simpan Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>