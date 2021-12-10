<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Checkout extends Component
{
    public $first_name;
    public $last_name;
    public $company_name;
    public $country;
    public $street_address;
    public $city;
    public $state;
    public $postcode;
    public $phone;
    public $email;
    public $amount;


    public $promocode;

    protected $rules = [
        'first_name' =>'required|string',
        'last_name' => 'required|string',
        'company_name' => 'nullable|string',
        'country' =>'required|string',
        'street_address' =>'required|string',
        'city' =>'required|string',
        'state' =>'required|string',
        'postcode' =>'required|string',
        'phone' =>'required|integer|max:15|min:10',
        'email' =>'required|string|email',
    ];
    protected $listeners = ['cart_updated' => 'render'];
    
    public function render(){
        $cart = Cart::content();
        $totals = Cart::total();
        $this->amount = str_replace(',', '',Cart::total())+0;
        return view('livewire.checkout')
            ->with('cart', $cart)
            ->with('totals', $totals);
    }

    public function submit(){
        $validData = $this->validate($this->rules);
        if ($validData) {
            # persist to database
        }
    }

    public function submitpromocode(){
        $validData = $this->validate([
            'promocode' => 'required'
        ]);

        if ($validData) {
            # check if valid
        };
    }
}
