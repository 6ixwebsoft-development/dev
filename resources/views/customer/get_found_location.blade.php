<?php $rand = rand(1000,9999);?>
<div class="row">
<div class="col-md-2">
<label for="type" >country block</label>
<select class="form-control mycountryblock" name="country_block[]" id="countryBlock">
	<option value=""></option>
	@foreach($blocks as $Blocks)
	<option value="{{$Blocks->id}}">{{$Blocks->name}}</option>
	@endforeach
</select>
</div>

<div class="col-md-2">
<label for="type" >country</label>
<select class="form-control mycountries" name="country[]" id="countryid_{{$rand}}" onchange ="getRegion({{$rand}});">
	<option value=""></option>
	@foreach($countries as $country)
	<option value="{{$country->id}}"  <?php if($country->id == 187){echo "selected";}?>>{{$country->country_name}}</option>
	@endforeach
</select>
</div>

<div class="col-md-2">
<label for="type" >Region</label>
<select class="form-control regiondata" name="region[]" id="regionid_{{$rand}}" onchange="getCity({{$rand}});">
	<option value=""></option>
	@foreach($regions as $Regions)
	<option value="{{$Regions->id}}">{{$Regions->region_name}}</option>
	@endforeach
</select>
</div>

<div class="col-md-2">
<label for="type" >City</label>
<select class="form-control citydata" name="city[]" id="cityid_{{$rand}}">
	<option value=""></option>
	@foreach($cities as $city)
	<option value="{{$city->id}}">{{$city->city_name}}</option>
	@endforeach
</select>
</div>

<div class="col-md-2">
<label for="type" >Parish</label>
<input type="text" name="parish[]" class="form-control" placeholder="parish">
</div>
<a href="javascript:void(0);" class="remove_button btn btn-danger">Remove</a>
</div>

<br>
