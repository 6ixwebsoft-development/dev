@extends('layouts.mainlayout')
@section('content')
<style> 
	div.scroll { 
		margin:4px, 4px; 
		padding:4px; 
		background-color: #fff; 
		height: 200px; 
		overflow-x: hidden; 
		overflow-x: auto; 
		text-align:justify; 
	} 
</style>
<!-- <main class="main-content">
				<div class="breadcrumbs">
					<div class="container">
						<a href="/">Home</a>
						<span>Foundation Search</span>
					</div>
				</div>

				<div class="page">
					<div class="container">
						<h2>Advance Searching Funds/Foundations</h2>
						<!-- <form action="" class="regform" method="get"> 
							{!! Form::open(array('url' => '#', 'id' => 'advaceSearch')) !!}-->
						  
						    <!-- Fieldsets -->
						   <!-- <div class="col-md-12">
						        <h2 class="title">Purpose</h2>
						        <div class="checkbox-container"> 
							        @foreach($purpose as $key => $value) -->
							        <!-- {!! Form::checkbox('purpose_ids[]', $key, ['class' => 'form-control', 'id' => 'purpose_ids', 'checked' => '' ]); !!} -->
							        <!--<div class="checkboxes">
							        	<input type="checkbox" id="purpose_ids" name="purpose_ids" value="{{$key}}">
							        	<label>{{$value}}</label>
							    	</div>
							        @endforeach
						    	</div>
						    </div>
						    <div class="col-md-12">
						        <h2 class="title">Gender</h2>
						        <div class="checkbox-container"> 
							        @foreach($gender as $key => $value)
								
							        <div class="checkboxes">
							        	<input type="checkbox" id="gender_ids" name="gender_ids" value="{{$key}}">
							        	<label>{{$value}}</label>
							    	</div>
							        @endforeach
						    	</div>
						        
						    </div>
						    <div class="col-md-12">
						        <h2 class="title">Subject</h2>
						        <div class="checkbox-container"> 
							        @foreach($subject as $key => $value)
							        <div class="checkboxes">
							        	<input type="checkbox" id="subject_ids" name="subject_ids" value="{{$key}}">
							        	<label>{{$value}}</label>
							    	</div>
							        @endforeach
						    	</div>
						        
						    </div> 
						    <div class="col-md-12">
						        <h2 class="title">Location(City Name)</h2>-->
						     <!--    {!! Form::text('location', null, ['class' => 'typeahead form-control', '', 'placeholder' => __( 'City name' ), 'id' => 'location' ]); !!} -->
								
								<!--{!! Form::select('location',(['' => 'select'] + $city),[], ['class' => 'form-control','id' => 'location']) !!} 
						        
						        <input class="advance_submit" type="submit" value="Search">
						    </div>
						{!! Form::close() !!}

					</div>
					

				</div> <!-- .page -->
	

	
<!--</main> -->

 <main class="main-content">
				<div class="breadcrumbs">
					<div class="container">
						<a href="/">Home</a>
						<span>Foundation Search</span>
					</div>
				</div><br><br><br>
<div class="container">
	<div class="row">
		<div class="col-md-4">
		  <input class="advance_submit btn btn-primary" type="submit" value="Search">
			<div class="card">
			  <div class="card-body " border="1">
					 <h5 class="text-primary"><b>WELCOME, here are all grants and stipends that can help you.<br>
					Please read the big blue banner first</b><h5><hr>
					{!! Form::open(array('url' => '#', 'id' => 'advaceSearch')) !!}
					<!-- <p class="text-primary" data-toggle="collapse" data-target="#demo">IF YOU READ SWEDISH LANGUAGE SELECT THIS.</p>
					<div id="demo" class="collapse">
				
					</div><hr><br> -->
					
					<p class="text-primary" data-toggle="collapse" data-target="#demotwo">PURPOSE<br>
						DESELECT ALL CHECKBOXES FOR MANY HITS</p>
					  <div id="demotwo" class="collapse scroll">
						 @foreach($purpose as $key => $value)
						<div class="">
							<input type="checkbox" id="purpose_ids" name="purpose_ids" value="{{$key}}">
							<label>{{$value}}</label><br>
						</div>
						@endforeach
					  </div><hr><br>
					  
					 <p class="text-primary" data-toggle="collapse" data-target="#demothree">GENDER<br>
						DESELECT ALL CHECKBOXES FOR MANY HITS</p>
					  <div id="demothree" class="collapse scroll">
						 @foreach($gender as $key => $value)			
						<div class="">
							<input type="checkbox" id="gender_ids" name="gender_ids" value="{{$key}}">
							<label>{{$value}}</label>
						</div>
						@endforeach
					  </div><hr><br>
					
					<p class="text-primary" data-toggle="collapse" data-target="#demofour">ACADEMIC SUBJECT</p>
					  <div id="demofour" class="collapse scroll">
						@foreach($subject as $key => $value)
							<div class="">
								<input type="checkbox" id="subject_ids" name="subject_ids" value="{{$key}}">
								<label>{{$value}}</label>
							</div>
						@endforeach
					  </div><hr><br>
					  
					  
					  <p class="text-primary" data-toggle="collapse" data-target="#demofive">Location(City Name)</p>
					  <div id="demofive" class="collapse scroll">
						{!! Form::select('location',(['' => 'select'] + $city),[], ['class' => 'form-control','id' => 'location']) !!}
					  </div><hr><br>
					  <div id="options1">

                        <h2 class="le-heading mt10"></h2>
                        <p></p>

                        <div class="checkbox">
                            <label><input type="checkbox" id="only_active" name="only_active" checked="checked" value="1"> Show only active funds&nbsp;&nbsp;</label>
                        </div>            
                        <div class="checkbox">
                            <label><input type="checkbox" id="hide_records" name="hide_records" value="0"> Hide funds in non-English language</label>
                        </div>



                        
                    </div>
					     <input class="advance_submit" type="submit" value="Search">
					{!! Form::close() !!}
			  </div>
			</div>

		</div>
		<div class="col-md-8">
			<div class="" style="margin-top: 00px;">

						<h1>Foundations</h1>
						
						<div class="foundation-detail" style="position: relative;">
							<div class="modal">
						        <div class="modal-overlay modal-toggle"></div>
						        <div class="modal-wrapper modal-transition">
						            <div class="modal-header">
						                <button class="modal-close modal-toggle">
						                    <i class="fa fa-times"></i>
						                </button>
						                <h2 class="modal-heading foundation-name"></h2>
						            </div>

						            <div class="modal-body" >
									  <div class="modal-content">
						                  <div class="purpose"></div>
						                    <p class="details"></p>
						                    <p class="misc"></p>
						                    <p class="who-can-apply"></p>
						                    <p class="remarks"></p>
						                    <div class="contact"></div>
											<p class="phone"></p>
											<p class="mobile"></p>
											<p class="email"></p>
											<p class="website"></p>
						                    <div class="readMore"></div> 
											<div class="fund-details" style="max-height: 425px;"></div>
						                </div>
						            </div>
						        </div>
						    </div>
						</div>
						<div  class="fund-detail" id="loaderarea" style="display:none">
							<img src="{{url('frontend/images/loader.gif ')}}" />
						</div>
						<div class="table-responsive">
						<table class="table table-bordered" border="1" width="" id="ad_table">
							<thead>
								<tr>
									<th>ID</th>
									<th>NAME</th>
									<th>SORT</th>
									<th>DETAILS</th>
								</tr>
							</thead>
							<tbody id="advanceFoundations">
								<tr>
									<td colspan="4" style="text-align: center;">Search Funds/Foundations</td>
								</tr>
							</tbody>
						</table>
					</div>
					</div>
		</div>
	</div>
</div>
</div>
@endsection

