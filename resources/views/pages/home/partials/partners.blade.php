<section class="section-sm bg-100 text-center">
    <h4 class="text-center">Our Partners</h4>
    <div class="container">
      @if (count($data['partners']) > 0)
      <div class="owl-carousel owl-vertical-center owl-content-1" data-owl="{&quot;dots&quot;:true}" data-items="2" data-sm-items="3" data-md-items="4">
        @foreach ($data['partners'] as $parner)
        <img src="{{ asset('images/logo/logo-1-157x39.png') }}" alt="" width="157" height="39"/>
        @endforeach
        {{-- <img src="{{ asset('images/logo/logo-2-95x25.png') }}" alt="" width="95" height="25"/>
        <img src="{{ asset('images/logo/logo-3-92x39.png') }}" alt="" width="92" height="39"/>
        <img src="{{ asset('images/logo/logo-4-116x33.png') }}" alt="" width="116" height="33"/> --}}
      </div>
      @else
        <div class="text-center">No partners</div>
      @endif
    </div>
  </section>