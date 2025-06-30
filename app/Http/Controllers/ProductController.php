<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        $products = Product::with(['user', 'category'])->latest()->paginate(12);
        return view('products.index', compact('products'));
    }

    // Menampilkan satu produk
    public function show(Product $product)
    {
        $product->load(['user', 'category']);
        return view('products.show', compact('product'));
    }
}