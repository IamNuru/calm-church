<div>
    <form class="" wire:submit.prevent="submit">
        @if (session()->has('success'))
            <p class="text-green-600 text-center">{{session()->get('success') }}</p>
        @endif
        @csrf
        <div class="row row-25 row-gutters-24">
            <div class="col-md-4">
                <div class="form-group">
                    <input wire:model="name" id="name" class="form-control" type="text" name="name" placeholder="Your Name*" >
                    
                    <x-jet-input-error for="name" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input wire:model="phone" id="phone" class="form-control" type="text" name="phone" placeholder="Phone*">
                    <x-jet-input-error for="phone" />
                   
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input wire:model="email" id="email" class="form-control" type="email" name="email" placeholder="E-mail*" >
                    <x-jet-input-error for="email" />
                    
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <textarea wire:model="message" id="message" class="form-control" name="message" placeholder="Message"></textarea>
                    <x-jet-input-error for="message" />
                    
                </div>
            </div>
            <div class="col-sm-12">
                <button class="btn" type="submit">Make an appointment</button>
            </div>
        </div>
    </form>
</div>
