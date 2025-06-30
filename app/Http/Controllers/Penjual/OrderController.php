<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Tugasnya hanya menampilkan view "cangkang" untuk halaman pesanan
        return view('penjual.orders.index');
    }
}