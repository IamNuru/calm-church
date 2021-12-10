@extends('layouts.main')
@section('head')
    <title>About Church</title>
@endsection
@section('main')
    <div class="page">
      <!-- Page title-->
      <section class="section page-title bg-image context-dark" style="background-image: url(images/blog/about.jpg);">
        <!--RD Navbar-->
        @include("inc.navbar")
        
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-xl-8">
              <h2 class="page-title-text">About Church</h2>
            </div>
          </div>
        </div>
      </section>
      <!-- About us-->
      <section class="section-md bg-transparent">
        <div class="container">
          <div class="row row-25 row-xl-55">
            <div class="col-md-10 col-lg-9">
              <h3 class="text-decorated text-decorated-large pl-4">Our church incorporates God’s family into our fellowship. We provide a warm, authentic community, welcoming new believers into the body of Christ through baptism.</h3>
            </div>
            <div class="col-md-6 col-lg-8">
              <p class="big">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.aliqua.</p>
            </div>
            <div class="col-md-6 col-lg-4">
              <p class="big">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam sed.</p>
            </div>
          </div>
        </div>
      </section>
      <!-- About us 2-->
      <section class="section-double">
        <section class="section-double-top section-md bg-100">
          <div class="container">
            <div class="row row-30">
              <div class="col-md-4">
                      <!-- Blurb hover-->
                      <div class="blurb blurb-icon-left">
                        <div class="blurb-header">
                          <div class="blurb-icon linearicons-heart"></div>
                          <div class="blurb-title h4">Joyful and Fun-Filled Fellowship</div>
                        </div>
                        <div class="blurb-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</div>
                      </div>
              </div>
              <div class="col-md-4">
                      <!-- Blurb hover-->
                      <div class="blurb blurb-icon-left">
                        <div class="blurb-header">
                          <div class="blurb-icon linearicons-mic2"></div>
                          <div class="blurb-title h4">We Worship and Praise God</div>
                        </div>
                        <div class="blurb-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</div>
                      </div>
              </div>
              <div class="col-md-4">
                      <!-- Blurb hover-->
                      <div class="blurb blurb-icon-left">
                        <div class="blurb-header">
                          <div class="blurb-icon linearicons-home3"></div>
                          <div class="blurb-title h4">Meeting the Needs of Our Community</div>
                        </div>
                        <div class="blurb-text">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos.</div>
                      </div>
              </div>
            </div>
          </div>
        </section>
        <section class="section-double-bottom section-md bg-transparent">
          <div class="container"><img class="img-single" src="images/blog/sermon.jpg" alt="" width="1170" height="386" style="height: 386px"/>
            <h3 class="h3-big">Sermons</h3>
            @if (count($data['sermons']) > 0)
            <div class="row col-30 h4">
              @foreach ($data['sermons'] as $sermon)
                <div class="col-sm-6 col-md-4 col-lg-3" style="text-transform: capitalize"><a class="link link-arrow" href="{{route('singlesermon', $sermon->slug)}}">{{$sermon->name}}</a></div>
              @endforeach
            </div>
            @else
              <div class="text-center">No sermons yet</div>
            @endif
          </div>
        </section>
      </section>
      <!-- Our team-->
      @include('pages.home.partials.ourTeam')
      <!-- Awards-->
      @include('pages.home.partials.partners')
      <!-- Footer contact-->
      @include('inc.footer')
      
    </div>
  <!-- Preloader -->
  @include("inc.preloader")
@endsection