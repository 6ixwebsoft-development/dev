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
    <div class="col-sm-3 col-md-6 col-lg-3" >
		<ul class="list-group">
			<li class="list-group-item"><a href="">YOUR NAME</a></li>
			<li class="list-group-item"><a href=""> -YOUR LOGIN DETAILS</a></li>
			<li class="list-group-item"><a href=""> -YOUR CONTACT DETAILS</a></li>
			<li class="list-group-item"><a href=""> -IP LOGIN</a></li>
			<li class="list-group-item"><a href=""> -REMOTE ACCESS</a></li>
			<li class="list-group-item"><a href=""> -DOMAIN NAME PIN</a></li>
			<li class="list-group-item"><a href="">REPORTS</a></li>
			<li class="list-group-item"><a href="">ORDER HISTORY</a></li>
			
		  </ul>
    </div>
    <div class="col-sm-9 col-md-6 col-lg-9">
	
		<h3 class="text-primary">YOUR NAME</h3>
		<button class="pull-right btn btn-primary formBox" onClick="hideFromBox();" style="display:none;">Cancel</button>
		<button class="pull-right btn btn-primary" onClick="showFromBox();">EDIT</button>
		<hr>
		
			<form class="form-horizontal" action="/action_page.php">
			  <div class="form-group">
				<label class="col-sm-3" for="email">Library:</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$basic->name}}</span>
				  <input type="text" class="form-control formBox" id="library" placeholder="Enter email" name="library" style="display:none;" value="{{$basic->name}}">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class=" col-sm-3" for="email">Language :</label>
				<div class="col-sm-9">
				  <span class="datashow">{{$basic->name}}</span>
					<select class="form-control formBox" style="display:none;" name="language">
						<?php foreach($language as $lan){?>
						<option value="{{$lan->id}}">{{$lan->language}}</option>
						<?php } ?>
					</select>
				</div>
			  </div>
			  <div class="form-group">
				<label class=" col-sm-3" for="email">Show in list:</label>
				<div class="col-sm-9">
				  <span class="datashow">Yes</span>
				  <select class="form-control formBox" style="display:none;" name="language">
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class=" col-sm-3" for="email">Login Type:</label>
				<div class="col-sm-9">
				  <span class="">Username/password only</span>
				  
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class=" col-sm-3" for="email">Number of users :</label>
				<div class="col-sm-9">
				  <span class="">1</span>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class=" col-sm-3" for="email">Availability:</label>
				<div class="col-sm-9">
				  <span class="">Sweden (lars@globalgrant.com)</span>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class=" col-sm-3" for="email">Remarks:</label>
				<div class="col-sm-9">
				  <span class="datashow">--</span>
				  <textarea class="form-control formBox" style="display:none;" name="remark" rows="5"></textarea>
				</div>
			  </div>
			 
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

