<?php

use Illuminate\Support\Facades\Route;

// --- KUMPULAN SEMUA CONTROLLER YANG KITA GUNAKAN ---
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Penjual\DashboardController as PenjualDashboardController;
use App\Http\Controllers\Penjual\ProductController as PenjualProductController;
use App\Http\Controllers\Penjual\OrderController as PenjualOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- ROUTE PUBLIK (Bisa diakses tanpa login) ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');


// --- ROUTE YANG MEMBUTUHKAN LOGIN (TERMASUK DARI BREEZE) ---
Route::middleware('auth')->group(function () {
    // Dashboard Pembeli (default)
    Route::get('/dashboard', [App\Http\Controllers\Pembeli\DashboardController::class, 'index'])->name('dashboard');

    // Halaman Profil Pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route untuk Keranjang & Checkout
    Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/remove/{rowId}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/buy-now/{product}', [CartController::class, 'buyNow'])->name('cart.buyNow');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

});


// --- GRUP ROUTE KHUSUS UNTUK PERAN TERTENTU ---

// --- Grup Route Khusus ADMIN ---
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [AdminCategoryController::class, 'store'])->name('categories.store');
});

// --- Grup Route Khusus PENJUAL ---
Route::middleware(['auth', 'penjual'])->prefix('penjual')->name('penjual.')->group(function () {
    Route::get('/dashboard', [PenjualDashboardController::class, 'index'])->name('dashboard');
    Route::get('/products/create', [PenjualProductController::class, 'create'])->name('products.create');
    Route::post('/products', [PenjualProductController::class, 'store'])->name('products.store');
    Route::get('/products', [PenjualProductController::class, 'index'])->name('products.index');
    Route::get('/orders', [PenjualOrderController::class, 'index'])->name('orders.index');
});


// --- ROUTE OTENTIKASI (login, register, dll dari Breeze) ---
require __DIR__.'/auth.php';