<section class="section-md bg-transparent">
    @if ($cart->count())
        <div class="container">
            <h3 class="h3-big text-center">Checkout</h3>
            <form class="row row-40 row-xl-55 justify-content-between row-offset-md" 
            {{-- wire:submit.prevent="submit" --}} 
            action="{{route('pay')}}" method="POST" >
            @csrf

            @if(session()->has('msg'))
                    <div class="w-full text-center text-purple-800 text-md">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="col-md-6">
                    <h3>Billing details</h3>
                    <div class="rd-form" >
                        <div class="row row-15 row-gutters-15">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="first_name"
                                        placeholder="First Name*" data-constraints="@Required">
                                    <x-jet-input-error for="first_name" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="last_name"
                                        placeholder="Last Name*" data-constraints="@Required">
                                    <x-jet-input-error for="last_name" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="company_name"
                                        placeholder="Company Name (optional)">
                                    <x-jet-input-error for="company_name" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group w-full">
                                    <div class="select-wrap w-full">
                                        <select class="select2 w-full" name="country" 
                                            data-constraints="@Required">
                                            <option>USA</option>
                                            <option>United Kingdom</option>
                                            <option>Germany</option>
                                            <option>Spain</option>
                                            <option>France</option>
                                            <option>Germany</option>
                                        </select>
                                    </div>
                                    <x-jet-input-error for="country" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="street_address"
                                        placeholder="Street Address*" data-constraints="@Required">
                                    <x-jet-input-error for="street_address" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="city"
                                        placeholder="Town / City*" data-constraints="@Required">
                                    <x-jet-input-error for="city" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="state"
                                        placeholder="State / Country*" data-constraints="@Required">
                                    <x-jet-input-error for="state" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="postcode"
                                        placeholder="Postcode / ZIP*" data-constraints="@Required">
                                    <x-jet-input-error for="postcode" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="phone" placeholder="Phone*"
                                        data-constraints="@PhoneNumber @Required">
                                    <x-jet-input-error for="phone" />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email"
                                        placeholder="Your E-mail*" data-constraints="@Email @Required">
                                    <x-jet-input-error for="email" />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" name="amount" wire:model="amount">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <h3>Do you have a promotional code?</h3>
                    <div class="rd-form">
                        <div class="row row-15 row-gutters-15">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="promocode"
                                        placeholder="Enter Promocode">
                                    <x-jet-input-error for="promocode" />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button class="btn" wire:click="submitpromocode">Apply coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <h3>Your order</h3>
                    <table class="table table-filled table-align-1">
                        <tr class="text-small">
                            <td>Product</td>
                            <td>price</td>
                        </tr>
                        @foreach ($cart as $row)
                            <tr>
                                <td>{{ $row->name }} <span
                                        class="text-primary">{{ $row->qty > 1 ? 'x' . $row->qty : '' }}</span></td>
                                <td>${{ $row->price }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="text-small">Subtotal</td>
                            <td>${{ $totals }}</td>
                        </tr>
                        <tr>
                            <td class="text-small">Total</td>
                            <td>${{ $totals }}</td>
                        </tr>
                    </table>
                    <button class="btn">place order</button>
                </div>
            </form>
        </div>
    @else
        <div class="text-center">Cart is currently empty</div>
    @endif
</section>
