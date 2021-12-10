<section class="section-md context-dark bg-900">
    <div class="container container-wide">
      <h2 class="text-center">Meet Our Team</h2>
      @if (count($data['teams']) > 0)
      <div class="row row-5 row-gutters-5 row-offset-lg person-poster-container">
        @foreach ($data['teams'] as $person )
        <div class="col-sm-6 col-lg-3" data-animate='{"class":"fadeInUpBig"}'>
          <a class="person person-poster" href="/member/1">
            <div class="person-media bg-image" style="background-image: url({{
              $person->profile_photo_path?('storage/'.$person->profile_photo_path)
                    :(URL::asset('storage/profile-photos/noimage.jpeg'))
            }})">
              <div class="person-btn mdi mdi-arrow-right"></div>
            </div>
            <div class="person-content">
              <h3 class="person-title"><span>{{$person->position ? $person->position : $person->role}}</span><span class="person-meta"> - Care Pastor</span></h3>
              <div class="person-text text-decorated text-decorated-3">{{$person->biography}}</div>
            </div></a>
        </div>
        @endforeach
      </div>
      @else
        <div class="text-center">No team yet</div>
      @endif
    </div>
  </section>