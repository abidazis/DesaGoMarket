<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; // <-- Jangan lupa use Category model

class CategoryController extends Controller
{
    public function index()
    {
        // Ambil semua data kategori, diurutkan dari yang terbaru
        $categories = Category::latest()->paginate(10); 

        // Kirim data ke view
        return view('admin.categories.index', compact('categories'));
    }
    // ... di dalam class CategoryController ...

    // Method untuk menampilkan form tambah kategori
    public function create()
    {
        return view('admin.categories.create');
    }

    // Method untuk menyimpan data dari form
    public function store(Request $request)
    {
        // 1. Validasi input
        $validated = $request->validate([
            'name' => 'required|unique:categories|min:3',
        ]);

        // 2. Buat slug secara otomatis di backend
        $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);

        // 3. Simpan ke database
        Category::create($validated);

        // 4. Kembali ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('admin.categories.index')->with('message', 'Kategori baru berhasil ditambahkan!');
    }
}