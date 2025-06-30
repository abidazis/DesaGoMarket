<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category; // <-- Tambahkan ini

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data nyata
        $totalKategori = Category::count();
        $totalProduk = Product::count();
        
        // Data sementara sampai modulnya dibuat
        $totalSlider = 3; // Placeholder
        $totalPesanan = 10; // Placeholder

        // Data untuk Grafik (akan kita gunakan di Tahap 2)
        $chartLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'];
        $chartData = [12, 19, 3, 5, 2, 8, 15, 9, 13, 7, 11, 4];

        return view('admin.dashboard', compact(
            'totalKategori', 
            'totalProduk', 
            'totalSlider', 
            'totalPesanan',
            'chartLabels',
            'chartData'
        ));
    }
}