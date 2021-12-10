<x-guest-layout>
@extends('layouts.main')
@section('head')
<title>Checkout</title>

@endsection
@section('main')
<?php
  $r_name = Route::currentRouteName();
?>
<div class="page">
    <!-- Page title-->
     <!--RD Navbar-->
     <header class="section rd-navbar-wrap">
      <nav class="rd-navbar rd-navbar-default">
        <div class="navbar-container">
          <div class="navbar-cell">
            <div class="navbar-panel">
              <button class="navbar-switch linearicons-menu" data-multi-switch='{"targets":".rd-navbar","scope":".rd-navbar","isolate":"[data-multi-switch]"}'></button>
              <div class="navbar-logo"><a class="navbar-logo-link" href="{{route('index')}}"><img class="navbar-logo-default" src="{{asset('images/logo-inverse-296x104.png')}}" alt="Calm" width="148" height="52"/><img class="navbar-logo-inverse" src="images/logo-inverse-296x104.png" alt="Calm" width="148" height="52"/></a></div>
            </div>
          </div>
          <div class="navbar-cell navbar-spacer"></div>
          <div class="navbar-cell">
            <ul class="navbar-navigation rd-navbar-nav">
              <li class="navbar-navigation-root-item"><a class="navbar-navigation-root-link" href="{{route('about-us')}}">About</a>
                
              </li>
              <li class="navbar-navigation-root-item"><a class="navbar-navigation-root-link" href="{{route('pages.donations')}}">Donations</a>
               
              </li>
              <li class="navbar-navigation-root-item"><a class="navbar-navigation-root-link" href="{{route('pages.songs')}}">Songs</a>
               
              </li>
              
              <li class="navbar-navigation-root-item navbar-navigation-item-hidden"><a class="navbar-navigation-root-link" href="{{route('sermons')}}">Sermons</a>
                <ul class="navbar-navigation-dropdown rd-navbar-dropdown">
                  <li class="navbar-navigation-back">
                    <button class="navbar-navigation-back-btn">Back</button>
                  </li>
                  <li class="navbar-navigation-dropdown-item"><a class="navbar-navigation-dropdown-link" href="{{route('sermon.categories')}}">Sermon Categories</a>
                  </li>
                  
                </ul>
              </li>
              <li class="navbar-navigation-root-item active navbar-navigation-item-hidden"><a class="navbar-navigation-root-link" href="{{route('shop')}}">Shop</a>
                
              </li>
              <li class="navbar-navigation-root-item navbar-navigation-item-hidden"><a class="navbar-navigation-root-link" href="{{route('blog')}}">Blog</a>
                
              </li>
            </ul>
          </div>
          <div class="navbar-cell">
            <div class="navbar-subpanel">
              <div class="navbar-subpanel-item">
                <button class="navbar-button navbar-list-button mdi-dots-vertical" data-multi-switch='{"targets":".rd-navbar","scope":".rd-navbar","class":"navbar-list-active","isolate":"[data-multi-switch]"}'></button>
                <div class="navbar-list">
                  <div class="navbar-list-icon mdi-cellphone"></div><a class="link link-inherit navbar-list-link" href="tel:#">{{config('church.phone')}}</a>
                </div>
              </div>
              <livewire:product-cart>
              <div class="navbar-subpanel-item">
                <!--include _search--><span class="navbar-contact-text">Contacts</span>
                <button class="navbar-button navbar-contact-btn navbar-contact-btn-rounded linearicons-menu" data-multi-switch='{"targets":".rd-navbar","scope":".rd-navbar","class":"navbar-contact-active","isolate":"[data-multi-switch]:not(.rd-navbar-contact-btn)"}'></button>
                <div class="navbar-contact">
                  <ul class="list list-sm">
                    <li class="list-item">
                      <h4 class="text-uppercase text-primary">Free Consultation</h4>
                    </li>
                    <li class="list-item"><a class="link link-inherit-primary big2" href="tel:{{config('church.phone')}}">{{config('church.phone')}}</a></li>
                    <li class="list-item"><a class="link link-inherit-primary" href="mailto:#">{{config('church.email')}}</a></li>
                    <li class="list-item"><span>{{config('church.address')}}</span></li>
                  </ul>
                  <ul class="list list-divided">
                    <li class="list-item">
                      <!-- Blurb link-->
                      <div class="blurb blurb-link">
                        <div class="blurb-icon linearicons-credit-card"></div>
                        <h4 class="blurb-title"><a href="{{route('pages.donations')}}">Make a Donation</a></h4>
                      </div>
                    </li>
                    <li class="list-item">
                      <!-- Blurb link-->
                      <div class="blurb blurb-link">
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
          </div>
        </div>
      </nav>
    </header>

    <livewire:checkout>

<!-- Footer contact-->
@include('inc.footer')
</div>

<!-- Preloader -->
@include("inc.preloader")
@endsection
</x-guest-layout>