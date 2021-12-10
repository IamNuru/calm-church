<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddProductToCart extends Component
{
    public $pid;
    public $qty;
    public $errorMessage;
    protected $listeners = ['cart_updated' => 'render'];


    public function mount(){
        $this->qty = 1;
    }

    public function render()
    {
        
        $cart = Cart::content();
        $isInCart = $cart->where('id', $this->pid)->first();
        return view('livewire.add-product-to-cart')
                ->with('isInCart', $isInCart)
                ->with('errorMessage', $this->errorMessage);
    }

    public function submit()
    {
        $cart = Cart::content();
        $isInCart = $cart->where('id', $this->pid)->first();
        if (!$this->pid) {
            $this->errorMessage = "Invalid Product";
        } else {
            $product = Product::findOrFail($this->pid);
            if (!$product) {
                $this->errorMessage = "Invalid Product";
            } else {
                if ($product->qty > $this->qty) {
                    if ($isInCart) {
                        if ($isInCart->qty+$this->qty >= $product->qty) {
                            $this->errorMessage = "Quantity is more than quantity available";
                            
                        }else{
                            Cart::add(
                                $product->id,
                                $product->title,
                                $this->qty,
                                $product->discount ? $product->amount - $product->discount : $product->amount,
                                0,
                                [
                                    'discount' => $product->discount,
                                    'image' => $product->image,
                                ]
                            );
                            $this->emit('cart_updated');
                            $this->errorMessage="";
                        }
                    }else{
                        Cart::add(
                            $product->id,
                            $product->title,
                            $this->qty,
                            $product->discount ? $product->amount - $product->discount : $product->amount,
                            0,
                            [
                                'discount' => $product->discount,
                                'image' => $product->image,
                            ]
                        );
                        $this->emit('cart_updated');
                        $this->errorMessage="";
                    }
                }else{
                    $this->errorMessage = "Quantity is more than quantity available";
                }
            }
        }
        
    }


    public function updateCartQuantity($row_id)
    {
        Cart::update($row_id, $this->qty);

        $this->emit('cart_updated');
    }


   
}
