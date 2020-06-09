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
	<h3 class="text-primary">Remote Access</h3>
	<hr style="width: 100%; border-bottom: 2px dotted #108cca;">
	<div class="row">
		<div class="col-sm-8">
			<h4 class="text-primary">With a Swedish library card or an international subscription you an find all</h4>
			<p>You can log on remote to our server if your university or library is subscribed to the Global Grant Services. If your school or city is not in the list, you can search for the school / library on the Internet. Some libraries have their own pages for remote access login. For example Google "globalgrant göteborg".</p>
			<br>
			<p class="text-primary">More information about Global Grant </p>
			
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
			
			<form class="form-horizontal" action="{{ url('/libararycard_login') }}" method="post">
			@csrf
			
				<div class="form-group">
					<label class="col-sm-4" for="email">Select library or city:*</label>
					<div class="col-sm-8">
					  <select class="form-control" name="libarary">
						<option value="">select libarary</option>
						@foreach($library as $Library)
							<option value="{{$Library->id}}">{{$Library->name}}</option>
						@endforeach
					  </select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-4" for="email">Your library card code:*</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control formBox" id="librarycard" name="librarycard" value="">
					</div>
				</div>
				
				<button type="submit" class="pull-right btn btn-primary formBox" >Login</button>
				
			</div>
		</form>
	</div>
  <br>
</div>

@endsection
