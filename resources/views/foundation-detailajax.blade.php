<div class="model__button_top">
		@if(!empty($previd))
		<a class="btn btn-info" onClick="getFoundationDetailajax({{$previd}},-1);"><< Previous</a> 
		@endif
		@if(!empty($nextid))
		<a class="btn btn-info" onClick="getFoundationDetailajax({{$nextid}},1);">Next >></a>
		@endif
	<br>
	</div>
<main class="main-content">
				
	<div class="page">
		<div class="container">
			
				
			<div class="fund-detail">
				@foreach($foundation_details as $foundation_detail)
					
					<div style="">
					<div class="fundTitle">
						<strong>ID {{$foundation_detail->id}} - {{$foundation_detail->name}}</strong>
					</div>
					<div class="fundPurpose">
						<p>{{strip_tags($foundation_detail->purpose)}}</p>
					</div>
					<div class="fundWhoCanApply">
						<p>{{strip_tags($foundation_detail->who_can_apply)}}</p>
					</div>
					<div class="fundRemarks">
						<p>{{strip_tags($foundation_detail->remarks)}}</p>
					</div>
					<div class="fundDetails">
						<p>{{strip_tags($foundation_detail->details)}}</p>
					</div>
					<div class="fundContacts">
						<h4>Contacts</h4>
						<!--<p>{{$foundation_detail->address1}}</p> -->
						<p>{{$foundation_detail->address2}}</p>
						<p>{{$foundation_detail->address3}}</p>
						<br>
						<p>Telephone: {{$foundation_detail->phone_no}}</p>
						<p>Email: {{$foundation_detail->email}}</p>
						<p>Website: <a href="{{$foundation_detail->website}}">{{$foundation_detail->website}}</a></p>
					</div>
					</div>
				@endforeach
				
				
			</div>
		</div>
	</div> <!-- .page -->
	<div class="model__button_bottom">
		<a href="#" onclick="window.history.go(-1); return false;" class="btn btn-info back-to-hitist">BACK TO HITLIST</a>
	</div>
</main>

