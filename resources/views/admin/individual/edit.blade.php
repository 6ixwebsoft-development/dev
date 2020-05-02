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


  {!! Form::open(array('route' => array('admin.individual.update', $user->id),'files' => true)) !!}
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
						<a class="btn btn-warning" href="{{url('admin/individual')}}	"><i class="fa fa-th-list" aria-hidden="true"></i> Back To List</a>
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
		</div>
		@endif

			<div class="row">
			  <div class="col-2">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Information</a>
				  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Purpose</a>
				  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Foundations</a>
				  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Transaction</a>
				  
				   <a class="nav-link" id="v-pills-photos-tab" data-toggle="pill" href="#v-pills-photos" role="tab" aria-controls="v-pills-photos" aria-selected="false">Documents and photos</a>
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
								   {!! Form::text('lastname', $individual->lastname, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Last name' ) ]); !!}
								</div>
							  </div>
							  
							 <div class="form-group row">
								 {!! Form::label('First Name', __( 'First Name' ) . ':*', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								 {!! Form::text('firstname', $individual->firstname, ['class' => 'form-control', '', 'placeholder' => __( 'Enter First name' ) ]); !!}
								</div>
							  </div>
							  <div class="form-group row">
								{!! Form::label('Middle Name', __( 'Middle Name' ) . ':*', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								  {!! Form::text('middlename', $individual->middlename, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Middle name' ) ]); !!}
								</div>
							  </div>
							  
							  <div class="form-group row">
								{!! Form::label('Age', __( 'Age' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								  
								  {!! Form::text('age', $individual->age, ['class' => 'form-control', 'id' => 'age', 'readonly', 'placeholder' => __( '' ) ]); !!}
								</div>
							  </div>
							  
							  <div class="form-group row">
								{!! Form::label('Date Of Birth', __( 'Date Of Birth' ) . ':*', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								  
								   {!! Form::text('dob', $individual->dob, ['class' => 'form-control ', 'id' => 'dob','placeholder' => __( 'YYYY/MM/DD' ) ]); !!}
								</div>
							  </div>
							  
							   <div class="form-group row">
								{!! Form::label('Language', __( 'Language' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 
								  {!! Form::select('language', (['0' => 'Select a language'] + $language),$individual->language, ['class' => 'form-control','' ]  ); !!}
								</div>
							  </div>
							 
							  <div class="form-group row">
								
								{!! Form::label('Availability', __( 'Availability' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								  {!! Form::select('availability', (['1' => 'GlobalGrant Sweden']),$individual->availability, ['class' => 'form-control','' ]  ); !!}
								</div>
							  </div>
						  <hr>
						  <h3>Contact Info</h3>	
							 <div class="form-group row">
								{!! Form::label('Street Address', __( 'Street Address' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								   {!! Form::text('streetaddress', $contact->streetadress, ['class' => 'form-control','','placeholder' => __( 'Enter Street Address' ) ]); !!}
								</div>
							  </div>
							  
							  <div class="form-group row">
								
								{!! Form::label('Zip Code', __( 'Zip Code' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								   {!! Form::text('zipcode', $contact->zipcode, ['class' => 'form-control','','placeholder' => __( 'Enter Zip Code' ) ]); !!}
								</div>
							  </div>
							  
							   <div class="form-group row">
								
								{!! Form::label('Country', __( 'Country' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 							  
								   {!! Form::select('country', (['0' => 'Select a Country'] + $country),$contact->country, ['class' => 'form-control','onchange' => 'getRegion();','id' => 'countryid']) !!}
								</div>
							  </div>
							   <div class="form-group row">
								
								{!! Form::label('Region', __( 'Region' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 							  
								   {!! Form::select('region', (['0' => 'Select a Region']),$contact->region, ['class' => 'form-control regiondata','id' => 'regionid','onchange' => 'getCity();', ]) !!}
								</div>
							  </div>
							   <div class="form-group row">
								
								{!! Form::label('City', __( 'City' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 							  
								   {!! Form::select('city', (['0' => 'Select a City'] ),$contact->city, ['class' => ' form-control citydata','id' => 'cityid',]) !!}
								</div>
							  </div>
							  
							  <div class="form-group row">
								{!! Form::label('Personal', __( 'Personal' ) . '#', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								   {!! Form::text('personal', $contact->personal, ['class' => 'form-control','','placeholder' => __( 'Enter Personal' ) ]); !!}
								</div>
							  </div>
							  
							  <div class="form-group row">							
								{!! Form::label('Mobile', __( 'Mobile' ) . '', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								  {!! Form::text('mobile', $contact->mobile, ['class' => 'form-control','','placeholder' => __( 'Enter mobile' ) ]); !!}
								</div>
							  </div>
							  
							  <div class="form-group row">
								{!! Form::label('Phone', __( 'Phone' ) . '', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">							
								  {!! Form::text('phone', $contact->phone, ['class' => 'form-control','','placeholder' => __( 'Enter phone' ) ]); !!}
								</div>
							  </div>
							   
						
					</div>
				  
				  <div class="col-xl-6 col-md-12 col-sm-12">
				
					<h3>Login Info</h3>	
						<div class="card bg-default text-black">
							<div class="card-body">
							
							<div class="form-group row">
								{!! Form::label('Role', __( 'Role' ) . ':*', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 	  
								  <select class="form-control" name="userrole">
									<option value="">Select Roles</option>
									@foreach($roles as $role)
										<option value="{{$role->id}}"@if($userroles == $role->id) selected @endif>{{$role->name}}</option>
									@endforeach
									</select>
									
								</div>
							  </div>
							  
							  <div class="form-group row">
							
								{!! Form::label('E-mail', __( 'E-mail' ) . ':*', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 
								    {!! Form::email('email', $user->email, ['class' => 'form-control','','placeholder' => __( 'Enter email' ) ]); !!}
								</div>
								<P>Password will be generated automatically by the system for security purposes and can be changed by the user on their member page.</p>
							  </div>
							  
							 <!--  <div class="form-group row">
								<label for="input" class="col-sm-4 col-form-label">Reset Password</label>
								<div class="col-sm-8">								 
								 <button type="button" class="form-control btn btn-secondary float-right"><i class="fa fa-repeat" aria-hidden="true"></i> Reset Password</button>
								</div>
							  </div>-->
							  
							  
							  <div class="form-group row">
								 <label for="input" class="col-sm-4 col-form-label">Password</label>
								
								<div class="col-sm-8">								 
								   <input type="text" class="form-control" id="password" placeholder="" name="login[password]" >
								</div> 

							  </div>
							  
							   <div class="form-group row ">
									
									<div class="col-sm-12 offset-md-4">								 
										<a onClick="generate();" class="btn btn-info "><i class="fa fa-repeat" aria-hidden="true"></i> Genrate</a> 
									</div>
							   </div>
							 
							  <div class="form-group row">
								
								<div class="col-sm-12 ">								 
								    <a onClick="saveactivepassword({{$user->id}});" class="btn btn-secondary float-right"><i class="fa fa-check-square-o" aria-hidden="true"></i> Save & Active</a>
									<br>
									
								</div>
								<p class="col-sm-12 offset-md-4">Save & Activate: Change passwords immediately.<br>Do not send any E-mail</p>
							</div>
							
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
							<option value="{{$Library->id}}" <?php if($IndividualLibrary->librarycity == $Library->id){echo 'selected';}?>>{{$Library->name}}</option>
						@endforeach
					  </select>
						</div>
					</div>
					
					<div class="form-group row">
						
						{!! Form::label('Library Card Number', __( 'Library Card Number' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-5">								 
						  {!! Form::text('librarycard', $IndividualLibrary->librarycardnumber, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Library Card Number' ) ,'id'=>'librarycard']); !!}
						</div>
						<div class="col-sm-3">								 
						  <button type="button" class="btn btn-primary float-right" id="check_card_valid" onClick="varify_librarycard();"> Verify</button>
						</div>
					</div>
					
					<div class="form-group row">
						{!! Form::label('Comment', __( 'Comment' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
						 
						  {!! Form::textarea('library_comment', null, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Library Card Number' ) ]); !!}
						</div>
					</div>
				
				   </div>
				</div> 
				</div>
				<div class="row">
					 <div class="col-xl-12 col-md-12 col-sm-12">
						<div class="card">
						  <div class="card-header bg-info">Video Links
						  <div class="col-sm-4 float-right">
								<a class="btn btn-primary add_buttonvideo" value="add">Add</a>
							</div>
						  </div>
						  <div class="card-body col-xl-12 ">
						   @if(!empty($video))	
							@foreach($video as $Videos)
						  <div class="form-inline">
							<div class="col-xl-3 col-md-12 col-sm-12">
								<div class="form-group row">
									{!! Form::label('Type', __( 'Type' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
									<div class="col-sm-8">								 
										 {!! Form::select('videotype[]', (['0' => 'Facebook','1' => 'LinkedIn','2' => 'Youtube'] ),$Videos->type, ['class' => 'form-control']) !!}
									</div>
								</div>
							</div>
							
							<div class="col-xl-6 col-md-12 col-sm-12">
								<div class="form-group row">
									{!! Form::label('Url', __( 'Url' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
									<div class="col-sm-8">								 
										{!! Form::text('video_url[]', $Videos->url, ['class' => 'form-control', 'value'=>'http://',  ]); !!}
									</div>
								</div>
							</div>
							
								<div class="col-xl-3 col-md-12 col-sm-12">
									<div class="form-group row">
										<div class="col-sm-4">
											<a class="btn btn-danger remove_button" value="add">Delete</a>
										</div>
										
									</div>
								</div>
							
							</div><br>
							@endforeach
							
							@else
							
							
							@endif	
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
							 {!! Form::select('gender',(['0' => 'Select a Gender'] + $gender),$personal->gender, ['class' => 'form-control']) !!}
							 
						</div>
					</div>
					
					<div class="form-group row">
						{!! Form::label('Civil Status', __( 'Civil Status' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">	
							{!! Form::select('civilstatus',(['0' => 'Select a Civil Status'] + $civilstatus),$personal->civilstatus, ['class' => 'form-control']) !!}
						</div>
					</div>
				</div>
				 <div class="col-xl-6 col-md-12 col-sm-12">
					<div class="form-group row">
						{!! Form::label('Occupation', __( 'Occupation' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
							
					  {!! Form::text('occupation', $personal->occupation, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Occupation' ) ]); !!}
						</div>
					</div>
					
					<div class="form-group row">
						{!! Form::label('Nationality', __( 'Nationality' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
							 {!! Form::text('nationality', $personal->nationality, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Nationality' ) ]); !!}
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
								 {!! Form::select('rregion', (['0' => 'Select a Region']),$personal->residenceregion, ['class' => 'form-control regiondata','id' => 'regionid','onchange' => 'getCity();', ]) !!}
							
								</div>
							</div>
							<div class="form-group row">
								
								{!! Form::label('City', __( 'City' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									 {!! Form::select('rcity', (['0' => 'Select a City'] ),$personal->residencecity, ['class' => ' form-control citydata','id' => 'cityid',]) !!}
								</div>
							</div>
							<div class="form-group row">
								{!! Form::label('Parish', __( 'Parish' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									{!! Form::text('rparish', $personal->residenceparish, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Parish' ) ]); !!}
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
									 {!! Form::select('bregion', (['0' => 'Select a Region']),$personal->birthregion, ['class' => 'form-control regiondata','id' => 'regionid','onchange' => 'getCity();', ]) !!}
								</div>
							</div>
							<div class="form-group row">
								
								{!! Form::label('City', __( 'City' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									 {!! Form::select('bcity', (['0' => 'Select a City'] ),$personal->birthcity, ['class' => ' form-control citydata','id' => 'cityid',]) !!}
								</div>
							</div>
							<div class="form-group row">
								{!! Form::label('Parish', __( 'Parish' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									{!! Form::text('bparish', $personal->birthparish, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Parish' ) ]); !!}
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
									
									{!! Form::textarea('appletter', $personal->applicationletter, ['class' => 'form-control', 'id' => 'remarks', 'placeholder' => __( 'Enter Parish' ) ]); !!}
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
						   {!! Form::select('purposelist[]', $purpose,$purposeId, ['class' => 'form-control' ,'multiple']) !!}
						</div>
					</div>
				  <div class="col-sm-12">	
					<h3>Study</h3>	
				  </div>
						<div class="col-sm-6">								 
							<div class="form-group">
								{!! Form::label('Major/field', __( 'Major/field' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-12">								 
									{!! Form::textarea('studyfield', $study->studyfield, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
								</div>
							</div>
						</div>
							
						<div class="col-sm-6">								 
							<div class="form-group">
								{!! Form::label('Degree', __( 'Degree' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								
								<div class="col-sm-12">								 
									{!! Form::textarea('degree', $study->studydegree, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">								 
							<div class="form-group">
								{!! Form::label('School', __( 'School' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-12">								 
									{!! Form::textarea('school', $study->studyschool, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
								</div>
							</div>
						</div>
							
						<div class="col-sm-6">								 
							<div class="form-group">
								{!! Form::label('Location', __( 'Location' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-12">								 
									{!! Form::textarea('location', $study->studylocation, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">								 
							<div class="form-group">
								{!! Form::label('Start Date', __( 'Start Date' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 
									{!! Form::text('sdate', $study->studystart, ['class' => 'form-control mycustomdate','id' => 'startdate','placeholder' => __( '' ) ]); !!}
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">								 
							<div class="form-group">
								{!! Form::label('Govt Support', __( 'Govt Support' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
							  <div class="col-lg-12">
								  {!! Form::radio('sgovtsupport', '1', ($study->studygovtsupport ==  '1'), array('id'=>'activeip')) !!} Backend Only
												  
								 {!! Form::radio('sgovtsupport', '0', ($study->studygovtsupport ==  '0'), array('id'=>'activeip')) !!} Both Frontend & Backend

								</div>
							  
							  
							</div>
							
						</div>
						
						<div class="col-sm-6">								 
							<div class="form-group">
								{!! Form::label('End Date', __( 'End Date' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 
									{!! Form::text('enddate', $study->studyend, ['class' => 'form-control mycustomdate','id' => 'enddate','placeholder' => __( '' ) ]); !!}
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
									{!! Form::text('pdegree', $study->studypreviousdegree, ['class' => 'form-control','placeholder' => __( '' ) ]); !!}
								</div>
							</div>
							<div class="form-group row">
									{!! Form::label('Length', __( 'Length' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									{!! Form::text('plength', $study->studyprevioulength, ['class' => 'form-control','placeholder' => __( '' ) ]); !!}
								</div>
							</div>
							<div class="form-group row">
								{!! Form::label('School', __( 'School' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									{!! Form::text('pschool', $study->studypreviousschool, ['class' => 'form-control','placeholder' => __( '' ) ]); !!}
								</div>
							</div>
							<div class="form-group row">
								{!! Form::label('Location', __( 'Location' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									 {!! Form::select('plocation', (['0' => 'Select a Location']),$study->studyprevioulocation, ['class' => 'form-control']) !!}
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
									 {!! Form::text('hschool', $study->studyhighschool, ['class' => 'form-control', '', 'placeholder' => __( 'Enter School' ) ]); !!}
								</div>
							</div>
							
							
							<div class="form-group row">
								{!! Form::label('Location', __( 'Location' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									 {!! Form::select('hlocation', (['0' => 'Select a Location'] ),$study->studyhighlocation, ['class' => 'form-control']) !!}
								</div>
							</div>
							
							<div class="form-group row">
								{!! Form::label('Other Location', __( 'Other Location' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-9">								 
									{!! Form::text('hotherlocation', $study->studyhighotherlocation, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Other Location' ) ]); !!}
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
							{!! Form::textarea('sadditionalinfo', $study->studyadditionalinfo, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
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
							{!! Form::textarea('careillness', $care->careillness, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
					
					<div class="form-group row">						
						{!! Form::label('Symptoms', __( 'Symptoms' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
							{!! Form::textarea('caresymptoms', $care->caresymptoms, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
					
					<div class="form-group row">
						{!! Form::label('Additional Information', __( 'Additional Information' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
							{!! Form::textarea('careaddtionalinfo', $care->careaddtionalinfo, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
				
				</div>
				
				<div class="col-xl-6 col-md-12 col-sm-12">
					
					<div class="form-group row">
						{!! Form::label('Health Care Region', __( 'Health Care Region' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
							{!! Form::textarea('carehealthregion', $care->carehealthregion, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
					
					<div class="form-group row">
						{!! Form::label('Hospital', __( 'Hospital' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
							{!! Form::textarea('carehospital', $care->carehospital, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
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
								{!! Form::textarea('welfareneeds', $walfare->welfareneeds, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-md-12 col-sm-12">
							<div class="form-group row">
									{!! Form::label('Additional Information', __( 'Additional Information' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 
									{!! Form::textarea('welfareadditionalinfo', $walfare->welfareadditionalinfo, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
								</div>
							</div>
					</div>
			</div>
			
			<div class="row">
				<div class="col-xl-12 col-md-12 col-sm-12">			
					<div class="card">
					  <div class="card-header bg-info">Children
					  
					  <div class="col-sm-12">
						<a class="btn btn-primary add_buttonchild float-right" value="add">Add</a>
					</div>
					  </div>
					  <div class="card-body col-xl-12">
					  @if(!empty($childern))
					  @foreach($childern as $Child)
					  
						<div class="form-inline">
							<div class="col-xl-3 col-md-12 col-sm-12">
								<div class="form-group row">
									{!! Form::label('Birthdate', __( 'Birthdate' ) . ':', [ 'class' => 'col-sm-12 col-form-label']) !!}
									<div class="col-sm-12">								 
										 {!! Form::text('cdob[]', $Child->childerndob, ['class' => 'form-control mycustomdate', 'id'=>'C_dob',  ]); !!}
									</div>
								</div>
							</div>
							
							<div class="col-xl-2 col-md-12 col-sm-12">
								<div class="form-group row">
									{!! Form::label('Gender', __( 'Gender' ) . ':', [ 'class' => 'col-sm-12 col-form-label']) !!}
									<div class="col-sm-12">								 
										 {!! Form::select('cgender[]', (['0' => 'Select Gender','1' => 'Male','2' => 'Female'] ),$Child->childerngender, ['class' => 'form-control']) !!}
									</div>
								</div>
							</div>
							
							<div class="col-xl-3 col-md-12 col-sm-12">
								<div class="form-group row">
									{!! Form::label('School', __( 'School' ) . ':', [ 'class' => 'col-sm-12 col-form-label']) !!}
									<div class="col-sm-12">								 
										 {!! Form::text('cschool[]', $Child->childernschool, ['class' => 'form-control', 'id'=>'C_dob',  ]); !!}
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-md-12 col-sm-12">
								<div class="form-group row">
									{!! Form::label('Location', __( 'Location' ) . ':', [ 'class' => 'col-sm-12 col-form-label']) !!}
									<div class="col-sm-12">								 
										{!! Form::select('clocation[]', (['0' => 'Select Localtion','1'=>'delhi'] ),$Child->childernlocation, ['class' => 'form-control']) !!}
									</div>
								</div>
							</div>
							
								<div class="col-xl-1 col-md-12 col-sm-12">
									<div class="form-group row">
										<div class="col-sm-12">
											<a class="btn btn-danger " value="add">Delete</a>
										</div>
										
									</div>
								</div>
							</div><br>
							@endforeach
							@endif
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
							{!! Form::select('researchsubject', (['0' => 'Select a subject']),$research->researchsubject, ['class' => 'form-control' ,'multiple']) !!}
						</div>
					</div>
					
					<div class="form-group row">
						{!! Form::label('Objective', __( 'Objective' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-12">								 
							{!! Form::textarea('researchobjective', $research->researchobjective, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
					
					<div class="form-group row">
						<label for="input" class="col-sm-4 col-form-label">Limitations</label>
						<div class="col-sm-12">								 
							{!! Form::textarea('researchlimitation', $research->researchlimitation, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
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
							{!! Form::text('researchstartdate', $research->researchstartdate, ['class' => 'form-control mycustomdate','id' => 'rstartdate','placeholder' => __( '' ) ]); !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('End Date', __( 'End Date' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 
							{!! Form::text('researchenddate', $research->researchenddate, ['class' => 'form-control mycustomdate','id' => 'renddate','placeholder' => __( '' ) ]); !!}
						</div>
					</div>
					
					<div class="form-group row">
						{!! Form::label('Govt Support', __( 'Govt Support' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
					  <div class="col-lg-12">
						  {!! Form::radio('researchgovtsupport', '1', ($research->researchgovtsupport ==  '1'), array('id'=>'activeip')) !!} Backend Only
										  
						 {!! Form::radio('researchgovtsupport', '0', ($research->researchgovtsupport ==  '0'), array('id'=>'activeip')) !!} Both Frontend & Backend

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
										{!! Form::text('researchprevstudy', $research->researchprevstudy, ['class' => 'form-control','id' => 'enddate','placeholder' => __( '' ) ]); !!}
									</div>
								</div>
								
								<div class="form-group row">
									{!! Form::label('School', __( 'School' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
									<div class="col-sm-8">								 
										{!! Form::text('researchprevschool', $research->researchprevschool, ['class' => 'form-control','id' => 'enddate','placeholder' => __( '' ) ]); !!}
									</div>
								</div>
								
								<div class="form-group row">
									{!! Form::label('High School', __( 'High School' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
									<div class="col-sm-8">								 
										{!! Form::text('researchhighschool', $research->researchhighschool, ['class' => 'form-control','id' => 'enddate','placeholder' => __( '' ) ]); !!}
									</div>
								</div>
							</div>
					</div>
					<div class="form-group row">
						{!! Form::label('Additional Information', __( 'Additional Information' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-12">								 
							{!! Form::textarea('researchadditionalinfo', $research->researchadditionalinfo, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
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
							{!! Form::textarea('projectobject', $project->projectobject, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('Geographic Area', __( 'Geographic Area' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-12">								 
							{!! Form::textarea('projectgeoarea', $project->projectgeoarea, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
					
					<div class="form-group row">
						{!! Form::label('Other Information Project', __( 'Other Information Project' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-12">								 
							{!! Form::textarea('projectotherinfo', $project->projectotherinfo, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
				</div> 
				<div class="col-xl-6 col-md-12 col-sm-12">
					<div class="form-group row">
						{!! Form::label('Purpose', __( 'Purpose' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-12">								 
							{!! Form::textarea('projectpurpose',  $project->projectpurpose, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('Beneficiaries', __( 'Beneficiaries' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-12">								 
						{!! Form::textarea('projectbeneficiries',  $project->projectbeneficiries, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
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
								<th><input type="checkbox" id="selectAll"></th>
								  <th scope="col">ID</th>
								  <th scope="col">Foundation</th>
								  <th scope="col">Sort</th>
								  <th scope="col">Status</th>
								  
								</tr>
							  </thead>
							  <tbody>
								@foreach($myfoundList as $list)
								<tr>
									<td><input type="checkbox" name="usersfoundlistIds"  id="usersfoundlistIds" value="{{$list->id}}"></td>
								   <td>{{$list->id}}</td>
								   <td>{{$list->name}}</td>
								   <td>{{$list->sort}}</td>
								   <td>{!!$list->tstatus!!}</td>
								  </tr>
								@endforeach
							  </tbody>
						  
							</table>
							 <button class="btn btn-danger" onClick="getfoundlistcheckboxval(3);">Delete</button>
						</div>
					</div>				
				  </div>
				  <div class="tab-pane fade" id="v-pills-photos" role="tabpanel" aria-labelledby="v-pills-photos-tab">
						
						<h5>My Profile Photo</h5>
						<input type="file" name="logoImg" id="logoImg" accept="image/x-png,image/gif,image/jpeg" >
						<br><br>
						@if(!empty($logo))
							<div class="row">
								<div class="col-md-4">
									<img src="{{URL::asset('uploads/images/'.$logo->name)}}" height="120" width="200">
									<div class="col-md-12" target="_blank"><br>
									<a href="{{URL::asset('uploads/images/'.$logo->name)}}" class="btn btn-info">View</a>
								
									<a onClick="deleteDataImg({{$logo->id}},'ORG');" class="btn btn-danger">Delete</a>
									</div>
								</div>
							</div>
						@endif
						<hr>
						<br>
						<h5>My Documents</h5>
						<input type="file" name="documents[]" id="Documents" accept="application/pdf,application/vnd.ms-excel" multiple>
						<br><br>
						@if(!empty($doc))
							@foreach($doc as $Docs)
							<div class="col-md-12">
								<div class="col-md-4">
									<a href="{{URL::asset('uploads/images/'.$Docs->name)}}" target="_blank"><i class="far fa-file-pdf fa-lg"></i></a>
									<div class="col-md-12" ><br>
									<a href="{{URL::asset('uploads/images/'.$Docs->name)}}" class="btn btn-info" target="_blank">View</a>
								
									<a onClick="deleteDataImg({{$Docs->id}},'ORG');" class="btn btn-danger">Delete</a>
									</div><br>
								</div>
							</div>
							@endforeach
						@endif
						<hr>
						<br>
						<h5>My Photo</h5>
						<input type="file" name="photos[]" id="photos" accept="image/x-png,image/gif,image/jpeg" multiple>
						<br><br>
						@if(!empty($photo))
							@foreach($photo as $Photo)
							<div class="col-md-12">
								<div class="col-md-4">
									<img src="{{URL::asset('uploads/images/'.$Photo->name)}}" target="_blank" height="120" width="200">
									<div class="col-md-12" ><br>
									<a href="{{URL::asset('uploads/images/'.$Photo->name)}}" class="btn btn-info" target="_blank">View</a>
								
									<a  onClick="deleteDataImg({{$Photo->id}},'ORG');" class="btn btn-danger">Delete</a>
									</div><br>
								</div>
							</div>
							@endforeach
						@endif
						<hr>
							
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
							  <th scope="col">Order ID</th>
							  <th scope="col">Order Date</th>
							 <!-- <th scope="col">Order Type</th> -->
							  <th scope="col">Order Status</th>
							</tr>
						  </thead>
						  <tbody>
							
						   @foreach($orderList as $mylist)
							<tr>
							
							  <th scope="row"><a href="{{ url('admin/order/'.$mylist->id.'/edit') }}">order-{{$mylist->id}}</a></th>
							  <td>{{$mylist->orderdate}}</td>
							   <!-- <td>{{$mylist->id}}</td> -->
							  <td>{!!$mylist->pstatus!!}</td>
							</tr>
						   @endforeach
						  </tbody>
					</table>
					 </div>

					  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					  
					   <table class="table table-bordered">
						  <thead>
							<tr>
							  <th scope="row">ID</th>
							  <th>Subscription</th>
							  <th>Start</th>
							  <th>Expiry</th>
							  <th>Status</th>
							</tr>
						  </thead>
						  <tbody>
							@foreach($subsList as $mylist)
							<tr>
							  <td><a href="{{ url('admin/subscription/'.$mylist->id.'/edit') }}">subscription-{{$mylist->id}}</a></td>
							  <td>{{$mylist->subtypename}}</td>
							  <td>{{$mylist->start_date}}</td>
							  <td>{{$mylist->end_date}}</td>
							  <td>{!!$mylist->pstatus!!}</td>
							</tr>
						   @endforeach
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