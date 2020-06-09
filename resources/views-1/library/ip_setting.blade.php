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
			<h3 class="text-primary">{{ __('word.ip') }} {{ __('word.login') }}</h3>
		</div>
		<div class="col-sm-4">
			<button class="pull-right btn btn-primary formBox" onClick="hideFromBox();" style="display:none; margin-top: 10px;">{{ __('word.cancel') }}</button>
			<button class="pull-right btn btn-primary datashow" onClick="showFromBox();" style="margin-top: 10px;">{{ __('word.edit') }}</button>
		</div>
		<br>
		<hr style="width: 100%; border-bottom: 2px dotted #108cca;">
		
			<p>{{ __('word.show') }} {{ __('word.list') }} {{ __('word.of') }} {{ __('word.ip') }} {{ __('word.access') }} {{ __('word.for') }} {{ __('word.users') }} {{ __('word.to') }} {{ __('word.login') }}.<br>
			<span class="text-primary">{{ __('word.ip') }} {{ __('word.range') }} ( 0 . 0 . 0 . 0 - 191 . 255 . 255 . 255 )</span></p>
			<form class="form-horizontal" action="{{ url('/library/manage/ip_setting_edit/'.$user->id) }}" method="post">
			@csrf
				<table class="table table-condensed">
					<thead>
					  <tr>
						<th>{{ __('word.from') }}</th>
						<th>{{ __('word.to') }}</th>
					  </tr>
					</thead>
					<tbody>
					  
					  <?php foreach($ips as $Ip){ ?>
					  <tr>
						<td class="datashow">{{$Ip->from}}</td>
						<td class="datashow">{{$Ip->to}}</td>
						 </tr>
						<?php } ?>
					 
					</tbody>
				  </table>
					<?php if (!empty($ips)){	
						foreach($ips as $data){
						$ipdata = explode('.', $data->from);
						$ipto = explode('.', $data->to);
					?>
					<div class="row formBox" style="display:none;">
					<div class="form-group row">
						<label for="From" class="col-sm-1 col-form-label">{{ __('word.from') }}:</label>

						<div class="col-sm-1">
						<input class="form-control" maxlength="3" onkeypress="return alphaOnly(event);" placeholder="" value="<?=$ipdata[0]?>" name="from1[]" type="text">
						</div>
						<div class="col-sm-1">
						<input class="form-control" maxlength="3" onkeypress="return alphaOnly(event);" placeholder="" value="<?=$ipdata[1]?>" name="from2[]" type="text">
						</div>
						<div class="col-sm-1">
						<input class="form-control" maxlength="3" onkeypress="return alphaOnly(event);" placeholder="" value="<?=$ipdata[2]?>" name="from3[]" type="text">
						</div>
						<div class="col-sm-1">
						<input class="form-control" onkeypress="return alphaOnly(event);" maxlength="3" placeholder="" value="<?=$ipdata[3]?>" name="from4[]" type="text">
						</div>

						<label for="To" class="col-sm-1 col-form-label">{{ __('word.to') }}:</label>
						
						<div class="col-sm-1">
						<input class="form-control" maxlength="3" onkeypress="return alphaOnly(event);" placeholder="" value="<?=$ipto[0]?>" name="to1[]" type="text">
						</div>
						<div class="col-sm-1">
						<input class="form-control" maxlength="3" onkeypress="return alphaOnly(event);" placeholder="" value="<?=$ipto[1]?>" name="to2[]" type="text">
						</div>
						<div class="col-sm-1">
						<input class="form-control" maxlength="3" onkeypress="return alphaOnly(event);" placeholder="" value="<?=$ipto[2]?>" name="to3[]" type="text">
						</div>
						<div class="col-sm-1">
						<input class="form-control" maxlength="3" onkeypress="return alphaOnly(event);" placeholder="" value="<?=$ipto[3]?>" name="to4[]" type="text">
						</div>
						<div class="col-sm-2">
							
						</div>
						</div>
				</div>
					<?php }  } ?>
				<div class="input_fields_wrap formBox" style="display:none;">
					<a class="add_field_button"><span class="glyphicon glyphicon-plus"></span> {{ __('word.add') }}</a><hr>
				</div>
				
				 <button type="submit" onClick="return validate();" class="pull-right btn btn-primary formBox" style="display:none;">{{ __('word.save') }}</button>
			</form>
			</div>
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
	
	$(document).ready(function() {
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
	var add_button      = $(".add_field_button"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			//text box increment
			$(wrapper).append('<div class="form-group row"><label for="From" class="col-sm-1 col-form-label">from:</label><div class="col-sm-1"><input class="form-control" maxlength="3" onkeypress="return alphaOnly(event);" placeholder="" name="from1[]" type="text"></div><div class="col-sm-1"><input class="form-control" maxlength="3" onkeypress="return alphaOnly(event);" placeholder="" name="from2[]" type="text"></div><div class="col-sm-1"><input class="form-control" maxlength="3" onkeypress="return alphaOnly(event);" placeholder="" name="from3[]" type="text"></div><div class="col-sm-1"><input class="form-control" onkeypress="return alphaOnly(event);" maxlength="3" placeholder="" name="from4[]" type="text"></div><label for="To" class="col-sm-1 col-form-label">to:</label><div class="col-sm-1"><input class="form-control" maxlength="3" onkeypress="return alphaOnly(event);" placeholder="" name="to1[]" type="text"></div><div class="col-sm-1"><input class="form-control" maxlength="3" onkeypress="return alphaOnly(event);" placeholder="" name="to2[]" type="text"></div><div class="col-sm-1"><input class="form-control" maxlength="3" onkeypress="return alphaOnly(event);" placeholder="" name="to3[]" type="text"></div><div class="col-sm-1"><input class="form-control" maxlength="3" onkeypress="return alphaOnly(event);" placeholder="" name="to4[]" type="text"></div><a href="#" class="remove_field"><span class="glyphicon glyphicon-trash"></span></a><div class="col-sm-2"></div></div>'); //add input box
			x++; 
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});


</script>
@endsection

