<form class="rd-mailform rd-form" wire:submit.prevent="submit">
    @if (session()->has('success'))
        <p class="text-green-600 text-center">{{session()->get('success') }}</p>
    @endif
    @if (session()->has('error'))
        <p class="text-red-600 text-center">{{session()->get('error') }}</p>
    @endif
    <div class="row row-15 row-gutters-15">
        <div class="col-sm-6">
        <div class="form-group">
            <input wire:model="name" class="form-control" type="text" name="name" placeholder="Your Name*" data-constraints="@Required">
            <x-jet-input-error for="name" />
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
            <input wire:model="email" class="form-control" type="email" name="email" placeholder="Your E-mail*" data-constraints="@Email @Required">
            <x-jet-input-error for="email" />
        </div>
        </div>
        <div class="col-12">
        <div class="form-group">
            <textarea wire:model="message" class="form-control" name="comment" placeholder="Message"></textarea>
            <x-jet-input-error for="message" />
        </div>
        </div>
        <div class="col-12">
        <button class="btn" type="submit">Submit</button>
        </div>
    </div>
</form>