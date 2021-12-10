@extends('layouts.main')
@section('head')
    <title>Shop</title>
@endsection
@section('main')

    <div class="page">
        <!-- Page title-->
        <section class="section page-title bg-image context-dark"
            style="background-image: url({{ asset('images/background/shop.jpg') }});">
            <!--RD Navbar-->
            @include('inc.navbar')
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-xl-8">
                        <h2 class="page-title-text">Shop</h2>
                    </div>
                </div>
            </div>
        </section>
        @if (session()->has('successpayment'))
            <div class="text-center" style="margin:2.5rem 0rem; font-size:1.25rem; color:rgb(42, 240, 240)">
                {{ session()->get('successpayment') }}
            </div>
        @endif
        <!-- start  -->
        <section class="section-md bg-transparent">
            <div class="container">
                <div class="row row-40">
                    <div class="col-md-8 col-lg-9">
                        @if (count($products) > 0)
                            <div class="row row-40 row-xl-55">
                                @foreach ($products as $product)
                                    <div class="col-6 col-lg-4" style="height: 450px; overflow:auto">
                                        <div class="product product-simple"><a class="product-media"
                                                href="{{ route('single.product', $product->slug) }}">
                                                <img src="{{ $product->image ? asset(config('church.storageImageUrl') . '/products/' . $product->image) : asset('storage/images/products/noimage.png') }}"
                                                    alt="" style="height: 270px; width:358px; object-fit:cover" width="270"
                                                    height="358" /></a>
                                            <h4 class="product-title"><a
                                                    href="{{ route('single.product', $product->slug) }}">{{ $product->title }}</a>
                                            </h4>
                                            <div class="h4 product-price">${{ $product->amount }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if ($products->hasPages())
                                <ul class="pagination justify-content-center">
                                    {{-- Previous Page Link --}}
                                    @if ($products->onFirstPage())
                                        <li class="page-item disabled"><span
                                                class="page-link page-link-prev mdi-chevron-left novi-icon"></span></li>
                                    @else
                                        <li class="page-item"><a href="{{ $products->previousPageUrl() }}" rel="prev"
                                                class="page-link page-link-prev mdi-chevron-left novi-icon"></a></li>
                                    @endif

                                    @if ($products->currentPage() > 3)
                                        <li class="hidden-xs page-item"><a href="{{ $products->url(1) }}"
                                                class="page-link">1</a></li>
                                    @endif
                                    @if ($products->currentPage() > 4)
                                        <li><span>...</span></li>
                                    @endif
                                    @foreach (range(1, $products->lastPage()) as $i)
                                        @if ($i >= $products->currentPage() - 2 && $i <= $products->currentPage() + 2)
                                            @if ($i == $products->currentPage())
                                                <li class="active page-item"><span>{{ $i }}</span></li>
                                            @else
                                                <li class="page-item"><a href="{{ $products->url($i) }}"
                                                        class="page-link">{{ $i }}</a></li>
                                            @endif
                                        @endif
                                    @endforeach
                                    @if ($products->currentPage() < $products->lastPage() - 3)
                                        <li><span>...</span></li>
                                    @endif
                                    @if ($products->currentPage() < $products->lastPage() - 2)
                                        <li class="hidden-xs page-item"><a href="{{ $products->url($products->lastPage()) }}"
                                                class="page-link">{{ $products->lastPage() }}</a></li>
                                    @endif

                                    {{-- Next Page Link --}}
                                    @if ($products->hasMorePages())
                                        <li><a href="{{ $products->nextPageUrl() }}" rel="next"
                                                class="page-link page-link-next mdi-chevron-right novi-icon"></a></li>
                                    @else
                                        <li class="disabled"><span
                                                class="page-link page-link-next mdi-chevron-right novi-icon"></span></li>
                                    @endif
                                </ul>
                            @endif
                        @else
                            <div class="text-center" style="margin:10rem 0rem">No products</div>
                        @endif
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="widget widget-search">
                            <div class="widget-body">
                                <form action="{{ route('searchProducts') }}" method="GET"
                                    data-rd-search='{"template":"<h6 class=\"search-title\"><a target=\"_top\" href=\"#{href}\" class=\"search-link\">#{title}</a></h6><p>...#{token}...</p>"}'>
                                    <div class="form-group form-group-icon">
                                        <input class="form-control" type="text" :value="old('s')"
                                            placeholder="Search in shop..." autocomplete="off" name="s" required>
                                        <button class="form-group-icon-btn mdi-magnify" type="submit"></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Categories</h4>
                            @if (count($categories) > 0)
                                <div class="widget-body">
                                    <ul class="list list-divided list-divided-sm big">
                                        @foreach ($categories as $category)
                                            <li class="list-item"><a class="link link-arrow"
                                                    href="{{ $category->slug }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @else
                                <div class="text-center">No categories yet</div>
                            @endif
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Price</h4>
                            <form class="widget-body" method="GET" action="{{ route('filterProducts') }}">
                                <!-- RD Range-->
                                <div class="rd-range" data-min="0" data-max="999" data-min-diff="100"
                                    data-start="[1, 335]" data-step="1" data-tooltip="false"
                                    data-input=".rd-range-input-value-1" data-input-2=".rd-range-input-value-2"></div>
                                <div class="rd-range-value">
                                    <div class="rd-range-form-wrap"><span>$</span>
                                        <input class="rd-range-input rd-range-input-value-1" type="text" name="start_price"
                                            size="3">
                                    </div>
                                    <div class="rd-range-form-wrap"><span>$</span>
                                        <input class="rd-range-input rd-range-input-value-2" type="text" name="end_price"
                                            size="3">
                                    </div>
                                </div>
                                <button class="btn" type="submit">Filter</button>
                            </form>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Popular Products</h4>
                            <div class="widget-body">
                                <!-- Product small-->
                                @if (count($popularProducts) > 0)
                                    @foreach ($popularProducts as $pProduct)
                                        <div class="product product-small"><a class="product-img-link"
                                                href="{{ route('single.product', $pProduct->slug) }}">
                                                <img src="{{ $pProduct->image ? asset(config('church.storageImageUrl') . '/products/' . $pProduct->image) : asset('storage/images/products/noimage.png') }}"
                                                    style="width: 72px; height:91px; object-fit:cover" alt="" width="72"
                                                    height="91" /></a>
                                            <div class="product-body">
                                                <h5 class="product-title"><a
                                                        href="{{ route('single.product', $pProduct->slug) }}">{{ $pProduct->title }}</a>
                                                </h5>
                                                <div class="product-price">${{ $pProduct->amount }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center">No popular products yet</div>
                                @endif
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
