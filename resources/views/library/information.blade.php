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
			<h3 class="text-primary">{{ __('word.your') }} {{ __('word.name') }}</h3>
		</div>
		<div class="col-sm-4">
			<button class="pull-right btn btn-primary formBox" onClick="hideFromBox();" style="display:none; margin-top: 10px;">{{ __('word.cancel') }}</button>
			<button class="pull-right btn btn-primary datashow" onClick="showFromBox();" style="margin-top: 10px;">{{ __('word.edit') }}</button>
		</div>
		<br>
		<hr style="width: 100%; border-bottom: 2px dotted #108cca;">
		
			<form class="form-horizontal" action="{{ url('/library/manage/information_edit/'.$basic->userid) }}" method="post">
			@csrf
			  <div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.library') }}:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$basic->name}}</span>
				  <input type="text" class="form-control formBox" id="library" placeholder="Enter email" name="library" style="display:none;" value="{{$basic->name}}">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class=" col-sm-3" for="email">{{ __('word.language') }} :</label>
				<div class="col-sm-9">
				  <span class="datashow">{{get_language_name($basic->languageid)}}</span>
					<select class="form-control formBox" style="display:none;" name="language">
						<?php foreach($language as $lan){?>
						<option value="{{$lan->id}}">{{$lan->language}}</option>
						<?php } ?>
					</select>
				</div>
			  </div>
			  <div class="form-group">
				<label class=" col-sm-3" for="email">{{ __('word.show') }} {{ __('word.in') }} {{ __('word.list') }}:</label>
				<div class="col-sm-9">
				  <span class="datashow">Yes</span>
				  <select class="form-control formBox" style="display:none;" name="showList">
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class=" col-sm-3" for="email">{{ __('word.login') }} {{ __('word.type') }}:</label>
				<div class="col-sm-9">
				  <span class="">
					<?php
						$type = $basic->logintype;

						switch ($type) {
							case 1:
								echo "Username/password only";
								break;
							case 2:
								echo "IP login only";
								break;
							case 3:
								echo "IP login and username/password both";
								break;
							case 4:
								echo "Blocked user, no access";
								break;
							case 5:
								echo "IP login or username/password";
								break;
							default:
								echo "N/A";
						}
						?>
				  
				  </span>
				  
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class=" col-sm-3" for="email">{{ __('word.number') }} {{ __('word.of') }} {{ __('word.users') }} :</label>
				<div class="col-sm-9">
				  <span class="">{{$basic->usernumber}}</span>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class=" col-sm-3" for="email">{{ __('word.availability') }}:</label>
				<div class="col-sm-9">
				  <span class="">Sweden (lars@globalgrant.com)</span>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class=" col-sm-3" for="email">{{ __('word.remarks') }}:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$basic->remark}}</span>
				  <textarea class="form-control formBox" style="display:none;" name="remark" rows="5">{{$basic->remark}}</textarea>
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

