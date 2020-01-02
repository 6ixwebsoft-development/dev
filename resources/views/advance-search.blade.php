@extends('layouts.mainlayout')
@section('content')
<main class="main-content">
				<div class="breadcrumbs">
					<div class="container">
						<a href="/">Home</a>
						<span>Foundation Search</span>
					</div>
				</div>

				<div class="page">
					<div class="container">
						<h2>Advance Searching Funds/Foundations</h2>
						<!-- <form action="" class="regform" method="get"> -->
							{!! Form::open(array('url' => '#', 'id' => 'advaceSearch')) !!}
						  
						    <!-- Fieldsets -->
						    <div class="col-md-12">
						        <h2 class="title">Purpose</h2>
						        <div class="checkbox-container"> 
							        @foreach($purpose as $key => $value)
							        <!-- {!! Form::checkbox('purpose_ids[]', $key, ['class' => 'form-control', 'id' => 'purpose_ids', 'checked' => '' ]); !!} -->
							        <div class="checkboxes">
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
						        <h2 class="title">Location(City Name)</h2>
						     <!--    {!! Form::text('location', null, ['class' => 'typeahead form-control', '', 'placeholder' => __( 'City name' ), 'id' => 'location' ]); !!} -->
								
								{!! Form::select('location',(['' => 'select'] + $city),[], ['class' => 'form-control','id' => 'location']) !!}
						        
						        <input class="advance_submit" type="submit" value="Search">
						    </div>
						{!! Form::close() !!}

					</div>
					<div class="container" style="margin-top: 50px;">

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

						            <div class="modal-body">
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
											<div class="fund-details"></div>
						                </div>
						            </div>
						        </div>
						    </div>
						</div>
						<div class="table-responsive">
						<table class="table table-bordered" border="1" width="100%" id="ad_table">
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

				</div> <!-- .page -->
			</main>
			@endsection