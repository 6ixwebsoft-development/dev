<body>
	<div id="site-content">
		<header class="site-header">
			<div class="top-header">
				<div class="container">
					@if(Session::get('language') == 'en')
					@php
							$langg = Session::get('language');
						@endphp
					@else
						@php
							$langg = '';
						@endphp
					@endif
					<a href="{{ url('/'.$langg) }}" id="branding">
						<img src="{{url('frontend/images/gg-logo.png ')}}" alt="Company Name" class="logo logo-design">
						
					</a> <!-- #branding -->
				
					<div class="right-section pull-right">
						<a href="#" class="phone"><img src="{{url('frontend/images/icon-phone.png')}}" class="icon">08-559 250 70</a>
				
						<form action="#" class="search-form">
							@csrf
							<input type="text" placeholder="Search...">
							<button type="submit"><img src="{{url('frontend/images/icon-search.png')}}" alt=""></button>

						</form>
					</div>
				</div> <!-- .container -->
			</div> <!-- .top-header -->

