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


<form action="{{url('admin/organization/store')}}" method="post">
	@csrf
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
                     Organization  Management <small class="text-muted">Organization Add</small>
                    </h4>

                </div>
                <!--col-->					
					@include('admin.common.section.save_action',['user' => $user]);
				<!--col-->
				
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
				  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Basic Info</a>
				   <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">purpose</a>
				  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"> IP & Remote Login</a>
				 
				  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Foundations</a>
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
								  {!! Form::label('Organization', __( 'Organization' ) . ':*', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								   {!! Form::text('orgname', null, ['class' => 'form-control', '', 'placeholder' => __( '' ) ]); !!}
								</div>
							  </div>

							  
							   <div class="form-group row">
								{!! Form::label('Language', __( 'Language' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 
								  {!! Form::select('language', (['0' => 'Select a language'] + $language),[2], ['class' => 'form-control','' ]  ); !!}
								</div>
							  </div>
							  
							  <div class="form-group row">
								{!! Form::label('Login Type', __( 'Login Type' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 
								  {!! Form::select('logintype', (['1' => 'Username/password only','2'=>'IP login only','3'=>'IP login and username/password both','4'=>'Blocked user, no access','5'=>'IP login or  username/password']),[], ['class' => 'form-control','' ]  ); !!}
								</div>
							  </div>
							 
							 <div class="form-group row">
								  {!! Form::label('User Number', __( 'User Number' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								   {!! Form::text('usertype', null, ['class' => 'form-control', 'maxlength'=>'5','onkeypress' => 'return alphaOnly(event);', 'placeholder' => __( '' ) ]); !!}
								</div>
							  </div>
							 
							  <div class="form-group row">
								
								{!! Form::label('Availability', __( 'Availability' ) . ':*', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								  {!! Form::select('availability', (['1' => 'GlobalGrant Sweden']),[], ['class' => 'form-control','' ]  ); !!}
								</div>
							  </div>
							   <div class="form-group row">
								
								{!! Form::label('Remarks', __( 'Remarks' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								   {!! Form::textarea('lremarks', null, ['class' => 'form-control','','placeholder' => __( '' ) ]); !!}
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
										<option value="{{$role->id}}">{{$role->name}}</option>
									@endforeach
									</select>
								 
								  
								</div>
							  </div>
							  
							  <div class="form-group row">
							
								{!! Form::label('E-mail', __( 'E-mail' ) . ':*', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 
								    {!! Form::email('useremail', null, ['class' => 'form-control','','placeholder' => __( 'Enter email' ) ]); !!}
								</div>
								<P>Password will be generated automatically by the system for security purposes and can be changed by the user on their member page.</p>
							  </div>
					</div>
					 
				</div>
				
				</div> 
				</div>			
				<hr>
						<div >
							<h3>Contact Info</h3><br>
							 <div class="form-group row">
								{!! Form::label('Contact Name', __( 'Contact Name' ) . ':', [ 'class' => 'col-sm-2 col-form-label']) !!}
								<div class="col-sm-4">
								   {!! Form::text('contactname', null, ['class' => 'form-control','','placeholder' => __( '' ) ]); !!}
								</div>
							 
								
								{!! Form::label('Email', __( 'Email' ) . ':*', [ 'class' => 'col-sm-2 col-form-label']) !!}
								<div class="col-sm-4">
								   {!! Form::email('email', null, ['class' => 'form-control','','placeholder' => __( '' ) ]); !!}
								</div>
							  </div>
							  
							   <div class="form-group row">
								{!! Form::label('Phone', __( 'Phone' ) . ':', [ 'class' => 'col-sm-2 col-form-label']) !!}
								<div class="col-sm-4">
								   {!! Form::text('phone', null, ['class' => 'form-control','onkeypress' => 'return alphaOnly(event);','placeholder' => __( '' ) ]); !!}
								</div>
							 
								
								{!! Form::label('Mobile', __( 'Mobile' ) . ':', [ 'class' => 'col-sm-2 col-form-label']) !!}
								<div class="col-sm-4">
								   {!! Form::text('mobile', null, ['class' => 'form-control','onkeypress' => 'return alphaOnly(event);','placeholder' => __( '' ) ]); !!}
								</div>
							  </div>
							  
							   <div class="form-group row">
								
								{!! Form::label('Website', __( 'Website' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 							  
								  {!! Form::textarea('website', null, ['class' => 'form-control','rows'=>'3','placeholder' => __( '' ) ]); !!}
								</div>
							  </div>
							  
							 
							  
							<div class="col-md-12 row">
								<div class="col-md-6">
									<div class="card">
									  <div class="card-header bg-primary">Billing Address</div>
									  <div class="card-body">
											<div class="form-group row">
											  {!! Form::label('Address', __( 'Address' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
												<div class="col-sm-8">
												   {!! Form::textarea('baddress', null, ['class' => 'form-control', 'rows'=>'3', 'placeholder' => __( '' ) ]); !!}
												</div>
											</div>
											<div class="form-group row">
											  {!! Form::label('Zip', __( 'Zip' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
												<div class="col-sm-8">
												   {!! Form::text('bzip', null, ['class' => 'form-control','onkeypress' => 'return alphaOnly(event);', 'placeholder' => __( '' ) ]); !!}
												</div>
											</div>
											<div class="form-group row">
												{!! Form::label('Country', __( 'Country' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
												<div class="col-sm-8">								 
												  {!! Form::select('bcountry', (['0' => 'Select a country'] + $country),[], ['class' => 'form-control','' ]  ); !!}
												</div>
											</div>
											<div class="form-group row">
												{!! Form::label('City', __( 'City' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
												<div class="col-sm-8">								 
												  {!! Form::select('bcity', (['0' => 'Select a city']),[], ['class' => 'form-control','' ]  ); !!}
												</div>
											</div>
											
									  </div>		
									</div>
								</div>
								<div class="col-md-6">
									<div class="card">
									  <div class="card-header bg-primary">Postal Address</div>
									  <div class="card-body">
											<div class="form-group row">
											  {!! Form::label('Address', __( 'Address' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
												<div class="col-sm-8">
												   {!! Form::textarea('paddress', null, ['class' => 'form-control', 'rows'=>'3', 'placeholder' => __( '' ) ]); !!}
												</div>
											</div>
											<div class="form-group row">
											  {!! Form::label('Zip', __( 'Zip' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
												<div class="col-sm-8">
												   {!! Form::text('pzip', null, ['class' => 'form-control','onkeypress' => 'return alphaOnly(event);', 'placeholder' => __( '' ) ]); !!}
												</div>
											</div>
											<div class="form-group row">
												{!! Form::label('Country', __( 'Country' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
												<div class="col-sm-8">								 
												  {!! Form::select('pcountry', (['0' => 'Select a country'] + $country),[], ['class' => 'form-control','' ]  ); !!}
												</div>
											</div>
											<div class="form-group row">
												{!! Form::label('City', __( 'City' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
												<div class="col-sm-8">								 
												  {!! Form::select('pcity', (['0' => 'Select a city']),[], ['class' => 'form-control','' ]  ); !!}
												</div>
											</div>
											
									  </div>		
									</div>
								</div>
							</div>
							
							<hr>
							<h3>About Us Info</h3><br>
							<p>Write something about:</p>
							<p>1. What is your project or objective?</p>
							<p>2. What is the purpose of your project or objective?</p>
							<p>3. Who benefits from your activities?</p>
							<p>4. What is your primary geographic area of activity?</p>
							<ul class="nav nav-tabs card-header bg-default" id="myTab" role="tablist">
									  <li class="nav-item">
										<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Svenska</a>
									  </li>
									  <li class="nav-item">
										<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">English</a>
									  </li>
								 </ul>
								<div class="col-md-12 ">
								<div class="tab-content" id="myTabContent">
								  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
									<div class="form-group row">
										<div class="col-sm-12">
										   {!! Form::textarea('sveaboyt', null, ['class' => 'form-control','id'=>'remarks','placeholder' => __( '' ) ]); !!}
										</div>
									  </div>
								  </div>
								  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
									<div class="form-group row">
										<div class="col-sm-12">
										   {!! Form::textarea('engabout', null, ['class' => 'form-control','id'=>'remarks','placeholder' => __( '' ) ]); !!}
										</div>
									  </div>
								  </div>
								  
								</div>
								
							</div>
							  
										
				</div>

			</div>
				  
				  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">.
				  <h3>Ip Login Info</h3>	
					
					  <div class="row">
						<div class="col-sm-12">								 
							<div class="form-group">
								<div class="form-group row">
									{!! Form::label('Activate IP', __( 'Activate IP' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
									<div class="col-sm-8">								 
									  {!! Form::radio('activeipstaus', '1', (old('sex') ==  '1'), array('id'=>'activeip')) !!} Yes
									  
									  {!! Form::radio('activeipstaus', '0', (old('sex') ==  '0'), array('id'=>'activeip')) !!} No
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12">	
							<div class="card">
							  <div class="card-header bg-primary">IP Range</div>
							  <div class="card-body">
									<div class="form-group row">
										{!! Form::label('From', __( 'From' ) . ':', [ 'class' => 'col-sm-1 col-form-label']) !!}
										
										<div class="col-sm-1">
										   {!! Form::text('from1[]', null, ['class' => 'form-control','maxlength'=>'3', 'onkeypress' => 'return alphaOnly(event);' ,'placeholder' => __( '' ) ]); !!}
										</div>
										<div class="col-sm-1">
										   {!! Form::text('from2[]', null, ['class' => 'form-control','maxlength'=>'3', 'onkeypress' => 'return alphaOnly(event);' ,'placeholder' => __( '' ) ]); !!}
										</div>
										<div class="col-sm-1">
										   {!! Form::text('from3[]', null, ['class' => 'form-control','maxlength'=>'3', 'onkeypress' => 'return alphaOnly(event);', 'placeholder' => __( '' ) ]); !!}
										</div>
										<div class="col-sm-1">
										   {!! Form::text('from4[]', null, ['class' => 'form-control','onkeypress' => 'return alphaOnly(event);','maxlength'=>'3', 'placeholder' => __( '' ) ]); !!}
										</div>
										
										{!! Form::label('To', __( 'To' ) . ':', [ 'class' => 'col-sm-1 col-form-label']) !!}
										
										<div class="col-sm-1">
										   {!! Form::text('to1[]', null, ['class' => 'form-control','maxlength'=>'3', 'onkeypress' => 'return alphaOnly(event);', 'placeholder' => __( '' ) ]); !!}
										</div>
										<div class="col-sm-1">
										   {!! Form::text('to2[]', null, ['class' => 'form-control','maxlength'=>'3', 'onkeypress' => 'return alphaOnly(event);' ,'placeholder' => __( '' ) ]); !!}
										</div>
										<div class="col-sm-1">
										   {!! Form::text('to3[]', null, ['class' => 'form-control','maxlength'=>'3', 'onkeypress' => 'return alphaOnly(event);', 'placeholder' => __( '' ) ]); !!}
										</div>
										<div class="col-sm-1">
										   {!! Form::text('to4[]', null, ['class' => 'form-control','maxlength'=>'3', 'onkeypress' => 'return alphaOnly(event);' ,'placeholder' => __( '' ) ]); !!}
										</div>
										<div class="col-sm-2">
											<a class="btn btn-success add_buttonip">Add</a>
										</div>
									</div>
									<div class="field_wrapperip"></div>
							  </div>
							</div>
						</div>
						<hr>
						
						<div class="col-sm-12">	
							<div class="col-sm-12 form-group">		
									<div class="form-group row">
										{!! Form::label('Remote Name', __( 'Remote Name' ) . ':', [ 'class' => 'col-sm-2 col-form-label']) !!}
										<div class="col-sm-4">								 
										  {!! Form::text('remotename', null, ['class' => 'form-control', 'placeholder' => __( '' ) ]); !!}
										</div>
									
										{!! Form::label('Activate IP', __( 'Activate IP' ) . ':', [ 'class' => 'col-sm-2 col-form-label']) !!}
										<div class="col-sm-4">								 
										  {!! Form::radio('activeremoteip', '1', (old('sex') ==  '1'), array('id'=>'sex')) !!} Yes
										  
										  {!! Form::radio('activeremoteip', '0', (old('sex') ==  '0'), array('id'=>'sex')) !!} No
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-header bg-primary">Remote ID Validation</div>
										<div class="card-body">
											<div class="form-group row">
												{!! Form::label('Digits in Remote ID', __( 'Digits in Remote ID' ) . ':', [ 'class' => 'col-sm-3 col-form-label']) !!}
												<div class="col-sm-1">								 
												  {!! Form::select('remotedigit[]', (['1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10','11' => '11','12' => '12','13' => '13','14' => '14','15' => '15',]),[], ['class' => 'form-control','onChange'=>'maxLengthFunction(112);','id'=>'remotedigit_112' ]  ); !!}
												</div>
											
												{!! Form::label('Remote ID', __( 'Remote ID' ) . ':', [ 'class' => 'col-sm-3 col-form-label']) !!}
												<div class="col-sm-3">								 
												  {!! Form::text('remoteid[]', null, ['class' => 'form-control','onkeypress' => 'return alphaOnly(event);','id'=>"remoteid_112",'readonly' ,'placeholder' => __( '' ) ]); !!}
												</div>
												<div class="col-sm-2">
													<a class="btn btn-success add_buttonremote">Add</a>
												</div>
											</div>
											
											<div class="field_wrapperremote"></div>
										</div>
									</div>
						</div>
					</div>
				</div>
					
					
					
				<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
				  <h3>Purpose</h3>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							
							<div class="col-sm-12">		
								<div class="form-group row">				 
								   {!! Form::select('purposelist[]', $purpose,[], ['class' => 'form-control' ,'multiple']) !!}
								</div>
							</div>
						</div>
					</div>				
				  </div>
					
					
					 <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
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
					
				  </div>
				  
				  
				  
				  </div>
				  
				 
				</div>
			  </div>
			 
			</div>
        
       </div>

      </div>
 </form>
    </div>



  </div>





@endsection