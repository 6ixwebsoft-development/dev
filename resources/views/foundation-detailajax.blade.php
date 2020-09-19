<style type="text/css">
.dd_head {
    font-weight: 600;
}
</style>
<div class="model__button_top">
		{{-- @if(!empty($previd)) --}}
		<a class="btn btn-info prev" onClick="prev_pop()"><</a> 
	{{-- 	@endif
		@if(!empty($nextid)) --}}
		<a class="btn btn-info next" onClick="next_pop()">></a>
		{{-- @endif --}}
	<br>
	</div>
<main class="main-content">
				
	<div class="page">
		<div class="container">
			
				
			<div class="fund-detail">
				@foreach($foundation_details as $foundation_detail)
					
					<div style="">
					<div class="fundTitle">
						{{-- @php 
							//$hide_name = false; 
						@endphp
						@if(auth()->user() && auth()->user()->is('User10')){
							@php 
								$hide_name = true; 
							@endphp
						@endif  --}}
						@if( (Ican() || is_lib_user() ) || !$hide_name )
							@php
								$show = true;
							@endphp
						@else
							@php
								$show = false;
							@endphp
						@endif
						<strong>ID: {{$foundation_detail->id}} @if($show) - {{$foundation_detail->name}} @else {{ '- '.__('word.click here to log in to see the fund\'s name and contact details') }} @endif</strong>
					</div>
					<div class="fundPurpose">
						<span class="dd_head">PURPOSE :</span>
						<p> {!! rip_some_html($foundation_detail->purpose) !!}</p>
					</div>
					<div class="fundWhoCanApply">
						<span class="dd_head">WHO CAN SEARCH :</span>
						<p>{!!rip_some_html($foundation_detail->who_can_apply)!!}</p>
					</div>
					<div class="fundRemarks">
						<span class="dd_head">APPLICATION :</span>
						<p>{{strip_tags($foundation_detail->remarks)}}</p>
					</div>
					<div class="fundDetails">
						<p>{{strip_tags($foundation_detail->details)}}</p>
					</div>
					<div class="fundContacts">
						<span class="dd_head">ADRESS :</span>
						@if($show)
						<p>{{$foundation_detail->address1}} {{$foundation_detail->address2}}, {{$foundation_detail->address3}},<span class="dd_head">Tel : </span>{{$foundation_detail->phone_no}}<br>
						{{$foundation_detail->email}},<a href="{{$foundation_detail->website}}">{{$foundation_detail->website}}</a>
						</p>
						@else
							@php
								echo "<br>".__('word.click here to log in to see the fund\'s name and contact details');
							@endphp	
						@endif
						<!--<h4>Contacts</h4>
						<p>{{$foundation_detail->address1}}</p> -->
						<!--<p>{{$foundation_detail->address2}}</p>
						<p>{{$foundation_detail->address3}}</p>
						<br>
						<p>Telephone: {{$foundation_detail->phone_no}}</p>
						<p>Email: {{$foundation_detail->email}}</p>
						<p>Website: <a href="{{$foundation_detail->website}}">{{$foundation_detail->website}}</a></p> -->
					</div>
					</div>
				@endforeach
				
				
			</div>
		</div>
	</div> <!-- .page -->
{{-- 	<div class="model__button_bottom">
		<a href="#" onclick="window.history.go(-1); return false;" class="btn btn-info back-to-hitist">BACK TO HITLIST</a>
	</div> --}}
</main>

