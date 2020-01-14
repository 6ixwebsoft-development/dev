 <style>
 .dropdown-submenu {
  position: relative;
}

.dropdown-submenu>.dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -6px;
  margin-left: -1px;
  -webkit-border-radius: 0 6px 6px 6px;
  -moz-border-radius: 0 6px 6px;
  border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
  display: block;
}

.dropdown-submenu>a:after {
  display: block;
  content: " ";
  float: right;
  width: 0;
  height: 0;
  border-color: transparent;
  border-style: solid;
  border-width: 5px 0 5px 5px;
  border-left-color: #ccc;
  margin-top: 5px;
  margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
  border-left-color: #fff;
}

.dropdown-submenu.pull-left {
  float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
  left: -100%;
  margin-left: 10px;
  -webkit-border-radius: 6px 0 6px 6px;
  -moz-border-radius: 6px 0 6px 6px;
  border-radius: 6px 0 6px 6px;
}
 </style>
 <div class="bottom-header">
    <div class="container">
      <div class="main-navigation">
        <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
        <ul class="menu">
			
          <li class="menu-item"><a href="{{ url('/about') }}">About us</a></li>
          <!-- <li class="menu-item"><a href="/insurance">Insurance plans</a></li>
          <li class="menu-item"><a href="/resource">Resources</a></li> -->
          <li class="menu-item"><a href="{{ url('/contact-us') }}">Contact Us</a></li>
          <!-- <li class="menu-item"><a href="/search-foundation">Search Foundation</a></li>
          <li class="menu-item"><a href="/advance-search">Advance Search</a></li> -->
				@php
				$result = getName();
				//print_r($result);
				@endphp	
				
				@foreach($result as $links)
				@php	
				$class = '';
				$drop = '';
				@endphp
				@if(!empty($links['child']))
				@php	
				$class = 'dropdown-toggle';
				$drop = 'dropdown';
				@endphp
				@endif	
				<li style="color:#fff;" class="{{$class}}"  data-toggle="{{$drop}}">{{$links['name']}}
					
				
				@if(!empty($links['child']))
					<span class="caret"></span>
				<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
					@foreach($links['child'] as $links_child)
						<li style="color:#000;" class="dropdown-submenu">{{$links_child['name']}}
						
						@if(!empty($links_child['child']))
							<span class="caret"></span>
							<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
								@foreach($links_child['child'] as $links_child_child)
								<li><a tabindex="-1" href="/{{geturlbyPageId(26)}}" style="background:#black;color:#000;">{{$links_child_child['name']}}</a></li><br>
								@endforeach
							  </ul>
	
							
						@endif
						</li>
					 @endforeach
				  </ul>
				  @endif
			 </li>
			 @endforeach
		


        </ul> <!-- .menu -->
      </div> <!-- .main-navigation -->
	 
	 @php 
			$result = getName();
	 @endphp

      <div style="float:right">
        <div class="main-navigation">
          <ul class="menu">

            @if (Auth::guest())
                <li class="menu-item"><a href="{{ url('/login') }}">Login</a></li>
                <li class="menu-item"><a href="{{ url('/register') }}">Register</a></li>
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