<section class="section-md bg-transparent">
    <div class="container">
      <div class="row row-5 align-items-center">
        <div class="col-md-5" data-animate='{"class":"fadeIn"}'>
          <h2>New Sermons/Blog</h2>
        </div>
        <div class="col-md-7" data-animate='{"class":"fadeIn","delay":".2s"}'>
          <p class="big">Explore & listen to the latest seermons by our church’s pastors added daily and available for download in all popular formats.</p>
        </div>
      </div>
      <!-- Swiper slider-->
      <div class="swiper-carousel">
        <div class="swiper-container" data-swiper='{"breakpoints":{"576":{"slidesPerView":2,"spaceBetween":15},"768":{"slidesPerView":3,"spaceBetween":30}},"loop":false,"pagination":{"type":"custom"}}'>
          <!-- Additional required wrapper-->
          <div class="swiper-wrapper">
            <!-- Slides-->
              @if (count($data['posts']) > 0)
                @foreach ($data['posts'] as $key => $post )
                <div class="swiper-slide">
                  <!-- Post-->
                  <div class="post post-shadow" style="height: 480px; overflow:auto">
                    <a class="post-media" href="{{route('single.post', $post->slug)}}">
                      <img src="{{$post->image?(config('church.storageImageUrl').'/posts/'.$post->image)
                      :(URL::asset('storage/images/posts/noimage.png'))}}" 
                      style="height: 257px; width:370px; object-fit:cover"
                      alt="" width="370" height="257"/>
                      <div class="post-hover-btn">View</div></a>
                    <div class="post-content">
                      <div class="post-tags group-5 text-small"><a class="post-tag" href="{{route('pages.sermons')}}">Sermons</a></div>
                      <h4 class="post-title text-divider"><a href="">{{$post->title}}</a></h4>
                      <div class="post-date">{{$post->created_at->isoFormat('DD MMM YYYY')}}</div>
                    </div>
                  </div>
              </div>
                @endforeach
              @else
                <div class="text-center">No posts</div>
              @endif 
            
          </div>
          <div class="swiper-controls">
            <!-- Pagination-->
            <div class="swiper-pagination"></div>
            <!-- Scrollbar-->
            <div class="swiper-progress">
              <div class="swiper-progress-bar"></div>
            </div>
            <!-- Navigation-->
            <div class="swiper-buttons">
              <div class="swiper-button-prev mdi-chevron-left"></div>
              <div class="swiper-button-next mdi-chevron-right"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>