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
  <h3 class="text-primary">{{ __('word.member') }} {{ __('word.page') }}</h3>
  
  <div class="row">
   
	@include('customer.sidebar')
    <div class="col-sm-9 col-md-6 col-lg-9">
	
		@if ($message = Session::get('message'))
			<div class="alert {{$message['class']}} alert-dismissible">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  {{$message['msg']}}
			</div>
		 @endif
		
		@if (count($errors) > 0)
			<div class="alert alert-danger alert-dismissible" role="alert">
				<ul id="login-validation-errors" class="validation-errors">
					@foreach ($errors->all() as $error)
						<li class="validation-error-item">{{ $error }}</li>
					@endforeach
				</ul>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div><hr>
		@endif
		<div class="col-sm-8">
			<h3 class="text-primary">{{ __('word.your') }} {{ __('word.name') }}</h3>
		</div>
		<div class="col-sm-4">
			<button class="pull-right btn btn-primary formBox" onClick="hideFromBox();" style="display:none; margin-top: 10px;">{{ __('word.cancel') }}</button>
			<button class="pull-right btn btn-primary datashow" onClick="showFromBox();" style="margin-top: 10px;">{{ __('word.edit') }}</button>
		</div>
		<br><br>
		<hr style="width: 100%; border-bottom: 2px dotted #108cca;">

			<form class="form-horizontal" action="{{ url('/customer/edit/edit_basicinfo/'.$user->id) }}" method="post">
			@csrf
			
			<div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.first') }} {{ __('word.name') }}*:</label>
				<div class="col-sm-9">
				  <span class="datashow">
					@if(!empty($userinfo->firstname)){{$userinfo->firstname}}
					@else --
					@endif
				  </span>
				  <input type="text" class="form-control formBox" id="fname" placeholder="Enter email" name="fname" style="display:none;" value="{{$userinfo->firstname}}">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.last') }} {{ __('word.name') }}*:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$userinfo->lastname}}</span>
				  <input type="text" class="form-control formBox" id="lname" placeholder="Enter email" name="lname" style="display:none;" value="{{$userinfo->lastname}}">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class=" col-sm-3" for="email">{{ __('word.language') }}*:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{get_language_name($userinfo->language)}}</span>
					<select class="form-control formBox" style="display:none;" name="language">
						<?php foreach($language as $lan){?>
						<option value="{{$lan->id}}">{{$lan->language}}</option>
						<?php } ?>
					</select>
				</div>
			  </div>
			 <button type="submit" class="pull-right btn btn-primary formBox" style="display:none;">{{ __('word.save') }}</button>
			</form>
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

