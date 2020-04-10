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
  <h3 class="text-primary">Member Page</h3>
  
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
			<h3 class="text-primary">YOUR LOGIN DETAILS</h3>
		</div>
		<div class="col-sm-4">
			<button class="pull-right btn btn-primary formBox" onClick="hideFromBox();" style="display:none; margin-top: 10px;">Cancel</button>
			<button class="pull-right btn btn-primary datashow" onClick="showFromBox();" style="margin-top: 10px;">EDIT</button>
		</div>
		<br>
		<hr style="width: 100%; border-bottom: 2px dotted #108cca;">
		
			<form class="form-horizontal" action="{{ url('/customer/edit/edit_login/'.$user->id) }}" method="post">
			@csrf
			<h4 class="text-primary">Your password must be a minimum of 8 characters, at least one capital letter and one digit.</h4>
			  <div class="form-group">
				<label class="col-sm-3" for="email">Email*:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$user->email}}</span>
				  <input type="text" class="form-control formBox" id="email" name="email" style="display:none;" value="{{$user->email}}">
				</div>
			  </div>
			
			  <div class="form-group">
				<label class="col-sm-3 datashow" for="email">Change Password:</label>
				<div class="col-sm-9">
				  <span class="datashow">*****************</span>
				</div>
			  </div>
			  
			 <div class="form-group">
				<label class="col-sm-3 formBox" for="email" style="display:none;">New Password </label>
				<div class="col-sm-9">
				  <input type="password" class="form-control formBox" id="library" placeholder="Enter password" name="password" style="display:none;" value="">
				</div>
			</div>
			  
			  <div class="form-group">
				<label class="col-sm-3 formBox" for="email" style="display:none;">Confirm New Password:</label>
				<div class="col-sm-9">
				  <input type="password" class="form-control formBox" id="library" placeholder="Enter password" name="confirm-password" style="display:none;" value="">
				</div>
			  </div>
			  
			  <button type="submit" class="pull-right btn btn-primary formBox" style="display:none;">Save</button>
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

