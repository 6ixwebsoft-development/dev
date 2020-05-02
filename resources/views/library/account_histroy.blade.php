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
		<div class="col-sm-12">
			<h3 class="text-primary">{{ __('word.account') }} {{ __('word.statement') }}</h3>
		</div>
		
		<br>
		<hr style="width: 100%; border-bottom: 2px dotted #108cca;">

		<table class="table table-bordered " id="">
                	<thead>
                    <tr>
                        <th>{{ __('word.subscription') }} {{ __('word.type') }} </th>
                        <th>{{ __('word.start') }} {{ __('word.date') }}</th>
                        <th>{{ __('word.expiry') }} {{ __('word.date') }} </th>
                        <th>{{ __('word.price') }}</th>
                        <th>{{ __('word.status') }}</th>
                        <th>{{ __('word.payment') }}</th>
                        <th>{{ __('word.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
					<tr>
						<td colspan="8">{{ __('word.no') }} {{ __('word.transactions') }} {{ __('word.fund') }}.</td>
					</tr>
                    </tbody>
                </table>
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

