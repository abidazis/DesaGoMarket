<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        // Tugas controller ini sekarang adalah menampilkan view
        // yang di dalamnya terdapat komponen Livewire
        return view('cart.index');
    }
    /**
     * Menambahkan produk ke keranjang belanja.
     */
    public function add(Request $request, Product $product)
    {
        // Ambil kuantitas dari form, jika tidak ada, defaultnya 1
        $quantity = $request->input('quantity', 1);

        Cart::add(
            $product->id, 
            $product->name, 
            $quantity, 
            $product->price,
            ['image' => $product->image]
        );

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('message', 'Produk berhasil ditambahkan ke keranjang!');
    }
    public function buyNow(Request $request, Product $product)
    {
        // Ambil kuantitas dari form, jika tidak ada, defaultnya 1
        $quantity = $request->input('quantity', 1);

        // Tambahkan produk ke keranjang
        Cart::add(
            $product->id, 
            $product->name, 
            $quantity, 
            $product->price,
            ['image' => $product->image]
        );

        // Langsung arahkan ke halaman checkout
        return redirect()->route('checkout.index');
    }
}