<form class="rd-mailform rd-form" wire:submit.prevent="submit">
    @if (session()->has('success'))
        <p class="text-green-600 text-center">{{session()->get('success') }}</p>
    @endif
    <div class="row row-10">
      <div class="col-md-12">
        <div class="form-group">
          <input wire:model="email" class="form-control" type="email" name="email" placeholder="E-mail" data-constraints="@Email @Required">
          <x-jet-input-error for="email" />
        </div>
      </div>
      <div class="col-sm-12">
        <button class="btn btn-block" type="submit">Subscribe</button>
      </div>
    </div>
</form>