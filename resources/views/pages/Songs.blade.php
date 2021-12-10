@extends('layouts.main')
@section('head')
    <title>Songs, Musics and Lyrics</title>
@endsection
@section('main')

    <div class="page">
        <!-- Page title-->
        <section class="section page-title bg-image context-dark" style="background-image: url(images/blog/praise.jpg);">
            <!--RD Navbar-->
            @include('inc.navbar')
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-xl-8">
                        <h2 class="page-title-text">Download Gospel Songs</h2>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog grid-->
        <section class="section-md bg-transparent">
            <div class="container">
                @if (count($songs) > 0)
                    <div class="row row-30 row-xl-60 row-xxl-100">
                        @foreach ($songs as $song)
                            <div class="col-md-4">
                                <div class="post post-shadow" style="height: 450px; overflow:auto"><a class="post-media"
                                        href="{{ route('single.song', [$song->id, $song->slug]) }}">
                                        <img src="{{ $song->cover_photo ? config('church.storageImageUrl') . '/songs/cover/' . $song->cover_photo : URL::asset('storage/images/songs/cover/noimage.png') }}"
                                            alt="{{ $song->title }}" style="width: 370px; height:257px; object-fit:cover"
                                            width="370" height="257" />
                                        <div class="post-hover-btn">View</div>
                                    </a>
                                    <div class="post-content">
                                        <div class="post-tags group-5 text-small"><a class="post-tag"
                                                href="{{ route('category.song', $song->category->slug) }}">{{ $song->category->name }}</a>
                                        </div>
                                        <h4 class="post-title text-divider"><a
                                                href="{{ route('single.song', [$song->id, $song->slug]) }}">{{ $song->title }}</a>
                                        </h4>
                                        <div class="post-date">{{ $song->created_at->isoFormat('DD MMMM YYYY') }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                @else
                    <div class="text-center">No songs Available yet</div>
                @endif
                @if ($songs->hasPages())
                    <ul class="pagination justify-content-center">
                        {{-- Previous Page Link --}}
                        @if ($songs->onFirstPage())
                            <li class="page-item disabled"><span
                                    class="page-link page-link-prev mdi-chevron-left novi-icon"></span></li>
                        @else
                            <li class="page-item"><a href="{{ $songs->previousPageUrl() }}" rel="prev"
                                    class="page-link page-link-prev mdi-chevron-left novi-icon"></a></li>
                        @endif

                        @if ($songs->currentPage() > 3)
                            <li class="hidden-xs page-item"><a href="{{ $songs->url(1) }}" class="page-link">1</a>
                            </li>
                        @endif
                        @if ($songs->currentPage() > 4)
                            <li><span>...</span></li>
                        @endif
                        @foreach (range(1, $songs->lastPage()) as $i)
                            @if ($i >= $songs->currentPage() - 2 && $i <= $songs->currentPage() + 2)
                                @if ($i == $songs->currentPage())
                                    <li class="active page-item"><span>{{ $i }}</span></li>
                                @else
                                    <li class="page-item"><a href="{{ $songs->url($i) }}"
                                            class="page-link">{{ $i }}</a></li>
                                @endif
                            @endif
                        @endforeach
                        @if ($songs->currentPage() < $songs->lastPage() - 3)
                            <li><span>...</span></li>
                        @endif
                        @if ($songs->currentPage() < $songs->lastPage() - 2)
                            <li class="hidden-xs page-item"><a href="{{ $songs->url($songs->lastPage()) }}"
                                    class="page-link">{{ $songs->lastPage() }}</a></li>
                        @endif

                        {{-- Next Page Link --}}
                        @if ($songs->hasMorePages())
                            <li><a href="{{ $songs->nextPageUrl() }}" rel="next"
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
