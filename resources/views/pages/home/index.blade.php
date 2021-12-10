<x-guest-layout>
@extends('layouts.main')
    @section('head')
        <title>{{config('app.name')}}</title>
        
    @endsection
    @section('main')
    <div class="page">
        <!-- Intro slider-->
        <section class="intro intro-line context-dark">
          <!--RD Navbar-->
          @include('inc.homeNavbar')
          <div class="intro-line-table" style="box-shadow: inset 0 0 0 1000px rgba(0,0,0,.5);">
            <div class="intro-line-row">
              <div class="intro-line-col"></div>
              <div class="intro-line-col intro-line-col-center"></div>
              <div class="intro-line-col"></div>
            </div>
            <div class="intro-line-row intro-line-content">
              <div class="intro-line-col"></div>
              <div class="intro-line-col intro-line-col-center"></div>
              <div class="intro-line-col"></div>
            </div>
            <div class="intro-line-row">
              <div class="intro-line-col"></div>
              <div class="intro-line-col intro-line-col-center intro-line-footer">
                <div class="container" data-animate='{"class":"fadeIn"}'>
                  <div class="row row-25">
                    <div class="col-lg-9 col-xl-7 text-center text-lg-left">
                            <!-- Blurb link-->
                            <div class="blurb blurb-link-2">
                              <div class="blurb-icon text-white linearicons-compass2"></div>
                              <div class="blurb-content">
                                <h4 class="blurb-title"><a href="{{route('contact-us')}}">{{config("church.address")}}</a></h4>
                                <div class="blurb-subtitle">Feel free to visit our firm’s office at any time.</div>
                              </div>
                            </div>
                    </div>
                    <div class="col-lg-3 col-xl-5 text-center text-lg-right">
                      <div class="group-15 group-lg-30"><a class="icon icon-md icon-link icon-link-gray mdi-facebook" href="#"></a><a class="icon icon-md icon-link icon-link-gray mdi-linkedin" href="#"></a><a class="icon icon-md icon-link icon-link-gray mdi-twitter" href="#"></a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="intro-line-col"></div>
            </div>
          </div>
          <!-- Swiper slider-->
          <div class="swiper-container swiper-numbered" data-swiper>
            <!-- Additional required wrapper-->
            <div class="swiper-wrapper">
              <!-- Slides-->
              <div class="swiper-slide" style="background-image: url( images/blog/h5.jpg )">
                <div class="intro-line-container">
                  <div class="container" style="background: black; opacity: 0.8; padding: 5px;">
                    <div class="row">
                      <div class="col-md-10 col-lg-7">
                        <h3 class="font-italic font-secondary"> Welcome to Our Church</h3>
                        <h1>Join the prayer</h1>
                        <p class="big">Calm Church is a Family of Faith that is committed to Bible teaching and joyful worship for children, youth and adults of all ages.</p><a class="btn btn-white" href="#">See More</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide" style="background-image: url( images/blog/h3.jpeg )">
                <div class="intro-line-container">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-10 col-lg-7">
                        <h3 class="font-italic font-secondary"> Reconnect with the Creator</h3>
                        <h1>Connect & Grow</h1>
                        <p class="big">Our church is a perfect place for all local residents to come in with their families and join for a prayer and a newfound peace of mind.</p><a class="btn btn-white" href="#">See More</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide" style="background-image: url( images/blog/h4.jpeg )">
                <div class="intro-line-container">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-10 col-lg-7">
                        <h3 class="font-italic font-secondary"> Embrace Your Faith</h3>
                        <h1>Share the love</h1>
                        <p class="big">At our church, we help people to find their way back to God. We accomplish this by reaching people far from God.</p><a class="btn btn-white" href="#">See More</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pagination-->
            <div class="swiper-pagination"></div>
          </div>
        </section>
        <!-- Cases-->
        <section class="section-lg bg-100 text-center">
          <div class="container container-wide">
            <div class="row row-40 row-xl-55 row-xxl-100 row-offset-md">
              <div class="col-sm-6 col-lg-3" data-animate='{"class":"fadeInUpBig"}'>
                      <!-- Thumbnail-->
                      <div class="thumbnail thumbnail-light"><a class="thumbnail-media" href="#">
                        <img src="{{ asset('images/background/biblereading.jpg') }}" 
                        style="width: 425px; height:230px; object-fit: cover"
                        alt="" width="425" height="338"/></a>
                        <div class="thumbnail-subtitle">Explore the Bible with Us</div>
                        <h4 class="thumbnail-title"><a href="#">Bible Readings</a></h4>
                        <div class="thumbnail-divider"></div>
                      </div>
              </div>
              <div class="col-sm-6 col-lg-3" data-animate='{"class":"fadeInUpBig","delay":".15s"}'>
                      <!-- Thumbnail-->
                      <div class="thumbnail thumbnail-light"><a class="thumbnail-media" href="#">
                        <img src="{{ asset('images/background/ourevents.jpg') }}" 
                        style="width: 425px; height:230px; object-fit: cover"
                        alt="" width="425" height="338"/></a>
                        <div class="thumbnail-subtitle">Take Part</div>
                        <h4 class="thumbnail-title"><a href="#">Our Events</a></h4>
                        <div class="thumbnail-divider"></div>
                      </div>
              </div>
              <div class="col-sm-6 col-lg-3" data-animate='{"class":"fadeInUpBig","delay":".3s"}'>
                      <!-- Thumbnail-->
                      <div class="thumbnail thumbnail-light"><a class="thumbnail-media" href="#">
                        <img src="{{ asset('images/background/ourchurch.jpg') }}" 
                        style="width: 425px; height:230px; object-fit: cover"
                        alt="" width="425" height="338"/></a>
                        <div class="thumbnail-subtitle">Locations</div>
                        <h4 class="thumbnail-title"><a href="#">Our Church </a></h4>
                        <div class="thumbnail-divider"></div>
                      </div>
              </div>
              <div class="col-sm-6 col-lg-3" data-animate='{"class":"fadeInUpBig","delay":".45s"}'>
                      <!-- Thumbnail-->
                      <div class="thumbnail thumbnail-light"><a class="thumbnail-media" href="#">
                        <img src="{{ asset('images/background/ourgroup.jpg') }}" 
                        style="width: 425px; height:230px; object-fit: cover"
                        alt="" width="425" height="338"/></a>
                        <div class="thumbnail-subtitle">Join Our Communities</div>
                        <h4 class="thumbnail-title"><a href="#">Our Groups</a></h4>
                        <div class="thumbnail-divider"></div>
                      </div>
              </div>
            </div>
          </div>
        </section>
        <!-- About us-->
        @include('pages.home.partials.aboutUS')
        <!-- Blog carousel-->
        @include('pages.home.partials.posts')
        <!-- Practice-->
        <section class="section-md bg-100">
          <div class="container">
            <div class="row row-40 justify-content-between align-items-center">
              <div class="col-md-5" data-animate='{"class":"fadeInLeftBig"}'>
                <div class="text-block-1">
                  <h2>Bringing Faith To Your Life for over 20 years</h2>
                  <p class="big">Calm Church is a caring, Christian family committed to sharing the love of Christ.</p>
                  <p class="big">To have a better understanding about how we impact the lives of our parishioners, read these recently submitted testimonials.</p><a class="btn btn-outline" href="#consultation-form" data-anchor-link>Learn More</a>
                </div>
              </div>
              <div class="col-md-7 col-xl-6" data-animate='{"class":"fadeInRightBig"}'>
                <div class="layout layout-3">
                  <div class="layout-media bg-image" style="background-image: url( {{asset('images/background/man1.jpg')}} )"></div>
                  <div class="layout-content bg-900 context-dark">
                    <div class="owl-carousel owl-quote-3" data-owl="{&quot;dots&quot;:true}" data-items="1">
                            <!-- Quote icon line-->
                            <div class="quote quote-line">
                              <q class="quote-text h4">I first came to this church when visiting my sister. For me, Calm is an oasis where I can be refreshed with living water. Every Sunday I come with expectation of what message I will receive from our Lord.</q>
                              <div class="quote-person">
                                <img class="quote-img" src="{{ asset('images/background/man2.jpg') }}" 
                                style="width: 53px; height: 53px; object-fit: cover"
                                alt="" width="53" height="53"/>
                                <cite class="quote-cite"><span class="quote-author">Edward Harrison, </span><span class="quote-position">Parishioner</span></cite>
                              </div>
                            </div>
                            <!-- Quote icon line-->
                            <div class="quote quote-line">
                              <q class="quote-text h4">For the first time in many years I have found a place at Calm Church. It's like coming home again where the people are so warm and friendly and are genuinely concerned about you.</q>
                              <div class="quote-person">
                                <img class="quote-img" src="{{ asset('images/background/woman1.jpg') }}" 
                                style="width: 53px; height: 53px; object-fit: cover"
                                alt="" width="53" height="53"/>
                                <cite class="quote-cite"><span class="quote-author">Kate Adams, </span><span class="quote-position">Parishioner</span></cite>
                              </div>
                            </div>
                            <!-- Quote icon line-->
                            <div class="quote quote-line">
                              <q class="quote-text h4">We attended our first Sunday here and we knew right away there was a uniqueness about this church. God used Calm Church to develop in us a stronger passion for him and a deeper relationship with him.</q>
                              <div class="quote-person">
                                <img class="quote-img" src="{{ asset('images/background/woman2.png') }}" 
                                style="width: 53px; height: 53px; object-fit: cover"
                                alt="" width="53" height="53"/>
                                <cite class="quote-cite"><span class="quote-author">James Wilson, </span><span class="quote-position">Parishioner</span></cite>
                              </div>
                            </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Our team-->
        @include('pages.home.partials.ourTeam')
        <!-- Practice-->
        <section class="section-sm">
          <div class="container">
            <div class="layout layout-2">
              <div class="layout-media bg-image" style="background-image: url({{asset('images/background/appstore.jpg')}})" data-animate='{"class":"fadeInUpBig"}'></div>
              <div class="layout-content bg-100" data-animate='{"class":"fadeInUpBig","delay":".2s"}'>
                <div class="text-block-1">
                  <h2>Download the App</h2>
                  <p class="big">To stay connected with our church and receive the latest news and updates from us, download the free Calm Church app that offers:</p>
                  <div class="row row-15">
                    <div class="col-sm-auto">
                      <ul class="list-marked">
                        <li class="list-item">Simple Donations</li>
                        <li class="list-item">Sermons</li>
                        <li class="list-item">Event Notifications</li>
                      </ul>
                    </div>
                    <div class="col-sm-6">
                      <ul class="list-marked">
                        <li class="list-item">Prayer Requests</li>
                        <li class="list-item">The Bible</li>
                      </ul>
                    </div>
                  </div>
                  <div class="mt-5 group-20"><a class="btn btn-outline btn-icon" href="#"><span class="mdi-apple icon"></span>Apple Store</a><a class="btn btn-outline btn-icon mt-0" href="#"><span class="icon mdi-google-play"></span>Apple Store</a></div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Team member experience-->
        @include('pages.home.partials.teamExperience')
        <!-- Awards-->
        @include('pages.home.partials.partners')
        
        <!-- Footer contact-->
        @include('inc.footer')
        <!-- coded by barber-->
      </div>
      <!-- Preloader-->
      @include("inc.preloader")
      
    @endsection
</x-guest-layout>
