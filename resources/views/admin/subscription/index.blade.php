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
        <i class="icon-graph"></i>  Dashboard</a>
        <a class="btn" href="#">
        <i class="icon-settings"></i>  Settings</a>
      </div>
    </li>
  </ol>
@endsection
@section('content')  

 <div class="row">
    
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Subscription Management <small class="text-muted">Subscription List</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Create">
                      <a href="{!! url('/admin/subscription/create'); !!}" class="btn btn-success ml-1" data-toggle="tooltip" title="Create"><i class="fas fa-plus-circle"></i></a>
                    </div>
                </div><!--col-->
          </div><!--row-->
          <hr>
		  <div class="form-group row">
				<div class="col-sm-4">								 						 
				  {!! Form::select('orderstatus', (['0' => 'Select a subscription status']+$subscriptionstatus),[], ['class' => 'form-control','onChange'=>'getsubsbystatus();','id'=>'orderstatus' ]  ); !!}
				</div>
			</div>
          <table class="table table-bordered subscription-table">
            <thead>
                <tr>
					<th><input type="checkbox" id="selectAll"></th>
                    <th>No</th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>No of days</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
		 <div class="row container">
			  <button class="btn btn-danger" onClick="deletesubsStatus(3,'sts');">Delete</button>
			  <div id="pendig_ind" style="display:none;">
			  <button class="btn btn-success" onClick="getsubsStatus(16,'psts');">Paid</button>
			  <button class="btn btn-dark" onClick="getsubsStatus(17,'psts');">Expired/Deactive</button>
			  </div>
			  
			  <div id="paid_ind" style="display:none;">
			  <button class="btn btn-warning" onClick="getsubsStatus(15,'psts');">Pending Payment</button>
			  <button class="btn btn-dark" onClick="getsubsStatus(17,'psts');">Expired/Deactive</button>
			  </div>
			  
			  <div id="expire_ind" style="display:none;">
			  <button class="btn btn-info" onClick="getsubsStatus(1,'sts');">Active</button>
			  <button class="btn btn-warning" onClick="getsubsStatus(0,'sts');">Inactive</button>
			  </div>
			  
			  <div id="pendig_lib" style="display:none;">
			   <button class="btn btn-success" onClick="getsubsStatus(123,'psts');">Paid</button>
			  <button class="btn btn-dark" onClick="getsubsStatus(124,'psts');">Expired/Deactive</button>
			  </div>
			  
			  <div id="paid_lib" style="display:none;">
			 <button class="btn btn-warning" onClick="getsubsStatus(128,'psts');">Pending Payment</button>
			  <button class="btn btn-dark" onClick="getsubsStatus(124,'psts');">Expired/Deactive</button>
			  </div>
			  
			  <div id="expire_lib" style="display:none;">
			  <button class="btn btn-info" onClick="getsubsStatus(1,'sts');">Active</button>
			  <button class="btn btn-warning" onClick="getsubsStatus(0,'sts');">Inactive</button>
			  </div>
		  </div>
        </div>
      </div>
    </div>

  </div>
@endsection