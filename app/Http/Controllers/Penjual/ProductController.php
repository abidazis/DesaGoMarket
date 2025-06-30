<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category; // <-- Pastikan ini ada
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('penjual.products.index');
    }
    /**
     * Menampilkan form untuk membuat produk baru.
     */
    public function create()
    {
        // Ambil semua data kategori dari database
        $categories = Category::all();

        // Kirim variabel $categories tersebut ke dalam view
        return view('penjual.products.create', compact('categories'));
    }

    /**
     * Menyimpan produk baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi semua input dari form
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:1000',
            'stock' => 'required|integer|min:0',
            'description' => 'required|min:20',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 2. Handle upload gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $imagePath;
        }

        // 3. Tambahkan user_id dari penjual yang sedang login
        $validatedData['user_id'] = Auth::id();

        // 4. Simpan ke database
        Product::create($validatedData);

        // 5. Arahkan kembali ke dashboard dengan pesan sukses
        return redirect()->route('penjual.dashboard')->with('message', 'Produk baru berhasil ditambahkan!');
    }
}