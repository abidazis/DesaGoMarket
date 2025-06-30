<?php

namespace App\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CheckoutPage extends Component
{
    public $cartItems;
    public $subtotal;
    public $shippingAddress;
    public $selectedCourier = '';
    public
 
$shippingCost = 0;
    public $grandTotal;

    public function mount()
    {
        $this->cartItems = Cart::content()->toArray(); // Diubah menjadi array
        $this->subtotal = Cart::subtotal(0, '', '');

        // PERBAIKAN DI SINI: Gunakan empty() untuk memeriksa array
        if (empty($this->cartItems)) {
            return $this->redirect(route('home'), navigate: true);
        }

        $this->shippingAddress = "Jln. Desa Sukamakmur, No. 17, Kec. Sukakarya, Kab. Bekasi, Jawa Barat, 17530";
        $this->calculateTotal();
    }

    public function updatedSelectedCourier($value)
    {
        if ($value === 'jne') {
            $this->shippingCost = 15000;
        } elseif ($value === 'jnt') {
            $this->shippingCost = 18000;
        } else {
            $this->shippingCost = 0;
        }
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->grandTotal = (float) $this->subtotal + (float) $this->shippingCost;
    }

    public function placeOrder()
    {
        $this->validate([
            'selectedCourier' => 'required',
        ], [
            'selectedCourier.required' => 'Mohon pilih kurir pengiriman.',
        ]);

        DB::transaction(function () {
            // ... (semua logika create order & order item sudah benar) ...
            $order = Order::create([
                'user_id' => Auth::id(),
                'invoice_number' => 'INV-' . time() . Auth::id(),
                'total_amount' => $this->grandTotal,
                'status' => 'baru',
                'shipping_address' => $this->shippingAddress,
            ]);

            foreach (Cart::content() as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'quantity' => $item->qty,
                    'price' => $item->price,
                ]);

                $product = Product::find($item->id);
                if ($product) {
                    $product->decrement('stock', $item->qty);
                }
            }
        });

        Cart::destroy();

        // INI BAGIAN YANG DIPERBAIKI: Menggunakan redirect standar Laravel
        return redirect()->route('home')->with('order_success_message', 'Pesanan Anda berhasil dibuat!');
    }

    public function render()
    {
        return view('livewire.checkout-page');
    }
}