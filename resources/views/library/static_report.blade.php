 @extends('layouts.mainlayout')
@section('content')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
.textset{
	 padding-left: 40px;
}

</style>

<div class="container">
  <h3 class="text-primary">{{ __('word.library') }} {{ __('word.admin') }}</h3>
  
  <div class="row">
    @include('library.sidebar')
    <div class="col-sm-9 col-md-6 col-lg-9">
	@if ($message = Session::get('message'))
			<div class="alert {{$message['class']}} alert-dismissible">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  {{$message['msg']}}
			</div>
		 @endif
		<div class="col-sm-12">
			<h3 class="text-primary">{{ __('word.reports') }} - {{ __('word.show') }} {{ __('word.details') }} {{ __('word.about') }} {{ __('word.the') }} {{ __('word.reports') }} .</h3>
		</div>
				<br>
		<br>
		<hr style="width: 100%; border-bottom: 2px dotted #108cca;">
		<table class="table">						  <thead>							<tr>							  <th scope="col">(2020)</th>							  <th scope="col">Jan</th>							  <th scope="col">Feb</th>							  <th scope="col">Mar</th>							  <th scope="col">Apr</th>							  <th scope="col">May</th>							  <th scope="col">Jun</th>							  <th scope="col">Jul</th>							  <th scope="col">Aug</th>							  <th scope="col">Sep</th>							  <th scope="col">Oct</th>							  <th scope="col">Nov</th>							  <th scope="col">Dec</th>							  <th scope="col">Total</th>							</tr>						  </thead>						  <tbody>						  @if(!empty($visit))							@foreach($visit as $count)							<tr>								<th scope="row">									<?php 									if($count->type == 1){echo 'Ip-Login';}									if($count->type == 2){echo 'Remote-Access';}									if($count->type == 3){echo 'Page-View';}									?>								</th>									<td>{{$count->month_1}}</td>								<td>{{$count->month_2}}</td>								<td>{{$count->month_3}}</td>								<td>{{$count->month_4}}</td>								<td>{{$count->month_5}}</td>								<td>{{$count->month_6}}</td>								<td>{{$count->month_7}}</td>								<td>{{$count->month_8}}</td>								<td>{{$count->month_9}}</td>								<td>{{$count->month_10}}</td>								<td>{{$count->month_11}}</td> 								<td>{{$count->month_12}}</td>								<td>{{$count->total}}</td>							</tr>							@endforeach						 @endif						  </tbody>						</table>
    </div>
  </div>
  <br>
</div>
<script>
	function showFromBox(){
		$(".datashow").hide();
		$(".formBox").show();
	}
	
	function hideFromBox(){
		$(".formBox").hide();
		$(".datashow").show();
	}
</script>
@endsection

