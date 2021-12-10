<x-guest-layout>
@extends('layouts.main')
@section('head')
@if ($product)
<title>{{$product->title}}</title>
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
            <h2 class="page-title-text">Product</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="section-md bg-transparent">
        <div class="container">
          <div class="row row-25 row-xl-55 justify-content-between">
            <div class="col-sm-6 col-lg-5">
              <img class="shadow-sm image image-sm" 
              src="{{$product->image?asset(config('church.storageImageUrl').'products/'.$product->image)
              :(asset('storage/images/products/noimage.png'))}}" 
              style="width:510px; height:663px; object-fit: cover"
              alt="{{$product->title}}" width="510" height="663"/>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="product-overview">
                <h3 class="h3-big">{{$product->title}}</h3>
                <div class="product-overview-price"><span class="product-overview-price-old big">{{$product->discount ? '$'.$product->amount : ''}}</span><span class="product-overview-price-new h3">${{$product->discount ? $product->amount - $product->discount : $product->amount}}</span></div>
                {{ strip_tags($product->description)}}
                <dl class="term-list term-list-inline text-small">
                  <dt>Sku:</dt>
                  <dd>35157</dd>
                </dl>
                <dl class="term-list term-list-inline text-small">
                  <dt>Categories:</dt>
                  <dd>{{$product->category ? $product->category->name : 'Other'}}</dd>
                </dl>
                <livewire:add-product-to-cart :pid="$product->id">
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Product overview-->
      <section class="section-md bg-transparent">
        <div class="container">
          <div class="tab tab-classic">
            <ul class="nav nav-classic tab-header" role="tablist">
              <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#navClassic1-1" role="tab" aria-selected="true">Description</a></li>
              <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#navClassic1-2" role="tab" aria-selected="false">Reviews (0)</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="navClassic1-1" role="tabpanel">
                <h3>Product Overview</h3>
                {{strip_tags($product->content)}}
              </div>
              <div class="tab-pane fade" id="navClassic1-2" role="tabpanel">
                @if (count($product->reviews) > 0)
                <div class="wrap-reviews">
                  There are reviews
                </div>
                @else
                <div class="wrap-no-reviews">
                  <h3>Reviews</h3>
                  <h5>There are no reviews yet.</h5>
                  <h5>Be the first to review “Spring Harvest 2020 Songbook: Unleashed”</h5>
                  <p>Your email address will not be published. Required fields are marked *</p>
                  <div class="rating-container"><span class="rating-title">Your  rating:</span>
                          <div class="rating"><span class="mdi-star-outline"></span><span class="mdi-star-outline"></span><span class="mdi-star-outline"></span><span class="mdi-star-outline"></span><span class="mdi-star-outline"></span>
                          </div>
                  </div>
                  <form class="rd-form">
                    <div class="row row-15 row-gutters-15">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input class="form-control" type="text" name="name" placeholder="Your Name*" data-constraints="@Required">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input class="form-control" type="email" name="email" placeholder="Your E-mail*" data-constraints="@Email @Required">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <textarea class="form-control" name="comment" placeholder="Message"></textarea>
                        </div>
                      </div>
                      <div class="col-12">
                        <button class="btn" type="submit">Send message</button>
                      </div>
                    </div>
                  </form>
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Products grid-->
      <section class="section-md bg-transparent">
        <div class="container">
          <h3>Related products</h3>
          @if (count($r_products) > 0)
          <div class="row row-40 row-xl-55">
            @foreach ($r_products as $item)
            <div class="col-6 col-lg-3">
              <!-- Product-->
              <div class="product product-simple"><a class="product-media" href="{{route('single.product', $item->slug)}}">
                <img src="{{$item->image?asset(config('church.storageImageUrl').'products/'.$item->image)
                :(asset('storage/images/products/noimage.png'))}}" 
                style="width: 270px; height:358px; object-fit:cover;"
                alt="{{$item->title}}" 
                width="270" height="358"/></a>
                <h4 class="product-title"><a href="{{route('single.product', $item->slug)}}">{{$item->title}}</a></h4>
                <div class="h4 product-price">${{$item->discount ? $item->amount - $item->discount : $item->amount}}</div>
              </div>
            </div>
            @endforeach
          </div>
          @else
          @endif
        </div>
      </section>
      
      <!-- Footer contact-->
      @include('inc.footer')
    </div>
    
<!-- Preloader -->
@include("inc.preloader")
@else
  <div class="text-center">NOT FOUND</div>
@endif
@endsection
</x-guest-layout>