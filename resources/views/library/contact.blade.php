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
  <h3 class="text-primary">Library Admin</h3>
  
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
			<h3 class="text-primary">YOUR CONTACT DETAILS</h3>
		</div>
		<div class="col-sm-4">
			<button class="pull-right btn btn-primary formBox" onClick="hideFromBox();" style="display:none; margin-top: 10px;">Cancel</button>
			<button class="pull-right btn btn-primary datashow" onClick="showFromBox();" style="margin-top: 10px;">EDIT</button>
		</div>
		<br>
		<hr style="width: 100%; border-bottom: 2px dotted #108cca;">
		
		
			<form class="form-horizontal" action="{{ url('/library/manage/contact_edit/'.$contact->libraryid) }}" method="post">
			@csrf
			
			<div class="form-group">
				<label class="col-sm-3" for="email">Contact Name:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$contact->contactname}}</span>
				  <input type="text" class="form-control formBox" id="library" placeholder="Enter email" name="contactname" style="display:none;" value="{{$contact->contactname}}">
				</div>
			</div>
			  
			  <div class="form-group">
				<label class="col-sm-3" for="email">Email:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$contact->email}}</span>
				  <input type="text" class="form-control formBox" id="library" placeholder="Enter email" name="email" style="display:none;" value="{{$contact->email}}">
				</div>
			  </div>
			  
			   <div class="form-group">
				<label class="col-sm-3" for="email">Phone:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$contact->phone}}</span>
				  <input type="text" class="form-control formBox" id="library" placeholder="Enter email" name="phone" style="display:none;" value="{{$contact->phone}}">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="col-sm-3" for="email">Mobile Phone:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$contact->mobile}}</span>
				  <input type="text" class="form-control formBox" id="library" placeholder="Enter email" name="mobile" style="display:none;" value="{{$contact->mobile}}">
				</div>
			  </div>
			 
			<h4 class="text-primary">Billing Address</h4>
			 
			 <div class="form-group">
				<label class="col-sm-3" for="email">Not in use:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$contact->contactaddress}}</span>
				  
				  <textarea class="form-control formBox" style="display:none;" name="baddress" rows="5">{{$contact->postaladdress}}</textarea>
				</div>
			  </div>
			 
			 <div class="form-group">
				<label class="col-sm-3" for="email">Zip code:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$contact->contactzip}}</span>
				  <input type="text" class="form-control formBox" id="library" placeholder="Enter email" name="bzip" style="display:none;" value="{{$contact->contactzip}}">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="col-sm-3" for="email">Country:</label>
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
				<label class="col-sm-3" for="email">City:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{get_city_name($contact->contactcity)}}</span>
					
				  <select class="form-control formBox" style="display:none;" name="bcity">
						<?php foreach($city as $City){?>
						<option value="{{$City->id}}" <?php if($contact->contactcity == $City->id){echo 'selected';}?>>{{$City->city_name}}</option>
						<?php } ?>
					</select>
				</div>
			  </div>
			 
			 <h4 class="text-primary">Postal Address</h4>
			 
			 <div class="form-group">
				<label class="col-sm-3" for="email">Not in use:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$contact->postaladdress}}</span>
				  
				  <textarea class="form-control formBox" style="display:none;" name="paddress" rows="5">{{$contact->postaladdress}}</textarea>
				</div>
			  </div>
			 
			 <div class="form-group">
				<label class="col-sm-3" for="email">Zip code:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$contact->postalzip	}}</span>
				  <input type="text" class="form-control formBox" id="library" placeholder="Enter email" name="pzip" style="display:none;" value="{{$contact->postalzip	}}">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="col-sm-3" for="email">Country:</label>
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
				<label class="col-sm-3" for="email">City:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{get_city_name($contact->contactcity)}}</span>
				  
				  <select class="form-control formBox" style="display:none;" name="pcity">
						<?php foreach($city as $City){?>
						<option value="{{$City->id}}" <?php if($contact->contactcity == $City->id){echo 'selected';}?>>{{$City->city_name}}</option>
						<?php } ?>
					</select>
				  
				  
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

