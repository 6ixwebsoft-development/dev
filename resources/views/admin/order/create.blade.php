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
  <style>
  .dataTables_filter{
	  display:none;
  }
  </style>
@endsection
@section('content')  

  <div class="row">

    

    <div class="col-lg-12">

      <div class="card">

        <div class="card-body">

          <div class="row">

              <div class="col-sm-5">

                  <h4 class="card-title mb-0">
                      Order Management <small class="text-muted">Order Add</small>
                  </h4>

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
			
			 {!! Form::open(array('url' => 'admin/order/store')) !!}
			 <div class="row">
				@php 
					$uid='';
					$uname='';
					$uemail='';
					$readonly = ''
				@endphp
					@if(!empty($userdata))
						@php 
							$uid = $userdata->id;
							$uname = $userdata->name;
							$uemail = $userdata->email;
							$readonly = 'readonly';
						@endphp 	
					@endif
				
				<div class="col-sm-4">
					<div class="form-group row">
						<div class="col-lg-12">
						  {!! Form::text('search', null, ['class' => 'form-control','id'=>'customer_search','aria-controls'=>'user-table', 'placeholder' => __( 'Search Customer User' ) ]); !!}
						</div>
					</div>	
					<hr>
					<div class="form-group row">
						<div class="col-lg-4">
						  {!! Form::label('Customer ID', __( 'Customer ID' ) . ':*') !!}
						</div>
						<div class="col-lg-8">
						  {!! Form::text('cid', $uid, ['class' => 'form-control',$readonly,'id'=>'cid', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>	
				
					<div class="form-group row">
						<div class="col-lg-4">
						  {!! Form::label('name', __( 'Name' ) . ':') !!}
						</div>
						<div class="col-lg-8">
						  {!! Form::text('name', $uname, ['class' => 'form-control','id'=>'name',$readonly,'required' => 'required', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>	
				
					<div class="form-group row">
						<div class="col-lg-4">
						  {!! Form::label('Email', __( 'Email' ) . ':') !!}
						</div>
						<div class="col-lg-8">
						  {!! Form::text('email', $uemail, ['class' => 'form-control','id'=>'email',$readonly, 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>	
					<hr>
					<div class="form-group row">
						<div class="col-lg-4">
						  {!! Form::label('Order ID', __( 'Order ID' ) . ':') !!}
						</div>
						<div class="col-lg-8">
						  {!! Form::text('orderid', null, ['class' => 'form-control', 'placeholder' => __( 'AUTO GENERATED' ) ]); !!}
						</div>
					</div>
					<div class="form-group row">
					  <div class="col-lg-4">
						{!! Form::label('Order Date', __( 'Order Date' ) . ':*') !!}
					  </div>
					  <div class="col-lg-8">
						{!! Form::text('order_date', null, array('placeholder' => 'Order Date', 'class' => 'form-control mycustomdate')) !!}
						</div>
					</div>
					<hr>
					<div class="form-group row">
						{!! Form::label('Payment Method', __( 'Payment Method' ) . ':*', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 						 
						  {!! Form::select('paymentmood', (['0' => 'Select a payment']+$payment),[], ['class' => 'form-control','' ]  ); !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('Payment Status', __( 'Payment Status' ) . ':*', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 						 
						  {!! Form::select('paymentstatus', (['0' => 'Select a payment status']+$subscriptionstatus),[], ['class' => 'form-control','' ]  ); !!}
						</div>
					</div>
				</div>
				
				<div class="col-sm-8" id="usersearch" >
					<div class="form-group row">
						<div class="col-lg-3">
						  {!! Form::label('Payment Reference', __( 'Payment Reference' ) . ':') !!}
						</div>
						<div class="col-lg-6">
						  {!! Form::text('reference_no', null, ['class' => 'form-control', 'placeholder' => __( 'Receipt No., Transaction No.,...' ) ]); !!}
						</div>
					</div>	
					<hr>
					<div style=""><h4>Search a Customer and Choose a Subscription Type <p id="mydataa"></p></h4></div>
					<div class="form-group row">
						<div class="col-lg-12">
							<table class="table">
							  <thead>
								<tr>
								  <th width="30%">Product Name</th>
								  <th width="10%">type</th>
								  <th width="10%">Quantity</th>
								  <th width="10%">Orig. Price</th>
								  <th width="10%">Misc(+/-)</th>
								  <th width="10%">VAT %</th>
								  <th width="10%">Freight</th>
								  <th width="10%">Freight Tax %</th>
								</tr>
							  </thead>
							  <tbody>
								<tr>
								  <th scope="row">
									  <select class="form-control" onChange="getProduct();" name="productids" id="productids">
									  <option value="">Select</option>
									  @foreach($product as $products)
										<option value="{{$products->id}}">{{$products->productname}}</option>
									  @endforeach
									  </select>
								  </th>
								  <td><input type="text" class="form-control" name="type"></td>
								  <td><input type="text" class="form-control" onkeyup="calculateorderprice();" name="quantity" id="quantity"></td>
								  <td><input type="text" onkeyup="calculateorderprice();" class="form-control" name="price" id="price"></td>
								  <td><input type="text" onkeyup="calculateorderprice();" class="form-control" name="misc" id="misc"></td>
								  <td><input type="text" onkeyup="calculateorderprice();" class="form-control" name="vat" id="vat" value="25"></td>
								  <td><input type="text" onkeyup="calculateorderprice();" class="form-control" name="freight" id="freight"></td>
								  <td><input type="text" onkeyup="calculateorderprice();" class="form-control" name="freighttax" id="freighttax" value="25"></td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
					
					<div class="row" id=""></div>
					<div class="form-group row">
						<div class="col-lg-8">
						 <div class="form-group">
							{!! Form::label('Order Note', __( 'Order Note' ) . ':') !!}
							{!! Form::textarea('ordernote', null, ['class' => 'form-control', 'rows'=>'5','placeholder' => __('') ]); !!}
						  </div>
						</div>
						
						
						<div class="col-lg-4">
						<h5>Total</h5>
						  <div class="card">
							
							<div class="card-body">								
							  <div class="row">
								<div class="col-sm-8">
									<div class="span8">Price + Misc:</div>
								</div>
								<div class="col-sm-4">
									<div class="span4 pull-right"  style="font-weight: bold;" id="total_price">0.00</div>
								</div>									
							  </div>
							  
							  <div class="row">
								<div class="col-sm-8">
									<div class="span8">VAT:</div>
								</div>
								<div class="col-sm-4">
									<div class="span4"  style="font-weight: bold;" id="total_vat">0.00</div>
								</div>									
							  </div>
							  
							  <div class="row">
								<div class="col-sm-8">
									<div class="span8">Freight Cost + Tax:</div>
								</div>
								<div class="col-sm-4">
									<div class="span4"  style="font-weight: bold;" id="total_freight_tax">0.00</div>
								</div>									
							  </div>
							  <hr>
							  <div class="row">
								<div class="col-sm-8">
									<div class="span8">Kr</div>
								</div>
								<div class="col-sm-4">
									<div class="span4"  style="font-weight: bold;" id="totals">0.00</div>
								</div>									
							  </div>
							  
							</div> 
							
						  </div>
						  
						</div>
					</div>
					
					
				</div>
				
				<div class="col-sm-8" id="userlists" style="display:none;">
					<table class="table table-bordered userlists-table" id="myTableuser" >
						<thead>
							<tr>
								<td></td>
								<td>ID</td>	
								<td>Name</td>
								<td>Email</td>
								<td>Type</td>
							</tr>
						</thead>
						<tbody>
						</tbody>
					  </table>
				</div>
				
			 
			 </div>
			
          
          <div class="card-footer clearfix">

            <div class="row">

                <div class="col">

                    <a class="btn btn-danger btn-sm" href="{{ url()->previous() }}">Cancel</a>

                </div>

                <div class="col text-right">

                    <button type="submit" class="btn btn-primary">Save</button>

                </div>

            </div>

        </div>
		<input type="hidden" name="usertype" id="usertype">
		<input type="hidden" name="productId" id="productId">
		<input type="hidden" name="newquantity" id="newquantity">
		<input type="hidden" name="newprice" id="newprice">
		<input type="hidden" name="newmisc" id="newmisc">
		<input type="hidden" name="newvat" id="newvat">
		<input type="hidden" name="newfr" id="newfr">
		<input type="hidden" name="newfrt" id="newfrt">
		<input type="hidden" name="newtotal" id="newtotal">
		<input type="hidden" name="subscId" id="subscId">

        {!! Form::close() !!}
            </div>

      </div>

    </div>



  </div>

@endsection