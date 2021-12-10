<form wire:submit.prevent="submit" style="">
<div class="product-overview-filter-form">
    <div class="row row-5 row-gutters-5">
      <div class="col-6 col-sm-4 col-md-5 col-xl-3">
        <div class="form-group">
          <input wire:model="qty" class="form-control" 
          type="number" name="qty" id="qty" min="1">
        </div>
        {{-- <div class="form-group">
          <input wire:model="qty" class="form-control input-spinner" 
          data-spinner type="number" name="qty" value="1">
        </div> --}}
      </div>
      <div class="col-6 col-sm-4 col-md-5 col-xl-3">
        <button class="btn btn-block" type="submit">{{$isInCart ? 'Update Cart' : 'Add to Cart'}}</button>
      </div>
    </div>
</div>
<span class="text-xs text-red-600">{{$errorMessage}}</span>
</form>
<script>
    // Select your input element.
var qty = document.getElementById('qty');

// Listen for input event on numInput.
qty.onkeydown = function(e) {
    if(!((e.keyCode > 95 && e.keyCode < 106)
      || (e.keyCode > 47 && e.keyCode < 58) 
      || e.keyCode == 8)) {
        return false;
    }
}

</script>