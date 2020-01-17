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
                        Order Management <small class="text-muted">Order List</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Create">
                      <a href="{!! url('/admin/order/create'); !!}" class="btn btn-success ml-1" data-toggle="tooltip" title="Create"><i class="fas fa-plus-circle"></i></a>
                    </div>
                </div><!--col-->
          </div><!--row-->
          <hr>
			<div class="form-group row">
				
				<div class="col-sm-4">								 						 
				  {!! Form::select('orderstatus', (['0' => 'Select a order status']+$subscriptionstatus),[], ['class' => 'form-control','onChange'=>'getorderbystatus();','id'=>'orderstatus' ]  ); !!}
				</div>
			</div>
		  <hr>
          <table class="table table-bordered order-table">
            <thead>
                <tr>
					<th><input type="checkbox" id="selectAll"></th>
                    <th>No</th>
                    <th>CID</th>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Customer Name</th>
                    <th>Product</th>
                    <th>Paid Date</th>
					<th>Amt Paid</th>
					<th>Status</th>
					<th>Comment</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
		  <div class="row container">
			  <div id="pending" style="display:none;">
				<button class="btn btn-success" onClick="getorderStatus(11,'psts');">Active</button>
				<button class="btn btn-warning" onClick="getorderStatus(14,'psts');">Inactive</button>
				<button class="btn btn-light" onClick="getorderStatus(16,'psts');">Reminded</button>
				<button class="btn btn-danger" onClick="getorderStatus(3,'sts');">Delete</button>
			  </div>
			  
			  <div id="paid_not_delivered" style="display:none;">
				 <button class="btn btn-success" onClick="getorderStatus(1,'sts');">Active</button>
				  <button class="btn btn-warning" onClick="getorderStatus(14,'psts');">Inactive</button>
				  <button class="btn btn-danger" onClick="getorderStatus(14,'psts');">Cancel</button>
			  </div>
			  
			  <div id="paid_and_delivered" style="display:none;">
					<button class="btn btn-success" onClick="getorderStatus(11,'psts');">Active</button>
					<button class="btn btn-warning" onClick="getorderStatus(14,'psts');">Inactive</button>
			  </div>
			  
			  <div id="Delivered" style="display:none;">
					<button class="btn btn-success" onClick="getorderStatus(11,'psts');">Active</button>
					<button class="btn btn-warning" onClick="getorderStatus(14,'psts');">Inactive</button>
					<button class="btn btn-danger" onClick="getorderStatus(14,'psts');">cancel</button>
					<button class="btn btn-light" onClick="getorderStatus(13,'psts');">Reminded</button>
					<button class="btn btn-primary" onClick="getorderStatus(12,'psts');">Paid & Delivered</button>
			  </div>
			  
			  <div id="canclled" style="display:none;">
					<button class="btn btn-success" onClick="getorderStatus(11,'psts');">Active</button>
					<button class="btn btn-warning" onClick="getorderStatus(14,'psts');">Inactive</button>
					<button class="btn btn-danger" onClick="getorderStatus(3,'sts');">Delete</button>
			  </div>

		  </div>
        </div>
      </div>
    </div>

  </div>
@endsection