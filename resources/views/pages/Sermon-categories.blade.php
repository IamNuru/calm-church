<x-guest-layout>
@extends('layouts.main')
@section('head')
<title>Sermons</title>
@endsection
@section('main')

<div class="page">
    <!-- Page title-->
    <section class="section page-title bg-image context-dark" style="background-image: url(images/background/bg-4-1920x496.jpg);">
      <!--RD Navbar-->
      @include('inc.navbar')
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-xl-8">
            <h2 class="page-title-text">Sermon Categories</h2>
          </div>
        </div>
      </div>
    </section>
    <section class="section-md bg-transparent">
        <div class="container">
          @if (count($sermons) > 0)
          <div class="row row-40 row-xl-55 row-xxl-100">
            @foreach ($sermons as $sermon)
            <div class="col-sm-6 col-lg-4">
                    <!-- Thumbnail-->
                    <div class="thumbnail thumbnail-simple"><a class="thumbnail-media" href="single-sermon.html"><img src="images/image-3-370x266.jpg" alt="" width="370" height="266"/></a>
                      <div class="thumbnail-body">
                        <h3 class="thumbnail-title"><a href="single-sermon.html">{{$sermon->name}}</a></h3>
                        <div class="thumbnail-text">{{$sermon->description}}</div><a class="thumbnail-link" href="single-sermon.html">Explore</a>
                      </div>
                    </div>
            </div>
            @endforeach
          </div>
          @else
          <div class="text-center">No sermon categories yet</div>
          @endif
        </div>
      </section>
      <!-- Our goals-->
      <section class="section-md bg-100" id="consultation-form">
        <div class="container">
          <div class="row row-30 justify-content-xl-between">
            <div class="col-md-6 col-xl-5 text-center text-md-left" data-animate='{"class":"fadeInLeftBig"}'>
              <div class="image-block"><img src="images/image-11-357x494.jpg" alt="" width="357" height="494"/>
                <div class="image-block-embed">
                  <h3 class="text-primary">16:00</h3>
                  <p class="small">November<br>12, 2021</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-7 col-xxl-6">
              <h2 data-animate='{"class":"fadeInRightBig"}'>Come visit Us</h2>
              <p class="big" data-animate='{"class":"fadeInRightBig","delay":".1"}'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
              <div class="row row-5 row-content" data-animate='{"class":"fadeInRightBig","delay":".2"}'>
                <div class="col-sm-6">
                  <ul class="list list-marked">
                    <li class="list-item">Prayer;</li>
                    <li class="list-item">Singing;</li>
                  </ul>
                </div>
                <div class="col-sm-6">
                  <ul class="list list-marked">
                    <li class="list-item">Giving;</li>
                    <li class="list-item">The Bible Study.</li>
                  </ul>
                </div>
              </div>
              <div class="divider divider-sm" data-animate='{"class":"fadeInRightBig","delay":".3"}'></div>
              <h4 data-animate='{"class":"fadeInRightBig","delay":".4"}'>Get a free consultation</h4>
              <livewire:appointment-form>
              <div class="form-output snackbar snackbar-primary" id="form-consultation"></div>
            </div>
          </div>
        </div>
      </section>
      <!-- Awards-->
      <section class="section-sm bg-transparent text-center">
        <div class="container">
          <div class="owl-carousel owl-vertical-center owl-content-1" data-owl="{&quot;dots&quot;:true}" data-items="2" data-sm-items="3" data-md-items="4"><img src="images/logo/logo-1-157x39.png" alt="" width="157" height="39"/><img src="images/logo/logo-2-95x25.png" alt="" width="95" height="25"/><img src="images/logo/logo-3-92x39.png" alt="" width="92" height="39"/><img src="images/logo/logo-4-116x33.png" alt="" width="116" height="33"/>
          </div>
        </div>
      </section>


<!-- Footer contact-->
@include('inc.footer')
</div>

<!-- Preloader -->
@include("inc.preloader")
@endsection
</x-guest-layout>