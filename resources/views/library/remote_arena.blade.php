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
		<div class="col-sm-8">
			<h3 class="text-primary">{{ __('word.domain') }} {{ __('word.name') }} {{ __('word.pin') }}</h3>
		</div>
		<div class="col-sm-4">
			<button class="pull-right btn btn-primary formBox" onClick="hideFromBox();" style="display:none; margin-top: 10px;">{{ __('word.cancel') }}</button>
			<button class="pull-right btn btn-primary datashow" onClick="showFromBox();" style="margin-top: 10px;">{{ __('word.edit') }}</button>
		</div>
		<br>
		<hr style="width: 100%; border-bottom: 2px dotted #108cca;">
		
			<form class="form-horizontal" action="{{ url('/library/manage/remote_arena_edit/'.$user->id) }}" method="post">
			@csrf
			  <div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.library') }}:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$contact->remotearena}}</span>
				  <input type="text" class="form-control formBox" id="remotearena" placeholder="Enter email" name="remotearena" style="display:none;" value="{{$contact->remotearena}}">
				</div>
			  </div>
			  <button type="submit" onClick="return validate();" class="pull-right btn btn-primary formBox" style="display:none;">{{ __('word.save') }}</button>
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

