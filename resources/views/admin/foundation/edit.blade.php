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
<style>
    form h4 {
        margin: 15px 0;
    }
    .purpose-details .cke_contents {
    height: 500px !important;
}
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                        Edit Foundation <small class="text-muted">Foundation</small>
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
				
                {!! Form::open(array('id' => 'foundation_update','route' => array('admin.foundation.update', $foundation->id))) !!}
                    
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
                                                {!! Form::label('id', __( 'ID' ) . ':*') !!}
                                            </div>

                                            <div class="col-md-9">
                                               {!! Form::text('id', $foundation->id, ['class' => 'form-control', '', 'placeholder' => __( 'id' ),'readonly' => true ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->  
                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                {!! Form::label('name', __( 'Name' ) . ':*') !!}
                                            </div>

                                            <div class="col-md-9">
                                               {!! Form::text('name', !empty($foundation->name) ? $foundation->name : '', ['class' => 'form-control', '', 'placeholder' => __( 'Name' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                {!! Form::label('sort-name', __( 'Sort Name' ) . ':*') !!}
                                            </div>

                                            <div class="col-md-9">
                                                    {!! Form::text('sort_name', !empty($foundation->sort) ? $foundation->sort : '', ['class' => 'form-control', '', 'placeholder' => __( 'Sort Name' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                {!! Form::label('source', __( 'Source' ) . ':*') !!}
                                            </div>

                                            <div class="col-md-9">
                                                    {!! Form::text('source', !empty($foundation->source) ? $foundation->source : '', ['class' => 'form-control', '', 'placeholder' => __( 'Source' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                {!! Form::label('type', __( 'Type' ) . ':') !!}
                                            </div>

                                            <div class="col-md-9">
                                                {!! Form::text('type', !empty($foundation->type) ? $foundation->type : '', ['class' => 'form-control', '', 'placeholder' => __( 'Type' ) ]); !!}
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
												{!! Form::select('status', array('Active' => 'Active', 'Expired' => 'Expired', 'NoAppl' => 'NoAppl', 'NoGG' => 'NoGG', 'NoAdr' => 'NoAdr', 'Double' => 'Double'), !empty($foundation->status) ? $foundation->status : '', ['class' => 'form-control']); !!}
											   
                                            </div><!--col-->
                                        </div><!--form-group-->


                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                {!! Form::label('language', __( 'Language' ) . '') !!}
                                            </div>

                                            <div class="col-md-9">
                                                {!! Form::select('language_id', $language, !empty($foundation->language) ? $foundation->language : '', ['class' => 'form-control']); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                {!! Form::label('admin', __( 'Admin' ) . '') !!}
                                            </div>

                                            <div class="col-md-9">
                                                    {!! Form::text('admin', !empty($foundation->administrator) ? $foundation->administrator : '', ['class' => 'form-control', '', 'placeholder' => __( 'Admin' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->



                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                {!! Form::label('asset', __( 'Assets' ) . '') !!}
                                            </div>

                                            <div class="col-md-9">
                                                {!! Form::text('asset', !empty($foundation->asset) ? $foundation->asset : '', ['class' => 'form-control', '', 'placeholder' => __( 'Assets' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                {!! Form::label('org-no', __( 'Org. No' ) . '') !!}
                                            </div>

                                            <div class="col-md-9">
                                                {!! Form::text('org_no', !empty($foundation->org_no) ? $foundation->org_no : '', ['class' => 'form-control', '', 'placeholder' => __( 'Org No' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                {!! Form::label('remarks', __( 'Remarks' ) . '') !!}
                                            </div>

                                            <div class="col-md-9">
                                                {!! Form::textarea('remarks', !empty($foundation->remarks) ? $foundation->remarks : '', ['class' => 'form-control', '', 'placeholder' => __( 'remarks' ) ]); !!}
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
                                            <!-- !empty($location_printer_type) ? $location_printer_type : 'browser' -->
                                            <div class="col-md-9">
                                                {!! Form::email('email', !empty($contact->email) ? $contact->email : '', ['class' => 'form-control', '', 'placeholder' => __( 'Email' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                {!! Form::label('mobile', __( 'Mobile' ) . '') !!}
                                            </div>

                                            <div class="col-md-9">

                                                {!! Form::text('mobile', !empty($contact->mobile_no) ? $contact->mobile_no : '', ['class' => 'form-control', '', 'placeholder' => __( 'Mobile' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                {!! Form::label('address-1', __( 'Address 1' ) . '') !!}
                                            </div>

                                            <div class="col-md-9">
                                                {!! Form::text('address_1', !empty($contact->address1) ? $contact->address1 : '', ['class' => 'form-control', '', 'placeholder' => __( 'Address-1' ) ]); !!}
                                                
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                {!! Form::label('address-2', __( 'Address Line 2' ) . ':') !!}
                                            </div>

                                            <div class="col-md-9">
                                                {!! Form::text('address_2', !empty($contact->address2) ? $contact->address2 : '', ['class' => 'form-control', '', 'placeholder' => __( 'Address-2' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                {!! Form::label('address-3', __( 'Address line 3' ) . ':') !!}
                                            </div>

                                            <div class="col-md-9">
                                                {!! Form::text('address_3', !empty($contact->address3) ? $contact->address3 : '', ['class' => 'form-control', '', 'placeholder' => __( 'Address-3' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                {!! Form::label('phone', __( 'Phone' ) . '') !!}
                                            </div>

                                            <div class="col-md-9">
                                                {!! Form::text('phone', !empty($contact->phone_no) ? $contact->phone_no : '', ['class' => 'form-control', '', 'placeholder' => __( 'Phone' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->
                                        
                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                {!! Form::label('zip-code', __( 'Zip Code' ) . '') !!}
                                            </div>

                                            <div class="col-md-9">
                                                {!! Form::text('zipcode', !empty($contact->zip) ? $contact->zip : '', ['class' => 'form-control', '', 'placeholder' => __( 'Zip Code' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                {!! Form::label('website', __( 'Website' ) . '') !!}
                                            </div>

                                            <div class="col-md-9">
                                                {!! Form::text('website', !empty($contact->website) ? $contact->website : '', ['class' => 'form-control', '', 'placeholder' => __( 'Website' ) ]); !!}
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
                                                {!! Form::email('c_email', !empty($contact->c_email) ? $contact->c_email : '', ['class' => 'form-control', '', 'placeholder' => __( 'Email' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                {!! Form::label('c-phone', __( 'Phone' ) . '') !!}
                                            </div>

                                            <div class="col-md-9">
                                                {!! Form::text('c_phone', !empty($contact->c_phone_no) ? $contact->c_phone_no : '', ['class' => 'form-control', '', 'placeholder' => __( 'Phone' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                {!! Form::label('c-address', __( 'Address' ) . '') !!}
                                            </div>

                                            <div class="col-md-9">
                                                {!! Form::text('c_address', !empty($contact->c_address) ? $contact->c_address : '', ['class' => 'form-control', '', 'placeholder' => __( 'Address' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                {!! Form::label('c-name', __( 'Name' ) . '') !!}
                                            </div>

                                            <div class="col-md-9">
                                                {!! Form::text('c_name', !empty($contact->c_name) ? $contact->c_name : '', ['class' => 'form-control', '', 'placeholder' => __( 'Name' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                {!! Form::label('c-mobile', __( 'Mobile' ) . '') !!}
                                            </div>
                                            <div class="col-md-9">
                                                {!! Form::text('c_mobile', !empty($contact->c_mobile_no) ? $contact->c_mobile_no : '', ['class' => 'form-control', '', 'placeholder' => __( 'Mobile' ) ]); !!}
                                            </div><!--col-->
                                        </div><!--form-group-->
                                    </div>

                                </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <div class="row">
                                    <div class="col-md-2">
                                        <div class="f_purpose">
                                            <h4>Purpose</h4>
                                            {!! Form::select('purpose_ids[]', $purpose, $selectedPurpose, ['class' => 'form-control', 'multiple' => 'multiple']); !!}
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="f_gender">
                                            <h4>Genders</h4>
                                            {!! Form::select('gender_ids[]', $gender, $selectedGender, ['class' => 'form-control', 'multiple' => 'multiple']); !!}
                                        </div>
                                    </div>
                                     <div class="col-md-5">
                                        <div class="card">
											<div class="card-header bg-info">Age 
												<div class="float-right">
													<a class="btn btn-primary add_buttonage" value="add">Add</a>
												</div>
											</div>
												<div class="f_age"><br>
												@if(!empty($age))
													@foreach($age as $myage)
													<div class="form-group row">
														<div class="col-lg-2">
															{!! Form::label('age-from', __( 'From' ) . '') !!}
														</div>

														<div class="col-md-3">
															{!! Form::text('age_from[]', $myage->from, ['class' => 'form-control', 'maxlength'=>'2', 'placeholder' => __( 'Age From' ) ]); !!}
														</div><!--col-->
												   
														<div class="col-lg-2">
															{!! Form::label('age-to', __( 'To' ) . '') !!}
														</div>

														<div class="col-md-3">
															{!! Form::text('age_to[]', $myage->to, ['class' => 'form-control','maxlength'=>'2', 'placeholder' => __( 'Age To' ) ]); !!}
														</div><!--col-->
														<div class="col-sm-2">
															<input type="hidden" name="age_id[]" value="{{$myage->id}}">
														</div>
													</div>
													@endforeach
													@else
													{!! Form::label('Age', __( 'Age' ) . ':', [ 'class' => 'col-sm-4 col-form-label']) !!}
													<div class="col-sm-8">
													  
													  {!! Form::text('age', null, ['class' => 'form-control', 'id' => 'age', 'readonly', 'placeholder' => __( '' ) ]); !!}
													</div>
													@endif
													
													<div class="field_wrapperage "></div>	
												</div>
											</div>
										</div>

                                    <div class="col-md-12">
                                        <div class="f_gender">
                                            <h4>Subject</h4>
                                            {!! Form::select('subject_ids[]', $subject, $selectedSubject, ['class' => 'form-control', 'multiple' => 'multiple']); !!}
                                        </div><br>
                                    </div>
									<br><br>
                                    <div class="col-md-12">
                                        <div class="card">
											  <div class="card-header bg-info">Location
											  <div class="float-right">
												
											  </div>
											  </div>
											    <div class="card-body">
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
													<div class="">
													@if(!empty($location))
                                                    @php $i = 1 @endphp
													@foreach($location as $Location)
                                                        @php $time = md5(microtime()) @endphp
														<div class="f_gender current_add" id="{{$time}}">
                                                            <?php /* ?>

															<div class="row">
																<div class="col-md-2">
																	{!! Form::label('country-block', __( 'Country Block' ) . '') !!}
																	{!! Form::text('country_block[]', $blocks_arr, '$Location->nation_id', ['class' => 'form-control', 'id' => 'countryBlocks']); !!}
																</div><!--col-->
																<div class="col-md-2">
																	{!! Form::label('country', __( 'Country' ) . '') !!}
																	{!! Form::select('country[]', $country_arr, '$Location->country_id', ['class' => 'form-control', 'id' => 'countriess','onchange' => 'getRegion();']); !!}
																</div><!--col-->
																<div class="col-md-2">
																	{!! Form::label('region', __( 'Region' ) . '') !!}
																	{!! Form::select('region[]', $region_arr, '$Location->region_ids', ['class' => 'form-control regiondata','id' => 'regionid','onchange' => 'getCity();']); !!}
																</div><!--col-->
																<div class="col-md-2">
																	{!! Form::label('city', __( 'City' ) . '') !!}
																	{!! Form::select('city[]', $city_arr, '$Location->city_ids', ['class' => 'form-control citydata', 'id' => 'cityid']); !!}
																</div><!--col-->
																<div class="col-md-2">
																	{!! Form::label('parish[]', __( 'Parish' ) . '') !!}
																	
																	{!! Form::text('parish', $Location->parish, ['class' => 'form-control ', '', 'placeholder' => __( 'Parish' ) ]); !!}
																</div><!--col-->
																<div class="col-md-2" style="margin-top: 2%;">
																	<input type="hidden" name="location_id" value="{{$Location->id}}">
																</div><!--col-->
															</div><!--row--><?php */ ?>
                                                            <div class="row col-md-12">
                                                                <div class="col-md-2">
                                                                    <label for="country-block">country block</label> 
                                                                    <input class="form-control" type="text" value="{{getlocation($Location->nation_id,'countryBlock')}}" readonly="true" />
                                                                    <input class="form-control" name="locationArray[{{$i}}][country_block]" type="hidden" value="{{$Location->nation_id}}" readonly="true" />
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label for="country">country</label> 
                                                                    <input class="form-control" type="text" value="{{getlocation($Location->country_id,'country')}}" readonly="true" />
                                                                    <input class="form-control" name="locationArray[{{$i}}][country]" type="hidden" value="{{$Location->country_id}}" readonly="true" />
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label for="region">region</label> 
                                                                    <input class="form-control" type="text" value="{{getlocation($Location->region_id,'region')}}" readonly="true" />
                                                                    <input class="form-control" name="locationArray[{{$i}}][region]" type="hidden" value="{{$Location->region_ids}}" readonly="true" />
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label for="city">city</label> 
                                                                    <input class="form-control" type="text" value="{{getlocation($Location->city_id,'city')}}" readonly="true" /> <input class="form-control" name="locationArray[{{$i}}][city]" type="hidden" value="{{$Location->city_ids}}" readonly="true" />
                                                                </div>
                                                                <div class="col-md-2"><label for="parish">parish</label> 
                                                                    <input name="locationArray[{{$i}}][parish]" class="form-control" type="text" value="{{$Location->parish}}" readonly="true" /></div>
                                                                <div class="col-md-2" style="margin-top: 2%;"><a class="btn btn-primary add_buttonlocation form-control" value="remove" onclick="rowDelete('{{$time}}');">X</a></div>
                                                            </div>

														</div>
                                                        @php $i++; @endphp
														@endforeach
														@endif
														</div>
												
												</div><br>
												<div class="field_wrapperlocation"></div>	
												</div>
											  </div>
                                    </div>

                                    <!-- application dates -->
                                    <div class="col-md-12">
                                        <div class="app_dates">
                                            <h4>Application Dates</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            {!! Form::label('app_start_day', __( 'Application Start' ) . '') !!}
                                                        </div>
                                                        <div class="col-md-3">
                                                            {!! Form::select('apply_start_month',$months, !empty($dates->start_month) ? $dates->start_month : '', ['class' => 'form-control']); !!}
                                                        </div>
                                                        <div class="col-md-3">
                                                            {!! Form::text('apply_start_day', !empty($dates->start_day) ? $dates->start_day : '', ['class' => 'form-control', '' ]); !!}
                                                        </div>

                                                    </div> 
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            {!! Form::label('app_end_day', __( 'Application End' ) . '') !!}
                                                        </div>
                                                        <div class="col-md-3">
                                                            {!! Form::select('apply_end_month',$months, !empty($dates->end_month) ? $dates->end_month : '', ['class' => 'form-control']); !!}
                                                        </div>
                                                        <div class="col-md-3">
                                                            {!! Form::text('apply_end_day', !empty($dates->end_day) ? $dates->end_day : '', ['class' => 'form-control', '' ]); !!}
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
                                                    {!! Form::textarea('purpose_detail', !empty($advertise->purpose) ? $advertise->purpose : '', ['class' => 'form-control', 'rows' => '25' ]); !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="purpose-details">
                                            <h4>Who Can Apply</h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::textarea('who_can_apply', !empty($advertise->who_can_apply) ? $advertise->who_can_apply : '', ['class' => 'form-control', 'rows'=>'25' ]); !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="purpose-details">
                                            <h4>Application Details</h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::textarea('application_details', !empty($advertise->details) ? $advertise->details : '', ['class' => 'form-control', '' ]); !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="purpose-details">
                                            <h4>Misc</h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Form::textarea('misc', !empty($advertise->misc) ? $advertise->misc : '', ['class' => 'form-control', 'rows'=>'25' ]); !!}
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
                                <a class="btn btn-primary" onclick="save_me();">Save</a>
                            </div>
                        </div>
                    </div>
                    @csrf
                {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

@section("load_ex_js")
<script type="text/javascript">
    function save_me() {
        show_loader(1);
        var form = $('form#foundation_update');
        form_data = form.serialize();
        console.log(form);
        $.ajax({
            url:form.attr('action'),
            method:"POST",
            dataType:"json",
            data:form_data,
            success:function(r) {
                show_loader(0);
                noty_s(r.msg,r.status);

            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                show_loader(0);
                $.each(errors.errors, function (key, value) {
                    //$('#' + key).parent().addClass('error');                    
                    $.notify(value, "error");
                });
            }
        })
    }
</script>
@endsection;