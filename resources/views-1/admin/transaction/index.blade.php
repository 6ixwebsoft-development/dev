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

@section('content')


<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
              <div class="col-sm-5">
                  <h4 class="card-title mb-0">
                     Transaction Search
                  </h4>
              </div><!--col-->

              <div class="col-sm-7">                  
              </div><!--col-->
          </div><!--row-->
          <hr>
		  
		  <form action="" method="post" id="transData" name="transData">
		  @csrf
          <div class="row">            
              
              <div class="col-sm-6">
                <div class="col-sm-12">
                  <div class="form-group " style="display: flex;">
				  
                    <!-- <label for="exampleInputEmail1">Email address</label> -->
                    <input type="text" name="search" id="search" class="form-control searchtest" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search by name">
                    <button type="button" onClick="searchtransdata();" class="btn btn-primary">Search</button>
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                  </div>
                </div>
                <div class="row col-row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="usertytype">All</label>
                      <select multiple class="form-control" id="usertype[]" name="usertype[]">
                        <option value="ORD" selected>ORDERS</option>
						<option value="SUB">SUBSCRIPTIONS</option>
					
                      </select>
                    </div>
					
					<div class="input-group">
							<input id="startdate" type="text" class="form-control mycustomdate" name="startdate" placeholder="Start Date"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>						
						</div><br>
						
						<div class="input-group">
							<input id="paid_date_from" type="text" class="form-control mycustomdate" name="paid_date_from" placeholder="Paid Date From"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						</div>
					
					<div style="margin-top:10px;" class="row">
						<div class="col-sm-6">
						  <div class="form-group">
						  <select  class="form-control" id="exampleFormControlSelect1">
							<option>1</option>
						  </select>
						  </div>
						</div>
						<div class="col-sm-6">
							  <div class="form-group">
							   <select  class="form-control" id="status" name="status">
								<option value="">STATUS</option>
								@foreach($paymenttype as $key => $val)
								<option value="{{$key}}">{{$val}}</option>
								@endforeach
							  </select>
							</div>
						</div>
					
					</div>
					
					
                  </div>
				 
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">ALL CUSTOMER TYPE</label>
                      <select multiple class="form-control" id="customertype[]" name="customertype[]">
							 <option value="LIB">Library</option>
							<option value="IND">Individual</option>
							<option value="ORG">Organization</option>
                      </select>
                    </div>
					
					<div class="input-group">
							<input id="expiry_date" type="text" class="form-control mycustomdate" name="expiry_date" placeholder="Expiry Date"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>						
						</div><br>
						<div class="input-group">
							<input id="paid_date_to" type="text" class="form-control mycustomdate" name="paid_date_to" placeholder="Paid Date To"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						</div>
						
						<div style="margin-top:10px;">
							<p>LEGEND:  <span class="badge badge-primary">Orders</span>  <span class="badge badge-warning">Subscription</span>  
						</div>
					
                  </div>
                </div>  
                
              </div>
			  
			
			   
			  
			  
			  
              <div class="col-sm-6">
					<div class="row">
					  <div class="col-sm-4">
					  
							<div class="checkbox">
							  <label><input type="checkbox" value="1" id="filter_exact_match" name="filter_exact_match"> Exact Match</label>
							</div>                                    
							                                   
							<div class="checkbox">                    
							  <label><input type="checkbox" value="1" name="filter_date_created"> Filtered Date Created</label>
							</div>                                    
							<div class="checkbox">                    
							  <label><input type="checkbox" value="1" name="filter_date_edited"> Filtered Date Last Edited</label>
							</div> 	
							
							<div class="radio">
							  <label><input type="radio" name="optuser" id="optuser" value="" checked>All</label>
							
							  <label><input type="radio" name="optuser" id="optuser" value="1">Active</label>
							
							  <label><input type="radio" name="optuser" id="optuser" value="0">inactive</label>
							</div>
							
					  </div>

					  <div class="col-sm-4">
							<p class="text-secondary">Total Transactions : 4236</p>
							<p class="text-primary">Total ORD Active: 821</p>
							<p class="text-primary">Total SUB Active: 1171</p>
							<p class="text-danger">Total ORD Void: 108</p>
							<p class="text-danger">Total SUB Expired: 2136</p>
							<p class="text-success">Total hits: 0</p>
							
					  </div>
					  <div class="col-sm-4">
						<a href="{!! url('/admin/order/create'); !!}" type="button" class="btn btn-success col-sm-12">Add New Order</a>
						<a href="{!! url('/admin/subscription/create'); !!}" type="button" class="btn btn-success col-sm-12">Add New Subscription</a>
						<button type="button" class="btn btn-info col-sm-12">Print Invoices</button>
					  </div>         
					</div>         
              </div>
              
             </form>
          </div>
		  <div class="col-sm-9 offset-md-3">
		  <div class="row">
			<div class="col-sm-2"> 
				<p>Free - Registered Free user</p>
			</div>
			<div class="col-sm-2"> 
				<p>Free - Registered Free user</p>
			</div>
			<div class="col-sm-2"> 
				<p>Free - Registered Free user</p>
			</div>
			<div class="col-sm-3"> 
				<p>Free - Registered Free user</p>
			</div>
			<div class="col-sm-3"> 
				<p>Free - Registered Free user</p>
			</div>
		  </div>
		  </div>
        </div>
      </div>
    </div>   

    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
              <div class="col-sm-5">
                  <h4 class="card-title mb-0">
                      Transaction Management <small class="text-muted">Transaction List</small>
                  </h4>
              </div><!--col-->

              <div class="col-sm-7">
                  <!-- <div class="btn-toolbar float-right" role="toolbar" aria-label="Create">
                    <a href="{!! url('/admin/users/create'); !!}" class="btn btn-success ml-1" data-toggle="tooltip" title="Create"><i class="fas fa-plus-circle"></i></a>
                  </div> -->
              </div><!--col-->
          </div><!--row-->
          <hr>
          <table class="table table-bordered tranaction-table" id="tranaction-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Email</th>
                    <!-- <th>Phone</th>
					<th>Mobile</th> 
                    <th>user type</th>-->
                    <th>Amount</th>
                    <th>Start Date</th>
                    <th>Expiry Date</th>
					<th>Created</th>
                    <th>Modified</th>
                    <th>Status</th>
                    <th width="150px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
@endsection

  