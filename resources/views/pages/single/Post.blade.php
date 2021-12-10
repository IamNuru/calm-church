<x-guest-layout>
@extends('layouts.main')
@if ($post)
@section('head')
<title>{{$post->title}}</title>
@endsection
@section('main')
<div class="page">
    <!-- Page title-->
    <section class="section page-title bg-image context-dark" style="background-image: url(../images/background/bg-4-1920x496.jpg);">
      <!--RD Navbar-->
      @include('inc.navbar')
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-xl-8">
            <h2 class="page-title-text">{{$post->title}}</h2>
          </div>
        </div>
      </div>
    </section>
    <section class="section-md bg-transparent">
        <div class="container">
          <div class="row row-40 justify-content-xxl-between">
            <div class="col-md-8">
              <div class="blog-post">
                <div class="blog-post-item">
                  <img src="{{$post->image?asset(config('church.storageImageUrl').'/posts/'.$post->image)
                  :(asset('storage/images/posts/noimage.png'))}}" 
                    style="width: 769px; height:431px; object-fit: cover"
                    alt="" width="769" height="431"/>
                  <h3 class="h3-big">{{$post->title}}</h3>
                  <div class="post-meta list list-inline-divided text-small">
                    <div class="list-item">
                      <div class="post-tags"><a class="post-tag" href="#">{{$post->category->name}}</a></div>
                    </div>
                    <div class="list-item"><a class="post-date" href="#">{{$post->created_at->isoFormat('DD MMMM YYYY')}}</a></div>
                    <div class="list-item"><a class="post-comments" href="#">{{count($post->comments)}} comments</a></div>
                  </div>
                  {{strip_tags($post->content)}}
                  
                  <div class="divider"></div>
                  <div class="row row-15 justify-content-between align-items-center">
                    <div class="col-sm-6">
                      @if (count($post->tags))
                      <div class="group-10">
                        @foreach ($post->tags as $ptag)
                        <a class="tag tag-outline" href="{{route('pages.tagdetails', $ptag->slug)}}">{{$ptag->name}}</a>
                        @endforeach
                      </div>
                      @endif
                    </div>
                    <div class="col-sm-6">
                      <div class="group-10 d-flex align-items-center"><span>Share post:</span><a class="icon icon-md icon-link icon-link-gray mdi-facebook" href="#"></a><a class="icon icon-md icon-link icon-link-gray mdi-linkedin" href="#"></a><a class="icon icon-md icon-link icon-link-gray mdi-twitter" href="#"></a></div>
                    </div>
                  </div>
                </div>
                <div class="blog-post-item">
                  <h3>Related Posts</h3>
                  <div class="row row-20 row-content"> 
                    @if (count($rel_posts) > 0)
                    <div class="col-xs-11 col-sm-6">
                      @foreach ($rel_posts as $rel_post)
                      <div class="post post-line">
                        <div class="post-tags text-small"><a class="post-tag" href="classic-blog.html">{{$rel_post->category->name}}</a>
                        </div><a class="post-media" href="{{route('single.post', $rel_post->slug)}}">
                          <img src="{{$rel_post->image?asset(config('church.storageImageUrl').'posts/'.$rel_post->image)
                          :(asset('storage/images/posts/noimage.png'))}}" 
                        style="width: 368px; height:228px; object-fit: cover"
                        alt="" width="368" height="228"/>
                        <div class="post-hover-btn mdi-link-variant"></div></a>
                        <div class="post-content">
                        <h4 class="post-title"><a href="blog-post.html">{{$rel_post->title}}</a></h4>
                        <div class="post-date text-small">{{$rel_post->created_at->isoFormat('DD MMMM YYYY')}}</div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                    @else
                    <div class="text-center">No Related Posts</div>
                    @endif
                    
                  </div>
                </div>
                <div class="blog-post-item">
                  <h3>Leave a Comment</h3>
                  <livewire:post-comment :post="$post">
                  <div class="form-output snackbar snackbar-primary" id="form-post"></div>
                </div>
                <livewire:post-comments :pid="$post->id">
              </div>
            </div>
            <div class="col-md-4 col-xl-3">
              <div class="widget widget-search">
                <div class="widget-body">
                  <form action="search-results.html" method="GET" data-rd-search='{"template":"<h6 class=\"search-title\"><a target=\"_top\" href=\"#{href}\" class=\"search-link\">#{title}</a></h6><p>...#{token}...</p>"}'>
                    <div class="form-group form-group-icon">
                      <input class="form-control" type="text" placeholder="Search in blog..." autocomplete="off" name="s">
                      <button class="form-group-icon-btn mdi-magnify"></button>
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
                    <li class="list-item"><a class="link link-arrow" href="#">{{$category->name}}</a></li>
                    @endforeach
                  </ul>
                </div>
                @else
                    <div class="text-center">No categories</div>
                @endif
              </div>
              <div class="widget widget-subscribe">
                <h4 class="widget-title">Newsletter</h4>
                <div class="widget-body">
                  <livewire:newsletter >
                  <div class="form-output snackbar snackbar-primary" id="form-widget-subscribe"></div>
                </div>
              </div>
              <div class="widget">
                <h4 class="widget-title">Recent Posts</h4>
                @if (count($r_posts) > 0)
                @foreach ($r_posts as $r_post)
                <div class="widget-body">
                  <div class="post post-small"><a class="post-img-link" href="blog-post.html">
                    <img src="{{$r_post->image?asset(config('church.storageImageUrl').'/posts/'.$r_post->image)
                    :(asset('storage/images/posts/noimage.png'))}}" 
                    style="width: 72px; height:72px; object-fit: cover"
                    alt="" width="72" height="72"/></a>
                    <div class="post-body">
                      <h5 class="post-title"><a href="blog-post.html">{{$r_post->title}}</a></h5>
                      <div class="post-date text-small">{{$r_post->created_at->isoFormat('DD MMMM YYYY')}}</div>
                    </div>
                  </div>
                </div>
                @endforeach
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
@else
    <div class="text-center">NOT FOUND</div>
@endif
@endsection
</x-guest-layout>