<?php

namespace App\Livewire\Penjual;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ManageProducts extends Component
{
    use WithPagination;

    public function deleteProduct($productId)
    {
        $product = Product::where('id', $productId)->where('user_id', Auth::id())->first();
        if ($product) {
            // Hapus juga gambar dari storage jika perlu
            // Storage::disk('public')->delete($product->image);
            $product->delete();
            session()->flash('message', 'Produk berhasil dihapus.');
        }
    }

    public function render()
    {
        $products = Product::where('user_id', Auth::id())
                            ->latest()
                            ->paginate(10);

        return view('livewire.penjual.manage-products', [
            'products' => $products
        ]);
    }
}