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
                    Cash Flow Report
                  </h4>
              </div><!--col-->

              <div class="col-sm-7">                  
              </div><!--col-->
          </div><!--row-->
          <hr>
		  
		  <form action="" method="post" id="transData" name="transData">
		  @csrf
          <div class="row">            
              
              <div class="col-sm-12">
                <div class="col-sm-12">
                  <div class="form-group " style="display: flex;">
				  
                    <!-- <label for="exampleInputEmail1">Email address</label> -->
                  
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                  </div>
                </div>
                <div class="row col-row">
                  <div class="col-sm-4">
				  
				  <div style="width: 200px;">
						<label class="radio">
							<input type="radio" name="optionsRadios" id="optionsRadios1" value="show_all" checked="">
							Show All Orders
						</label>
						<label class="radio">
							<input type="radio" name="optionsRadios" id="optionsRadios2" value="show_paid">
							Show Paid Orders
						</label>
						<label class="radio">
							<input type="radio" name="optionsRadios" id="optionsRadios2" value="show_not_paid">
							Show Not Paid Orders
						</label>
					</div>
				  
                    <div class="form-group">
                     <select class="form-control" name="paymentmood" id="paymentmood">
						<option value="">select payment</option>
						@foreach($payment as $key => $val)
						<option value="{{$key}}">{{$val}}</option>
						@endforeach
					 </select>
					 
                    </div>
					
					<div class="input-group">
							<input id="startdate" type="text" class="form-control mycustomdate" name="startdate" placeholder="From Date"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>						
						</div><br>
						
						<div class="input-group">
							<input id="expiry_date" type="text" class="form-control mycustomdate" name="expiry_date" placeholder="TO Date"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>						
						</div><br>
					
                  </div>
				 
                <div class="col-sm-4">
					 <select class="form-control" multiple style="height:40%" name="subscids[]">
						@foreach($datasubs as $Datasubs)
						<option value="{{$Datasubs->id}}">{{$Datasubs->eng_name}}</option>
						@endforeach
					 </select>
					 <br><br>
					 <select class="form-control" multiple style="height:40%" name="productids[]">
					 @foreach($product as $Product)
						<option value="{{$Product->id}}">{{$Product->productname}}</option>
					@endforeach
					</select>
				</div>
					
				 <div class="col-sm-4">
					<a class="btn btn-success" onclick="searchcashflowdata();" >Generate List</a>
				</div>
					
						
						
					
                 
                </div>  
                
              </div>
			  
			
			   
			 
              
             </form>
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
                      Cash Flow Report <small class="text-muted">Cash Flow Report List</small>
                  </h4>
              </div><!--col-->

              <div class="col-sm-7">
                  <!-- <div class="btn-toolbar float-right" role="toolbar" aria-label="Create">
                    <a href="{!! url('/admin/users/create'); !!}" class="btn btn-success ml-1" data-toggle="tooltip" title="Create"><i class="fas fa-plus-circle"></i></a>
                  </div> -->
              </div><!--col-->
          </div><!--row-->
          <hr>
          <table class="table table-bordered cashflow-table" id="cashflow-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Cust No</th>
                    <th>Order No</th>
                    <th>Cust Name</th>
                    <!-- <th>Phone</th>
					<th>Mobile</th> 
                    <th>user type</th>-->
                    <th>Address</th>
                    <th>Sales Person</th>
                    <th>Total sum excl VAT</th>
					<th>Misc</th>
                    <th>Freight</th>
                    <th>VAT</th>
                    <th>Freight Tax</th>
					 <th>Total Tax</th>
					 <th>Total Invoice</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
			<tfoot>
               <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <!-- <th>Phone</th>
					<th>Mobile</th> 
                    <th>user type</th>-->
                    <th></th>
                    <th></th>
                    <th></th>
					<th></th>
                    <th></th>
                    <th></th>
                    <th></th>
					 <th></th>
					 <th></th>
                </tr>
				
            </tfoot>
          </table>
        </div>
      </div>
    </div>

  </div>
@endsection

  