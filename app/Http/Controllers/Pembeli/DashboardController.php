<?php
namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // <-- Import model Product

class DashboardController extends Controller
{
    public function index()
    {
        $totalPesanan = 0; // Ganti dengan query order nanti
        $pesananDiproses = 0; // Ganti dengan query order nanti

        // Ambil 4 produk terbaru untuk ditampilkan di dashboard
        $latestProducts = Product::latest()->take(4)->get();

        return view('dashboard', compact('totalPesanan', 'pesananDiproses', 'latestProducts'));
    }
}