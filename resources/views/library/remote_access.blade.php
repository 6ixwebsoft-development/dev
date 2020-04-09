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
			<h3 class="text-primary">YOUR LOGIN DETAILS</h3>
		</div>
		<div class="col-sm-4">
			<button class="pull-right btn btn-primary formBox" onClick="hideFromBox();" style="display:none; margin-top: 10px;">Cancel</button>
			<button class="pull-right btn btn-primary datashow" onClick="showFromBox();" style="margin-top: 10px;">EDIT</button>
		</div>
		<br>
		<hr style="width: 100%; border-bottom: 2px dotted #108cca;">
		
			<p>Shows list of Remote access for users to log in.<br>
			<span class="text-primary">Remote Name : Test</span></p>
			<form class="form-horizontal" action="{{ url('/library/manage/remote_access_edit/'.$user->id) }}" method="post">
			@csrf
				<table class="table table-condensed">
					<thead>
					  <tr>
						<th>Digits in Remote ID</th>
						<th>Your Member's number (i.e. Your Library card #)</th>
					  </tr>
					</thead>
					<tbody>
					  
					  <?php foreach($remoteips as $Remoteips){ ?>
					  <tr>
						<td class="datashow">{{$Remoteips->remotedigit}}</td>
						<td class="datashow">{{$Remoteips->remoteid}}</td>
						 </tr>
						<?php } ?>
					 
					</tbody>
				  </table>
			<hr>
				<?php foreach($remoteips as $Remoteips){ ?>
				<div class="row formBox" style="display:none;">
					<div class="customer_records">
						<div class="form-group">
							<div class="col-sm-4">
								{!! Form::select('remotedigit[]', (['1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10','11' => '11','12' => '12','13' => '13','14' => '14','15' => '15',]),$Remoteips->remotedigit, ['class' => 'form-control','onChange'=>'maxLengthFunction();','id'=>'remotedigit' ]  ); !!}
							</div>
							<div class="col-sm-6"> 
								<input type="text" class="form-control formBox" id="remoteid" placeholder="******" name="remoteid[]" value="{{$Remoteips->remoteid}}" maxlength="">
							</div>
							<a href="#" class="remove_field"><span class="glyphicon glyphicon-trash"></span></a>
						</div>
					</div>
				</div>
				
				<?php } ?>
				<div class="input_fields_wrap formBox" style="display:none;">
					<a class="add_field_button"><span class="glyphicon glyphicon-plus"></span> Add</a><hr>
				</div>
				
				 <button type="submit" onClick="return validate();" class="pull-right btn btn-primary formBox" style="display:none;">Save</button>
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
	
	$(document).ready(function() {
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
	var add_button      = $(".add_field_button"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			//text box increment
			$(wrapper).append('<div class="row formBox"><div class="customer_records"><div class="form-group"><div class="col-sm-4"><select class="form-control" name="remotedigit[]" id="remotedigit_'+x+'" onChange="maxLengthFunction('+x+');"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option></select></div><div class="col-sm-6"> <input type="text" class="form-control formBox" id="remoteid_'+x+'" placeholder="******" name="remoteid[]"  readonly value="" maxlength=""></div><a href="#" class="remove_field"><span class="glyphicon glyphicon-trash"></span></a></div></div></div></div>'); //add input box
			x++; 
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});


</script>
@endsection

