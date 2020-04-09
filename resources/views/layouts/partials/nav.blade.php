 <style>

 .dropdown-submenu {
  position: relative;
   background:#4a4c4e;
 
}

.dropdown-submenu>.dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -6px;
  margin-left: -1px;
  -webkit-border-radius: 0 6px 6px 6px;
  -moz-border-radius: 0 6px 6px;
  border-radius: 0 6px 6px 6px;
   background:#4a4c4e;
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
   background:#4a4c4e;
}

ul.dropdown-menu.multi-level li {
    width: 100%;
    padding: 5px 10px;
}
ul.dropdown-menu.multi-level {
    
    margin:0;
    padding:0;
    border-top:1px solid #fff
}

.goog-te-banner-frame {
    display: none;
}

 </style>
 <div class="bottom-header">
    <div class="container">
      <div class="main-navigation">
        <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
        <ul class="menu">
			@if(Session::get('language') == 'en')
					@php
						$lan = Session::get('language');
					@endphp
				@else
					@php
						$lan = '';
					@endphp
				@endif
          <li class="menu-item"><a href="{{ url($lan.'/about') }}">{{ __('word.About us') }}</a></li>
          <!-- <li class="menu-item"><a href="/insurance">Insurance plans</a></li>
          <li class="menu-item"><a href="/resource">Resources</a></li> -->
          <li class="menu-item"><a href="{{ url($lan.'/contact-us') }}">{{__('word.Contact Us') }}</a></li>
          <!-- <li class="menu-item"><a href="/search-foundation">Search Foundation</a></li>
          <li class="menu-item"><a href="/advance-search">Advance Search</a></li> -->
				@php
				
				$result = getName('header');
				//echo "<pre>";
				//print_r($result);exit;
				//@endphp	
				
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

				<li style="color:#fff;" class="{{$class}}"  data-toggle="{{$drop}}">

					@if(!empty($links['link']))
						<a href="{{ $links['link']}}"> {{ucwords(strtolower($links['name']))}}</a>
					@else
						<a href="{{ url($lan."/".geturlbyPageId($links['page'])) }}"> {{__('word.'.strtolower($links['name'])) }}</a>
						
					
					@endif
				</li>	
				@if(!empty($links['child']))
					<span class="caret"></span>
						<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
							@foreach($links['child'] as $links_child)
								<li style="color:#000;" class="dropdown-submenu">
								
								@if(!empty($links_child['link']))
									<a href="{{ $links_child['link']}}"> {{__('word.'.strtolower($links_child['link'])) }}</a>
								@else
									<a href="{{ url($lan."/".geturlbyPageId($links_child['page'])) }}"> {{ucwords(strtolower($links_child['name']))}}</a>
								@endif
								
										@if(!empty($links_child['child']))
											<span class="caret"></span>
											<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
												@foreach($links_child['child'] as $links_child_child)
												<li>
												
												@if(!empty($links['link']))
												<a tabindex="-1" href="{{ url($lan."/".geturlbyPageId($links_child_child['link'])) }}" style="background:#000;color:#fff;">{{__('word.'.strtolower($links_child_child['name'])) }}</a>
											
											@else
												<a tabindex="-1" href="{{ url(geturlbyPageId($links_child_child['page'])) }}" style="background:#000;color:#fff;">{{ucwords(strtolower($links_child_child['name']))}}</a>
											@endif
												</li><br>
												@endforeach
											</ul>
										@endif
									</li><br>
							@endforeach
						</ul>
				@endif
				
			
			 @endforeach
		
			

        </ul> <!-- .menu -->
      </div> <!-- .main-navigation -->
	 
      <div style="float:right">
        <div class="main-navigation">
          <ul class="menu">

            @if (Auth::guest())
                <li class="menu-item"><a href="{{ url('/login') }}">{{ __('word.login') }}</a></li>
                <li class="menu-item"><a href="{{ url('/register') }}">{{ __('word.register') }} </a></li>
            @else
               <a href="{{url($lan.'/manage')}}"> {{ Auth::user()->email }}</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                 <i class="fa fa-lock"></i> {{ __('word.Logout') }}
				</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            @endif
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>



		
			<li><a href="{{ url('/language/en') }}" class="lang-en lang-select" data-lang="en"><img src="{{URL::asset('images/flag-2.jpg')}}" alt="USA"></a></li>
		  <li><a href="{{ url('/language/se') }}" class="lang-es lang-select" data-lang="sv"><img src="{{URL::asset('images/flag-1.jpg')}}" alt="SWEDISH"></a></li>
		  
		  

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
      
   <script type="text/javascript">
    /* function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');
    }

	function triggerHtmlEvent(element, eventName) {
	  var event;
	  if (document.createEvent) {
		event = document.createEvent('HTMLEvents');
		event.initEvent(eventName, true, true);
		element.dispatchEvent(event);
	  } else {
		event = document.createEventObject();
		event.eventType = eventName;
		element.fireEvent('on' + event.eventType, event);
	  }
	}

	jQuery('.lang-select').click(function() {
	  var theLang = jQuery(this).attr('data-lang');
	  jQuery('.goog-te-combo').val(theLang);

	  //alert(jQuery(this).attr('href'));
	  window.location = jQuery(this).attr('href');
	  location.reload();

	}); */


/* function setCookie(b, h, c, f, e) {
    var a;
    if (c === 0) {
        a = ""
    } else {
        var g = new Date();
        g.setTime(g.getTime() + (c * 24 * 60 * 60 * 1000));
        a = "expires=" + g.toGMTString() + "; "
    }
    var e = (typeof e === "undefined") ? "" : "; domain=" + e;
    document.cookie = b + "=" + h + "; " + a + "path=" + f + e
}

function getCookie(d) {
    var b = d + "=";
    var a = document.cookie.split(";");
    for (var e = 0; e < a.length; e++) {
        var f = a[e].trim();
        if (f.indexOf(b) == 0) {
            return f.substring(b.length, f.length)
        }
    }
    return ""
}

//Google provides this function
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: "en",
        includedLanguages: "sv",
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
        autoDisplay: false
    }, "google_translate_element")
}
//Using jQuery
$(document).ready(function() {
    $(".post-owl").owlCarousel({
        navigation : false,
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        autoPlay : 3000,
    });

    $(".lang-select").on("click",function(){
        if (googTrans == '/en/sv') {
            setCookie("googtrans", "", 0, "/", "");
            setCookie("googtrans", "", 0, "/");
            location.reload();
        }else{
            setCookie("googtrans", "/en/sv", 0, "/", "");
            setCookie("googtrans", "/en/sv", 0, "/");
            location.reload()
        }
    });


    var googTrans = getCookie('googtrans');
	//salert(googTrans);return false;
    if (googTrans === '/en/sv') {
        downloadJSAtOnload();
        var src = $('#lang-change-en > img').attr('src').replace('flag_en.png', 'flag_es.gif');
        $('#lang-change-en > img').attr('src', src);
        $('#lang-change-en').attr('id', 'lang-change-es');
    }
});

function downloadJSAtOnload() {
    var i;
    var paths = new Array(
        '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'
    );
    for (i in paths) {
        if (typeof paths[i] !== 'string') {
            console.log(typeof paths[i]);
            continue;
        }
        var element = document.createElement("script");
        element.src = paths[i];
        document.body.appendChild(element);
    }
} */

</script> 

<!--<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->

</header> <!-- .site-header -->