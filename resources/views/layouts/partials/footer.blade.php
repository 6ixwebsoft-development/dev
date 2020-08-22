		

		<div class="site-footer">
			<div class="widget-area">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-6 text-center">
							<div class="widget">
								<h3 class="widget-title">Contact</h3>
								<address> Stöd & Stipendier AB - Global Grant Östra Storgatan 85A 553 21 JÖNKÖPING
								</address>
								<a href="#">Tel: 08-559 250 70</a>
								<a href="mailto:INFO@GLOBALGRANT.COM">INFO@GLOBALGRANT.COM</a>
							</div>
						</div>
						@if(Session::get('language') == 'en')
							@php
								$lang = Session::get('language');
							@endphp
						@else
							@php
								$lang = '';
							@endphp
						@endif
						<div class="col-xs-12 col-sm-4 col-md-6 text-center">
							<div class="widget">
								<h3 class="widget-title">Company</h3>
								<ul class="no-bullet">
									<li><a href="{{ url($lang.'/about') }}">{{ __('word.About us') }}</a></li>
									@php
									$result = getName('footer');
									//echo "<pre>";
									//print_r($result);exit;
									@endphp
									@foreach($result as $links)
									<li>
									@if(!empty($links['link']))
										<a href="{{ $links['link']}}"> {{ucwords(strtolower($links['name']))}}</a>
									@else
										<a href="{{ url($lang."/".geturlbyPageId($links['page'])) }}"> {{__('word.'.strtolower($links['name'])) }}</a>
									@endif
									
									</li>
									@endforeach
									
									<!-- <li><a href="#">Team</a></li>
									<li><a href="#">Join us</a></li>
									<li><a href="#">Cooperation</a></li> -->
								</ul>
							</div>
						</div>
						<!-- <div class="col-xs-12 col-sm-4 col-md-2">
							<div class="widget">
								<h3 class="widget-title">Products</h3>
								<ul class="no-bullet">
									<li><a href="#">Life insurance</a></li>
									<li><a href="#">Home insurance</a></li>
									<li><a href="#">Car insurance</a></li>
									<li><a href="#">Business insurance</a></li>
									<li><a href="#">Investment insurance</a></li>
								</ul>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-2">
							<div class="widget">
								<h3 class="widget-title">Our Solutions</h3>
								<ul class="no-bullet">
									<li><a href="#">Presentation</a></li>
									<li><a href="#">Testimonials</a></li>
									<li><a href="#">Examples</a></li>
									<li><a href="#">Our experts</a></li>
									<li><a href="#">Resources</a></li>
								</ul>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-2">
							<div class="widget">
								<h3 class="widget-title">Press Room</h3>
								<ul class="no-bullet">
								<li><a href="#">Advertisement</a></li>
								<li><a href="#">Interviews</a></li>
								<li><a href="#">Hot news</a></li>
								<li><a href="#">Photos</a></li>
								<li><a href="#">Marketing</a></li>
								</ul>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-2">
							<div class="widget">
								<h3 class="widget-title">Resources</h3>
								<ul class="no-bullet">
									<li><a href="#">Sed imperdiet magna</a></li>
									<li><a href="#">Pellentesque molestie</a></li>
									<li><a href="#">Nulla luctus cursus</a></li>
									<li><a href="#">Ligula vel lacinia</a></li>
									<li><a href="#">Mauris scelerisque</a></li>
								</ul>
							</div>
						</div> -->
					</div>
				</div>
			</div>

			<div class="bottom-footer">
				<div class="container">
					<nav class="footer-navigation">
						<a href="{{ url('/'.$lang) }}">{{ __('word.home') }}</a>
						<a href="{{ url($lang.'/about') }}">{{ __('word.About us') }}</a>
						<!-- <a href="#">Insurance plans</a>
						<a href="#">Resources</a> -->
						<a href="{{ url($lang.'/contact-us') }}">{{__('word.Contact Us') }}</a>
					</nav>

					<div class="colophon">Copyright 2019 Global Grant. Designed by Tecnotch team. All rights reserved.</div>
				</div>
			</div>
		</div>
	</div>
	