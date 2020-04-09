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

 @if ($message = Session::get('message'))
      <div class="alert {{$message['class']}}" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>{{$message['msg']}}</strong>
      </div>
      @endif

<div class="container">
  <h3 class="text-primary">Library Admin</h3>
  
  <div class="row">
    <div class="col-sm-3 col-md-6 col-lg-3" >
		<ul class="list-group">
			<li class="list-group-item"><a href="{{ url('/library/manage/information') }}">YOUR NAME</a></li>
			<li class="list-group-item"><a href="{{ url('/library/manage/login') }}"> -YOUR LOGIN DETAILS</a></li>
			<li class="list-group-item"><a href="{{ url('/library/manage/contact') }}"> -YOUR CONTACT DETAILS</a></li>
			<li class="list-group-item"><a href="{{ url('/library/manage/ip-setting') }}"> -IP LOGIN</a></li>
			<li class="list-group-item"><a href="{{ url('/library/manage/remote-access') }}"> -REMOTE ACCESS</a></li>
			<li class="list-group-item"><a href="{{ url('/library/manage/remote-arena') }}"> -DOMAIN NAME PIN</a></li>
			<li class="list-group-item"><a href="{{ url('/library/manage/static-report') }}">REPORTS</a></li>
			<li class="list-group-item"><a href="{{ url('/library/manage/account-history') }}">ORDER HISTORY</a></li>
			
		  </ul>
    </div>
    <div class="col-sm-9 col-md-6 col-lg-9">
	
		<h3 class="text-primary">Welcome</h3>
		
		<hr>
		
			
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

