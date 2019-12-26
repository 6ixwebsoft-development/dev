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

@if (count($errors) > 0)
<ul id="login-validation-errors" class="validation-errors">
    @foreach ($errors->all() as $error)
    <li class="validation-error-item">{{ $error }}</li>
    @endforeach
</ul>
@endif
		{!! Form::open(array('route' => array('admin.librarygroup.update', $basic->id))) !!}
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
                      Library Group  Management <small class="text-muted">Library Group Add</small>
                    </h4>

                </div><!--col-->
				 <div class="col-sm-6">
					<div class="float-right">
						<button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Save</button>
						<a class="btn btn-warning" href="{{url('admin/library')}}	"><i class="fa fa-th-list" aria-hidden="true"></i> Back To List</a>
						<!--<button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button> -->
					</div>
                </div><!--col-->
				
            </div><!--row-->

        <hr>

			<div class="row">
			  <div class="col-2">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Basic Info</a>
				  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"> Group member</a>
				  
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
								  {!! Form::label('Library Group', __( 'Library Group' ) . ':*', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								   {!! Form::text('library', $basic->library, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Last name' ) ]); !!}
								</div>
							  </div>

							   <div class="form-group row">
								{!! Form::label('Language', __( 'Language' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 
								  {!! Form::select('language', (['0' => 'Select a language'] + $language),$basic->languageid, ['class' => 'form-control','' ]  ); !!}
								</div>
							  </div>
	
							  <div class="form-group row">
								
								{!! Form::label('Availability', __( 'Availability' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								  {!! Form::select('bavailability[]', (['1' => 'GlobalGrant Sweden']),$basic->availability, ['class' => 'form-control','multiple' ]  ); !!}
								</div>
							  </div>
							   <div class="form-group row">
								
								{!! Form::label('Remarks', __( 'Remarks' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">
								   {!! Form::textarea('lremarks', $basic->remark, ['class' => 'form-control','','placeholder' => __( '' ) ]); !!}
								</div>
							  </div>
						  
					</div>
				  
				  <div class="col-xl-6 col-md-12 col-sm-12">

				</div> 
				</div>			
				<hr>
						<div >
							<h3>Contact Info</h3><br>
							 <div class="form-group row">
								{!! Form::label('Contact Name', __( 'Contact Name' ) . ':', [ 'class' => 'col-sm-2 col-form-label']) !!}
								<div class="col-sm-4">
								   {!! Form::text('contactname', $contact->contactname, ['class' => 'form-control','','placeholder' => __( '' ) ]); !!}
								</div>
							 
								
								{!! Form::label('Email', __( 'Email' ) . ':*', [ 'class' => 'col-sm-2 col-form-label']) !!}
								<div class="col-sm-4">
								   {!! Form::email('email', $contact->email, ['class' => 'form-control','','placeholder' => __( '' ) ]); !!}
								</div>
							  </div>
							  
							   <div class="form-group row">
								{!! Form::label('Phone', __( 'Phone' ) . ':', [ 'class' => 'col-sm-2 col-form-label']) !!}
								<div class="col-sm-4">
								   {!! Form::text('phone', $contact->phone, ['class' => 'form-control','','placeholder' => __( '' ) ]); !!}
								</div>
							 
								
								{!! Form::label('Mobile', __( 'Mobile' ) . ':', [ 'class' => 'col-sm-2 col-form-label']) !!}
								<div class="col-sm-4">
								   {!! Form::text('mobile', $contact->mobile, ['class' => 'form-control','','placeholder' => __( '' ) ]); !!}
								</div>
							  </div>
							  
							   <div class="form-group row">
								
								{!! Form::label('Website', __( 'Website' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
								<div class="col-sm-8">								 							  
								  {!! Form::textarea('website', $contact->website, ['class' => 'form-control','rows'=>'3','placeholder' => __( '' ) ]); !!}
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
												   {!! Form::textarea('baddress', $contact->contactaddress, ['class' => 'form-control', 'rows'=>'3', 'placeholder' => __( '' ) ]); !!}
												</div>
											</div>
											<div class="form-group row">
											  {!! Form::label('Zip', __( 'Zip' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
												<div class="col-sm-8">
												   {!! Form::text('bzip', $contact->contactzip, ['class' => 'form-control','', 'placeholder' => __( '' ) ]); !!}
												</div>
											</div>
											<div class="form-group row">
												{!! Form::label('Country', __( 'Country' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
												<div class="col-sm-8">								 
												  {!! Form::select('bcountry', (['0' => 'Select a country'] + $country),$contact->contactcountry, ['class' => 'form-control','' ]  ); !!}
												</div>
											</div>
											<div class="form-group row">
												{!! Form::label('City', __( 'City' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
												<div class="col-sm-8">								 
												  {!! Form::select('bcity', (['0' => 'Select a city']),$contact->contactcity, ['class' => 'form-control','' ]  ); !!}
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
												   {!! Form::textarea('paddress', $contact->postaladdress, ['class' => 'form-control', 'rows'=>'3', 'placeholder' => __( '' ) ]); !!}
												</div>
											</div>
											<div class="form-group row">
											  {!! Form::label('Zip', __( 'Zip' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
												<div class="col-sm-8">
												   {!! Form::text('pzip', $contact->postalzip, ['class' => 'form-control','', 'placeholder' => __( '' ) ]); !!}
												</div>
											</div>
											<div class="form-group row">
												{!! Form::label('Country', __( 'Country' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
												<div class="col-sm-8">								 
												  {!! Form::select('pcountry', (['0' => 'Select a country'] + $country),$contact->postalcountry, ['class' => 'form-control','' ]  ); !!}
												</div>
											</div>
											<div class="form-group row">
												{!! Form::label('City', __( 'City' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
												<div class="col-sm-8">								 
												  {!! Form::select('pcity', (['0' => 'Select a city']),$contact->postalcity, ['class' => 'form-control','' ]  ); !!}
												</div>
											</div>
											
									  </div>		
									</div>
								</div>
							</div>
			
				</div>

			</div>
				  
				  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">.
				  	
					
					  <div class="row">
						
						<div class="col-sm-12">	
							<div class="card">
							  <div class="card-header bg-primary">Libraries that belongs to this group</div>
							  <div class="card-body">
									
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

      </div>

    </div>



  </div>





@endsection