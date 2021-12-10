<footer class="footer-contact context-dark bg-900 text-center">
    <div class="container">
      <div class="footer-row">
        <div class="footer-logo"><a class="logo-link" href="/"><img src="{{ asset('images/logo-inverse-1-296x104.png') }}" alt="" width="148" height="52"/></a></div>
      </div>
      <div class="footer-row">
        <ul class="footer-menu">
          <li><a href="{{route('about-us')}}">About</a></li>
          <li><a href="{{route('pages.donations')}}">Donations</a></li>
          <li><a href="{{route('pages.songs')}}">Songs</a></li>
          <li><a href="{{route('pages.sermons')}}">Sermons</a></li>
          <li><a href="{{route('blog')}}">Blog</a></li>
          <li><a href="{{route('contact-us')}}">Contact us</a></li>
        </ul>
      </div>
      <div class="footer-row">
        <h4>Call us 24\7</h4><a class="link link-large" href="tel:#">{{config("church.phone")}}</a>
        <ul class="social social-bordered footer-social">
          <li><a class="social-icon icon icon-md mdi-youtube-play" href="#"></a></li>
          <li><a class="social-icon icon icon-md mdi-linkedin" href="#"></a></li>
          <li><a class="social-icon icon icon-md mdi-twitter" href="#"></a></li>
        </ul>
      </div>
      <div class="footer-row">
        <div class="h6">{{config("church.address")}}</div>
              <!-- Copyright-->
              <p class="rights"><span>&copy; 2021&nbsp;</span><span>{{config('app.name')}}</span><span>. All rights reserved.&nbsp;</span><a class="link link-inherit rights-link" href="privacy-policy.html">Privacy Policy</a></p>
      </div>
    </div>
  </footer>