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
<div class="fund_email" style="position: relative;">
	<div class="mail-modal">
		<div class="modal-overlay"></div>
		<div class="modal-wrapper modal-transition">
			<div class="modal-header">
				<button class="modal-close mail-toggle">
					<i class="fa fa-times"></i>
				</button>
				<h2 class="modal-heading foundation-name"></h2>
			</div>

			<div class="modal-body">
				<div class="modal-content">
					{!! Form::open(array('url' => 'fund-search-mail-send')) !!}

						{!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __( 'Email' ) ]); !!}
						<button type="submit" class="btn btn-primary">Send Email</button>
						<div class="mail-body"></div>
					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div >
</div>
<div class="container">
  <h3 class="text-primary">Member Page</h3>
  
  <div class="row">
   @include('customer.sidebar')
    <div class="col-sm-9 col-md-6 col-lg-9">
	
		@if ($message = Session::get('message'))
			<div class="alert {{$message['class']}} alert-dismissible">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  {{$message['msg']}}
			</div>
		 @endif
		<div class="col-sm-12">
			<h3 class="text-primary">YOUR SAVED FUND RECORDS .</h3>
		</div>
		
		<br>
		<hr style="width: 100%; border-bottom: 2px dotted #108cca;">
		<h4 class="text-primary">If you don't see the names of the funds you saved,<br>register your library card number<br>under tab REGISTER YOUR LIBRARY CARD.</h4>
		
		<div class="col-sm-6 pull-left">
			<a href="#" id="search_email" class="btn btn-primary">{{__('word.'.strtolower('e-mail selected'))}}</a>
		</div>
		<div class="col-sm-6 ">
			<a href="/search-foundation" id="search_email" class="btn btn-primary pull-right">Seaech foundation</a>
		</div>
		<div class="col-sm-12">
			<table class="table table-bordered " id="">
				<thead>
				<tr>
					<th><input type="checkbox" name="" id="selectAll"></th>
					<th>ID#</th>
					<th>Contact person</th>
					<th>Action</th>
				</tr>
				</thead>
					@if(!empty($foundation))
						@foreach($foundation as $found)
							<tr>
								<td><input type="checkbox" name="foundatoin_check" id="checked_foundation" value="{{$found->id}}"></td>
								<td>{{$found->id}}</td>
								<td>{{$found->name}}</td>
								<td><span class="glyphicon glyphicon-trash"></span></td>
							</tr>
						@endforeach
					@else
					<tbody>
					<tr>
						<td colspan="8">No foundation found.</td>
					</tr>
					</tbody>
					@endif
					</table>
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
</script>
@endsection

