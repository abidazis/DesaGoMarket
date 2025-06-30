<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Invoice</th>
                    <th class="py-3 px-6 text-left">Pembeli</th>
                    <th class="py-3 px-6 text-center">Tanggal</th>
                    <th class="py-3 px-6 text-right">Total</th>
                    <th class="py-3 px-6 text-center">Status</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse($orders as $order)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">
                            <span class="font-medium">{{ $order->invoice_number }}</span>
                        </td>
                        <td class="py-3 px-6 text-left">{{ $order->user->name }}</td>
                        <td class="py-3 px-6 text-center">{{ $order->created_at->format('d M Y') }}</td>
                        <td class="py-3 px-6 text-right">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                        <td class="py-3 px-6 text-center">
                            @if($order->status == 'baru')
                                <span class="bg-blue-200 text-blue-600 py-1 px-3 rounded-full text-xs">Baru</span>
                            @elseif($order->status == 'diproses')
                                <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">Diproses</span>
                            @elseif($order->status == 'dikirim')
                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Dikirim</span>
                            @elseif($order->status == 'selesai')
                                <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Selesai</span>
                            @else
                                <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Dibatalkan</span>
                            @endif
                        </td>
                        <td class="py-3 px-6 text-center">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="py-3 px-6 text-center" colspan="6">Belum ada pesanan yang masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</div>