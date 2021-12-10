<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductCart extends Component
{
    
    protected $listeners = ['cart_updated' => 'render'];


    public function render()
    {
        $cart = Cart::content();
        $totals = Cart::total();
        return view('livewire.product-cart')
                ->with('cart', $cart)
                ->with('totals', $totals);
    }

    public function deleteFromCart($rowId){
        Cart::remove($rowId);
        $this->emit('cart_updated');

    }
}
