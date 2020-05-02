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
		<div class="col-sm-8">
			<h3 class="text-primary">{{ __('word.your') }} {{ __('word.contact') }} {{ __('word.details') }}</h3>
		</div>
		<div class="col-sm-4">
			<button class="pull-right btn btn-primary formBox" onClick="hideFromBox();" style="display:none; margin-top: 10px;">{{ __('word.cancel') }}</button>
			<button class="pull-right btn btn-primary datashow" onClick="showFromBox();" style="margin-top: 10px;">{{ __('word.edit') }}</button>
		</div>
		<br><br>
		<hr style="width: 100%; border-bottom: 2px dotted #108cca;">

			<form class="form-horizontal" action="{{ url('/customer/edit/edit_contactinfo/'.$user->id) }}" method="post">
			@csrf
			
			<div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.street') }} {{ __('word.address') }}:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$userinfo->streetadress}}</span>				  
				  <textarea class="form-control formBox" style="display:none;" name="streetadress" rows="5">{{$userinfo->streetadress}}</textarea>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.zipcode') }}*:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$userinfo->zipcode}}</span>
				  <input type="text" class="form-control formBox" id="zipcode" placeholder="Enter email" name="zipcode" style="display:none;" value="{{$userinfo->zipcode}}">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.country') }}*:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{get_country_name($userinfo->country)}}</span>
				 
				  <select class="form-control formBox" style="display:none;" name="bcountry">
						<?php foreach($country as $Country){?>
						<option value="{{$Country->id}}" <?php if($userinfo->country == $Country->id){echo 'selected';}?>>{{$Country->country_name}}</option>
						<?php } ?>
					</select>
				  
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.city') }}:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{get_city_name($userinfo->city)}}</span>
					
				  <select class="form-control formBox" style="display:none;" name="bcity">
						<?php foreach($city as $City){?>
						<option value="{{$City->id}}" <?php if($userinfo->city == $City->id){echo 'selected';}?>>{{$City->city_name}}</option>
						<?php } ?>
					</select>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.phone') }}*:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$userinfo->phone}}</span>
				  <input type="text" class="form-control formBox" id="phone" placeholder="Enter email" name="phone" style="display:none;" value="{{$userinfo->phone}}">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.mobile') }}*:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$userinfo->mobile}}</span>
				  <input type="text" class="form-control formBox" id="mobile" placeholder="Enter email" name="mobile" style="display:none;" value="{{$userinfo->mobile}}">
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

