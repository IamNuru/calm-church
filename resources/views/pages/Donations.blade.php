@extends('layouts.main')
@section('head')
    <title>Donations</title>
@endsection
@section('main')

    <div class="page">
        <!-- Page title-->
        <section class="section page-title bg-image context-dark"
            style="background-image: url({{ asset('images/blog/donation.jpg') }});">
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
        @if (count($donations) > 0)

            <section class="section-md bg-100">
                <div class="container">
                    <div class="row row-50">
                        @foreach ($donations as $donation)
                            <div class="col-sm-6 col-lg-4">
                                <!-- Post-->
                                <div class="post post-line" style="height: 450px; overflow:auto">
                                    <div class="post-tags text-small">
                                        <div class="post-tag"><span
                                                class="text-primary">${{ $donation->amount_raised }}</span> of
                                            ${{ $donation->amount }} raised</div>
                                    </div><a class="post-media" href="{{ route('single.donation', $donation->slug) }}">
                                        <img src="{{ $donation->image ? config('church.storageImageUrl') . '/donations/' . $donation->image : URL::asset('storage/images/donations/noimage.png') }}"
                                            alt="{{ $donation->title }}"
                                            style="width: 368px; height:228px; object-fit:cover" width="368" height="228" />
                                        <div class="post-hover-btn mdi-link-variant"></div>
                                    </a>
                                    <div class="post-content">
                                        <h4 class="post-title"><a
                                                href="{{ route('single.donation', $donation->slug) }}">{{ $donation->title }}</a>
                                        </h4>
                                        <div class="post-date text-small">
                                            {{ $donation->ending_date > Carbon\Carbon::now() ? Carbon\Carbon::parse($donation->ending_date)->diffInDays(Carbon\Carbon::now()) . ' days to go' : 'Date elapse' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @else
            <div class="text-center">No donation donations available</div>
        @endif
        @if ($donations->hasPages())
            <ul class="pagination justify-content-center">
                {{-- Previous Page Link --}}
                @if ($donations->onFirstPage())
                    <li class="page-item disabled"><span class="page-link page-link-prev mdi-chevron-left novi-icon"></span>
                    </li>
                @else
                    <li class="page-item"><a href="{{ $donations->previousPageUrl() }}" rel="prev"
                            class="page-link page-link-prev mdi-chevron-left novi-icon"></a></li>
                @endif

                @if ($donations->currentPage() > 3)
                    <li class="hidden-xs page-item"><a href="{{ $donations->url(1) }}" class="page-link">1</a></li>
                @endif
                @if ($donations->currentPage() > 4)
                    <li><span>...</span></li>
                @endif
                @foreach (range(1, $donations->lastPage()) as $i)
                    @if ($i >= $donations->currentPage() - 2 && $i <= $donations->currentPage() + 2)
                        @if ($i == $donations->currentPage())
                            <li class="active page-item"><span>{{ $i }}</span></li>
                        @else
                            <li class="page-item"><a href="{{ $donations->url($i) }}"
                                    class="page-link">{{ $i }}</a></li>
                        @endif
                    @endif
                @endforeach
                @if ($donations->currentPage() < $donations->lastPage() - 3)
                    <li><span>...</span></li>
                @endif
                @if ($donations->currentPage() < $donations->lastPage() - 2)
                    <li class="hidden-xs page-item"><a href="{{ $donations->url($donations->lastPage()) }}"
                            class="page-link">{{ $donations->lastPage() }}</a></li>
                @endif

                {{-- Next Page Link --}}
                @if ($donations->hasMorePages())
                    <li><a href="{{ $donations->nextPageUrl() }}" rel="next"
                            class="page-link page-link-next mdi-chevron-right novi-icon"></a></li>
                @else
                    <li class="disabled"><span class="page-link page-link-next mdi-chevron-right novi-icon"></span>
                    </li>
                @endif
            </ul>
        @endif
        <!-- Footer contact-->
        @include('inc.footer')
    </div>

    <!-- Preloader -->
    @include("inc.preloader")
@endsection
