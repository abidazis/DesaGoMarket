<?php

namespace App\View\Components;

use Illuminate\View\Component;
// PENTING: Pastikan ini mengarah ke folder Models, bukan folder Components.
use App\Models\Product; 

class ProductCard extends Component
{
    /**
     * The product instance.
     *
     * @var \App\Models\Product
     */
    public $product;

    /**
     * Create a new component instance.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    // PENTING: Type-hint nya adalah ke 'Product' dari Models yang sudah kita 'use' di atas.
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.product-card');
    }
}