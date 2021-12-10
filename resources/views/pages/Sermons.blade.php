@extends('layouts.main')
@section('head')
    <title>Sermons</title>
@endsection
@section('main')

    <div class="page">
        <!-- Page title-->
        <section class="section page-title bg-image context-dark"
            style="background-image: url(images/blog/sermon.jpg); height:100%">
            <!--RD Navbar-->
            @include('inc.navbar')
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-xl-8">
                        <h2 class="page-title-text">Sermons</h2>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog grid-->
        <section class="section-md bg-transparent">
            <div class="container">
                @if (count($sermons))
                    <div class="row row-30 row-xl-60 row-xxl-100">
                        @foreach ($sermons as $sermon)
                            <div class="col-md-4">
                                <div class="post post-shadow" style="height: 450px; overflow:auto"><a class="post-media"
                                        href="{{ route('singlesermon', $sermon->slug) }}">
                                        <img src="{{ $sermon->image ? config('church.storageImageUrl') . '/sermons/' . $sermon->image : URL::asset('storage/images/sermons/noimage.png') }}"
                                            style="width: 370px; height:257px; object-fit:cover" alt="" width="370"
                                            height="257" />
                                        <div class="post-hover-btn">View</div>
                                    </a>
                                    <div class="post-content">
                                        <div class="post-tags group-5 text-small"><a class="post-tag"
                                                href="{{ route('singlesermon', $sermon->slug) }}">{{ $sermon->name }}</a>
                                        </div>
                                        <h4 class="post-title text-divider"><a
                                                href="{{ route('singlesermon', $sermon->slug) }}">{{ $sermon->title }}</a>
                                        </h4>
                                        <div class="post-date">{{ $sermon->created_at->isoFormat('DD MMMM YYYY') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center">No Sermons available</div>
                @endif
            </div>
            @if ($sermons->hasPages())
                <ul class="pagination justify-content-center">
                    {{-- Previous Page Link --}}
                    @if ($sermons->onFirstPage())
                        <li class="page-item disabled"><span
                                class="page-link page-link-prev mdi-chevron-left novi-icon"></span></li>
                    @else
                        <li class="page-item"><a href="{{ $sermons->previousPageUrl() }}" rel="prev"
                                class="page-link page-link-prev mdi-chevron-left novi-icon"></a></li>
                    @endif

                    @if ($sermons->currentPage() > 3)
                        <li class="hidden-xs page-item"><a href="{{ $sermons->url(1) }}" class="page-link">1</a></li>
                    @endif
                    @if ($sermons->currentPage() > 4)
                        <li><span>...</span></li>
                    @endif
                    @foreach (range(1, $sermons->lastPage()) as $i)
                        @if ($i >= $sermons->currentPage() - 2 && $i <= $sermons->currentPage() + 2)
                            @if ($i == $sermons->currentPage())
                                <li class="active page-item"><span>{{ $i }}</span></li>
                            @else
                                <li class="page-item"><a href="{{ $sermons->url($i) }}"
                                        class="page-link">{{ $i }}</a></li>
                            @endif
                        @endif
                    @endforeach
                    @if ($sermons->currentPage() < $sermons->lastPage() - 3)
                        <li><span>...</span></li>
                    @endif
                    @if ($sermons->currentPage() < $sermons->lastPage() - 2)
                        <li class="hidden-xs page-item"><a href="{{ $sermons->url($sermons->lastPage()) }}"
                                class="page-link">{{ $sermons->lastPage() }}</a></li>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($sermons->hasMorePages())
                        <li><a href="{{ $sermons->nextPageUrl() }}" rel="next"
                                class="page-link page-link-next mdi-chevron-right novi-icon"></a></li>
                    @else
                        <li class="disabled"><span
                                class="page-link page-link-next mdi-chevron-right novi-icon"></span></li>
                    @endif
                </ul>
            @endif
    </div>
    </section>
    <!-- Footer contact-->
    @include('inc.footer')
    </div>
    <!-- Preloader -->
    @include("inc.preloader")
@endsection
