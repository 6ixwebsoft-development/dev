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
			<h3 class="text-primary">{{ __('word.your') }} {{ __('word.contact') }} {{ __('word.details') }}</h3>
		</div>
		<div class="col-sm-4">
			<button class="pull-right btn btn-primary formBox" onClick="hideFromBox();" style="display:none; margin-top: 10px;">{{ __('word.cancel') }}</button>
			<button class="pull-right btn btn-primary datashow" onClick="showFromBox();" style="margin-top: 10px;">{{ __('word.edit') }}</button>
		</div>
		<br>
		<hr style="width: 100%; border-bottom: 2px dotted #108cca;">
		
		
			<form class="form-horizontal" action="{{ url('/library/manage/contact_edit/'.$contact->libraryid) }}" method="post">
			@csrf
			
			<div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.contact') }} {{ __('word.name') }}:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$contact->contactname}}</span>
				  <input type="text" class="form-control formBox" id="library" placeholder="Enter email" name="contactname" style="display:none;" value="{{$contact->contactname}}">
				</div>
			</div>
			  
			  <div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.email') }}:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$contact->email}}</span>
				  <input type="text" class="form-control formBox" id="library" placeholder="Enter email" name="email" style="display:none;" value="{{$contact->email}}">
				</div>
			  </div>
			  
			   <div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.phone') }}:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$contact->phone}}</span>
				  <input type="text" class="form-control formBox" id="library" placeholder="Enter email" name="phone" style="display:none;" value="{{$contact->phone}}">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.mobile') }}</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$contact->mobile}}</span>
				  <input type="text" class="form-control formBox" id="library" placeholder="Enter email" name="mobile" style="display:none;" value="{{$contact->mobile}}">
				</div>
			  </div>
			 
			<h4 class="text-primary">{{ __('word.billing') }} {{ __('word.address') }}</h4>
			 
			 <div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.not') }} {{ __('word.in') }} {{ __('word.use') }}:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$contact->contactaddress}}</span>
				  
				  <textarea class="form-control formBox" style="display:none;" name="baddress" rows="5">{{$contact->postaladdress}}</textarea>
				</div>
			  </div>
			 
			 <div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.zipcode') }}:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$contact->contactzip}}</span>
				  <input type="text" class="form-control formBox" id="library" placeholder="Enter email" name="bzip" style="display:none;" value="{{$contact->contactzip}}">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.country') }}:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{get_country_name($contact->contactcountry)}}</span>
				 
				  <select class="form-control formBox" style="display:none;" name="bcountry">
						<?php foreach($country as $Country){?>
						<option value="{{$Country->id}}" <?php if($contact->contactcountry == $Country->id){echo 'selected';}?>>{{$Country->country_name}}</option>
						<?php } ?>
					</select>
				  
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.city') }}:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{get_city_name($contact->contactcity)}}</span>
					
				  <select class="form-control formBox" style="display:none;" name="bcity">
						<?php foreach($city as $City){?>
						<option value="{{$City->id}}" <?php if($contact->contactcity == $City->id){echo 'selected';}?>>{{$City->city_name}}</option>
						<?php } ?>
					</select>
				</div>
			  </div>
			 
			 <h4 class="text-primary">{{ __('word.postal') }} {{ __('word.address') }}</h4>
			 
			 <div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.not') }} {{ __('word.in') }} {{ __('word.use') }}:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$contact->postaladdress}}</span>
				  
				  <textarea class="form-control formBox" style="display:none;" name="paddress" rows="5">{{$contact->postaladdress}}</textarea>
				</div>
			  </div>
			 
			 <div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.zipcode') }}:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$contact->postalzip	}}</span>
				  <input type="text" class="form-control formBox" id="library" placeholder="Enter email" name="pzip" style="display:none;" value="{{$contact->postalzip	}}">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.country') }}:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{get_country_name($contact->postalcountry)}}</span>
				  
				  <select class="form-control formBox" style="display:none;" name="pcountry">
						<?php foreach($country as $Country){?>
						<option value="{{$Country->id}}" <?php if($contact->postalcountry == $Country->id){echo 'selected';}?>>{{$Country->country_name}}</option>
						<?php } ?>
					</select>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="col-sm-3" for="email">{{ __('word.city') }}:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{get_city_name($contact->contactcity)}}</span>
				  
				  <select class="form-control formBox" style="display:none;" name="pcity">
						<?php foreach($city as $City){?>
						<option value="{{$City->id}}" <?php if($contact->contactcity == $City->id){echo 'selected';}?>>{{$City->city_name}}</option>
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

