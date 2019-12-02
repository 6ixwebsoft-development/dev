  <div class="bottom-header">
    <div class="container">
      <div class="main-navigation">
        <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
        <ul class="menu">

          <li class="menu-item"><a href="/about">About us</a></li>
          <!-- <li class="menu-item"><a href="/insurance">Insurance plans</a></li>
          <li class="menu-item"><a href="/resource">Resources</a></li> -->
          <li class="menu-item"><a href="/contact-us">Contact Us</a></li>
          <!-- <li class="menu-item"><a href="/search-foundation">Search Foundation</a></li>
          <li class="menu-item"><a href="/advance-search">Advance Search</a></li> -->


        </ul> <!-- .menu -->
      </div> <!-- .main-navigation -->
      <div style="float:right">
        <div class="main-navigation">
          <ul class="menu">

            @if (Auth::guest())
                <li class="menu-item"><a href="/login">Login</a></li>
                <li class="menu-item"><a href="/register">Register</a></li>
            @else
                {{ Auth::user()->email }}
                <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                 <i class="fa fa-lock"></i> {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            @endif
            

          </ul>
        </div> <!-- .main-navigation -->
        <!-- <div class="social-links">
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-google-plus"></i></a>
          <a href="#"><i class="fa fa-pinterest"></i></a>
        </div> -->
      </div>
      
      <div class="mobile-navigation"></div>
    </div>
  </div>

</header> <!-- .site-header -->