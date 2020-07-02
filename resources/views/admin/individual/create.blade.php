@extends('admin.includes.adminlayout')



@section('breadcrumb')

  <!-- Breadcrumb-->

  <ol class="breadcrumb">

    <li class="breadcrumb-item">Home</li>

    <li class="breadcrumb-item">

      <a href="#">Admin</a>

    </li>

    <li class="breadcrumb-item active">Dashboard</li>

    <!-- Breadcrumb Menu-->

    <li class="breadcrumb-menu d-md-down-none">

      <div class="btn-group" role="group" aria-label="Button group">

        <a class="btn" href="#">

        <i class="icon-speech"></i>

        </a>

        <a class="btn" href="./">

        <i class="icon-graph"></i>  Dashboard</a>

        <a class="btn" href="#">

        <i class="icon-settings"></i>  Settings</a>

      </div>

    </li>

  </ol>

@endsection
<!--
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif -->
@section('content')  

 

  {!! Form::open(array('url' => 'admin/individual/store')) !!}

  <div class="row">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <div class="col-lg-12">

      <div class="card">

        <div class="card-body">

            <div class="row">

                <div class="col-sm-6">

                    <h4 class="card-title mb-0">
                      Individual Users Management <small class="text-muted">User Add</small>
                    </h4>

                </div><!--col-->
				 <div class="col-sm-6">
					<div class="float-right">
						<button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Save</button>
						<a class="btn btn-warning" href="{{url('admin/users')}}	"><i class="fa fa-th-list" aria-hidden="true"></i> Back To List</a>
						<!--<button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button> -->
					</div>
                </div><!--col-->
				
            </div><!--row-->

        <hr>
		@if (count($errors) > 0)
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<ul id="login-validation-errors" class="validation-errors">
					@foreach ($errors->all() as $error)
						<li class="validation-error-item">{{ $error }}</li>
					@endforeach
				</ul>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div><hr>
		@endif

			<div class="row">
			  <div class="col-2">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Information</a>
				  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Purpose</a>
				  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Foundations</a>
				  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Transaction</a>
				</div>
			  </div>
			  
			  @csrf
			  <div class="col-10">
				<div class="tab-content" id="v-pills-tabContent">
				  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
				    <div class="row">
				  <div class="col-xl-6 col-md-12 col-sm-12">
				
					<h3>Basic Info</h3>	
						
							  
							  <div class="form-group row">
								  {!! Form::label('Last Name', __( 'Last Name' ) . ':*', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								   {!! Form::text('lastname', null, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Last name' ) ]); !!}
								</div>
							  </div>
							  
							 <div class="form-group row">
								 {!! Form::label('First Name', __( 'First Name' ) . ':*', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								 {!! Form::text('firstname', null, ['class' => 'form-control', '', 'placeholder' => __( 'Enter First name' ) ]); !!}
								</div>
							  </div>
							  <div class="form-group row">
								{!! Form::label('Middle Name', __( 'Middle Name' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								  {!! Form::text('middlename', null, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Middle name' ) ]); !!}
								</div>
							  </div>
							  
							  <div class="form-group row">
								{!! Form::label('Age', __( 'Age' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								  
								  {!! Form::text('age', null, ['class' => 'form-control', 'id' => 'age', 'readonly', 'placeholder' => __( '' ) ]); !!}
								</div>
							  </div>
							  
							  <div class="form-group row">
								{!! Form::label('Date Of Birth', __( 'Date Of Birth' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								  
								   {!! Form::text('dob', null, ['class' => 'form-control ', 'id' => 'dob','placeholder' => __( 'YYYY/MM/DD' ) ]); !!}
								</div>
							  </div>
							  
							   <div class="form-group row">
								{!! Form::label('Language', __( 'Language' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 
								  {!! Form::select('language', (['0' => 'Select a language'] + $language),[], ['class' => 'form-control','' ]  ); !!}
								</div>
							  </div>
							 
							  <div class="form-group row">
								
								{!! Form::label('Availability', __( 'Availability' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								  {!! Form::select('availability', (['1' => 'GlobalGrant Sweden']),[], ['class' => 'form-control','' ]  ); !!}
								</div>
							  </div>
						  <hr>
						  <h3>Contact Info</h3>	
							 <div class="form-group row">
								{!! Form::label('Street Address', __( 'Street Address' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								   {!! Form::text('streetaddress', null, ['class' => 'form-control','','placeholder' => __( 'Enter Street Address' ) ]); !!}
								</div>
							  </div>
							  
							  <div class="form-group row">
								
								{!! Form::label('Zip Code', __( 'Zip Code' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								   {!! Form::text('zipcode', null, ['class' => 'form-control','','placeholder' => __( 'Enter Zip Code' ) ]); !!}
								</div>
							  </div>
							  
							   <div class="form-group row">
								
								{!! Form::label('Country', __( 'Country' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 							  
								   {!! Form::select('country', (['0' => 'Select a Country'] + $country),[], ['class' => 'form-control','onchange' => 'getRegion();','id' => 'countryid']) !!}
								</div>
							  </div>
							   <div class="form-group row">
								
								{!! Form::label('Region', __( 'Region' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 							  
								   {!! Form::select('region', (['0' => 'Select a Region']),[], ['class' => 'form-control regiondata','id' => 'regionid','onchange' => 'getCity();', ]) !!}
								</div>
							  </div>
							   <div class="form-group row">
								
								{!! Form::label('City', __( 'City' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 							  
								   {!! Form::select('city', (['0' => 'Select a City'] ),[], ['class' => ' form-control citydata','id' => 'cityid',]) !!}
								</div>
							  </div>
							  
							  <div class="form-group row">
								{!! Form::label('Personal', __( 'Personal' ) . '#', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								   {!! Form::text('personal', null, ['class' => 'form-control','','placeholder' => __( 'Enter Personal' ) ]); !!}
								</div>
							  </div>
							  
							  <div class="form-group row">							
								{!! Form::label('Mobile', __( 'Mobile' ) . '', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								  {!! Form::text('mobile', null, ['class' => 'form-control','','placeholder' => __( 'Enter mobile' ) ]); !!}
								</div>
							  </div>
							  
							  <div class="form-group row">
								{!! Form::label('Phone', __( 'Phone' ) . '', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">							
								  {!! Form::text('phone', null, ['class' => 'form-control','','placeholder' => __( 'Enter phone' ) ]); !!}
								</div>
							  </div>
							   
						
					</div>
				  
				  <div class="col-xl-6 col-md-12 col-sm-12">
				
					<h3>Login Info</h3>	
						<div class="card bg-default text-black">
							<div class="card-body">
							
							<div class="form-group row">
								{!! Form::label('Role', __( 'Role' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 
									
									<select class="form-control" name="userrole">
									<option value="">Select Roles</option>
									@foreach($roles as $role)
										<option value="{{$role->id}}">{{$role->name}}</option>
									@endforeach
									</select>
									
								  <!--{!! Form::select('userrole', (['0' => 'Select a role']),[], ['class' => 'form-control','' ]  ); !!}-->
								 
								  
								</div>
							  </div>
							  
							  <div class="form-group row">
							
								{!! Form::label('E-mail', __( 'E-mail' ) . ':*', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 
								    {!! Form::email('email', null, ['class' => 'form-control','','placeholder' => __( 'Enter email' ) ]); !!}
								</div>
								<P>Password will be generated automatically by the system for security purposes and can be changed by the user on their member page.</p>
							  </div>
							  <!--
							  <div class="form-group row">
								<label for="input" class="col-sm-4 col-form-label">Reset Password</label>
								<div class="col-sm-8">								 
								 <button type="button" class="form-control btn btn-secondary float-right"><i class="fa fa-repeat" aria-hidden="true"></i> Reset Password</button>
								</div>
							  </div>
							  -->
							  
							  <div class="form-group row">
								<!-- <label for="input" class="col-sm-4 col-form-label">Password</label>
								
								<div class="col-sm-8">								 
								   <input type="text" class="form-control" id="password" placeholder="" name="login[password]" required>
								</div> -->
								<!--
								<div class="col-sm-4 float-right">								 
								  <button type="button" class="btn btn-secondary"><i class="fa fa-repeat" aria-hidden="true"></i> Genrate</button> 
								 </div>
								 -->
							  </div>
							  <!--
							  <div class="form-group row">
								
								<div class="col-sm-12 ">								 
								    <button type="button" class="btn btn-secondary float-right"><i class="fa fa-check-square-o" aria-hidden="true"></i> Save & Active</button>
									<br>
									
								</div>
								<p class="col-sm-12 offset-md-4">Save & Activate: Change passwords immediately.<br>Do not send any E-mail</p>
							</div>
							-->
							<!--
							<div class="form-group row">
								
								<div class="col-sm-12 ">								 
								    <button type="button" class="btn btn-secondary float-right"><i class="fa fa-check-square-o" aria-hidden="true"></i> Save Active & Mail </button>
									<br>
									
								</div>
								<p class="col-sm-12 offset-md-4">Save Activate & Mail: Change passwords <br>immediately and send the email to User with <br>new password</p>
							</div>
							-->
							
							
							
					</div>
					 
				</div>
				<div class="col-sm-12">
					<div class="form-group row">
						
						{!! Form::label('Library(City or University only)', __( 'Library(City or University only)' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
						<select class="form-control formBox" name="librarycity" id="librarycity">
						<option value="">select libarary</option>
						@foreach($library as $Library)
							<option value="{{$Library->id}}" >{{$Library->name}}</option>
						@endforeach
					  </select>
						</div>
					</div>
					
					<div class="form-group row">
						
						{!! Form::label('Library Card Number', __( 'Library Card Number' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-5">								 
						  {!! Form::text('librarycard', null, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Library Card Number' ) ,'id'=>'librarycard']); !!}
						</div>
						<div class="col-sm-3">								 
						  <button type="button" class="btn btn-primary float-right" id="check_card_valid" onClick="varify_librarycard();"> Verify</button>
						</div>
					</div>
					
					<div class="form-group row">
						{!! Form::label('Comment', __( 'Comment' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
						 
						  {!! Form::textarea('', null, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Library Card Number' ) ]); !!}
						</div>
					</div>
				
				   </div>
				</div> 
				</div>
				<div class="row">
					 <div class="col-xl-12 col-md-12 col-sm-12">
						<div class="card">
						  <div class="card-header bg-info">Video Links</div>
						  <div class="card-body col-xl-12 ">
						 
						  <div class="form-inline">
							<div class="col-xl-3 col-md-12 col-sm-12">
								<div class="form-group row">
									{!! Form::label('Type', __( 'Type' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
									<div class="col-sm-8">								 
										 {!! Form::select('videotype[]', (['0' => 'Facebook','1' => 'LinkedIn','2' => 'Youtube'] ),[], ['class' => 'form-control']) !!}
									</div>
								</div>
							</div>
							
							<div class="col-xl-6 col-md-12 col-sm-12">
								<div class="form-group row">
									{!! Form::label('Url', __( 'Url' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
									<div class="col-sm-8">								 
										{!! Form::text('video_url[]', null, ['class' => 'form-control', 'value'=>'http://',  ]); !!}
									</div>
								</div>
							</div>
							
								<div class="col-xl-3 col-md-12 col-sm-12">
									<div class="form-group row">
										<div class="col-sm-4">
											<a class="btn btn-primary add_buttonvideo" value="add">Add</a>
										</div>
										
									</div>
								</div>
							
							</div><br>
							
							<div class="field_wrappervideo "></div>	
							</div>
						  </div>						 
						</div>
					 </div>
				
				<hr>
			  <h3>Personal Details</h3>	<br>
			  <div class="row">
			   <div class="col-xl-6 col-md-12 col-sm-12">
					<div class="form-group row">
						{!! Form::label('Gender', __( 'Gender' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
							 {!! Form::select('gender',(['0' => 'Select a Gender'] + $gender),[], ['class' => 'form-control']) !!}
						</div>
					</div>
					
					<div class="form-group row">
						{!! Form::label('Civil Status', __( 'Civil Status' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">
						
							{!! Form::select('civilstatus',(['0' => 'Select a Civil Status'] + $civilstatus),[], ['class' => 'form-control']) !!}
						</div>
					</div>
				</div>
				 <div class="col-xl-6 col-md-12 col-sm-12">
					<div class="form-group row">
						{!! Form::label('Occupation', __( 'Occupation' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
							
					  {!! Form::text('occupation', null, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Occupation' ) ]); !!}
						</div>
					</div>
					
					<div class="form-group row">
						{!! Form::label('Nationality', __( 'Nationality' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
							 {!! Form::text('nationality', null, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Nationality' ) ]); !!}
						</div>
					</div>
				</div>
			</div>
			
			
			
			<div class="row">
				<div class="col-xl-6 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-header bg-primary">Place of Residence</div>
						
						<div class="card-body">
							<div class="form-group row">
								{!! Form::label('Region', __( 'Region' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">	
								 {!! Form::select('rregion', (['0' => 'Select a Region']),[], ['class' => 'form-control regiondata','id' => 'regionid_resi','onchange' => 'getCity_resi();', ]) !!}
							
								</div>
							</div>
							<div class="form-group row">
								
								{!! Form::label('City', __( 'City' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									 {!! Form::select('rcity', (['0' => 'Select a City'] ),[], ['class' => ' form-control citydata_resi','id' => 'cityid_resi',]) !!}
								</div>
							</div>
							<div class="form-group row">
								{!! Form::label('Parish', __( 'Parish' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									{!! Form::text('rparish', null, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Parish' ) ]); !!}
								</div>
							</div>
						
						</div>
					</div>
				</div>

				<div class="col-xl-6 col-md-12 col-sm-12">	
					<div class="card">
						<div class="card-header bg-primary">Place of Birth</div>
						<div class="card-body">
							
							<div class="form-group row">
								{!! Form::label('Region', __( 'Region' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									 {!! Form::select('bregion', (['0' => 'Select a Region']),[], ['class' => 'form-control regiondata','id' => 'regionid','onchange' => 'getCity();', ]) !!}
								</div>
							</div>
							<div class="form-group row">
								
								{!! Form::label('City', __( 'City' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									 {!! Form::select('bcity', (['0' => 'Select a City'] ),[], ['class' => ' form-control citydata','id' => 'cityid',]) !!}
								</div>
							</div>
							<div class="form-group row">
								{!! Form::label('Parish', __( 'Parish' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									{!! Form::text('bparish', null, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Parish' ) ]); !!}
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<hr>
				<div class="row">
					<div class="col-xl-12 col-md-12 col-sm-12">
						<h3>My/Our Application Letter</h3>
						<p>Write a successful application</p>
							<div class="form-group row">
								<div class="col-sm-12">								 
									
									{!! Form::textarea('appletter', null, ['class' => 'form-control', 'id' => 'remarks', 'placeholder' => __( 'Enter Parish' ) ]); !!}
								</div>
							</div>
					</div>
				</div>
			
				
			</div>
				  
				  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">.
				  <h3>Purpose List</h3>	
					
				  <div class="row">
					<div class="col-sm-12">		
						<div class="form-group row">				 
						   {!! Form::select('purposelist[]', $purpose,[], ['class' => 'form-control' ,'multiple']) !!}
						</div>
					</div>
				  <div class="col-sm-12">	
					<h3>Study</h3>	
				  </div>
						<div class="col-sm-6">								 
							<div class="form-group">
								{!! Form::label('Major/field', __( 'Major/field' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-12">								 
									{!! Form::textarea('studyfield', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
								</div>
							</div>
						</div>
							
						<div class="col-sm-6">								 
							<div class="form-group">
								{!! Form::label('Degree', __( 'Degree' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								
								<div class="col-sm-12">								 
									{!! Form::textarea('degree', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">								 
							<div class="form-group">
								{!! Form::label('School', __( 'School' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-12">								 
									{!! Form::textarea('school', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
								</div>
							</div>
						</div>
							
						<div class="col-sm-6">								 
							<div class="form-group">
								{!! Form::label('Location', __( 'Location' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-12">								 
									{!! Form::textarea('location', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">								 
							<div class="form-group">
								{!! Form::label('Start Date', __( 'Start Date' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 
									{!! Form::text('sdate', null, ['class' => 'form-control mycustomdate','id' => 'startdate','placeholder' => __( '' ) ]); !!}
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">								 
							<div class="form-group">
								{!! Form::label('Govt Support', __( 'Govt Support' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-lg-12">
									{{ Form::radio('sgovtsupport', '1' , true) }}  Yes
									{{ Form::radio('sgovtsupport', '0' , true) }} No
								</div>
							</div>
							

							
						</div>
						
						<div class="col-sm-6">								 
							<div class="form-group">
								{!! Form::label('End Date', __( 'End Date' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 
									{!! Form::text('enddate', null, ['class' => 'form-control mycustomdate','id' => 'enddate','placeholder' => __( '' ) ]); !!}
								</div>
							</div>
						</div>
							
						</div>
			
			<div class="row">
				<div class="col-xl-6 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-header bg-primary">Previous Education</div>
						<div class="card-body">
							<div class="form-group row">
								{!! Form::label('Degree', __( 'Degree' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									{!! Form::text('pdegree', null, ['class' => 'form-control','placeholder' => __( '' ) ]); !!}
								</div>
							</div>
							<div class="form-group row">
									{!! Form::label('Length', __( 'Length' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									{!! Form::text('plength', null, ['class' => 'form-control','placeholder' => __( '' ) ]); !!}
								</div>
							</div>
							<div class="form-group row">
								{!! Form::label('School', __( 'School' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									{!! Form::text('pschool', null, ['class' => 'form-control','placeholder' => __( '' ) ]); !!}
								</div>
							</div>
							<div class="form-group row">
								{!! Form::label('Location', __( 'Location' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									 {!! Form::select('plocation', (['0' => 'Select a Location']),[], ['class' => 'form-control']) !!}
								</div>
							</div>
						
						
						</div>
					</div>
				</div>
				
				<div class="col-xl-6 col-md-12 col-sm-12">	
					<div class="card">
						<div class="card-header bg-primary">High School Background</div>
						<div class="card-body">
							<div class="form-group row">
								{!! Form::label('School', __( 'School' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									 {!! Form::text('hschool', null, ['class' => 'form-control', '', 'placeholder' => __( 'Enter School' ) ]); !!}
								</div>
							</div>
							
							
							<div class="form-group row">
								{!! Form::label('Location', __( 'Location' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									 {!! Form::select('hlocation', (['0' => 'Select a Location'] ),[], ['class' => 'form-control']) !!}
								</div>
							</div>
							
							<div class="form-group row">
								{!! Form::label('Other Location', __( 'Other Location' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									{!! Form::text('hotherlocation', null, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Other Location' ) ]); !!}
								</div>
							</div>
						
						
						</div>
						
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xl-12 col-md-12 col-sm-12">
					<h5>Additional Information</h5>
					<div class="form-group row">	
						<div class="col-sm-12">								 
							{!! Form::textarea('sadditionalinfo', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
				</div>
				
				
			</div>
			<hr>
				

			<div class="row">
				
				<div class="col-xl-12 col-md-12 col-sm-12"><h3>Care</h3></div>
				<div class="col-xl-6 col-md-12 col-sm-12">
					<div class="form-group row">
						{!! Form::label('Illness/Disability', __( 'Illness/Disability' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
							{!! Form::textarea('careillness', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
					
					<div class="form-group row">						
						{!! Form::label('Symptoms', __( 'Symptoms' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
							{!! Form::textarea('caresymptoms', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
					
					<div class="form-group row">
						{!! Form::label('Additional Information', __( 'Additional Information' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
							{!! Form::textarea('careaddtionalinfo', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
				
				</div>
				
				<div class="col-xl-6 col-md-12 col-sm-12">
					
					<div class="form-group row">
						{!! Form::label('Health Care Region', __( 'Health Care Region' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
							{!! Form::textarea('carehealthregion', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
					
					<div class="form-group row">
						{!! Form::label('Hospital', __( 'Hospital' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
							{!! Form::textarea('carehospital', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
				
				</div>
				
				
			</div>
			<hr>
			
			<div class="row">
				<div class="col-xl-12 col-md-12 col-sm-12"><h3>Welfare</h3></div>
					<div class="col-xl-6 col-md-12 col-sm-12">
						<div class="form-group row">
							{!! Form::label('Needs', __( 'Needs' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
							<div class="col-sm-8">								 
								{!! Form::textarea('welfareneeds', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-md-12 col-sm-12">
							<div class="form-group row">
									{!! Form::label('Additional Information', __( 'Additional Information' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 
									{!! Form::textarea('welfareadditionalinfo', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
								</div>
							</div>
					</div>
			</div>
			
			<div class="row">
				<div class="col-xl-12 col-md-12 col-sm-12">			
					<div class="card">
					  <div class="card-header bg-info">Children</div>
					  <div class="card-body col-xl-12">
						<div class="form-inline">
							<div class="col-xl-3 col-md-12 col-sm-12">
								<div class="form-group row">
									{!! Form::label('Birthdate', __( 'Birthdate' ) . ':', [ 'class' => 'col-sm-12 col-form-label']) !!}
									<div class="col-sm-12">								 
										 {!! Form::text('cdob[]', null, ['class' => 'form-control mycustomdate', 'id'=>'C_dob',  ]); !!}
									</div>
								</div>
							</div>
							
							<div class="col-xl-2 col-md-12 col-sm-12">
								<div class="form-group row">
									{!! Form::label('Gender', __( 'Gender' ) . ':', [ 'class' => 'col-sm-12 col-form-label']) !!}
									<div class="col-sm-12">								 
										 {!! Form::select('cgender[]', (['0' => 'Select Gender','1' => 'Male','2' => 'Female'] ),[], ['class' => 'form-control']) !!}
									</div>
								</div>
							</div>
							
							<div class="col-xl-3 col-md-12 col-sm-12">
								<div class="form-group row">
									{!! Form::label('School', __( 'School' ) . ':', [ 'class' => 'col-sm-12 col-form-label']) !!}
									<div class="col-sm-12">								 
										 {!! Form::text('cschool[]', null, ['class' => 'form-control', 'id'=>'C_dob',  ]); !!}
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-md-12 col-sm-12">
								<div class="form-group row">
									{!! Form::label('Location', __( 'Location' ) . ':', [ 'class' => 'col-sm-12 col-form-label']) !!}
									<div class="col-sm-12">								 
										{!! Form::select('clocation[]', (['0' => 'Select Localtion','1'=>'delhi'] ),[], ['class' => 'form-control']) !!}
									</div>
								</div>
							</div>
							
								<div class="col-xl-1 col-md-12 col-sm-12">
									<div class="form-group row">
										<div class="col-sm-12">
											<a class="btn btn-primary add_buttonchild" value="add">Add</a>
										</div>
										
									</div>
								</div>
							</div>
							<div class="field_wrapperchild field_wrapperchild"></div>	
						</div>
					</div>
				</div>	
			</div>
			<hr>
			<div class="row">
				<div class="col-xl-12 col-md-12 col-sm-12"><h3>Research</h3></div>	
				<div class="col-xl-6 col-md-12 col-sm-12">
					<div class="form-group row">
						{!! Form::label('Subject', __( 'Subject' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-12">								 
							{!! Form::select('researchsubject', (['0' => 'Select a subject']),[], ['class' => 'form-control' ,'multiple']) !!}
						</div>
					</div>
					
					<div class="form-group row">
						{!! Form::label('Objective', __( 'Objective' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-12">								 
							{!! Form::textarea('researchobjective', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
					
					<div class="form-group row">
						<label for="input" class="col-sm-4 col-form-label">Limitations</label>
						<div class="col-sm-12">								 
							{!! Form::textarea('researchlimitation', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('Location', __( 'Location' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
							{!! Form::select('languageid', (['0' => 'Select a Language'] + $language),[], ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('Start Date', __( 'Start Date' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
							{!! Form::text('researchstartdate', null, ['class' => 'form-control mycustomdate','id' => 'rstartdate','placeholder' => __( '' ) ]); !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('End Date', __( 'End Date' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
							{!! Form::text('researchenddate', null, ['class' => 'form-control mycustomdate','id' => 'renddate','placeholder' => __( '' ) ]); !!}
						</div>
					</div>
					
					<div class="form-group row">
						{!! Form::label('Govt Support', __( 'Govt Support' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
					  <div class="col-lg-8">
						{{ Form::radio('researchgovtsupport', '1' , true) }}  Yes
						{{ Form::radio('researchgovtsupport', '0' , true) }} No
					</div>
					</div>
					
					
				</div>	
				<div class="col-xl-6 col-md-12 col-sm-12">	
					<div class="card">
						<div class="card-header bg-primary">Educational Background</div>
							<div class="card-body">
								<div class="form-group row">
									
									{!! Form::label('Prev. Education', __( 'Prev. Education' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
									<div class="col-sm-8">								 
										{!! Form::text('researchprevstudy', null, ['class' => 'form-control','id' => 'enddate','placeholder' => __( '' ) ]); !!}
									</div>
								</div>
								
								<div class="form-group row">
									{!! Form::label('School', __( 'School' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
									<div class="col-sm-8">								 
										{!! Form::text('researchprevschool', null, ['class' => 'form-control','id' => 'enddate','placeholder' => __( '' ) ]); !!}
									</div>
								</div>
								
								<div class="form-group row">
									{!! Form::label('High School', __( 'High School' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
									<div class="col-sm-8">								 
										{!! Form::text('researchhighschool', null, ['class' => 'form-control','id' => 'enddate','placeholder' => __( '' ) ]); !!}
									</div>
								</div>
							</div>
					</div>
					<div class="form-group row">
						{!! Form::label('Additional Information', __( 'Additional Information' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-12">								 
							{!! Form::textarea('researchadditionalinfo', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
				</div>
			</div>
			
			<hr>
			<div class="row">
				<div class="col-xl-12 col-md-12 col-sm-12"><h3>Project</h3></div>
				<div class="col-xl-6 col-md-12 col-sm-12">
					<div class="form-group row">
						
						{!! Form::label('Project/Objective', __( 'Project/Objective' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-12">								 
							{!! Form::textarea('projectobject', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('Geographic Area', __( 'Geographic Area' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-12">								 
							{!! Form::textarea('projectgeoarea', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
					
					<div class="form-group row">
						{!! Form::label('Other Information Project', __( 'Other Information Project' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-12">								 
							{!! Form::textarea('projectotherinfo', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
				</div> 
				<div class="col-xl-6 col-md-12 col-sm-12">
					<div class="form-group row">
						{!! Form::label('Purpose', __( 'Purpose' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-12">								 
							{!! Form::textarea('projectpurpose', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('Beneficiaries', __( 'Beneficiaries' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-12">								 
						{!! Form::textarea('projectbeneficiries', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
				</div>
			</div>
						
						
			</div>
					
			 <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
				  <h3>My List</h3>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							
							<table class="table table-bordered">
							  <thead>
								<tr>
								  <th scope="col">#</th>
								  <th scope="col">First</th>
								  <th scope="col">Last</th>
								  <th scope="col">Handle</th>
								</tr>
							  </thead>
							  <tbody>
								
							  </tbody>
						  
							</table>
						</div>
					</div>				
				  </div>
				  
				  
				  
				  
				  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
				  
				  
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					  <li class="nav-item">
						<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-homess" role="tab" aria-controls="pills-home" aria-selected="true">Orders</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Subcriptions</a>
					  </li>
					 
					</ul>
					<div class="tab-content" id="pills-tabContent">
					  <div class="tab-pane fade show active" id="pills-homess" role="tabpanel" aria-labelledby="pills-home-tab">
					  
					  
					  <table class="table table-bordered">
						  <thead>
							<tr>
							  <th scope="col">#</th>
							  <th scope="col">First</th>
							  <th scope="col">Last</th>
							  <th scope="col">Handle</th>
							</tr>
						  </thead>
						  <tbody>
							
						  </tbody>
					</table>
					 </div>

					  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					  
					   <table class="table table-bordered">
						  <thead>
							<tr>
							  <th scope="col">#</th>
							  <th scope="col">First</th>
							  <th scope="col">Last</th>
							  <th scope="col">Handle</th>
							</tr>
						  </thead>
						  <tbody>
							
						  </tbody>
					  
						</table>
					  </div>
					  
					</div>
				  
				  
				  
				  </div>
					
					
				  </div>
				  
				  
				  
				  </div>
				  
				 
				</div>
			  </div>
			 {!! Form::close() !!}
			</div>
        
       </div>

      </div>

    </div>



  </div>





@endsection