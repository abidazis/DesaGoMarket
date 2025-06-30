<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // <-- Import DB Facade
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        
        // Data Produk (Sudah Benar)
        $totalProduk = Product::where('user_id', $userId)->count();
        $produkHabis = Product::where('user_id', $userId)->where('stock', 0)->count();

        // Data Pesanan (Query Nyata)
        // Menghitung pesanan 'baru' yang di dalamnya ada produk milik penjual ini
        $pesananBaru = Order::where('status', 'baru')
                            ->whereHas('items.product', function ($query) use ($userId) {
                                $query->where('user_id', $userId);
                            })->count();

        // Menghitung total pendapatan dari item yang status ordernya 'selesai'
        $totalPendapatan = OrderItem::whereHas('product', function ($query) use ($userId) {
                                        $query->where('user_id', $userId);
                                    })
                                    ->whereHas('order', function($query) {
                                        $query->where('status', 'selesai');
                                    })
                                    ->sum(DB::raw('price * quantity'));

        return view('penjual.dashboard', compact(
            'totalProduk', 
            'produkHabis', 
            'pesananBaru', 
            'totalPendapatan'
        ));
    }
}