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
		@if($message = Session::get('error'))
			<script type="text/javascript">				
				$( document ).ready(function() {
				    showFromBox();
				});
			</script>
			@if(is_array($message))
			<div class="alert alert-danger alert-dismissible">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				@foreach($message as $row)
					
					  {{$row}}<br>
					
				@endforeach
				</div>
			@endif;
		@endif
		@if($message = Session::get('message'))
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
			<h3 class="text-primary">{{ __('word.your') }} {{ __('word.login') }} {{ __('word.details') }}</h3>
		</div>
		<div class="col-sm-4">
			<button class="pull-right btn btn-primary formBox" onClick="hideFromBox();" style="display:none; margin-top: 10px;">{{ __('word.cancel') }}</button>
			<button class="pull-right btn btn-primary datashow" onClick="showFromBox();" style="margin-top: 10px;">{{ __('word.edit') }}</button>
		</div>
		<br><br>
		<hr style="width: 100%; border-bottom: 2px dotted #108cca;">
		
			<form class="form-horizontal" action="{{ url('/customer/edit/edit_login/'.$user->id) }}" method="post">
			@csrf
			<h4 class="text-primary">{{ __('word.your password must be a minimum of 8 characters, at least one capital letter and one digit') }}.</h4>
			  <div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.email') }}*:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$user->email}}</span>
				  <input type="text" class="form-control formBox" id="email" name="email" style="display:none;" value="{{$user->email}}">
				</div>
			  </div>
			
			  <div class="form-group">
				<label class="col-sm-3 datashow" for="email">{{ __('word.change') }} {{ __('word.password') }}:</label>
				<div class="col-sm-9">
				  <span class="datashow">*****************</span>
				</div>
			  </div>
			  
			 <div class="form-group">
				<label class="col-sm-3 formBox" for="email" style="display:none;">{{ __('word.new') }} {{ __('word.password') }} </label>
				<div class="col-sm-9">
				  <input type="password" class="form-control formBox" id="library" placeholder="Enter password" name="password" style="display:none;" value="">
				</div>
			</div>
			  
			  <div class="form-group">
				<label class="col-sm-3 formBox" for="email" style="display:none;">{{ __('word.confirm') }} {{ __('word.new') }} {{ __('word.password') }}:</label>
				<div class="col-sm-9">
				  <input type="password" class="form-control formBox" id="library" placeholder="Enter password" name="confirm-password" style="display:none;" value="">
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

