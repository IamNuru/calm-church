
    @extends('layouts.main')
    @section('head')
        <title>Blog posts</title>
    @endsection
    @section('main')

        <div class="page">
            <!-- Page title-->
            <section class="section page-title bg-image context-dark"
                style="background-image: url(images/background/bg-4-1920x496.jpg);">
                <!--RD Navbar-->
                @include('inc.navbar')
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-xl-8">
                            <h2 class="page-title-text">BLOG POSTS</h2>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section-md bg-transparent">
                <div class="container">
                    <div class="row row-40 justify-content-xxl-between">
                        <div class="col-md-8">
                            @if (count($posts) > 0)
                                <div class="row row-30 row-xl-60 justify-content-center">
                                    @foreach ($posts as $post)
                                        <div class="col-xs-11 col-sm-10 col-md-6">
                                            <!-- Post-->
                                            <div class="post post-line" style="height: 450px; overflow:auto">
                                                <div class="post-tags text-small"><a class="post-tag"
                                                        href="classic-blog.html">{{ $post->category->name }}</a>
                                                </div><a class="post-media"
                                                    href="{{ route('single.post', $post->slug) }}">
                                                    <img src="{{ $post->image ? config('church.storageImageUrl') . '/posts/' . $post->image : URL::asset('storage/images/posts/noimage.png') }}"
                                                        alt="{{ $post->title }}"
                                                        style="width: 368px; height:228px; object-fit:cover" width="368"
                                                        height="228" />
                                                    <div class="post-hover-btn mdi-link-variant"></div>
                                                </a>
                                                <div class="post-content">
                                                    <h4 class="post-title"><a
                                                            href="{{ route('single.post', $post->slug) }}">{{ $post->title }}</a>
                                                    </h4>
                                                    <div class="post-date text-small">
                                                        {{ $post->created_at->isoFormat('DD MMMM YYYY') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center">Not posts yet</div>
                            @endif
                            @if ($posts->hasPages())
                                <ul class="pagination justify-content-center">
                                    {{-- Previous Page Link --}}
                                    @if ($posts->onFirstPage())
                                        <li class="page-item disabled"><span
                                                class="page-link page-link-prev mdi-chevron-left novi-icon"></span></li>
                                    @else
                                        <li class="page-item"><a href="{{ $posts->previousPageUrl() }}" rel="prev"
                                                class="page-link page-link-prev mdi-chevron-left novi-icon"></a></li>
                                    @endif

                                    @if ($posts->currentPage() > 3)
                                        <li class="hidden-xs page-item"><a href="{{ $posts->url(1) }}"
                                                class="page-link">1</a></li>
                                    @endif
                                    @if ($posts->currentPage() > 4)
                                        <li><span>...</span></li>
                                    @endif
                                    @foreach (range(1, $posts->lastPage()) as $i)
                                        @if ($i >= $posts->currentPage() - 2 && $i <= $posts->currentPage() + 2)
                                            @if ($i == $posts->currentPage())
                                                <li class="active page-item"><span>{{ $i }}</span></li>
                                            @else
                                                <li class="page-item"><a href="{{ $posts->url($i) }}"
                                                        class="page-link">{{ $i }}</a></li>
                                            @endif
                                        @endif
                                    @endforeach
                                    @if ($posts->currentPage() < $posts->lastPage() - 3)
                                        <li><span>...</span></li>
                                    @endif
                                    @if ($posts->currentPage() < $posts->lastPage() - 2)
                                        <li class="hidden-xs page-item"><a href="{{ $posts->url($posts->lastPage()) }}"
                                                class="page-link">{{ $posts->lastPage() }}</a></li>
                                    @endif

                                    {{-- Next Page Link --}}
                                    @if ($posts->hasMorePages())
                                        <li><a href="{{ $posts->nextPageUrl() }}" rel="next"
                                                class="page-link page-link-next mdi-chevron-right novi-icon"></a></li>
                                    @else
                                        <li class="disabled"><span
                                                class="page-link page-link-next mdi-chevron-right novi-icon"></span></li>
                                    @endif
                                </ul>
                            @endif
                        </div>
                        <div class="col-md-4 col-xl-3">
                            <div class="widget widget-search">
                                <div class="widget-body">
                                    <form action="search-results.html" method="GET"
                                        data-rd-search='{"template":"<h6 class=\"search-title\"><a target=\"_top\" href=\"#{href}\" class=\"search-link\">#{title}</a></h6><p>...#{token}...</p>"}'>
                                        <div class="form-group form-group-icon">
                                            <input class="form-control" type="text" placeholder="Search in blog..."
                                                autocomplete="off" name="s">
                                            <button class="form-group-icon-btn mdi-magnify"></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">Categories</h4>
                                <div class="widget-body">
                                    @if (count($categories) > 0)
                                        <ul class="list list-divided list-divided-sm big">
                                            @foreach ($categories as $category)
                                                <li class="list-item"><a class="link link-arrow"
                                                        href="#">{{ $category->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <div class="text-center">No categories yet</div>
                                    @endif
                                </div>
                            </div>
                            <div class="widget widget-subscribe">
                                <h4 class="widget-title">Newsletter</h4>
                                <div class="widget-body">
                                    <livewire:newsletter>
                                        <div class="form-output snackbar snackbar-primary" id="form-widget-subscribe"></div>
                                </div>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">Recent Posts</h4>
                                @if (count($r_posts) > 0)
                                    <div class="widget-body">
                                        @foreach ($r_posts as $r_post)
                                            <div class="post post-small"><a class="post-img-link"
                                                    href="{{ route('single.post', $r_post->slug) }}">
                                                    <img src="{{ $r_post->image ? config('church.storageImageUrl') . '/posts/' . $r_post->image : URL::asset('storage/images/posts/noimage.png') }}"
                                                        alt="" width="72" height="72" /></a>
                                                <div class="post-body">
                                                    <h5 class="post-title"><a
                                                            href="{{ route('single.post', $r_post->slug) }}">{{ $r_post->title }}</a>
                                                    </h5>
                                                    <div class="post-date text-small">
                                                        {{ $r_post->created_at->isoFormat('DD MMMM YYYY') }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center">No recent posts</div>
                                @endif
                            </div>
                            @if (count($tags))
                            <div class="widget">
                                <h4 class="widget-title">Tags</h4>
                                <div class="widget-body">
                                    <div class="group-10">
                                        @foreach ($tags as $tag)
                                        <a class="tag tag-outline" href="{{route('pages.tagdetails', $tag->slug)}}">{{$tag->name}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
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