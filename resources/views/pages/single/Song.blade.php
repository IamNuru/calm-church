<x-guest-layout>
@extends('layouts.main')
@if ($song)
@section('head')
<title>{{$song->title}}</title>
<style>
  audio::-internal-media-controls-download-button {
    display:none;
  }

  audio::-webkit-media-controls-enclosure {
      overflow:hidden;
  }

  audio::-webkit-media-controls-panel {
      width: calc(100% + 30px); /* Adjust as needed */
  }
</style>
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
            <h2 class="page-title-text">{{$song->title}}</h2>
          </div>
        </div>
      </div>
    </section>
    <section class="section-md bg-transparent">
        <div class="container">
          <div class="row row-40 justify-content-xxl-between">
            <div class="col-md-8">
              <div class="blog-post">
                <div class="blog-post-item"><img src="{{$song->cover_photo?asset(config('church.storageImageUrl').'songs/cover/'.$song->cover_photo)
                  :(asset('storage/images/songs/cover/noimage.png'))}}" 
                  style="width: 769px; height: 431px; object-fit:contain"
                  alt="" width="769" height="431"/>
                  <h3 class="h3-big">{{$song->title}}</h3>
                  <div class="post-meta list list-inline-divided text-small">
                    <div class="list-item">
                      <div class="post-tags"><a class="post-tag" href="#">{{$song->category ? $song->category->name : 'None'}}</a></div>
                    </div>
                    <div class="list-item"><a class="post-date" href="#">{{$song->created_at->isoFormat('DD MMMM YYYY')}}</a></div>
                  </div>
                  <p>{{strip_tags($song->content)}}</p>
                  @if ($song->lyrics)
                  <div class="block" style="margin-top: 1.5rem">
                    <h4>The lyrics</h4>
                    <p style="font-family: monospace">{{strip_tags($song->lyrics)}}</p>
                  </div>
                  @endif
                  <p>
                    <audio controls controlsList="nodownload">
                      <source src="{{asset('storage/'.$song->getMedia()[0]->id.'/'.$song->getMedia()[0]->file_name)}}" 
                        type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>
                  </p>

                  <div class="" style="margin-top: 1.5rem">
                    <button class="btn">Download</button>
                  </div>
                  <div class="divider"></div>
                  <div class="row row-15 justify-content-between align-items-center">
                    <div class="col-sm-6">
                      @if (count($song->tags))
                      <div class="group-10">
                        @foreach ($song->tags as $tag )
                        <a class="tag tag-outline" href="{{route('pages.tagdetails', $tag->slug)}}">{{$tag->name}}</a>
                        @endforeach
                      </div>
                      @endif
                    </div>
                    <div class="col-sm-6">
                      <div class="group-10 d-flex align-items-center"><span>Share song:</span><a class="icon icon-md icon-link icon-link-gray mdi-facebook" href="#"></a><a class="icon icon-md icon-link icon-link-gray mdi-linkedin" href="#"></a><a class="icon icon-md icon-link icon-link-gray mdi-twitter" href="#"></a></div>
                    </div>
                  </div>
                </div>
                
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
                <h4 class="widget-title">Recent Songs</h4>
                @if (count($r_songs) > 0)
                @foreach ($r_songs as $r_song)
                <div class="widget-body">
                  <div class="post post-small"><a class="post-img-link" href="{{route('single.song', [$r_song->id, $r_song->slug])}}">
                    <img src="{{$song->cover_photo?asset(config('church.storageImageUrl').'songs/cover/'.$song->cover_photo)
                    :(asset('storage/images/songs/cover/noimage.png'))}}" 
                    style="width: 72px; height: 72px; object-fit:cover"
                    alt="" width="72" height="72"/></a>
                    <div class="post-body">
                      <h5 class="post-title"><a href="{{route('single.song', [$r_song->id, $r_song->slug])}}">{{$r_song->title}}</a></h5>
                      <div class="post-date text-small">{{$r_song->created_at->isoFormat('DD MMMM YYYY')}}</div>
                    </div>
                  </div>
                </div>
                @endforeach
                @else
                  <div class="text-center">No recent song</div>
                @endif
              </div>
              @if (count($tags))
              <div class="widget">
                <h4 class="widget-title">Tags</h4>
                <div class="widget-body">
                  <div class="group-10">
                    @foreach ($tags as $tag )
                    <a class="tag tag-outline" href="{{route('pages.tagdetails', $tag->slug)}}">{{$tag->name}}</a>
                    @endforeach
                  </div>
                </div>
              </div>
              @else

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