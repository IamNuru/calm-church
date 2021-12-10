@extends('layouts.main')
@section('head')
    <title>Member Name</title>
@endsection
@section('main')
<div class="page">
    <!-- Page title-->
    <section class="section page-title bg-image context-dark" style="background-image: url({{asset('images/background/bg-4-1920x496.jpg')}});">
      <!--RD Navbar-->
      @include('inc.navbar')
      
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-xl-8">
            <h2 class="page-title-text">{{$user->name}}</h2>
          </div>
        </div>
      </div>
    </section>

    <!-- Team member overview-->
    <section class="section-md bg-transparent">
        <div class="container">
          <div class="row row-30 justify-content-center justify-content-sm-between">
            <div class="col-8 col-8 col-md-6 col-lg-5 text-center text-md-left">
              <div class="image-block">
                <img src="{{asset($user->profile_photo_path ? 'storage/'.$user->profile_photo_path : 'images/person/no-image-avatar.jpeg')}}" 
                style="width: 469px; height:565px; object-fit:cover"
                alt="" width="469" height="565"/>
                <div class="image-block-embed">
                        <!-- Counter-->
                        <div class="counter">
                          <div class="counter-value"><span data-counter="">85</span><span class="counter-unit"></span>
                          </div>
                          <div class="counter-title">Sermons</div>
                        </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="group-5 d-flex flex-wrap align-items-center justify-content-between">
                <h3 class="h3-big">{{$user->name}}</h3>
                <ul class="list list-inline">
                  <li class="list-inline-item"><a class="icon icon-md icon-link-gray mdi mdi-facebook" href="#"></a></li>
                  <li class="list-inline-item"><a class="icon icon-md icon-link-gray mdi mdi-youtube-play" href="#"></a></li>
                  <li class="list-inline-item"><a class="icon icon-md icon-link-gray mdi mdi-twitter" href="#"></a></li>
                </ul>
              </div>
              <p>{{$user->biography}}</p>
              <div class="address">
                <table>
                  <tr>
                    <td class="address-title">Phone:</td>
                    <td class="big"><a class="link link-inherit" href="tel:{{$user->phone ? $user->phone : 'null'}}">{{$user->phone ? $user->phone : 'null'}}</a></td>
                  </tr>
                  <tr>
                    <td class="address-title">E-Mail:</td>
                    <td><a class="link link-inherit" href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                  </tr>
                  <tr>
                    <td class="address-title">Address:</td>
                    <td>{{$user->address ? $user->address : config('church.address')}}</td>
                  </tr>
                </table>
              </div>
              <div class="row row-content row-5 h4">
                <div class="">
                  <ul class="list list-divided list-divided-sm row">
                    @foreach ($sermonCategories as $sermonCat)
                    <li class="list-item col-md-6">{{$sermonCat->name}}</li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
      <!-- Team member experience-->
    <section class="section-md bg-100">
        <div class="container">
          <div class="row row-30 justify-content-between align-items-end">
            <div class="col-md-6">
              <div class="text-block-2">
                <h3 class="h3-big">Personal Experience</h3>
                <p>{{$user->biography}}</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="text-block-2">
                <div class="text-small text-primary text-divider text-divider-wide">10+ years of experience</div>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
              </div>
            </div>
            <div class="col-md-11">
                    <!-- Quote default-->
                    <div class="quote quote-default quote-default-light quote-default-light">
                      <svg class="quote-icon" width="35" height="27" viewBox="0 0 35 27">
                        <path d="M17.9871 18.2009C17.9871 16.1116 18.4035 14.0625 19.2362 12.0536C20.1522 9.96429 21.2348 8.23662 22.4839 6.87055C23.733 5.50446 25.0238 4.29912 26.3561 3.25446C27.6885 2.12947 28.8126 1.32589 29.7287 0.843751C30.728 0.28125 31.3524 0 31.6023 0C32.6848 0 33.5177 0.723215 34.1006 2.16964C31.8521 3.45536 29.9785 4.98215 28.4796 6.75C27.0639 8.43752 26.1479 9.80359 25.7315 10.8482C25.3985 11.8125 25.2318 12.5759 25.2318 13.1384C25.2318 14.183 26.0647 15.6295 27.7301 17.4777C29.4788 19.2456 30.3533 20.692 30.3533 21.817C30.3533 23.2634 29.5206 24.509 27.855 25.5536C26.2728 26.5178 24.4407 27 22.359 27C21.443 27 20.5686 26.8795 19.7358 26.6384C18.57 25.0313 17.9871 22.2188 17.9871 18.2009ZM0 18.2009C0 16.1116 0.416367 14.0625 1.24911 12.0536C2.1651 9.96429 3.24768 8.23662 4.49679 6.87055C5.74587 5.50446 7.03662 4.29912 8.369 3.25446C9.78464 2.12947 10.9505 1.32589 11.8665 0.843751C12.8658 0.28125 13.4903 0 13.7401 0C14.7394 0 15.5305 0.723215 16.1134 2.16964C13.8651 3.45536 12.033 4.98215 10.6174 6.75C9.20174 8.43752 8.28573 9.80359 7.86936 10.8482C7.53627 11.8125 7.36971 12.5759 7.36971 13.1384C7.36971 14.183 8.20246 15.6295 9.86793 17.4777C11.6167 19.2456 12.4911 20.692 12.4911 21.817C12.4911 23.2634 11.6583 24.509 9.99283 25.5536C8.32736 26.5178 6.4537 27 4.37186 27C3.6224 27 2.78966 26.8795 1.87366 26.6384C0.624552 24.8707 0 22.0581 0 18.2009Z"></path>
                      </svg>
                      <div class="quote-body">
                        <q class="quote-text h3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod ut enim ad minim veniam sed do eiusmod tempor incididunt ut labore et dolore magna aliqua .</q>
                        <cite class="quote-cite">James Adams, Parishioner</cite>
                      </div>
                    </div>
            </div>
            <div class="col-md-12"><a class="btn btn-outline" href="#appointment-form" data-anchor-link>Free Consultation</a></div>
          </div>
        </div>
    </section>
      <!-- Team member experience-->
    <section class="section-md bg-transparent">
        <div class="container">
          <div class="row row-30 justify-content-between">
            <div class="col-md-6">
              <h3 class="h3-big">Honors & Achievements</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <p>Ut enim ad minim veniam sed do eiusmod tempor. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam sed do eiusmod tempor.</p>
              <ul class="list list-ordered text-dark">
                <li class="list-item">Lorem ipsum dolor sit amet consectetur</li>
                <li class="list-item">Adipiscing elit sed do eiusmod</li>
                <li class="list-item">Dictum non consectetur a erat nam </li>
                <li class="list-item">Tellus molestie nunc non bland</li>
              </ul>
            </div>
            <div class="col-md-6">
              <h3 class="h3-big">Personal Skills</h3>
                    <!-- Linear progress bar-->
                    <div class="progress-linear">
                      <div class="progress-linear-title h4">Public Speaking<span class="progress-linear-counter-wrap"><span class="progress-linear-counter">88</span>%</span>
                      </div>
                      <div class="progress-linear-body">
                        <div class="progress-linear-bar"></div>
                      </div>
                    </div>
                    <!-- Linear progress bar-->
                    <div class="progress-linear">
                      <div class="progress-linear-title h4">Spiritual Growth<span class="progress-linear-counter-wrap"><span class="progress-linear-counter">70</span>%</span>
                      </div>
                      <div class="progress-linear-body">
                        <div class="progress-linear-bar"></div>
                      </div>
                    </div>
                    <!-- Linear progress bar-->
                    <div class="progress-linear">
                      <div class="progress-linear-title h4">Counsel<span class="progress-linear-counter-wrap"><span class="progress-linear-counter">74</span>%</span>
                      </div>
                      <div class="progress-linear-body">
                        <div class="progress-linear-bar"></div>
                      </div>
                    </div>
                    <!-- Linear progress bar-->
                    <div class="progress-linear">
                      <div class="progress-linear-title h4">Christian Education<span class="progress-linear-counter-wrap"><span class="progress-linear-counter">68</span>%</span>
                      </div>
                      <div class="progress-linear-body">
                        <div class="progress-linear-bar"></div>
                      </div>
                    </div>
            </div>
          </div>
        </div>
    </section>
      <!-- Team member experience-->
    <section class="section-md bg-900 context-dark" id="appointment-form">
        <div class="container">
          <div class="row row-5 align-items-baseline">
            <div class="col-lg-6">
              <h2>Free Consultation</h2>
            </div>
            <div class="col-lg-6">
              <h3 class="font-italic font-secondary" style="opacity: .6">Excellent legal assistance without stress</h3>
            </div>
          </div>
          <livewire:appointment-form>
          <div class="form-output snackbar snackbar-primary" id="form-appointment"></div>
        </div>
    </section>
      <!-- Blog carousel-->
    <section class="section-md bg-transparent">
        <div class="container">
          <div class="row row-5 align-items-center">
            <div class="col-md-5" data-animate='{"class":"fadeIn"}'>
              <h2>New Sermons</h2>
            </div>
            <div class="col-md-7" data-animate='{"class":"fadeIn","delay":".2s"}'>
              <p class="big">Explore & listen to the latest seermons by our church’s pastors added daily and available for download in all popular formats.</p>
            </div>
          </div>
          <!-- Swiper slider-->
          <div class="swiper-carousel">
            <div class="swiper-container" data-swiper='{"breakpoints":{"576":{"slidesPerView":2,"spaceBetween":15},"768":{"slidesPerView":3,"spaceBetween":30}},"loop":false,"pagination":{"type":"custom"}}'>
              <!-- Additional required wrapper-->
              <div class="swiper-wrapper">
                <!-- Slides-->
                @foreach ($sermons as $sermon)
                <div class="swiper-slide">
                  <!-- Post-->
                  <div class="post post-shadow" style="height: 480px; overflow:auto">
                    <a class="post-media" href="{{route('single.post', $sermon->slug)}}">
                      <img src="{{$sermon->image?(asset(config('church.storageImageUrl').'sermons/'.$sermon->image))
                      :(asset('storage/images/posts/noimage.png'))}}" 
                      style="height: 257px; width:370px; object-fit:cover"
                      alt="" width="370" height="257"/>
                      <div class="post-hover-btn">View</div></a>
                    <div class="post-content">
                      <div class="post-tags group-5 text-small"><a class="post-tag" href="{{route('pages.sermons')}}">Sermons</a></div>
                      <h4 class="post-title text-divider"><a href="">{{$sermon->title}}</a></h4>
                      <div class="post-date">{{$sermon->created_at->isoFormat('DD MMM YYYY')}}</div>
                    </div>
                  </div>
                </div>
                @endforeach
                
              </div>
              <div class="swiper-controls">
                <!-- Pagination-->
                <div class="swiper-pagination"></div>
                <!-- Scrollbar-->
                <div class="swiper-progress">
                  <div class="swiper-progress-bar"></div>
                </div>
                <!-- Navigation-->
                <div class="swiper-buttons">
                  <div class="swiper-button-prev mdi-chevron-left"></div>
                  <div class="swiper-button-next mdi-chevron-right"></div>
                </div>
              </div>
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