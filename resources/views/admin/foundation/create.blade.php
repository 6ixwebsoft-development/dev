<style type="text/css">
.purpose-details .cke_contents {
    height: 500px !important;
}
</style>
@extends('admin.includes.adminlayout') @section('breadcrumb')
<!-- Breadcrumb-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">Home</li>
	<li class="breadcrumb-item"> <a href="#">Admin</a>
	</li>
	<li class="breadcrumb-item active">Dashboard</li>
	<!-- Breadcrumb Menu-->
	<li class="breadcrumb-menu d-md-down-none">
		<div class="btn-group" role="group" aria-label="Button group">
			<a class="btn" href="#"> <i class="icon-speech"></i>
			</a>
			<a class="btn" href="./"> <i class="icon-graph"></i>  Dashboard</a>
			<a class="btn" href="#"> <i class="icon-settings"></i>  Settings</a>
		</div>
	</li>
</ol>
@endsection @section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-5">
						<h4 class="card-title mb-0">
                    	Create Foundation<small class="text-muted"></small>
                		</h4>
					</div>
					<!--col-->
					<div class="col-sm-7">
						
					</div>
					<!--col-->
				</div>
				<!--row-->
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
				{!! Form::open(array('url' => 'admin/foundation/store')) !!}
					
					<div class="row">
						<div class="col-12">
	                        <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">Basic Info</a>
	                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Criteria</a>
	                     
	                        </div>
	                    </div>
	                    <div class="col-12">
	                        <div class="tab-content " class="bottom_style" id="v-pills-tabContent">
	                            <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
	                            <div class="row">
                                    <div class="col-md-6">
                                          
                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('name', __( 'Name' ) . ':*') !!}
											</div>

                                            <div class="col-md-9">
                                               {!! Form::text('name', null, ['class' => 'form-control', '', 'placeholder' => __( 'Name' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('sort-name', __( 'Sort Name' ) . ':*') !!}
											</div>

                                            <div class="col-md-9">
                                                    {!! Form::text('sort_name', null, ['class' => 'form-control', '', 'placeholder' => __( 'Sort Name' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('source', __( 'Source' ) . ':*') !!}
											</div>

                                            <div class="col-md-9">
                                                    {!! Form::text('source', null, ['class' => 'form-control', '', 'placeholder' => __( 'Source' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('type', __( 'Type' ) . ':') !!}
											</div>

                                            <div class="col-md-9">
                                            	{!! Form::text('type', null, ['class' => 'form-control', '', 'placeholder' => __( 'Type' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('availability', __( 'Availability' ) . ':*') !!}
											</div>

                                            <div class="col-md-9">
                                               
                                                {!! Form::select('availability', array('1' => 'Yes', '2' => 'No'), '1', ['class' => 'form-control']); !!}
                                                    
                                            </div><!--col-->
                                        </div><!--form-group-->
                                    </div>

                                    <div class="col-md-6"> 
                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('status', __( 'Status' ) . ':*') !!}
											</div>

                                            <div class="col-md-9">
                                                {!! Form::select('status', array('Active' => 'Active', 'Expired' => 'Expired', 'NoAppl' => 'NoAppl', 'NoGG' => 'NoGG', 'NoAdr' => 'NoAdr', 'Double' => 'Double'), '1', ['class' => 'form-control']); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('language', __( 'Language' ) . '') !!}
											</div>

                                            <div class="col-md-9">
                                                {!! Form::select('language_id', $language, '[]', ['class' => 'form-control']); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('admin', __( 'Admin' ) . '') !!}
											</div>

                                            <div class="col-md-9">
                                                    {!! Form::text('admin', null, ['class' => 'form-control', '', 'placeholder' => __( 'Admin' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('asset', __( 'Assets' ) . '') !!}
											</div>

                                            <div class="col-md-9">
                                                {!! Form::text('asset', null, ['class' => 'form-control', '', 'placeholder' => __( 'Assets' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('org-no', __( 'Org. No' ) . '') !!}
											</div>

                                            <div class="col-md-9">
                                                {!! Form::text('org_no', null, ['class' => 'form-control', '', 'placeholder' => __( 'Org No' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('remarks', __( 'Remarks' ) . '') !!}
											</div>

                                            <div class="col-md-9">
                                            	{!! Form::textarea('remarks', null, ['class' => 'form-control', '', 'placeholder' => __( 'remarks' ) ]); !!}

                                            </div><!--col-->
                                        </div><!--form-group-->
                                    </div> 
                                    <div class="col-md-12">
                                        <h4>Public Details</h4>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('email', __( 'Email' ) . '') !!}
											</div>

                                            <div class="col-md-9">
                                                {!! Form::email('email', null, ['class' => 'form-control', '', 'placeholder' => __( 'Email' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('mobile', __( 'Mobile' ) . '') !!}
											</div>

                                            <div class="col-md-9">

                                                {!! Form::text('mobile', null, ['class' => 'form-control', '', 'placeholder' => __( 'Mobile' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('address-1', __( 'Address 1' ) . '') !!}
											</div>

                                            <div class="col-md-9">
                                            	{!! Form::text('address_1', null, ['class' => 'form-control', '', 'placeholder' => __( 'Address-1' ) ]); !!}
                                                
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('address-2', __( 'Address Line 2' ) . ':') !!}
											</div>

                                            <div class="col-md-9">
                                                {!! Form::text('address_2', null, ['class' => 'form-control', '', 'placeholder' => __( 'Address-2' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('address-3', __( 'Address line 3' ) . ':') !!}
											</div>

                                            <div class="col-md-9">
                                            	{!! Form::text('address_3', null, ['class' => 'form-control', '', 'placeholder' => __( 'Address-3' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('phone', __( 'Phone' ) . '') !!}
											</div>

                                            <div class="col-md-9">
                                            	{!! Form::text('phone', null, ['class' => 'form-control', '', 'placeholder' => __( 'Phone' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->
                                        
                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('zip-code', __( 'Zip Code' ) . '') !!}
											</div>

                                            <div class="col-md-9">
                                            	{!! Form::text('zipcode', null, ['class' => 'form-control', '', 'placeholder' => __( 'Zip Code' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('website', __( 'Website' ) . '') !!}
											</div>

                                            <div class="col-md-9">
                                                {!! Form::text('website', null, ['class' => 'form-control', '', 'placeholder' => __( 'Website' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                    </div>

                                    <div class="col-md-12">
                                        <h4>Private Details</h4>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('c-email', __( 'Email' ) . '') !!}
											</div>

                                            <div class="col-md-9">
                                            	{!! Form::email('c_email', null, ['class' => 'form-control', '', 'placeholder' => __( 'Email' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('c-phone', __( 'Phone' ) . '') !!}
											</div>

                                            <div class="col-md-9">
                                            	{!! Form::text('c_phone', null, ['class' => 'form-control', '', 'placeholder' => __( 'Phone' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('c-address', __( 'Address' ) . '') !!}
											</div>

                                            <div class="col-md-9">
                                            	{!! Form::text('c_address', null, ['class' => 'form-control', '', 'placeholder' => __( 'Address' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('c-name', __( 'Name' ) . '') !!}
											</div>

                                            <div class="col-md-9">
                                            	{!! Form::text('c_name', null, ['class' => 'form-control', '', 'placeholder' => __( 'Name' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
												{!! Form::label('c-mobile', __( 'Mobile' ) . '') !!}
											</div>
                                            <div class="col-md-9">
                                                {!! Form::text('c_mobile', null, ['class' => 'form-control', '', 'placeholder' => __( 'Mobile' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->
                                    </div>
                                </div>
								
								 <!-- <div class="col-xl-12 col-md-12 col-sm-12">
									<div class="card">
									  <div class="card-header bg-info">Videos, Photos, Social Media</div>
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
									</div>-->
						
	                            </div>
                            	<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            		<div class="row">
                                    <div class="col-md-2">
                                        <div class="f_purpose">
                                            <h4>Purpose</h4>
                                            {!! Form::select('purpose_ids[]', $purpose, '', ['class' => 'form-control', 'multiple' => 'multiple']); !!}
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="f_gender">
                                            <h4>Genders</h4>
                                            {!! Form::select('gender_ids[]', $gender, '', ['class' => 'form-control', 'multiple' => true]); !!}
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="card">
											<div class="card-header bg-info">Age</div>
												<div class="f_age"><br>    
													<div class="form-group row">
														<div class="col-lg-2">
															{!! Form::label('age-from', __( 'From' ) . '') !!}
														</div>

														<div class="col-md-3">
															{!! Form::text('age_from[]', null, ['class' => 'form-control', 'maxlength'=>'2', 'placeholder' => __( 'Age From' ) ]); !!}
														</div><!--col-->
												   
														<div class="col-lg-2">
															{!! Form::label('age-to', __( 'To' ) . '') !!}
														</div>

														<div class="col-md-3">
															{!! Form::text('age_to[]', null, ['class' => 'form-control','maxlength'=>'2', 'placeholder' => __( 'Age To' ) ]); !!}
														</div><!--col-->
														<div class="col-sm-2">
															<a class="btn btn-primary add_buttonage" value="add">Add</a>
														</div>
													</div><!--form-group-->
													<div class="field_wrapperage "></div>	
												</div>
											</div>
										</div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="f_gender">
                                            <h4>Subject</h4>
                                            {!! Form::select('subject_ids[]', $subject, '', ['class' => 'form-control', 'multiple' => 'multiple']); !!}
                                        </div>
                                    </div>
										<br>
									<div class="row">
										 <div class="col-md-12">
											<div class="card">
											  <div class="card-header bg-info">Location</div>
											  <div class="card-body">
											 
											  <div class="">
													<div class="">
														<div class="f_gender">
															<h4>Location</h4>
                                                            <?php /* ?>
															<div class="row">
																<div class="col-md-2">
																	{!! Form::label('country-block', __( 'Country Block' ) . '') !!}
																	{!! Form::select('country_block[]', $blocks_arr, '', ['class' => 'form-control', 'id' => 'countryBlock']); !!}
																</div><!--col-->
																<div class="col-md-2">
																	{!! Form::label('country', __( 'Country' ) . '') !!}
																	{!! Form::select('country[]', $country_arr, '187', ['class' => 'form-control', 'id' => 'countryid','onchange' => 'getRegion();']); !!}
																</div><!--col-->
																<div class="col-md-2">
																	{!! Form::label('region', __( 'Region' ) . '') !!}
																	{!! Form::select('region[]', $region_arr, '', ['class' => 'form-control regiondata','id' => 'regionid','onchange' => 'getCity();']); !!}
																</div><!--col-->
																<div class="col-md-2">
																	{!! Form::label('city', __( 'City' ) . '') !!}
																	{!! Form::select('city[]', $city_arr, '', ['class' => 'form-control citydata', 'id' => 'cityid']); !!}
																</div><!--col-->
																<div class="col-md-2">
																	{!! Form::label('parish[]', __( 'Parish' ) . '') !!}
																	
																	{!! Form::text('parish', null, ['class' => 'form-control ', '', 'placeholder' => __( 'Parish' ) ]); !!}
																</div><!--col-->
																<div class="col-md-2" style="margin-top: 2%;">
																	<a class="btn btn-primary add_buttonlocation form-control" value="add">Add</a>
																</div><!--col-->
															</div><!--row-->
                                                            <?php */ ?>
                                                            <div class="row col-md-12">                             
                                                        <div class="col-md-2">

                                                            @php $blocks_arr[0] = "select"; ksort($blocks_arr); @endphp
                                                            {!! Form::label('country-block', __( 'Country Block' ) . '') !!}
                                                            {!! Form::select('',$blocks_arr,[], ['class' => 'form-control', 'id' => 'A_countryBlock']); !!}
                                                        </div><!--col-->
                                                        <div class="col-md-2">
                                                            {!! Form::label('country', __( 'Country' ) . '') !!}
                                                            {!! Form::select('',[0 => 'select'],[], ['class' => 'form-control', 'id' => 'A_countries']); !!}
                                                        </div><!--col-->
                                                        <div class="col-md-2">
                                                            {!! Form::label('region', __( 'Region' ) . '') !!}
                                                            {!! Form::select('',[],[], ['class' => 'form-control','id' => 'A_regionid']); !!}
                                                        </div><!--col-->
                                                        <div class="col-md-2">
                                                            {!! Form::label('city', __( 'City' ) . '') !!}
                                                            {!! Form::select('', [],[], ['class' => 'form-control citydata', 'id' => 'A_cities']); !!}
                                                        </div><!--col-->
                                                        <div class="col-md-2">
                                                            {!! Form::label('parish', __( 'Parish' ) . '') !!}
                                                            
                                                            {!! Form::text('', '', ['class' => 'form-control ', 'id' => "A_parish", 'placeholder' => __( 'Parish' ) ]); !!}
                                                        </div><!--col-->
                                                        <div class="col-md-2" style="margin-top: 2%;">
                                                            <a class="btn btn-primary form-control" value="add" onclick="Added();">Add</a>
                                                        </div><!--col-->
                                                    </div> 
                                                    <div class="col-md-12" id="loc_add">                                                        
                                                    </div>
                                                    <div class="current_add"></div>
														</div>
														</div>
												
												</div><br>
												<div class="field_wrapperlocation"></div>	
												</div>
											  </div>						 
											</div>
										</div>

                                    <!-- application dates -->
                                    <div class="col-md-12">
										<div class="card">
											  <div class="card-header bg-info">Application Dates</div>
												<div class="card-body">
													<div class="app_dates">                                         
														<div class="row">
															<div class="col-md-6">
																<div class="row">
																	<div class="col-md-4">
																		{!! Form::label('app_start_day', __( 'Application Start' ) . '') !!}
																	</div>
																	<div class="col-md-3">
																		{!! Form::select('apply_start_month',$months, '', ['class' => 'form-control']); !!}
																	</div>
																	<div class="col-md-3">
																		{!! Form::text('apply_start_day', null, ['class' => 'form-control', '' ]); !!}
																	</div>

																</div> 
																
															</div>
															<div class="col-md-6">
																<div class="row">
																	<div class="col-md-4">
																		{!! Form::label('app_end_day', __( 'Application End' ) . '') !!}
																	</div>
																	<div class="col-md-3">
																		{!! Form::select('apply_end_month',$months, '', ['class' => 'form-control']); !!}
																	</div>
																	<div class="col-md-3">
																		{!! Form::text('apply_end_day', null, ['class' => 'form-control', '' ]); !!}
																	</div>

																</div> 
															</div>
														</div>
														
														
													</div>
												</div>
											</div>
										</div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="purpose-details">
                                            <h4>Purpose</h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::textarea('purpose_detail', null, ['class' => 'form-control core_quill', 'rows'=>'25' ]); !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="purpose-details">
                                            <h4>Who Can Apply</h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::textarea('who_can_apply', null, ['class' => 'form-control', 'rows'=>'25' ]); !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="purpose-details">
                                            <h4>Application Details</h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::textarea('application_details', null, ['class' => 'form-control', '' ]); !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="purpose-details">
                                            <h4>Misc</h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::textarea('misc', null, ['class' => 'form-control', 'rows'=>'25' ]); !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								  </div>
                            	</div>
                            </div>
                        </div>
					</div>


					<div class="card-footer clearfix">
		                <div class="row">
		                    <div class="col">
		                        <a class="btn btn-danger btn-sm" href="{!! url('/admin/foundation'); !!}">Cancel</a>
		                    </div>
		                    <div class="col text-right">
		                        <button type="submit" class="btn btn-primary">Save</button>
		                    </div>
		                </div>
		            </div>

				{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection