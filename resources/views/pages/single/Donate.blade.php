@extends('layouts.main')
@section('head')
@if ($donation)
<title>{{$donation->title}}</title>
@endsection
@section('main')

<div class="page">
    <!-- Page title-->
    <section class="section page-title bg-image context-dark" style="background-image: url({{asset('images/blog/donation.jpg')}});">
      <!--RD Navbar-->
      @include('inc.navbar')
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-xl-8">
            <h2 class="page-title-text">Donate</h2>
          </div>
        </div>
      </div>
    </section>
    <section class="section-md bg-100">
        <div class="container">
          <div class="row row-50 justify-content-between">
            <div class="col-md-6">
              <h3 class="h3-big">Select Your Donation Method</h3>
              <div class="mt-4">
                <div class="custom-control custom-radio custom-control-inline">
                  <input class="custom-control-input" id="customRadioInline1" type="radio" name="customRadioInline1">
                  <label class="custom-control-label" for="customRadioInline1">Test Donation</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input class="custom-control-input" id="customRadioInline2" type="radio" name="customRadioInline1">
                  <label class="custom-control-label" for="customRadioInline2">Offline Donation</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input class="custom-control-input" id="customRadioInline3" type="radio" name="customRadioInline1">
                  <label class="custom-control-label" for="customRadioInline3">PayPal</label>
                </div>
              </div>
              <div class="group-25 mt-4 d-flex align-items-start flex-column flex-sm-row">
                <img class="rounded-circle" 
                src="{{$donation->image?asset(config('church.storageImageUrl').'/donations/'.$donation->image)
                :(asset('storage/images/donations/noimage.png'))}}" 
                style="width: 125px; height: 125px; object-fit: cover"
                alt="" width="125" height="125"/>
                <div>
                  <p>{{ strip_tags($donation->description) }}</p>
                  <h4 class="text-primary mt-3">Jane Peters</h4>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-5">
              <form class="" action="{{route('pay.donation', $donation->id)}}" method="post">
                @csrf
                <x-jet-validation-errors class="mb-4" style="color: rgb(245, 73, 73)" />
                @if(session()->has('successdonate'))
                    <div class="w-full text-center" style="color: rgb(14, 221, 169); font-size:1.2rem;">
                        {{ session()->get('successdonate') }}
                    </div>
                @endif
                <div class="row row-15">
                  <div class="col-12">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend"> 
                          <div class="input-group-text">$</div>
                        </div>
                        <input class="form-control" type="number" name="amount" placeholder="200.00" data-constraints="@Numeric @Required">
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <input class="form-control" type="text" name="first_name" placeholder="Your Name*" data-constraints="@Required">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <input class="form-control" type="text" name="last_name" placeholder="Last Name*" data-constraints="@Required">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <input class="form-control" type="email" name="email" placeholder="E-mail*" data-constraints="@Email @Required">
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="btn" type="submit" style="width: 100%">Make a Donation</button>
                  </div>
                </div>
              </form>
              <div class="form-output snackbar snackbar-primary" id="form-consultation"></div>
            </div>
          </div>
        </div>
      </section>
@else
  <div class="text-center">NOT FOUND</div>
@endif


<!-- Footer contact-->
@include('inc.footer')
</div>

<!-- Preloader -->
@include("inc.preloader")
@endsection