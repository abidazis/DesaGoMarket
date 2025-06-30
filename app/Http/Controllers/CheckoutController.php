<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart; // Jangan lupa import Cart

class CheckoutController extends Controller
{
    public function index()
    {
        // Jika keranjang kosong, jangan biarkan masuk ke halaman checkout
        if (Cart::count() == 0) {
            return redirect()->route('cart.index');
        }

        // Tugasnya hanya menampilkan view "cangkang" untuk halaman checkout
        return view('checkout.index');
    }
}