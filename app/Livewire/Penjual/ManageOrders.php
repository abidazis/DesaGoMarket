<?php

namespace App\Livewire\Penjual;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ManageOrders extends Component
{
    use WithPagination;

    public function render()
    {
        $userId = Auth::id();

        // Query ini cukup kompleks, mari kita bedah:
        // 1. Ambil semua 'Order'.
        // 2. Gunakan 'whereHas' untuk memfilter: hanya tampilkan order yang 'items' (order_items) di dalamnya...
        // 3. ...memiliki relasi 'product' yang 'user_id'-nya adalah ID penjual yang sedang login.
        // 4. Urutkan dari yang terbaru dan beri paginasi.
        $orders = Order::whereHas('items.product', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->latest()->paginate(10);

        return view('livewire.penjual.manage-orders', [
            'orders' => $orders
        ]);
    }
}