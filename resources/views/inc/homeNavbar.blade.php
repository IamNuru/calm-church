<style>
  .logins{
    padding:1.4px;
    border:0.5px solid white;
    font-weight: 400 !important;
    font-size: 12px !important;
    margin-left:2px;
  }
</style>
<?php
  $r_name = Route::currentRouteName();
?>
<header class="section rd-navbar-wrap" style="box-shadow: inset 0 0 0 1000px rgba(0,0,0,.5);">
    <nav class="rd-navbar rd-navbar-line">
      <div class="navbar-container intro-line-row">
        <div class="intro-line-col">
          <div class="navbar-cell">
            <div class="navbar-panel">
              <button class="navbar-switch linearicons-menu" data-multi-switch='{"targets":".rd-navbar","scope":".rd-navbar","isolate":"[data-multi-switch]"}'></button>
              <div class="navbar-logo"><a class="navbar-logo-link" href="/"><img class="navbar-logo-default" src="{{ asset('images/logo-inverse-296x104.png') }}" alt="{{config('app.name','Church')}}" width="148" height="52"/><img class="navbar-logo-inverse" src="{{ asset('images/logo-inverse-296x104.png') }}" alt="{{config('app.name')}}" width="148" height="52"/></a></div>
            </div>
          </div>
        </div>
        <div class="intro-line-col intro-line-col-center">
          <div class="navbar-cell">
            <ul class="navbar-navigation rd-navbar-nav" style="padding-top: 0.8rem">
              <li class="navbar-navigation-root-item {{$r_name === 'about-us' ? 'active' : ''}}"><a class="navbar-navigation-root-link" href="{{route('about-us')}}">About us</a>
                
              </li>
              <li class="navbar-navigation-root-item {{$r_name === 'pages.donations' ? 'active' : ''}}"><a class="navbar-navigation-root-link" href="{{route('pages.donations')}}">Donations</a>
                
              </li>
              
              <li class="navbar-navigation-root-item {{$r_name === 'pages.songs' ? 'active' : ''}}"><a class="navbar-navigation-root-link" href="{{route('pages.songs')}}">songs</a>
               
              </li>
              
              <li class="navbar-navigation-root-item navbar-navigation-item-hidden {{$r_name === 'pages.sermons' ? 'active' : ''}}"><a class="navbar-navigation-root-link" href="{{route('pages.sermons')}}">Sermons</a>
                <ul class="navbar-navigation-dropdown rd-navbar-dropdown">
                  <li class="navbar-navigation-back">
                    <button class="navbar-navigation-back-btn">Back</button>
                  </li>
                  <li class="navbar-navigation-dropdown-item"><a class="navbar-navigation-dropdown-link" href="{{route('sermon.categories')}}">Sermon Categories</a>
                  </li>
                </ul>
              </li>
              <li class="navbar-navigation-root-item navbar-navigation-item-hidden {{$r_name === 'shop' ? 'active' : ''}}"><a class="navbar-navigation-root-link" href="/shop">Shop</a>
                
              </li>
              <li class="navbar-navigation-root-item navbar-navigation-item-hidden {{$r_name === 'blog' ? 'active' : ''}}"><a class="navbar-navigation-root-link" href="{{route('blog')}}">Blog</a>
              </li>
            </ul>
          </div>
          <div class="navbar-cell navbar-spacer"></div>
          <div class="navbar-cell">
            <div class="navbar-subpanel">
              <div class="navbar-subpanel-item">
                <button class="navbar-button navbar-list-button mdi-dots-vertical" data-multi-switch='{"targets":".rd-navbar","scope":".rd-navbar","class":"navbar-list-active","isolate":"[data-multi-switch]"}'></button>
                <div class="navbar-list">
                  <div class="navbar-list-icon mdi-cellphone"></div><a class="link link-inherit navbar-list-link" href="tel:#">{{config('church.phone')}}</a>
                </div>
              </div>
              <livewire:product-cart>
              <div class="navbar-subpanel-item navbar-subpanel-item-mobile">
                <button class="navbar-button navbar-contact-btn navbar-contact-btn-rounded linearicons-menu" data-multi-switch='{"targets":".rd-navbar","scope":".navbar-subpanel-contact","class":"navbar-contact-active","isolate":"[data-multi-switch]:not( .navbar-button )"}'></button>
              </div>
            </div>
          </div>
        </div>
        <div class="intro-line-col navbar-subpanel-contact">
         
          <div class="navbar-cell align-items-center navbar-subpanel-item-desktop" style="margin-top: 1rem !important">
            <span class="navbar-contact-text" style="margin-top:-15px">Contacts</span>
            <button class="navbar-button navbar-contact-btn navbar-contact-btn-rounded linearicons-menu" 
            data-multi-switch='{"targets":".rd-navbar","scope":".rd-navbar","class":"navbar-contact-active","isolate":"[data-multi-switch]:not( .navbar-button )"}'></button>
          </div>
          <div class="navbar-contact">
            @if (Route::has('login'))
            <div class="navbar-navigation-root-item" style="text-align: right; margin-bottom:1rem">
                @auth
                <div class="" style="display: flex; justify-content:center">
                  <div>
                    <a href="{{ url('/dashboard') }}" class="logins">Dashboard</a>
                  </div>
                  <div>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <a class="logins" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                      this.closest('form').submit();">
                          {{ __('Logout') }}
                      </a>
                  </form>
                  </div>
                </div>
                @else
                    <a href="{{ route('login') }}" class="logins">Log in &nbsp;</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="logins">Register</a>
                    @endif
                @endauth
            </div>
          @endif
            <ul class="list list-sm">
              <li class="list-item">
                <h4 class="text-uppercase text-primary">Free Consultation</h4>
              </li>
              <li class="list-item"><a class="link link-inherit-primary big2" href="tel:#">{{ config('church.phone', '+233543027058') }}</a></li>
              <li class="list-item"><a class="link link-inherit-primary" href="mailto:#">{{ config('church.email')}}</a></li>
              <li class="list-item"><span>{{config('church.address','Ghana')}}</span></li>
            </ul>
            <ul class="list list-divided">
              <li class="list-item">
                      <!-- Blurb link-->
                      <div class="blurb blurb-link {{$r_name === 'pages.donations' ? 'active' : ''}}">
                        <div class="blurb-icon linearicons-credit-card"></div>
                        <h4 class="blurb-title"><a href="{{route('pages.donations')}}">Make a Donation</a></h4>
                      </div>
              </li>
              <li class="list-item">
                      <!-- Blurb link-->
                      <div class="blurb blurb-link {{$r_name === 'sermons' ? 'active' : ''}}">
                        <div class="blurb-icon linearicons-bookmark"></div>
                        <h4 class="blurb-title"><a href="{{route('pages.sermons')}}">Sermons</a></h4>
                      </div>
              </li>
              <li class="list-item">
                      <!-- Blurb link-->
                      <div class="blurb blurb-link {{$r_name === 'contact-us' ? 'active' : ''}}">
                        <div class="blurb-icon linearicons-phone"></div>
                        <h4 class="blurb-title"><a href="{{route('contact-us')}}">Contact us</a></h4>
                      </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>