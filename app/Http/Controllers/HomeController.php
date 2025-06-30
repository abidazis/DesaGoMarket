<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 8 produk terbaru untuk ditampilkan di homepage
        $latestProducts = Product::latest()->take(8)->get();
        return view('welcome', compact('latestProducts'));
    }
}