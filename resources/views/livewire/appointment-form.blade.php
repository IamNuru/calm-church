<form class="rd-mailform rd-form" wire:submit.prevent="submit">
    @if (session()->has('success'))
        <p class="text-green-600 text-center">{{session()->get('success') }}</p>
    @endif
    @csrf
    <div class="row row-20 row-gutters-20">
      <div class="col-sm-6 col-lg-3" >
        <div class="form-group">
          <input class="form-control" wire:model="name" type="text" name="name" placeholder="Your Name*" required>
          <x-jet-input-error for="name" />
        </div>
      </div>

      <div class="col-sm-6 col-lg-3">
        <div class="form-group">
          <input class="form-control" wire:model="email" type="email" name="email" placeholder="Your E-mail*" required>
            <x-jet-input-error for="email" />
        </div>
      </div>

      <div class="col-sm-6 col-lg-3">
        <div class="form-group">
          <select name="subject" wire:model="subject" id="subject" class="form-control" required>
            <option value="" disabled selected>Subject</option>
            <option value="relationship">Relationship</option>
            <option value="faith">Faith</option>
          </select>
            <x-jet-input-error for="subject" />
        </div>
      </div>

      <div class="col-sm-6 col-lg-3">
        <div class="form-group">
          <input class="form-control" wire:model="phone" type="text" name="phone" placeholder="Your Phone*" required>
            <x-jet-input-error for="phone" />
        </div>
      </div>

      <div class="col-sm-6 col-lg-3">
        <button class="btn btn-block" type="submit">Make an appointment</button>
      </div>
    </div>
  </form>