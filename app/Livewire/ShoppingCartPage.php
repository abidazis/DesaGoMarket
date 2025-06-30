<?php

namespace App\Livewire;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCartPage extends Component
{
    // Method removeItem biarkan seperti sebelumnya
    public function removeItem($rowId)
    {
        Cart::remove($rowId);
        $this->dispatch('cart-updated');
    }

    // Method render biarkan seperti sebelumnya
    public function render()
    {
        return view('livewire.shopping-cart-page', [
            'cartItems' => Cart::content(),
            'subtotal' => Cart::subtotal(0, ',', '.'),
        ]);
    }
}