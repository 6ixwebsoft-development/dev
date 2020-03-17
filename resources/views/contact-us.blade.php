@extends('layouts.mainlayout')
@section('content')
<main class="main-content">
	<div class="breadcrumbs">
		<div class="container">
			<a href="/">{{__('word.'.strtolower('home'))}}</a>
			<span>{{__('word.'.strtolower('contact'))}}</span>
		</div>
	</div>

	<div class="page">
		<div class="container">
			<div class="map"></div>

			<div class="row">
				<div class="col-md-3">
					<h2 class="section-title text-left">{{__('word.'.strtolower('address'))}}</h2>

					<div class="contact-detail">
						<address>
							<p>{{__('word.'.strtolower('company'))}} {{__('word.'.strtolower('name'))}} {{__('word.'.strtolower('inc'))}}. <br>
								523 Burt Street, Omaha</p>

							<p>{{__('word.'.strtolower('phone'))}}: +1 823 424 9134
								info@company.com</p>
						</address>
					</div>
				</div>
				<div class="col-md-9">
					<h2 class="section-title text-left">{{__('word.'.strtolower('contact'))}} {{__('word.'.strtolower('form'))}}</h2>
					<form action="#" class="contact-form">
						<div class="row">
							<div class="col-md-4"><input type="text" placeholder="{{__('word.'.strtolower('your'))}} {{__('word.'.strtolower('name'))}}..."></div>
							<div class="col-md-4"><input type="text" placeholder="{{__('word.'.strtolower('email'))}}..."></div>
							<div class="col-md-4"><input type="text" placeholder="{{__('word.'.strtolower('website'))}}..."></div>
						</div>

						<textarea  placeholder="{{__('word.'.strtolower('message'))}}..."></textarea>

						<p class="text-right">
							<input type="submit" value="Send message">
						</p>
					</form>


				</div>
			</div>
		</div>
	</div> <!-- .page -->
</main>
@endsection