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

<div class="">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-5">
            <h4 class="card-title mb-0">
                Export Foundation <small class="text-muted">Export Foundation</small>
            </h4>
          </div>
          <!--col-->
          <div class="col-sm-7">
            
          </div>
          <!--col-->
        </div>
        <!--row-->
        <hr>
		<div class="row container">
			  <div class="col-sm-4">
				   <label for="only_my_list"><strong>Export selected funds in 'My List'</strong></label>
			  </div>
			<div class="col-sm-8">
				<input type="checkbox" id="only_my_list" name="only_my_list" value="1">
				<span style="margin-left: 20px;"><strong>Checked</strong>: Only foundations found in 'My List' will be exported when clicking the buttons below<br></span>
				<span style="margin-left: 35px;"><strong>Unchecked</strong>: All foundations found in 'Search' regardless if its checked or not or whatever page they belong</span>
			</div>
		</div><br>
		<div class="row container">
			<div class="col-sm-4">
				   <label for="only_my_list"><strong>Date Selected</strong></label>
			  </div>
			<div class="col-sm-4">
				<input type="text" class="form-control mycustomdate" id="date_from" name="date_from" value="" style="cursor: pointer;">
			</div>
			<div class="col-sm-4">
				<input type="text" class="form-control mycustomdate" id="date_to" name="date_to" value="" style="cursor: pointer;">
			</div>
        </div>
       <br>
	   <div class="row container">
			<div class="col-sm-4">
				   <label for="only_my_list"><strong>Minimum Statistics Data</strong></label>
			  </div>
			<div class="col-sm-1">
				<input type="text" class="form-control" id="min_stat_data" name="min_stat_data" value="" >
			</div>
			<div class="col-sm-7">
				
			</div>
        </div>
		<br>
		<div class="row container">
			<div class="col-sm-4">
				   <label for="only_my_list"><strong>Export in this Language</strong></label>
			  </div>
			<div class="col-sm-4">
				<select name="language_id" id="language_id" class="form-control">
				   <option value="2">Svenska</option>
				   <option value="1" selected="selected">English</option>
				</select>
			</div>
			<div class="col-sm-4">
				<a href="#" onclick="action_print();" class="btn btn-info">Export Funds</a>
				<a href="#" onclick="action_print_sort();" class="btn btn-info">Export Sort</a>
				<a href="#" onclick="action_print_ids();" class="btn btn-info">Export ID's</a>
			</div>
        </div>
		<br>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
				  <div class="card-header bg-secondary"> 
						<ul class="nav nav-tabs" id="myTab" role="tablist">
						  <li class="nav-item">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" >Search</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">MyList</a>
						  </li>
						</ul>
				  </div>
				  
				  <div class="card-body">
						<div class="tab-content" id="myTabContent">
						  <div class="tab-pane fade show active row col-sm-12" id="home" role="tabpanel" aria-labelledby="home-tab">
							  <div class="row">
									<div class="col-sm-3">
										<div class="col-sm-12">
											<label for="only_my_list"><strong>Show Active Only</strong></label> <input type="checkbox" id="only_active" name="only_active" value="1" checked>
										</div><br>
										
										<div class="col-sm-12">
											<input type="text" class="form-control" id="search_field" name="search_field">
										</div><br>
										
										<div class="col-sm-12">
											<a  class="btn btn-success form-control" id="search_field" name="search_field" onClick="get_exportlist();">search</a>
										</div><br>
										<div class="accordion" id="accordionExample">
											  <div class="card">
												<div class="card-header" id="headingOne">
												  <h2 class="mb-0">
													<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
													 Purpose
													</button>
												  </h2>
												</div>

												<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
												  <div class="card-body scroll">
													{!! Form::select('purpose_ids[]', $purpose, '', ['class' => 'form-control', 'multiple' => 'multiple','id'=>'purpose_ids']); !!}
												  </div>
												</div>
											  </div>
										</div>
										
										<div class="accordion" id="accordiontwo">
											  <div class="card">
												<div class="card-header" id="headingOne">
												  <h2 class="mb-0">
													<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
													 Gender
													</button>
												  </h2>
												</div>

												<div id="collapsetwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordiontwo">
												  <div class="card-body scroll">
													{!! Form::select('gender[]', $gender, '', ['class' => 'form-control', 'multiple' => 'multiple','id'=>'gender_ids']); !!}
												  </div>
												</div>
											  </div>
										</div>
										
										<div class="accordion" id="accordiontthree">
											  <div class="card">
												<div class="card-header" id="headingOne">
												  <h2 class="mb-0">
													<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
													 Country
													</button>
												  </h2>
												</div>

												<div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordiontthree">
												  <div class="card-body scroll">
													{!! Form::select('countryid[]',$country_arr, '', ['class' => 'form-control','id'=>'countryid','onChange'=>'getRegion()']); !!}
												  </div>
												</div>
											  </div>
										</div>
										
										<div class="accordion" id="accordiontthree">
											  <div class="card">
												<div class="card-header" id="headingOne">
												  <h2 class="mb-0">
													<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
													 Region
													</button>
												  </h2>
												</div>

												<div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordiontthree">
												  <div class="card-body scroll">
													{!! Form::select('regionid[]',$region_arr, '', ['class' => 'form-control regiondata','id'=>'regionid','onChange'=>'getCity()']); !!}
												  </div>
												</div>
											  </div>
										</div>
										
										<div class="accordion" id="accordiontfour">
											  <div class="card">
												<div class="card-header" id="headingOne">
												  <h2 class="mb-0">
													<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsefive" aria-expanded="true" aria-controls="collapsefive">
													 City
													</button>
												  </h2>
												</div>

												<div id="collapsefive" class="collapse" aria-labelledby="headingOne" data-parent="#accordiontfour">
												  <div class="card-body scroll">
													{!! Form::select('cityid[]',$city_arr, '', ['class' => 'form-control citydata','id'=>'cityid']); !!}
												  </div>
												</div>
											  </div>
										</div>
										
										<div class="accordion" id="accordiontfour">
											  <div class="card">
												<div class="card-header" id="headingOne">
												  <h2 class="mb-0">
													<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
													 Subject
													</button>
												  </h2>
												</div>

												<div id="collapseSix" class="collapse" aria-labelledby="headingOne" data-parent="#accordiontfour">
												  <div class="card-body scroll">
													{!! Form::select('subject_ids[]', $subject, '', ['class' => 'form-control', 'multiple' => 'multiple','id'=>'subject_ids']); !!}
												  </div>
												</div>
											  </div>
										</div>
										
										<div class="accordion" id="accordiontfour">
											  <div class="card">
												<div class="card-header" id="headingOne">
												  <h2 class="mb-0">
													<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseseven" aria-expanded="true" aria-controls="collapseseven">
													 Age
													</button>
												  </h2>
												</div>

												<div id="collapseseven" class="collapse" aria-labelledby="headingOne" data-parent="#accordiontfour">
												  <div class="card-body ">
													<div class="row col-sm-12">
														
														<div class="col-sm-5">
															{!! Form::text('age_start', null, ['class' => 'form-control', 'id'=>'age_start','onkeypress'=>'return alphaOnly(event);','maxlength'=>'2' ]); !!}
														</div>
														<div class="col-sm-2">
															TO
														</div>
														<div class="col-sm-5">
															{!! Form::text('age_end', null, ['class' => 'form-control', 'id'=>'age_end','onkeypress'=>'return alphaOnly(event);','maxlength'=>'2'  ]); !!}
														</div>
													</div>
												  </div>
												</div>
											  </div>
										</div>
										
										<div class="accordion" id="accordiontfour">
											  <div class="card">
												<div class="card-header" id="headingOne">
												  <h2 class="mb-0">
													<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseeight" aria-expanded="true" aria-controls="collapseeight">
													Appllication Date
													</button>
												  </h2>
												</div>

												<div id="collapseeight" class="collapse" aria-labelledby="headingOne" data-parent="#accordiontfour">
												  <div class="card-body">
													<div class="row col-sm-12">
														<div class="col-sm-4">
															Start
														</div>
														<div class="col-sm-4">
															{!! Form::select('apply_start_month',$months, '', ['class' => 'form-control','id'=>'apply_start_month']); !!}
														</div>
														<div class="col-sm-4">
															{!! Form::text('apply_start_day', null, ['class' => 'form-control', 'id'=>'apply_start_day','onkeypress'=>'return alphaOnly(event);','maxlength'=>'2' ]); !!}
														</div>
													</div><br>
													<div class="row col-sm-12">
														<div class="col-sm-4">
															End
														</div>
														<div class="col-sm-4">
															{!! Form::select('apply_end_month',$months, '', ['class' => 'form-control','id'=>'apply_end_month']); !!}
														</div>
														<div class="col-sm-4">
															{!! Form::text('apply_end_day', null, ['class' => 'form-control', 'id'=>'apply_end_day','onkeypress'=>'return alphaOnly(event);','maxlength'=>'2' ]); !!}
														</div>
													</div>
													
												  </div>
												</div>
											  </div>
										</div>
										
									</div>
									
									<div class="col-sm-9">
										<table class="table table-bordered exportdata-table">
											  <thead>
												<tr>
												  <!-- <th><input type="checkbox">select</th> -->
												  <th width="5%">ID</th>
												  <th width="45%">Foundation Name</th>
												  <th width="50%">Purpose</th>
												</tr>
											  </thead>
											  <tbody></tbody>
										</table> 
									</div>
							  </div>
						  </div>
						  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							<table class="table table-bordered testdata">
								  <thead>
									<tr>
									  <th>No</th>
									  <th>Foundation Name</th>
									  <th>Purpose</th>
									
									</tr>
								  </thead>
								  <tbody></tbody>
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

@endsection