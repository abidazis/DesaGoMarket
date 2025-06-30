<x-admin-layout>
    <div class="mb-6 flex justify-between items-center">
        <h3 class="text-gray-700 text-3xl font-medium">Kelola Kategori</h3>
        {{-- Tombol ini akan kita fungsikan di langkah berikutnya --}}
        <a href="{{ route('admin.categories.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg">
            + Tambah Kategori Baru
        </a>
    </div>

    {{-- Menampilkan pesan sukses setelah menambah/mengubah data --}}
    @if(session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Nama</th>
                        <th class="py-3 px-6 text-left">Slug</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @forelse($categories as $index => $category)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ $categories->firstItem() + $index }}</td>
                            <td class="py-3 px-6 text-left">{{ $category->name }}</td>
                            <td class="py-3 px-6 text-left">{{ $category->slug }}</td>
                            <td class="py-3 px-6 text-center">
                                {{-- TODO: Buat fungsi Edit & Hapus nanti --}}
                                <span class="text-gray-400">Edit / Hapus</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="py-3 px-6 text-center" colspan="4">Belum ada data kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>
</x-admin-layout>