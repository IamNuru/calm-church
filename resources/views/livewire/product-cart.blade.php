<div class="navbar-subpanel-item">
    <button class="navbar-button navbar-cart-button mdi-cart" data-multi-switch='{"targets":".rd-navbar","scope":".rd-navbar","class":"navbar-cart-active","isolate":"[data-multi-switch]"}'><span class="navbar-button-badge">{{$cart->count()}}</span></button>
    <div class="navbar-aside navbar-cart">
        @if (count($cart))
        @foreach ($cart as $row)
        <div class="navbar-cart-item">
            <div class="navbar-cart-item-left"><a class="thumbnail-small" href="single-product.html">
                <img src="{{ $row->options->image ? asset('/storage/images/products/'.$row->options->image) : asset('/storage/images/products/noimage.png') }}" 
                style="width: 72px; height:91px; object-fit:cover"
                alt="" width="72" height="91"/></a></div>
            <div class="navbar-cart-item-body"><a class="navbar-cart-item-heading" href="single-product.html">{{$row->name}}</a>
                <div class="navbar-cart-item-price d-flex group-10 justify-content-between">
                <div>{{$row->qty}} x <span class="navbar-cart-item-price-value">${{$row->price}}</span>
                </div>
                    <button wire:click="deleteFromCart('{{$row->rowId}}')" class="navbar-cart-remove mdi-delete"></button>
                </div>
            </div>
        </div>
        @endforeach
        <div class="navbar-cart-total">Subtotal: ${{$totals}}</div><a class="btn btn-sm navbar-cart-btn" href="{{route('checkout')}}">Checkout</a>
        @else
        <div class="text-center">Cart is Empty</div>
        @endif
    </div>
</div>