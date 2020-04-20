@if(empty($ajax))
@extends('layouts.mainlayout')
@section('content')
@endif
<main class="main-content">

	<div class="page">
		<div class="container">
			<div  class="fund-detail" id="loaderarea" style="display:none">
				<img src="{{url('frontend/images/loader.gif ')}}" />
			</div>
			<div class="fund-detail">
				@foreach($foundation_details as $foundation_detail)
					<div>
						@if(!empty($previd))
						<a class="btn btn-info" onClick="getFoundationDetailajax({{$previd}},-1);">Previous</a> 
						@endif
						@if(!empty($nextid))
						<a class="btn btn-info" onClick="getFoundationDetailajax({{$nextid}},1);">next</a>
						@endif
					<br>
					</div>
					<div class="fundTitle">
						<strong>ID {{$foundation_detail->id}} - {{$foundation_detail->name}}</strong>
					</div>
					<div class="fundPurpose">
						<p>
						{{$foundation_detail->purpose}}
						</p>
					</div>
					<div class="fundWhoCanApply">
						<p>{{strip_tags($foundation_detail->who_can_apply)}}</p>
					</div>
					<!-- <div class="fundRemarks">
						<p>{{strip_tags($foundation_detail->remarks)}}</p>
					</div> -->
					<div class="fundDetails">
						<p>{{strip_tags($foundation_detail->details)}}</p>
					</div>
					<div class="fundContacts">
						<p> 
						ADRESS :{{$foundation_detail->address1}} {{$foundation_detail->address2}}, {{$foundation_detail->address3}},Tel : {{$foundation_detail->phone_no}}<br>
						{{$foundation_detail->email}},<a href="{{$foundation_detail->website}}">{{$foundation_detail->website}}</a>
						</p>
						<!-- <h4>Contacts</h4>
						<p>{{$foundation_detail->address1}}</p>
						<p>{{$foundation_detail->address2}}</p>
						<p>{{$foundation_detail->address3}}</p>
						<br>
						<p>Telephone: {{$foundation_detail->phone_no}}</p>
						<p>Email: {{$foundation_detail->email}}</p>
						<p>Website: <a href="{{$foundation_detail->website}}">{{$foundation_detail->website}}</a></p> -->
					</div>
				@endforeach
				<a href="#" onclick="window.history.go(-1); return false;" class="back-to-hitist">BACK TO HITLIST</a>
			</div>
		</div>
	</div> <!-- .page -->
</main>
@if(empty($ajax))
@endsection
@endif