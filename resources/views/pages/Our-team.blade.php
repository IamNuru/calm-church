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
            <h2 class="page-title-text">Donate</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="section-md context-dark bg-900">
        <div class="container container-wide">
          <h2 class="text-center">Meet Our Team</h2>
          <div class="row row-5 row-gutters-5 row-offset-lg person-poster-container">
            <div class="col-sm-6 col-lg-3" data-animate='{"class":"fadeInUpBig"}'>
                    <!-- Person--><a class="person person-poster" href="/member/1">
                      <div class="person-media bg-image" style="background-image: url(images/person/person-1-458x538.jpg)">
                        <div class="person-btn mdi mdi-arrow-right"></div>
                      </div>
                      <div class="person-content">
                        <h3 class="person-title"><span>Edward Gray</span><span class="person-meta"> - Care Pastor</span></h3>
                        <div class="person-text text-decorated text-decorated-3">Edward Gray supports our community groups and helps new parishioners.</div>
                      </div></a>
            </div>
            <div class="col-sm-6 col-lg-3" data-animate='{"class":"fadeInUpBig","delay":".15s"}'>
                    <!-- Person--><a class="person person-poster" href="/member/1">
                      <div class="person-media bg-image" style="background-image: url(images/person/person-2-458x538.jpg)">
                        <div class="person-btn mdi mdi-arrow-right"></div>
                      </div>
                      <div class="person-content">
                        <h3 class="person-title"><span>Kate Lee</span><span class="person-meta"> - Campus Pastor</span></h3>
                        <div class="person-text text-decorated text-decorated-3">Kate supports our church ministries while also upholding Biblical priorities.</div>
                      </div></a>
            </div>
            <div class="col-sm-6 col-lg-3" data-animate='{"class":"fadeInUpBig","delay":".3s"}'>
                    <!-- Person--><a class="person person-poster" href="team-member.html">
                      <div class="person-media bg-image" style="background-image: url(images/person/person-3-458x538.jpg)">
                        <div class="person-btn mdi mdi-arrow-right"></div>
                      </div>
                      <div class="person-content">
                        <h3 class="person-title"><span>Harry Smith</span><span class="person-meta"> - Senior Pastor</span></h3>
                        <div class="person-text text-decorated text-decorated-3">Harry is our senior pastor who oversees church management in all areas.</div>
                      </div></a>
            </div>
              <div class="col-sm-6 col-lg-3" data-animate='{"class":"fadeInUpBig","delay":".45s"}'>
                  <!-- Person-->
                  <a class="person person-poster" href="team-member.html">
                      <div class="person-media bg-image" style="background-image: url(images/person/person-4-458x538.jpg)">
                          <div class="person-btn mdi mdi-arrow-right"></div>
                      </div>
                      <div class="person-content">
                          <h3 class="person-title"><span>Jane Peters</span><span class="person-meta"> - Youth Pastor</span></h3>
                          <div class="person-text text-decorated text-decorated-3">Harry is our senior pastor who oversees church management in all areas.</div>
                      </div>
                  </a>
              </div>
          </div>
        </div>
      </section>

<!-- Footer contact-->
@include('inc.footer')
</div>

<!-- Preloader -->
@include("inc.preloader")
@endsection