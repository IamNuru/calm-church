<x-guest-layout>
@extends('layouts.main')
@section('head')
<title>{{$sermon->title}}</title>
@endsection
@section('main')

<div class="page">
    <!-- Page title-->
    <section class="section page-title bg-image context-dark" style="background-image: url(/images/blog/sermon.jpg);">
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
    @if ($sermon)
    <section class="section-md bg-transparent">
      <div class="container">
        <div class="row row-30 row-xl-55 row-xxl-100 justify-content-between">
          <div class="col-md-8">
            <img src="{{$sermon->image?asset(config('church.storageImageUrl').'sermons/'.$sermon->image)
            :(asset('storage/images/sermons/noimage.png'))}}" 
            style="width: 769px; height: 431px;"
            alt="{{$sermon->title}}" width="769" height="431"/>
            <h3 class="h3-big">{{$sermon->title}}</h3>
            {{ strip_tags($sermon->description)}}
          </div>
          <div class="col-md-4 col-xl-3">
            <h3 class="text-primary">Sermons</h3>'
            @if (count($sermons) > 0)
            <ul class="list list-divided list-divided-sm big">
              @foreach ($sermons as $item)
              <li class="list-item"><a class="link link-arrow" href="{{route('singlesermon',$item->slug)}}">{{$item->name}}</a></li>
              @endforeach
            </ul>
            @else
              <div class="" style="text-align: center">No sermons</div>
            @endif
            <a class="btn btn-block" href="#consultation-form">Get in Touch</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Practice-->
    @if (count($sermon->sermonMessages) > 0)
    <section class="section-md bg-900 context-dark">
      <div class="container">
        <div class="owl-carousel owl-quote" data-owl="{&quot;dots&quot;:true}" data-items="1">
                @foreach ($sermon->sermonMessages as $serM)
                <div class="quote quote-large">
                  <div class="quote-icon">
                    <svg class="quote-icon-face" width="266" height="217" viewBox="0 0 266 217">
                      <path d="M205.904 26.5452L205.911 26.5394L205.918 26.5334C216.3 17.5017 225.037 11.0705 232.135 7.22079L232.142 7.21738L232.148 7.21379C236.04 4.95663 239.192 3.26985 241.608 2.14887C242.816 1.58828 243.832 1.17284 244.66 0.898439C245.497 0.621039 246.106 0.5 246.512 0.5C254.562 0.5 260.874 5.95131 265.378 17.2242C247.958 27.5387 233.419 39.774 221.768 53.9323L221.766 53.9343C210.715 67.5069 203.528 78.5356 200.251 87.0072L200.247 87.0179L200.244 87.0287C197.641 94.7955 196.32 100.992 196.32 105.594C196.32 109.913 197.988 115.006 201.256 120.853C204.527 126.707 209.423 133.356 215.931 140.798L215.939 140.807L215.947 140.815C222.751 147.903 227.839 154.33 231.222 160.097C234.608 165.868 236.269 170.945 236.269 175.344C236.269 186.744 229.913 196.617 217.012 204.954C204.76 212.646 190.564 216.5 174.411 216.5C167.372 216.5 160.655 215.554 154.258 213.664C145.325 200.859 140.808 178.439 140.808 146.281C140.808 129.558 144.042 113.154 150.513 97.0664C157.642 80.3148 166.059 66.48 175.759 55.5508C185.485 44.5901 195.534 34.9222 205.904 26.5452ZM65.5962 26.5452L65.5988 26.5431C76.6324 17.5089 85.6981 11.0736 92.8025 7.22079L92.8088 7.21737L92.815 7.21378C96.7068 4.95663 99.8585 3.26985 102.275 2.14887C103.483 1.58828 104.499 1.17284 105.327 0.898442C106.164 0.621039 106.773 0.5 107.179 0.5C114.571 0.5 120.565 5.929 125.07 17.2241C107.654 27.5389 93.4375 39.776 82.4292 53.9386C71.3805 67.5092 64.1951 78.5365 60.9183 87.0072L60.9142 87.0178L60.9106 87.0286C58.3066 94.7955 56.9871 100.992 56.9871 105.594C56.9871 109.913 58.655 115.006 61.9225 120.853C65.1934 126.707 70.0892 133.356 76.598 140.798L76.6057 140.807L76.6137 140.815C83.4183 147.903 88.5056 154.33 91.8893 160.097C95.2751 165.868 96.9359 170.945 96.9359 175.344C96.9359 186.743 90.5813 196.614 77.6849 204.951C64.7785 212.647 50.2553 216.5 34.1025 216.5C28.3588 216.5 21.9671 215.556 14.9241 213.659C5.33623 199.569 0.5 177.14 0.5 146.281C0.5 129.557 3.7341 113.154 10.2056 97.0663C17.3342 80.3148 25.7516 66.48 35.451 55.5507C45.1779 44.5901 55.2265 34.9222 65.5962 26.5452Z"></path>
                    </svg>
                    <svg class="quote-icon-shadow" width="266" height="217" viewBox="0 0 266 217">
                      <path d="M205.904 26.5452L205.911 26.5394L205.918 26.5334C216.3 17.5017 225.037 11.0705 232.135 7.22079L232.142 7.21738L232.148 7.21379C236.04 4.95663 239.192 3.26985 241.608 2.14887C242.816 1.58828 243.832 1.17284 244.66 0.898439C245.497 0.621039 246.106 0.5 246.512 0.5C254.562 0.5 260.874 5.95131 265.378 17.2242C247.958 27.5387 233.419 39.774 221.768 53.9323L221.766 53.9343C210.715 67.5069 203.528 78.5356 200.251 87.0072L200.247 87.0179L200.244 87.0287C197.641 94.7955 196.32 100.992 196.32 105.594C196.32 109.913 197.988 115.006 201.256 120.853C204.527 126.707 209.423 133.356 215.931 140.798L215.939 140.807L215.947 140.815C222.751 147.903 227.839 154.33 231.222 160.097C234.608 165.868 236.269 170.945 236.269 175.344C236.269 186.744 229.913 196.617 217.012 204.954C204.76 212.646 190.564 216.5 174.411 216.5C167.372 216.5 160.655 215.554 154.258 213.664C145.325 200.859 140.808 178.439 140.808 146.281C140.808 129.558 144.042 113.154 150.513 97.0664C157.642 80.3148 166.059 66.48 175.759 55.5508C185.485 44.5901 195.534 34.9222 205.904 26.5452ZM65.5962 26.5452L65.5988 26.5431C76.6324 17.5089 85.6981 11.0736 92.8025 7.22079L92.8088 7.21737L92.815 7.21378C96.7068 4.95663 99.8585 3.26985 102.275 2.14887C103.483 1.58828 104.499 1.17284 105.327 0.898442C106.164 0.621039 106.773 0.5 107.179 0.5C114.571 0.5 120.565 5.929 125.07 17.2241C107.654 27.5389 93.4375 39.776 82.4292 53.9386C71.3805 67.5092 64.1951 78.5365 60.9183 87.0072L60.9142 87.0178L60.9106 87.0286C58.3066 94.7955 56.9871 100.992 56.9871 105.594C56.9871 109.913 58.655 115.006 61.9225 120.853C65.1934 126.707 70.0892 133.356 76.598 140.798L76.6057 140.807L76.6137 140.815C83.4183 147.903 88.5056 154.33 91.8893 160.097C95.2751 165.868 96.9359 170.945 96.9359 175.344C96.9359 186.743 90.5813 196.614 77.6849 204.951C64.7785 212.647 50.2553 216.5 34.1025 216.5C28.3588 216.5 21.9671 215.556 14.9241 213.659C5.33623 199.569 0.5 177.14 0.5 146.281C0.5 129.557 3.7341 113.154 10.2056 97.0663C17.3342 80.3148 25.7516 66.48 35.451 55.5507C45.1779 44.5901 55.2265 34.9222 65.5962 26.5452Z"></path>
                    </svg>
                  </div>
                  <div class="quote-body">
                    <q class="quote-text h3 h3-big">{{$serM->message}}</q>
                    <div class="quote-person">
                      <img class="quote-img" src="{{$serM->user->profile_photo_path?asset($serM->user->profile_photo_path)
                      :(asset('storage/images/profile-photo/noimage.png'))}}" alt="" width="53" height="53"/>
                      <cite class="quote-cite big">by {{$serM->user->name}}, {{$serM->user->position}}</cite>
                    </div>
                  </div>
                </div>
                @endforeach
        </div>
      </div>
    </section>
    @endif
    @else
      <div class="text-center">NOT FOUND</div>
    @endif
    <!-- Consultation form-->
    {{-- <section class="section-md bg-100 text-center" id="consultation-form">
      <div class="container">
        <h2 data-animate='{"class":"fadeInUpBig"}'>Get in touch</h2>
        <div class="link-container" data-animate='{"class":"fadeInUpBig"}'><a class="link link-large" href="tel:#">800.567.1234</a></div>
        <form class="rd-mailform "
            method="post" 
            action="{{route('bookappointment')}}" >
          @csrf
          @if(session()->has('success'))
            <div class="w-full text-center text-purple-800 text-md">
                {{ session()->get('success') }}
            </div>
          @endif
          @if ($errors->any())
            <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>
              <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
          @endif
          <div class="row row-25 row-gutters-24">
            <div class="col-md-4">
              <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Your Name*" data-constraints="@Required">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input class="form-control" type="text" name="phone" placeholder="Phone*" data-constraints="@PhoneNumber @Required">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="E-mail*" data-constraints="@Email @Required">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <textarea class="form-control" name="message" placeholder="Message"></textarea>
              </div>
            </div>
            <div class="col-sm-12">
              <button class="btn" type="submit">Make an appointment</button>
            </div>
          </div>
        </form>
        <div class="form-output snackbar snackbar-primary" id="form-consultation"></div>
      </div>
    </section> --}}
    <section class="section-md bg-100 text-center" id="consultation-form">
      <div class="container">
        <h2 data-animate='{"class":"fadeInUpBig"}'>Get in touch</h2>
        <div class="link-container" data-animate='{"class":"fadeInUpBig"}'><a class="link link-large" href="tel:{{config('church.phone')}}">{{config('church.phone')}}</a></div>
        <livewire:contact-us>
      </div>
    </section>


<!-- Footer contact-->
@include('inc.footer')
</div>

<!-- Preloader -->
@include("inc.preloader")
@endsection
</x-guest-layout>